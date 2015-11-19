<?php date_default_timezone_set('Asia/Manila');
if (!defined('BASEPATH')) exit('No direct script access allowed');

class requests_model extends CI_Model{
 		
	/*
	 * Get all Requests
	 */
	public function getRequests($limit, $start) {
		
		if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') <= '2' || $this->session->userdata('user_type') == '5')){
			
			$this->db->join('users','users.id = requests.user_id','left');
			$this->db->join('user_type', 'user_type.type_id = users.user_type', 'right');
			$this->db->limit($limit, $start);
			$this->db->where('request_status <=', '1');
			$this->db->order_by('request_date', 'desc');
			$query = $this->db->get('requests');
			if ($query -> num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
	
				return $data;
			}
			return false;
			
		} else if($this->session->userdata('is_logged_in') ){
			
			$this->db->join('users','users.id = requests.user_id','left');
			$this->db->join('user_type', 'user_type.type_id = users.user_type', 'right');
			$this->db->limit($limit, $start);
			$this->db->order_by('request_date', 'desc');
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$query = $this->db->get('requests');
			if ($query -> num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
	
				return $data;
			}
			return false;
			
		}
	}
	
	/**
	 * Get Products Function
	 *
	 */
	function getProducts() {
		$this->db->order_by('product_id', 'asc');
		$this->db->where('product_status', '1');
		$this->db->where('category_id', '2');
		$q = $this->db->get('products');
		$data = $q -> result_array();
		return $data;
	}
	
	
	public function getRequestsCtr() {
		$this->db->select('*');
		$this->db->from('requests');
		$query = $this->db->get();
		$result = $query -> num_rows();
		return $result;
	}
	
	/**
	 * get Purchase Order function
	 * 
	 */
	function getRO($code)
	{
		
		$this->db->where('requests.ro_reference', $code);
		$this->db->where('requests.ro_reference', $code);
		$this->db->join('request_orders', 'request_orders.request_reference = requests.ro_reference', 'left');
		$this->db->join('users', 'users.id = requests.user_id', 'left');
		$q = $this->db->get('requests');
		
		if($q->num_rows()){
			return $q -> result();
		}
		
		else{
			return false;	
		}
	}
	
	/**
	 * get Orders function
	 * used for multiple orders in a single purchase
	 */
	function getROrders($code)
	{
		
		$this->db->where('request_orders.request_reference', $code);
		
		$this->db->join('products', 'products.product_id = request_orders.product_id', 'left');
		
		$this->db->join('product_class', 'product_class.class_id = products.class_ID', 'right');
		$this->db->join('requests', 'requests.ro_reference = request_orders.request_reference', 'left');
		
		$q = $this->db->get('request_orders');
		
		if($q->num_rows()){
			return $q -> result();
		}
		
		else{
			return false;	
		}
	}
	
	/**
	 * get Request Order Record function
	 * gets specific request order record
	 */
	function getROR($id)
	{
		
		$this->db->where('ro_id', $id);
		$this->db->join('products', 'products.product_id = request_orders.product_id', 'left');
		$this->db->join('requests', 'requests.ro_reference = request_orders.request_reference', 'left');
		$this->db->join('users', 'users.id = requests.user_id', 'right');
		
		$q = $this->db->get('request_orders');
		
		if($q->num_rows()){
			return $q -> result();
		}
		
		else{
			return false;	
		}
	}
	
	function add_order($code)
    {		
		$request = array(
			'product_id'		=> $this->input->post('product_id'),
			'request_reference'	=> $code,
			'request_qty'		=> $this->input->post('request_qty'),
		);
			
		$this->db->insert('request_orders', $request);
		$remark_id = $this->db->insert_id();
		
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Requests',
			'remark_id'	=> $remark_id,
			'remarks'	=> 'Added a Product Request',
			'date_created'=> date('Y-m-j H:i:s'),
		);
					
		$this->db->insert('audit_trail', $audit);
	}
	
	function get_total($code){
		
		$this->db->where('request_reference',$code);
		$this->db->select('sum(request_qty) as total');
		$q = $this->db->get('request_orders');
		return $q->row();
		
	}

	function create_ro($code)
    {
	    
		$request = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'ro_reference'	=> $code,
			'request_date'=> date('Y-m-j H:i:s'),
			'request_status'=> '0',
		);
			  
		$this->db->insert('requests', $request);
		
		$this->session->set_flashdata('success','Add your requests here');
			
		$remark_id = $this->db->insert_id();
			
		$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Requests',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'User created a request',
				'date_created'=> date('Y-m-j H:i:s'),
		);
				
		$this->db->insert('audit_trail', $audit);
	}


	function update($code)
    {
	    
		$requests = array(
			'ro_reference'=> $this->input->post('ro_reference'),
			'request_status'=> $this->input->post('request_status'),
		);
			  
		$this->db->where('ro_reference', $code);  
		$this->db->update('requests', $requests);
		
		$this->session->set_flashdata('success','You have Successfully updated the Request Order');
			
		$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Requests',
				'remark_id'	=> $code,
				'remarks'	=> 'Updated a Request Order',
				'date_created'=> date('Y-m-j H:i:s'),
		);
				
		$this->db->insert('audit_trail', $audit);
	}
	
	
	
	function approve($id)
    {
    	
		$request = array(			
			'ro_status'=> '1',
			'is_reviewed'=> '1',
		);
				
		$this->db->where('ro_id',$id);
		$this->db->update('request_orders', $request);
		
	    $this->session->set_flashdata('success','Request approved.');
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Requests',
			'remark_id'	=> $id,
			'remarks'	=> 'Approved a request',
			'date_created'=> date('Y-m-j H:i:s'),
				
		);
			
		$this->db->insert('audit_trail', $audit);
    }
	
	function disapprove($id)
    {
	    $request = array(			
			'ro_status'=> '0',
			'is_reviewed'=> '1',	
		);
				
		$this->db->where('ro_id',$id);
		$this->db->update('request_orders', $request);
		
	    $this->session->set_flashdata('success','Request disapproved.');
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Requests',
			'remark_id'	=> $id,
			'remarks'	=> 'Disapproved a request',
			'date_created'=> date('Y-m-j H:i:s'),
				
		);
			
		$this->db->insert('audit_trail', $audit);
    }
	
	
}