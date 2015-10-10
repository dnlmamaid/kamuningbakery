<?php
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
	public function user_login($email, $password) {
		
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');
		return $this->verify_password_hash($password, $hash);

	}
	

	function check_account_db() {
		
		$this->db->where('is_confirmed', '0');
		$this->db->where('email',$this->input->post('email'));
		$val = $this->db->get('users');
		if($val->num_rows() == 1){
			$this->session->set_flashdata('error','Account Does Not Exist or Is Not Yet Approved');
		}
		
		else{
				
			$password = $this->input->post('password');
		
			$this->db->select('password');
			$this->db->from('users');
			$this -> db -> where('is_confirmed', '1');
			$this -> db -> where('email', $this->input->post('email'));
			$hash = $this->db->get()->row('password');
			
			
			return $this->verify_password_hash($password, $hash);
		}
		
	}
	
	
	/**
	 * get_user_id_from_email function.
	 * 
	 * @access public
	 * @param mixed $email
	 * @return int the user id
	 */
	public function get_user_id_from_email($email) {
		
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email', $email);

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
		$this->db->join('user_profiles', 'user_profiles.user_id = users.id','left');
		$this->db->from('users');
		$this->db->where('users.id', $user_id);
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
	 * add_to_queue function.
	 *  basically puts the applicant for review of the admin
	 *  to be accepted as a member 
	 */
	function add_to_queue()
	{
		
		$this->db->where('email',$this->input->post('email'));
		$val = $this->db->get('users');
		if($val->num_rows() == 1){
			
			$this->session->set_flashdata('message','Email already in use.');
		}
		
		else{
				
			$data = array(
				'email'      => $this->input->post('email'),
				'password'   => $this->hash_password($this->input->post('password')),
				'created_at' => date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('users', $data);
			$user_id = $this->db->insert_id();
			
			$data2 = array(
				'user_id'	=> $user_id, 
				'firstName'	=> $this->input->post('firstName'),
				'lastName'	=> $this->input->post('lastName'),
				'sex'		=> $this->input->post('sex'),
				'contact'	=> $this->input->post('contact'),
				'company'	=> $this->input->post('company'),
				'position'	=> $this->input->post('position'),
				
				
			);
			
			$this->db->insert('user_profiles',$data2);
			$this->session->set_flashdata('sent','Your application has been sent');
		}
	
	}
	
	
	/**
	 * Change Password function
	 * 
	 */
	function change_password($user_id, $email){
	
		date_default_timezone_set('GMT');
		$password= random_string('alnum', 16);
		
		$data = array(
			'password'   => $this->hash_password($password),
		);
		
		$this->db->where('id', $user_id);
		$this->db->update('users', $data);
				
		$this->email->from('noreply@megasign.com', 'MEGASIGN-ADMIN');
		$this->email->to($email); 	
		$this->email->subject('Password reset');
		$this->email->message('You have requested a new password, Here is you new password: '. $password);	
		$this->email->send();
		$this->session->set_flashdata('message','Your application has been sent');
	}
	 
	/**
	 * get user record function
	 * 
	 * 
	 */
	function get_member_rec($mid) {
		
		$this -> db -> join('users', 'users.id = user_profiles.user_id', 'left');
		$this -> db -> where('user_profiles.id', $mid);
		$q = $this -> db -> get('user_profiles');
		
		return $q -> result();

	}

	/**
	 * get message record function
	 * 
	 * 
	 */
	function get_message_rec($mid, $email) {

		if(!$this -> db -> where('recipient', $email))
		{
			$this->session->set_flashdata('message','You don\'t have permission to read this message');
		}
		
		else if($this -> db -> where('recipient', $email)){
			$this -> db -> where('message_id', $mid);	
			$q = $this -> db -> get('inbox');
			return $q -> result();
		}
	}	
	
	/**
	  * update_user function.
	 * 
	 * @access public
	 */
	public function update_user($id)
	
	{
		$data = array(
		'firstName' => $this->input->post('firstName'),
		'lastName' => $this->input->post('lastName'),
		'sex' => $this->input->post('sex'),
		'contact'=> $this->input->post('contact'),
		'company'	=> $this->input->post('company'),
		'position'	=> $this->input->post('position'),
		);
		
		$this->db->where('user_id', $id);
		$this->db->update('user_profiles', $data);
		$this->session->set_flashdata('message','You have Successfuly updated information. except your email');
		
		$this->db->where('email',$this->input->post('email'));
		$val = $this->db->get('users');
		
		if($val->num_rows() == 1){
			$this->session->set_flashdata('message','Email already in use.');
		}
		else{
			$data2 = array(
			'email'	=> $this->input->post('email'),
			);
			
			$this->db->where('id', $id);
			$this->db->update('users', $data2);
			$this->session->set_flashdata('message','You have Successfuly updated information.');
			
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
				
			$this->email->from('noreply@megasign.com', 'MEGASIGN-ADMIN');
			$this->email->to($email); 	
			$this->email->subject('Change Password');
			$this->email->message('You have successfully changed your password.');	
			$this->email->send();
			$this->session->set_flashdata('message','Your application has been sent');
		}
		else{
			
			$this->session->set_flashdata('error','Password does not match with your current password.');
			
		}
	}
	

	/**
	  * approve user function.
	 * 
	 * @access public
	 */
	public function approve($id)
	{
		$data = array(
			'is_confirmed'	=> $this->input->post('is_confirmed'),
			'is_deleted'	=> $this->input->post('is_deleted')
		);
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}
	
	/**
	  * mark message as read function.
	 * 
	 * @access public
	 */
	public function mark_as_read($mid)
	{
		$data = array(
			'is_read'	=> '1',
		);
		$this->db->where('message_id', $mid);
		$this->db->update('inbox', $data);
	}
	
	/**
	  * fetch_users function.
	 * 
	 * @access public
	 */
	public function fetch_users($limit, $start) {
		$this -> db -> join('users', 'users.id = user_profiles.user_id', 'left');
        $this->db->limit($limit, $start);
		$this->db->order_by('user_id','asc');
        $query = $this->db->get("user_profiles");
 
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
		$this -> db -> join('users', 'users.id = user_profiles.user_id', 'left');
		$this -> db -> where('user_profiles.id', $id);
		$q = $this -> db -> get('user_profiles');
		return $q -> result();
	    
	}
	
	/**
	 * get similar email for messaging
	 * 
	 */
	function getEmail($eid) {
		$this -> db -> join('user_profiles', 'user_profiles.user_id = users.id', 'left');
		$this -> db -> where('email', $eid);
		$q = $this -> db -> get('users');
		return $q -> result();
	    
	}
	
	
	
	/**
	  * inquiry function.
	 * 
	 * @access public
	 */
	function send_inquiry(){
		$data = array(
		'sender' => $this->input->post('sender'),
		'email' => $this->input->post('email'),
		'recipient' => $this->input->post('recipient'),
		'contact' => $this->input->post('contact'),
		'company' => $this->input->post('company'),
		'peak' => $this->input->post('message'),
		'message' => $this->input->post('message'),
		'is_read' => '0',
		);
		$this->db->insert('inbox',$data);
		$this->session->set_flashdata('message_sent','Successfully Sent Message.');
	}
	
	
	
	function send_message(){
		$data = array(
		'sender' => $this->input->post('sender'),
		'recipient' => $this->input->post('recipient'),
		'email' => $this->input->post('email'),
		'contact' => $this->input->post('contact'),
		'company' => $this->input->post('company'),
		'peak' => $this->input->post('message'),
		'message' => $this->input->post('message'),
		'is_read' => '0',
		'is_member' => '1',
		);
		
		$this->email->from('noreply@megasign.com', $this->input->post('sender'));
		$this->email->to($this->input->post('recipient')); 	
		$this->email->subject('This message is sent via MEGASIGN.com');
		$this->email->message($this->input->post('message'));	
		$this->email->send();
		
		$this->db->insert('inbox',$data);
		$this->session->set_flashdata('message_sent','Message Sent.');
	}
	
	
	
	
	/**
	  * getMail function.
	 * 
	 * @access public
	 */
	public function getMail($email, $limit, $start) {
		
			$this->db->limit($limit, $start);
			
			
			$this -> db -> order_by('is_read', 'asc');
			$this -> db -> order_by('date_sent', 'desc');
			$this -> db -> where('recipient', $email);
			
			$query = $this->db->get('inbox');
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}
			
			return $data;
			}
			return false;			
			
	}

	
	/*
	 * get unread mail function
	 */
	public function getNMail($email) {
	if(!$this->session->userdata('is_admin')){
			
			$this -> db -> select('*');
			$this -> db -> from('inbox');
			$this -> db -> where('is_read', '0');
			$this -> db -> where('recipient', $email);
			$query = $this -> db -> get();
			$data = $query -> result_array();
			return $data;
			
	}
	else {
			$this -> db -> select('*');
			$this -> db -> from('inbox');
			$this -> db -> where('is_read', '0');
			$this -> db -> where('recipient', $email);
			$this -> db -> order_by('date_sent', 'desc');
			$query = $this -> db -> get();
			$data = $query -> result_array();
			return $data;
	}
}
	/*
	 * get unread mail notification counter function (for badge)
	 */
	public function getMailNCtr($email) {
		if(!$this->session->userdata('is_admin')){
			
			$this -> db -> select('*');
			$this -> db -> from('inbox');
			$this -> db -> where('is_read', '0');
			$this -> db -> where('recipient', $email);
			$query = $this -> db -> get();
			$result = $query -> num_rows();
			return $result;
		}
		
		else {
			
			$this -> db -> select('*');
			$this -> db -> from('inbox');
			$this -> db -> where('is_read', '0');
			$this -> db -> where('recipient', $email);
			$query = $this -> db -> get();
			$result = $query -> num_rows();
			return $result;
		}
	}
	
	
	
	/*
	 * get mail  counter function (for dashboard)
	 */
	public function getMailCtr($email) {
			$this -> db -> select('*');
			$this -> db -> from('inbox');
			$this -> db -> where('recipient', $email);
			$query = $this -> db -> get();
			$result = $query -> num_rows();
			return $result;
	
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
		$this -> db -> join('user_profiles', 'user_profiles.user_id = users.id', 'left');
		$this->db->limit($limit, $start);
		$this -> db -> order_by('is_confirmed', 'asc');
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
	 * get unconfirmed members function
	 */
	public function getNotif() {
		$this -> db -> join('user_profiles', 'user_profiles.user_id = users.id', 'left');
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('is_confirmed', '0');
		$query = $this -> db -> get();
		$data = $query -> result_array();
		return $data;
	}
	
	/*
	 * get unconfirmed members counter (for badge)
	 */
	public function getNotifNCtr() {
		$this -> db -> join('user_profiles', 'user_profiles.user_id = users.id', 'left');
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('is_confirmed', '0');
		$this -> db -> order_by('created_at', 'desc');
		$query = $this -> db -> get();
		$result = $query -> num_rows();
		return $result;
	}
	
	/*
	 * search user function
	 */	
	function search_user_profiles($search) {
		
		$var = urldecode($search);		
		
		$this -> db -> join('users', 'users.id = user_profiles.user_id', 'left');
		$this -> db -> like('email', $var);
		$this -> db -> or_like('firstName',$var);
		$this -> db -> or_like('lastName', $var);
		$this -> db -> or_like('company', $var);
		$query = $this -> db -> get('user_profiles');
		$rows = $query -> num_rows();
		$this -> session -> set_flashdata('search', $rows . ' matching record(s) found.');
		return $query -> result();
	}
	
	/*
	 * search messages function
	 */	
	function search_messages($search, $email) {

		$var = urldecode($search);
		
		$this -> db -> where('recipient', $email);
		$this -> db -> order_by('is_read', 'asc');
		$this -> db -> order_by('date_sent', 'desc');
		
		$this -> db -> like('email', $var);
		$this -> db -> or_like('sender', $var);
		$this -> db -> or_like('company', $var);
		$this -> db -> or_like('message', $var);
		$this -> db -> or_like('date_sent', $var);
		
		$query = $this -> db -> get('inbox');
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
		$this->db->from('users');
		$email = $this->db->get()->row('email');
		
		$this->email->from('noreply@megasign.com', 'MEGASIGN-ADMIN');
		$this->email->to('$email');
		$this->email->subject('Membership');
		$this->email->message('<h1>Your Account has been terminated.</h1>');
		$this->email->send();
		
		$this->db->where('id',$id);
	    $query = $this->db->delete('users');
		
		$this->db->where('user_id',$id);
	    $query = $this->db->delete('user_profiles');
    }

	/**
	 * Delete Message Function
	 * 
	 */
	
	
	function delete_message($id){
		$this->db->where('message_id',$id);
	    $query = $this->db->delete('inbox');	
	}
	
}
?>