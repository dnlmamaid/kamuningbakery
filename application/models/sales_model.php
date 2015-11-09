<?php date_default_timezone_set('Asia/Manila');
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class sales_model extends CI_Model {
	
	public function getSales($limit, $start) {
		$this->db->join('users','users.id = sales.user_ID','left');
		$this -> db -> limit($limit, $start);
		$this -> db -> order_by('sales_date', 'desc');
		$query = $this -> db -> get('sales');
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		return false;
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
    	
		
    	$pid = $this->input->post('product_id');
		
    	$this->db->select('current_count');
		$this->db->from('products');
		$this->db->where('product_id', $pid);
		$oldquantity = $this->db->get() -> row('current_count');
		$newquantity = $oldquantity - $this->input->post('quantity');
		
		if($newquantity < 0){
			$this->session->set_flashdata('error','Transaction Failed. Available product for sale is insufficient.');			
			
		}
		
		else{
			$data = array(
				'current_count' => $newquantity, 
			);
	
			$this->db->where('product_id', $pid);
			$this->db->update('products', $data);
			
			$this->db->select('sale_Price');
			$this->db->from('products');
			$this->db->where('product_id', $pid);
			$cost = $this->db->get() -> row('sale_Price');
			$total = $cost * $this->input->post('quantity');
			
			$inv = array(
				'invoice_id' => $code, 
				'product_id' => $pid, 
				'qty_sold' => $this->input->post('quantity'), 
				'total_sale' => $total, 
			);
	
			$this->db->insert('sales_invoices', $inv);
			
			
			$this->db->select('total_qty_sold');
			$this->db->from('sales');
			$this->db->where('invoice_code', $code);
			$otqs = $this->db->get() -> row('total_qty_sold');
			$ntqs = $otqs + $this->input->post('quantity');
			
			
			$this->db->select('total_sales');
			$this->db->from('sales');
			$this->db->where('invoice_code', $code);
			$ots = $this->db->get() -> row('total_sales');
			$nts = $ots + $total;
			
			
			$sales = array(
				'total_qty_sold' => $ntqs, 
				'total_sales' => $nts, 
			);
			$this->db->where('invoice_code', $code);
			$this->db->update('sales', $sales);
			
			
			$remark_id = $this->db->insert_id();
	
			$audit = array(
				'user_id' => $this->session->userdata('user_id'), 
				'module' => 'Sales', 
				'remark_id' => $remark_id, 
				'remarks' => 'Sold a Product', 
				'date_created' => date('Y-m-j H:i:s'), 
			);
	
			$this->db->insert('audit_trail', $audit);
	
			$this->session->set_flashdata('success', 'You have successfully sold the product');
		}		
	}
	
	
	function update_sales($id)
    {
	    
		$sinfo = array(
			'invoice_code'=> $this->input->post('invoice_code'),
		);
			  
		$this->db->where('invoice_code', $id);  
		$this->db->update('sales', $sinfo);
		
		$this->session->set_flashdata('success','You have successfully updated the sales info');
			
		$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Sales',
				'remark_id'	=> $id,
				'remarks'	=> 'Updated a Sales Info',
				'date_created'=> date('Y-m-j H:i:s'),
		);
				
		$this->db->insert('audit_trail', $audit);
	}

	/**
	 * get Orders function
	 * used for multiple orders in a single purchase
	 */
	function getInvoices($code)
	{
		$this -> db -> where('invoice_id', $code);
		$this -> db -> join('products', 'products.product_id = sales_invoices.product_ID', 'left');
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
	
	
	
	function search($keyword) {

		if ($this -> session -> userdata('is_logged_in')) {

			$var = urldecode($keyword);
			$this -> db -> join('users', 'users.id = sales.user_id', 'left');
			$this->db->like('invoice_code', $var);
			$this->db->or_like('firstName', $var);
			$this->db->or_like('lastName', $var);		
			$this->db->or_like('total_qty_sold', $var);
			$this->db->or_like('total_sales', $var);
			$query = $this->db->get('sales');
			$rows = $query -> num_rows();
			$this -> session -> set_flashdata('search', $rows . ' matching record(s) found.');
			return $query -> result();
		}

	}
	
}
