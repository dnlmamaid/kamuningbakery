<?php
Class reports_model extends CI_Model {
	

	/******* AUDIT *******************/

	/*
	 * Get all Audit Trail
	 */
	public function getAudit($limit, $start) {
		$this->db->join('users','users.id = audit_trail.user_id','left');
		$this -> db -> limit($limit, $start);
		$this -> db -> order_by('date_created', 'desc');
		$query = $this -> db -> get('audit_trail');
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		return false;
	}
	
	
	public function getAuditCtr() {
		$this -> db -> select('*');
		$this -> db -> from('audit_trail');
		$query = $this -> db -> get();
		$result = $query -> num_rows();
		return $result;
	}
	
	/**
	 * Get Audit Record function
	 * 
	 * 
	 */
	function get_audit_rec($aid) {
		$this->db->join('users','users.id = audit_trail.user_id','left');
		$this -> db -> where('audit_id', $aid);
		$q = $this -> db -> get('audit_trail');
		
		return $q -> result();

	}
	
	/** Search Audit **/
	function search($keyword)
    {
    	
		if($this -> session -> userdata('is_logged_in')){
    		
	    	$var = urldecode($keyword);		
			$this -> db -> join('users', 'users.id = audit_trail.user_id', 'left');
	    	
	        $this->db->like('firstName', $var);
			$this->db->or_like('lastName', $var);
			$this->db->or_like('module', $var);
			$this->db->or_like('remark_id', $var);
	        $this->db->or_like('remarks', $var);
			$this->db->or_like('date_created', $var);
			
			$query = $this -> db -> get('audit_trail');
			$rows = $query -> num_rows();
			$this -> session -> set_flashdata('search', $rows.' matching record(s) found.');
			return $query -> result();
		}
	
	}
	
	/*****************************************************************/
	/*********************  PURCHASES	*****************************/
	/***************************************************************/
	
	public function getPurchases($limit, $start) {
			
		$this->db->join('suppliers', 'suppliers.supplier_id = purchases.supplier_id', 'left');
		$this->db->join('users','users.id = purchases.user_id','left');
		$this -> db -> limit($limit, $start);
		$this -> db -> order_by('date_received', 'desc');
		$query = $this -> db -> get('purchases');
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		return false;
	}
	
	public function getPurchasesCtr() {
		$this -> db -> select('*');
		$this -> db -> from('purchases');
		$query = $this -> db -> get();
		$result = $query -> num_rows();
		return $result;
	}
	
	/**
	 * Get Purchase Record function
	 * 
	 * 
	 */
	function get_purchase_rec($pid) {
		
		$this->db->join('users','users.id = purchases.user_id','left');
		$this->db->join('suppliers', 'suppliers.supplier_id = purchases.supplier_id', 'left');
		$this->db->join('products','products.product_id = purchases.product_id','left');
		$this -> db -> where('purchase_id', $pid);
		$q = $this -> db -> get('purchases');
		
		return $q -> result();

	}

	/**
	 * Get Product Purchase History function
	 * -- gets product purchase history
	 * 
	 */
	function getPurchaseHistory($pid)
	{
		if($this -> session -> userdata('is_logged_in'))
		{
			$this->db->join('users','users.id = purchases.user_id','left');
			$this->db->join('suppliers', 'suppliers.supplier_id = purchases.supplier_id', 'left');
			$this->db->join('products','products.product_id = purchases.product_id','left');
			$this->db->from('purchases');
			$this -> db -> order_by('purchase_date', 'desc');	
			$this -> db -> where('purchases.product_id', $pid);
			$query = $this -> db -> get();
			$data = $query -> result_array();
			return $data;
		}
	}
	
	
	
	/** Search Purchases **/
	function search_purchases($keyword)
    {
    	
		if($this -> session -> userdata('is_logged_in')){
    		
	    	$var = urldecode($keyword);		
			$this->db->join('suppliers', 'suppliers.supplier_id = purchases.supplier_id', 'left');
	    	$this->db->join('products','products.product_id = purchases.product_id','left');
			
	        $this->db->like('purchase_id', $var);
			$this->db->or_like('product_name', $var);
			$this->db->or_like('supplier_name', $var);
			$this->db->or_like('reference', $var);
	        $this->db->or_like('ordering_cost', $var);
			$this->db->or_like('purchase_date', $var);
			$this->db->or_like('ppu', $var);
			
			$query = $this -> db -> get('purchases');
			$rows = $query -> num_rows();
			$this -> session -> set_flashdata('search', $rows.' matching record(s) found.');
			return $query -> result();
		}
	
	}

	
	function get_total_purchases_by_date(){
		$start = $this->input->post('sdate');
		$end = $this->input->post('edate');
		
		$this->db->where('purchase_date >=',$start);
		$this->db->where('purchase_date <=',$end);
		
		$this->db->select('sum(ordering_cost) as total');
		
		$q = $this->db->get('purchases');
		return $q->row();
	}
	
	function get_total_purchases(){
		
		$this->db->select('sum(ordering_cost) as total');
		
		$q = $this->db->get('purchases');
		return $q->row();
	}
	
	
	function get_purchases_by_date(){
		$start = $this->input->post('sdate');
		$end = $this->input->post('edate');
		$this->db->where('purchase_date >=',$start);
		$this->db->where('purchase_date <=',$end);
		$this->db->join('users','users.id = purchases.user_id','left');
		$this->db->join('suppliers', 'suppliers.supplier_id = purchases.supplier_id', 'left');
		$this->db->join('products','products.product_id = purchases.product_id','left');
		$this->db->order_by('purchase_date','desc');
		$query = $this->db->get('purchases');
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		return false;
	}
	
	/*****************************************************************/
	/*********************  SALES	*****************************/
	/***************************************************************/
	
	public function getSales($limit, $start) {
		$this->db->join('users','users.id = sales.user_ID','left');
		$this->db->join('products','products.product_id = sales.product_ID','left');
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
	
	public function getSalesCtr() {
		$this -> db -> select('*');
		$this -> db -> from('sales');
		$query = $this -> db -> get();
		$result = $query -> num_rows();
		return $result;
	}
	
	/**
	 * Get Purchase Record function
	 * 
	 * 
	 */
	function get_sales_rec($sid) {
		
		$this->db->join('users','users.id = sales.user_ID','left');
		$this->db->join('products','products.product_id = sales.product_ID','left');
		$this -> db -> where('sales_id', $sid);
		$q = $this -> db -> get('sales');
		
		return $q -> result();

	}

	/**
	 * Get Product Purchase History function
	 * -- gets product purchase history
	 * 
	 */
	function getSalesHistory($sid)
	{
		if($this -> session -> userdata('is_logged_in'))
		{
			$this->db->join('users','users.id = sales.user_ID','left');
			$this->db->join('products','products.product_id = sales.product_ID','left');
			$this->db->from('sales');
			$this -> db -> order_by('sales_date', 'desc');	
			$this -> db -> where('sales.product_id', $sid);
			$query = $this -> db -> get();
			$data = $query -> result_array();
			return $data;
		}
	}
	
	
	
	/** Search Sales **/
	function search_sales($keyword)
    {
    	
		if($this -> session -> userdata('is_logged_in')){
    		
	    	$var = urldecode($keyword);		
			$this->db->join('users','users.id = sales.user_ID','left');
			$this->db->join('products','products.product_id = sales.product_ID','left');
			
	        $this->db->like('sales_id', $var);
			$this->db->or_like('firstName', $var);
			$this->db->or_like('lastName', $var);
			$this->db->or_like('username', $var);
			$this->db->or_like('invoice_code', $var);
			$this->db->or_like('sales_date', $var);
			
			$query = $this -> db -> get('sales');
			$rows = $query -> num_rows();
			$this -> session -> set_flashdata('search', $rows.' matching record(s) found.');
			return $query -> result();
		}
	
	}

	
	function get_total_sales_by_date(){
		$start = $this->input->post('sdate');
		$end = $this->input->post('edate');
		
		$this->db->where('sales_date >=',$start);
		$this->db->where('sales_date <=',$end);
		
		$this->db->select('sum(total_sales) as total');
		
		$q = $this->db->get('sales');
		return $q->row();
	}
	
	function get_total_sales(){
		
		$this->db->select('sum(total_sales) as total');
		
		$q = $this->db->get('sales');
		return $q->row();
	}
	
	
	function get_sales_by_date(){
		$start = $this->input->post('sdate');
		$end = $this->input->post('edate');
		$this->db->where('sales_date >=',$start);
		$this->db->where('sales_date <=',$end);
		$this->db->join('users','users.id = sales.user_id','left');
		$this->db->join('products','products.product_id = sales.product_id','left');
		$this->db->order_by('sales_date','desc');
		$query = $this->db->get('sales');
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		return false;
	}
	
	/*****************************************************************/
	/*********************  PRODUCTION	*****************************/
	/***************************************************************/
	
	public function getProducts($limit, $start) {
		$this -> db -> join('suppliers', 'suppliers.supplier_id = products.supplier_ID', 'left');
		$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
		$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
		$this -> db -> limit($limit, $start);
		$this -> db -> order_by('date_created', 'desc');
		$this -> db -> where('rm_ID !=', '0');
		$query = $this -> db -> get('products');
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		return false;
	}
	
	public function getProducedCtr() {
		$this -> db -> select('*');
		$this -> db -> from('products');
		$query = $this -> db -> get();
		$result = $query -> num_rows();
		return $result;
	}
	
	/**
	 * Get Purchase Record function
	 * 
	 * 
	 */
	function get_production_rec($pid) {
		
		$this -> db -> join('suppliers', 'suppliers.supplier_id = products.supplier_ID', 'left');
		$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
		$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
		$this -> db -> where('product_id', $pid);
		$q = $this -> db -> get('products');
		
		return $q -> result();

	}
	
	/** Search Production **/
	function search_prod($keyword)
    {
    	
		if($this -> session -> userdata('is_logged_in')){
    		
	    	$var = urldecode($keyword);		
			$this -> db -> join('suppliers', 'suppliers.supplier_id = products.supplier_ID', 'left');
			$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
			$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
	        $this->db->or_like('product_Name', $var);
			$this->db->or_like('price', $var);
			$this->db->or_like('supplier_name', $var);
	        $this->db->or_like('category_name', $var);
			$this->db->or_like('class_Name', $var);
			$this->db->or_like('products.description', $var); 
			$query = $this -> db -> get('products');
			$rows = $query -> num_rows();
			$this -> session -> set_flashdata('search', $rows.' matching record(s) found.');
			return $query -> result();
		}
	
	}
}
?>