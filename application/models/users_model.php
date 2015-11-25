<?php date_default_timezone_set('Asia/Manila');
Class users_model extends CI_Model
{
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function user_login($username, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');
		return $this->verify_password_hash($password, $hash);

	}
	

	function check_account_db() {
		
		$this->db->where('is_active', '0');
		$this->db->where('username',$this->input->post('username'));
		$val = $this->db->get('users');
		if($val->num_rows() == 1){
			$this->session->set_flashdata('error','Account Does Not Exist or Is Disabled');
		}
		
		else{
				
			$password = $this->input->post('password');
		
			$this->db->select('password');
			$this->db->from('users');
			$this -> db -> where('is_active', '1');
			$this -> db -> where('username', $this->input->post('username'));
			$hash = $this->db->get()->row('password');
			
			
			return $this->verify_password_hash($password, $hash);
		}
		
	}
	
	
	/**
	 * get_user_id_from_username function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @return int the user id
	 */
	public function get_user_id_from_username($username) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('username', $username);

		return $this->db->get()->row('id');
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}

	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
	
	
	
	/**
	 * Create function.
	 *  creates a new user
	 *   
	 */
	function create()
	{
		
		$this->db->where('username',$this->input->post('username'));
		$val = $this->db->get('users');
		
		if($val->num_rows() == 1){
			$this->session->set_flashdata('name_error','Username already in use.');
		}
		
		else{
			$pass = 'k@mun1ng';
			$lower = strtolower($this->input->post('lastName')."".$this->input->post('firstName')."@kb");
			$username = str_replace(' ', '', $lower);
			
			$data = array(
				'username'	=> $username,
				'password'	=> $this->hash_password($pass),
				'firstName'	=> $this->input->post('firstName'),
				'lastName'	=> $this->input->post('lastName'),
				'user_type'	=> $this->input->post('user_type'),
				'is_active'	=> '1',
				'created_at'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('users', $data);
			$this->session->set_flashdata('success','Successfully Created User');
			$remark_id = $this->db->insert_id();
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Users',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'created account',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
		}
	
	}
	
	
	/**
	 * get user record function
	 * 
	 * 
	 */
	function get_member_rec($mid) {
		$this->db->join('user_type','user_type.type_id = users.user_type','left');
		$this -> db -> where('users.id', $mid);
		$q = $this -> db -> get('users');
		
		return $q -> result();

	}

	/**
	  * update_user function.
	 * 
	 * @access public
	 */
	public function update_user($id)
	
	{
		
			$data = array(
			'firstName'	=> $this->input->post('firstName'),
			'lastName'	=> $this->input->post('lastName'),
			'username'	=> $this->input->post('username'),
			'password' => $this->hash_password($this->input->post('password')),
			'user_type'	=> $this->input->post('user_type'),
			'is_active'	=> $this->input->post('is_active'),
			);
			
			$this->db->where('id', $id);
			$this->db->update('users', $data);
			$this->session->set_flashdata('success','You have Successfuly updated information');
			
			$remark_id = $id;
				
				$audit = array(
					'user_id'	=> $this->session->userdata('user_id'),
					'module'	=> 'Users',
					'remark_id'	=> $remark_id,
					'remarks'	=> 'updated a user account',
					'date_created'=> date('Y-m-j H:i:s'),
					
				);
				
			$this->db->insert('audit_trail', $audit);
		
		
	}
	
	/**
	  * Disable function.
	 *  disables a user
	 * @access public
	 */
	public function disable($id)
	
	{
		$data = array(
		'is_active'	=> '0',
		);
		
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		
		$remark_id = $id;
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Users',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'disabled account',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
		
	}
	
	/**
	  * Enable function.
	 *  Enables a user
	 * @access public
	 */
	public function enable($id)
	
	{
		$data = array(
		'is_active'	=> '1',
		);
		
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		
		$remark_id = $id;
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Users',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'enabled account',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
		
	}


	/**
	  * update_username function.
	 * 
	 * @access public
	 */
	public function update_username($id)
	
	{
		$this->db->where('username',$this->input->post('username'));
		$val = $this->db->get('users');
		
		if($val->num_rows() == 1){
			$this->session->set_flashdata('message','Username already in use.');
		}
		
		else{
			$data2 = array(
			'username'	=> $this->input->post('username'),
			);
			
			$this->db->where('id', $id);
			$this->db->update('users', $data2);
			$this->session->set_flashdata('success','You have Successfuly updated your username');
			
		}	
	}
	/**
	  * update password function.
	 * 
	 * @access public
	 */
	public function update_password($id)
	{
		$password = $this->input->post('password');
		
		$this->db->from('users');
		$this->db->where('id',$id);
		$hash = $this->db->get()->row('password');
		
		
		if($this->verify_password_hash($password, $hash)){
			
			$data = array(
			'password' => $this->hash_password($this->input->post('new_password')),
			);
			
			$this->db->from('users');
			$this->db->where('id',$id);
			$email = $this->db->get()->row('email');
			
			$this->db->where('id',$id);
			$this->db->update('users',$data);

		}
		else{
			
			$this->session->set_flashdata('error','Password does not match with your current password.');
			
		}
	}
	

	

	/**
	  * fetch_users function.
	 * 
	 * @access public
	 */
	public function fetch_users($limit, $start) {
        $this->db->limit($limit, $start);
		$this->db->order_by('id','asc');
        $query = $this->db->get("users");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
	
	/**
	 * get userdata
	 * 
	 */
	function get_log($id) {
		$this -> db -> where('id', $id);
		$q = $this -> db -> get('users');
		return $q -> result();
	    
	}

	public function getUsersCtr() {
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('is_confirmed', '1');
		$query = $this -> db -> get();
		$result = $query -> num_rows();
		return $result;
	}
	
	/**
	 * Get All Users Counter Function
	 */
	public function getAllUsersCtr() {
		return $this->db->count_all('users');
	}
	
	
	/*
	 * get all site users registered/not
	 */
	public function getUsers($limit, $start) {
		$this->db->join('user_type','user_type.type_id = users.user_type','left');
		$this->db->limit($limit, $start);
		$this -> db -> order_by('created_at', 'desc');		
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}
		
		return $data;
		}
		return false;
	}
	
	
	/*
	 * get inactive users function
	 */
	public function getNotif() {
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('is_active', '0');
		$query = $this -> db -> get();
		$data = $query -> result_array();
		return $data;
	}
	
	/*
	 * get unconfirmed members counter (for badge)
	 */
	public function getNotifNCtr() {
		
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('is_active', '0');
		$this -> db -> order_by('created_at', 'desc');
		$query = $this -> db -> get();
		$result = $query -> num_rows();
		return $result;
	}
	
	/*
	 * search user function
	 */	
	function search_users($search) {
		$this->db->join('user_type','user_type.type_id = users.user_type','left');
		$var = urldecode($search);		
		
		$this->db->where('is_active', '1');
		$this -> db -> like('username',$var);
		$this -> db -> or_like('firstName',$var);
		$this -> db -> or_like('lastName', $var);
		$this -> db -> or_like('user_type', $var);
		$query = $this -> db -> get('users');
		$rows = $query -> num_rows();
		$this -> session -> set_flashdata('search', $rows . ' matching record(s) found.');
		return $query -> result();
	}
	
	/*
	 * delete user function
	 */	
	function remove($id)
    {
		$this->db->where('id',$id);
	    $query = $this->db->delete('users');
		
		$remark_id = $id;
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Users',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'deleted account',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
		
    }
	
	/**
	 * Get User Type Function 
	 * 
	 */
	function getuType()
    {
		$this->db->order_by('type_id', 'asc'); 
		$q = $this->db->get('user_type');
		$data = $q->result_array();
		return $data;
	}
	
	
	
	
	
	/******* SUPPLIERS *******************/
	/**
	 * Create Supplier.
	 *  creates a new supplier
	 *   
	 */
	function create_supplier()
	{
		
		$this->db->where('supplier_name',$this->input->post('supplier_name'));
		$val = $this->db->get('suppliers');
		if($val->num_rows() == 1){
			$this->session->set_flashdata('name_error','Data already existing.');
		}
		
		else{
			
			
			$data = array(
				'supplier_name'	=> $this->input->post('supplier_name'),
				'lead_time'		=> $this->input->post('lead_time'),
				'contact_Person'=> $this->input->post('contact_Person'),
				'st_Address'	=> $this->input->post('st_Address'),
				'city'			=> $this->input->post('city'),
				'terms'			=> $this->input->post('terms'),
				'supplier_email'		=> $this->input->post('email'),
				'contact'		=> $this->input->post('contact'),
				'created_at'	=> date('Y-m-j H:i:s'),
				'is_active'		=> '1',	
			);
			
			$this->db->insert('suppliers', $data);
			
			$this->session->set_flashdata('success','Successfully Created Supplier');
			
			$remark_id = $this->db->insert_id();
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Suppliers',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'created supplier',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
		}
	
	}
	
	/**
	  * update_supplier function.
	 * 
	 * @access public
	 */
	public function update_supplier($id)
	
	{
		
		$data = array(
			'supplier_name'	=> $this->input->post('supplier_name'),
			'contact_Person'=> $this->input->post('contact_Person'),
			'st_Address'	=> $this->input->post('st_Address'),
			'lead_time'		=> $this->input->post('lead_time'),
			'city'			=> $this->input->post('city'),
			'terms'			=> $this->input->post('terms'),
			'supplier_email'		=> $this->input->post('email'),
			'contact'		=> $this->input->post('contact'),
			'is_active'		=> $this->input->post('is_active'),
		);
		
		$this->db->where('supplier_id', $id);
		$this->db->update('suppliers', $data);
		$this->session->set_flashdata('success','You have Successfuly updated information');
		
		$remark_id = $id;
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Suppliers',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'updated supplier',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
		$this->db->insert('audit_trail', $audit);
		
	}
	
	/**
	 * Get Supplier Record function
	 * 
	 * 
	 */
	function get_supplier_rec($mid) {
		
		$this -> db -> where('supplier_id', $mid);
		$q = $this -> db -> get('suppliers');
		
		return $q -> result();

	}
	
	/**
	  * Disable function.
	 *  disables a supplier
	 * @access public
	 */
	public function disable_s($id)
	
	{
		$data = array(
		'is_active'	=> '0',
		);
		
		$this->db->where('supplier_id', $id);
		$this->db->update('suppliers', $data);
		
		$remark_id = $id;
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Suppliers',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'disabled supplier',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
		$this->db->insert('audit_trail', $audit);
	}
	
	/**
	  * Enable function.
	 *  Enables a supplier
	 * @access public
	 */
	public function enable_s($id)
	
	{
		$data = array(
		'is_active'	=> '1',
		);
		
		$this->db->where('supplier_id', $id);
		$this->db->update('suppliers', $data);
		
		$remark_id = $id;
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Suppliers',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'enabled supplier',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
		$this->db->insert('audit_trail', $audit);
		
	}
	
	
	/*
	 * search suppliers function
	 */	
	function search_suppliers($search) {
		
		$var = urldecode($search);		
		
		$this->db->where('is_active', '1');
		$this -> db -> like('supplier_name',$var);
		$this -> db -> or_like('contact_Person',$var);
		$this -> db -> or_like('st_Address', $var);
		$this -> db -> or_like('city', $var);
		$this -> db -> or_like('terms', $var);
		$this -> db -> or_like('contact', $var);
		
		$query = $this -> db -> get('suppliers');
		$rows = $query -> num_rows();
		$this -> session -> set_flashdata('search', $rows . ' matching record(s) found.');
		return $query -> result();
	}
	
	/***
	 * Get all registered suppliers
	 *  
	 */
	public function getSuppliers($limit, $start) {
		
		$this->db->limit($limit, $start);
		$this -> db -> order_by('created_at', 'desc');
		$this->db->where('supplier_id !=', '1');		
		$query = $this->db->get('suppliers');
		if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}
		
		return $data;
		}
		return false;
	}
	
	/*
	 * delete user function
	 */	
	function remove_s($id)
    {
		$this->db->where('supplier_id',$id);
	    $query = $this->db->delete('suppliers');
		
		$remark_id = $id;
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Suppliers',
			'remark_id'	=> $remark_id,
			'remarks'	=> 'deleted account',
			'date_created'=> date('Y-m-j H:i:s'),
		);
			
		$this->db->insert('audit_trail', $audit);
		
    }
}
?>