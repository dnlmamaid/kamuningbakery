<?php date_default_timezone_set('Asia/Manila');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class sales_model extends CI_Model {

	/*****************************************************/
	/***********          SALES            **************/
	/***************************************************/
	function sale($pid) {

		$this->db->select('current_count');
		$this->db->from('products');
		$this->db->where('product_id', $pid);
		$oldquantity = $this->db->get() -> row('current_count');
		$newquantity = $oldquantity - $this->input->post('quantity');

		$data = array('current_count' => $newquantity, );

		$this->db->where('product_ID', $pid);
		$this->db->update('products', $data);

		$markup = 1.93;
		$this->db->select('sale_Price');
		$this->db->from('products');
		$this->db->where('product_id', $pid);
		$cost = ($this->db->get() -> row('sale_Price')) + $markup;
		$total = $cost * $this->input->post('quantity');

		$code = date('Y') . random_string('alnum', 1) . date('m') . random_string('alnum', 1) . date('d');

		$sales = array('invoice_code' => $code, 'product_ID' => $pid, 'total_quantity' => $this->input->post('quantity'), 'total_sales' => $total, 'user_ID' => $this->session->userdata('user_id'), 'sales_date' => date('Y-m-j H:i:s'), );

		$this->db->insert('sales', $sales);
		$remark_id = $this->db->insert_id();

		$audit = array('user_id' => $this->session->userdata('user_id'), 'module' => 'Sales', 'remark_id' => $remark_id, 'remarks' => 'sold a product', 'date_created' => date('Y-m-j H:i:s'), );

		$this->db->insert('audit_trail', $audit);

		$this->session->set_flashdata('success', 'You have successfully sold the product');
	}

	function getPonSale() {
		$this->db->order_by('product_id', 'asc');
		$this->db->where('product_status', '1');
		$this->db->where('current_count !=', '0');
		$this->db->where('category_ID ', '1');
		$q = $this->db->get('products');
		$data = $q -> result_array();
		return $data;
	} 
	
	function create_si($code)
    {
	    
		$si = array(
			'user_ID'	=> $this->session->userdata('user_id'),
			'invoice_code' => $code,
			'sales_date'=> date('Y-m-j H:i:s'),
			'sales_status'=> '0',
		);
			  
		$this->db->insert('sales', $si);
		
		$this->session->set_flashdata('success','You have successfully sales thread');
			
		$remark_id = $this->db->insert_id();
			
		$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Sales',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'Created a Sales',
				'date_created'=> date('Y-m-j H:i:s'),
		);
				
		$this->db->insert('audit_trail', $audit);
	}
	
	/**
	 * get Purchase Order function
	 * 
	 */
	function getSI($code)
	{
		$this -> db -> where('invoice_code', $code);
		$this -> db -> join('users', 'users.id = sales.user_ID', 'left');
		$this -> db -> join('sales_invoices', 'sales_invoices.invoice_id = sales.invoice_code', 'left');
		$q = $this -> db -> get('sales');
		
		if($q->num_rows()){
			return $q -> result();
		}
		
		else{
			return false;	
		}
	}
	function add_sales($code)
    {		
	}

	/**
	 * get Orders function
	 * used for multiple orders in a single purchase
	 */
	function getInvoices($code)
	{
		
		$this -> db -> where('invoice_id', $code);
		$this -> db -> join('products', 'products.product_id = sales_invoices.product_id', 'left');
		$q = $this -> db -> get('sales_invoices');
		
		if($q->num_rows()){
			return $q -> result();
		}
		
		else{
			return false;	
		}
	}
	
	
	function get_total($code){
		
		$this->db->where('invoice_id',$code);
		$this->db->select('sum(total_sale) as total');
		$q = $this->db->get('sales_invoices');
		return $q->row();
		
	}
}
