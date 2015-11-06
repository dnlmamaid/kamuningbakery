<?php date_default_timezone_set('Asia/Manila');
if (!defined('BASEPATH')) exit('No direct script access allowed');

class requests_model extends CI_Model{
 		
	/*
	 * Get all Requests
	 */
	public function getRequests($limit, $start) {
		
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') <= '2'){
			
			$this->db->join('users','users.id = requests.user_id','left');
			$this -> db -> join('user_type', 'user_type.type_id = users.user_type', 'right');
			$this -> db -> limit($limit, $start);
			$this -> db -> order_by('request_date', 'desc');
			$query = $this -> db -> get('requests');
			if ($query -> num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
	
				return $data;
			}
			return false;
			
		} else if($this->session->userdata('is_logged_in')){
			
			$this->db->join('users','users.id = requests.user_id','left');
			$this -> db -> join('user_type', 'user_type.type_id = users.user_type', 'right');
			$this -> db -> limit($limit, $start);
			$this -> db -> order_by('request_date', 'desc');
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$query = $this -> db -> get('requests');
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
		$this -> db -> select('*');
		$this -> db -> from('requests');
		$query = $this -> db -> get();
		$result = $query -> num_rows();
		return $result;
	}
	
	/**
	 * get Purchase Order function
	 * 
	 */
	function getRO($code)
	{
		
		$this -> db -> where('requests.ro_id', $code);
		$this -> db -> join('request_orders', 'request_orders.order_reference = requests.ro_id', 'left');
		$this -> db -> join('users', 'users.id = requests.user_id', 'left');
		$q = $this -> db -> get('requests');
		
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
		
		$this -> db -> where('request_orders.order_reference', $code);
		
		$this -> db -> join('products', 'products.product_id = request_orders.product_id', 'left');
		$this -> db -> join('suppliers', 'suppliers.supplier_id = products.supplier_ID', 'right');
		$this -> db -> join('product_class', 'product_class.class_id = products.class_ID', 'right');
		$this -> db -> join('requests', 'requests.ro_id = request_orders.order_reference', 'left');
		
		$q = $this -> db -> get('request_orders');
		
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
		
		$this -> db -> where('order_id', $id);
		$this -> db -> join('products', 'products.product_id = request_orders.product_id', 'left');
		$this -> db -> join('requests', 'requests.ro_id = request_orders.order_reference', 'left');
		$this -> db -> join('users', 'users.id = requests.user_id', 'right');
		
		$q = $this -> db -> get('request_orders');
		
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
			'product_id'	=> $this->input->post('product_id'),
			'order_reference'			=> $code,
			'request_qty'	=> $this->input->post('request_qty'),
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
		
		$this->db->where('order_reference',$code);
		$this->db->select('sum(request_qty) as total');
		$q = $this->db->get('request_orders');
		return $q->row();
		
	}

	function create_ro($code)
    {
	    
		$request = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'ro_id'	=> $code,
			'is_new' => $this->input->post('is_new'),
			'request_date'=> date('Y-m-j H:i:s'),
			'request_status'=> '0',
		);
			  
		$this->db->insert('requests', $request);
		
		$this->session->set_flashdata('success','Add your request on the newly created order');
			
		$remark_id = $this->db->insert_id();
			
		$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'requests',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'Placed a purchase order',
				'date_created'=> date('Y-m-j H:i:s'),
		);
				
		$this->db->insert('audit_trail', $audit);
	}


	function update_ro($id)
    {
	    
		$purchase = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'supplier_id' => $this->input->post('supplier_id'),
			'date_ordered'=> $this->input->post('date_ordered'),
			'date_received'=> $this->input->post('date_received'),
		);
			  
		$this->db->where('purchase_id', $id);  
		$this->db->update('requests', $purchase);
		
		$this->session->set_flashdata('success','You have successfully updated the purchase order');
			
		$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'requests',
				'remark_id'	=> $id,
				'remarks'	=> 'Updated a purchase order',
				'date_created'=> date('Y-m-j H:i:s'),
		);
				
		$this->db->insert('audit_trail', $audit);
	}
	
	function request_order($id)
    {
		$this->db->select('price');
		$this->db->from('products');
		$this->db->where('product_id', $id);
		$oldprice = $this->db->get()->row('price');
    	$newprice = ($this->input->post('price') + $oldprice)/2;
			
		$this->db->select('quantity');
		$this->db->from('products');
		$this->db->where('product_id', $id);
		$oldquantity = $this->db->get()->row('quantity');
    	$newquantity = $this->input->post('quantity') + $oldquantity;
			
		$data = array(
			'current_count' => $newquantity,
			'price' => $newprice,					
		);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $data);
			
		$total = $this->input->post('price') * $this->input->post('quantity');
		$code = random_string('alnum',11);
			
		$purchase = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'product_id'	=> $id,
			'supplier_id'	=> $this->input->post('supplier_id'),
			'ro_id'	=> $code,
			'purchase_quantity'	=> $this->input->post('quantity'),
			'ppu'	=> $this->input->post('price'),
			'ordering_cost'	=> $total,
			'purchase_date'=> date('Y-m-j H:i:s'),
		);
			
		$this->db->insert('requests', $purchase);
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Products',
			'remark_id'	=> $id,
			'remarks'	=> 'purchased additional product',
			'request_date'=> date('Y-m-j H:i:s'),
		);
			
		$this->db->insert('audit_trail', $audit);
	
		$this->session->set_flashdata('success','Successfully Purchased Product.');
	}

	
	function receive_order($id)
    {
    	
		$order = array(			
			'order_status'=> '1',
		);
				
		$this->db->where('order_id',$id);
		$this->db->update('request_orders', $order);
		
		$this->db->select('current_count');
		$this->db->from('products');
		$this->db->where('product_id', $this->input->post('product_id'));
		$oldquantity = $this->db->get()->row('current_count');
    	$newquantity = $oldquantity + $this->input->post('order_quantity');

		$receive = array(
			'current_count'	=> $newquantity,
			'product_status'=> '1',
		);
		
	    $this->db->where('product_id',$this->input->post('product_id'));
		$this->db->update('products', $receive);
		
		
		$this->db->select('total_cost');
		$this->db->from('requests');
		$this->db->where('ro_id', $this->input->post('ro_id'));
		$oamt = $this->db->get()->row('total_cost');
    	$newamt = $oamt + $this->input->post('ordering_cost');
		
		$purchase = array(
			'total_cost'	=> $newamt,
		);
		
		$this->db->where('ro_id',$this->input->post('ro_id'));
		$this->db->update('requests', $purchase);
		
	    $this->session->set_flashdata('success','Product received and updated');
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'requests',
			'remark_id'	=> $id,
			'remarks'	=> 'received product',
			'request_date'=> date('Y-m-j H:i:s'),
				
		);
			
		$this->db->insert('audit_trail', $audit);
    }
	
	function remove_order($id)
    {
	    $this->db->where('order_id',$id);
		$query = $this->db->delete('request_orders');
	    $this->session->set_flashdata('success','Entry Deleted.');
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'requests',
			'remark_id'	=> $id,
			'remarks'	=> 'deleted a product order',
			'request_date'=> date('Y-m-j H:i:s'),
				
		);
			
		$this->db->insert('audit_trail', $audit);
    }
	
	
}