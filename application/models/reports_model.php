<?php
Class reports_model extends CI_Model {
		
	public function getRequests($limit, $start) {
		
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') <= '2'){
			
			$this->db->join('users','users.id = requests.user_id','left');
			$this-> db -> limit($limit, $start);
			$this -> db -> where('request_status', '0');
			$this -> db -> order_by('request_date', 'asc');
			$query = $this -> db -> get('requests');
			
			if ($query -> num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
	
				return $data;
			}
			
			else{
				return false;
			}
		
		} else if($this->session->userdata('is_logged_in')){
			
			$this->db->join('users','users.id = requests.user_id','left');
			$this -> db -> limit($limit, $start);
			$this -> db -> where('request_status', '0');
			$this -> db -> order_by('request_date', 'asc');
			$query = $this -> db -> get('requests');
			
			if ($query -> num_rows() > 0) {
				foreach ($query->result() as $row) {
					$data[] = $row;
				}
	
				return $data;
			}
			
			else{
				return false;
			}
		}
	}
	
	public function getLow($limit, $start) {
		
		$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
		$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
		$this -> db -> limit($limit, $start);
		$this -> db -> order_by('current_count', 'asc');
		$query = $this -> db -> get('products');
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		return false;
	}

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
			$this->db->join('suppliers', 'suppliers.supplier_id = purchases.supplier_id', 'left');
			$this->db->join('users','users.id = purchases.user_id','left');
			$this->db->join('purchase_orders', 'purchase_orders.order_reference = purchases.purchase_reference', 'left');
			$this->db->join('products','products.product_id = purchase_orders.product_id','right');
			
			$this->db->from('purchases');
			$this -> db -> order_by('date_received', 'desc');	
			$this -> db -> where('products.product_id', $pid);
			$this -> db -> where('po_status', '1');
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
			$this->db->join('users','users.id = purchases.user_id','left');
			
	        $this->db->like('purchase_id', $var);
			$this->db->or_like('supplier_name', $var);
			$this->db->or_like('purchase_reference', $var);
	        $this->db->or_like('total_cost', $var);
			$this->db->or_like('date_received', $var);
			
			$query = $this -> db -> get('purchases');
			$rows = $query -> num_rows();
			$this -> session -> set_flashdata('search', $rows.' matching record(s) found.');
			return $query -> result();
		}
	
	}

	
	function get_total_purchases_by_date(){
		$start = $this->input->post('sdate');
		$end = $this->input->post('edate');
		
		$this->db->where('date_received >=',$start);
		$this->db->where('date_received <=',$end);
		
		$this->db->select('sum(total_cost) as total');
		
		$q = $this->db->get('purchases');
		return $q->row();
	}
	
	function get_total_purchases(){
		
		$this->db->select('sum(total_cost) as total');
		$q = $this->db->get('purchases');
		return $q->row();
	}
	
	
	function get_purchases_by_date(){
		$start = $this->input->post('sdate');
		$end = $this->input->post('edate');
		$this->db->where('date_received >=',$start);
		$this->db->where('date_received <=',$end);
		$this->db->join('users','users.id = purchases.user_id','left');
		$this->db->join('suppliers', 'suppliers.supplier_id = purchases.supplier_id', 'left');
		
		$this->db->order_by('date_received','desc');
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
		$this->db->join('sales_invoices','sales_invoices.invoice_id = sales.invoice_code','left');
		$this->db->join('products','products.product_id = sales_invoices.product_id','right');
		$this -> db -> where('siv_id !=', '0');
		
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
	
	public function getHSales($limit, $start) {
		$this->db->join('users','users.id = sales.user_ID','left');
		
		$this->db->join('sales_invoices','sales_invoices.invoice_id = sales.invoice_code','left');
		$this->db->join('products','products.product_id = sales_invoices.product_id','right');
		
		$this -> db -> where('products.category_ID', '1');
		$this -> db -> limit($limit, $start);
	
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
		
		$this->db->join('products','products.product_id = sales_invoices.product_ID','left');
		$this->db->join('sales','sales.invoice_code = sales_invoices.invoice_id','left');
		$this->db->join('users','users.id = sales.user_id','right');
		
		$this -> db -> where('siv_id', $sid);
		$q = $this -> db -> get('sales_invoices');
		
		return $q -> result();

	}

	/**
	 * Get Product Sales History function
	 * -- gets product sales history
	 * 
	 */
	function getSalesHistory($pid)
	{
		if($this -> session -> userdata('is_logged_in'))
		{
			
			$this->db->join('sales','sales.invoice_code = sales_invoices.invoice_id','right');
			$this->db->join('products','products.product_id = sales_invoices.product_id','right');
			
			$this->db->from('sales_invoices');
				
			$this -> db -> where('products.product_id', $pid);
			
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
		$this->db->join('sales_invoices','sales_invoices.invoice_id = sales.invoice_code','right');
		$this->db->join('products','products.product_id = sales_invoices.product_id','right');
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
	
	public function getProduction($limit, $start) {
		$this->db->join('users','users.id = production.user_id','left');
		$this -> db -> limit($limit, $start);
		$this -> db -> order_by('date_produced', 'desc');
		$query = $this -> db -> get('production');
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
		$this -> db -> from('production');
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
		
		$this -> db -> join('products', 'products.product_id = production.product_id', 'left');
		$this -> db -> where('product_id', $pid);
		$q = $this -> db -> get('production');
		
		return $q -> result();

	}
	
	/**
	 * Get Product Production History function
	 * -- gets product production history
	 * 
	 */
	function getProductionHistory($pid)
	{
		if($this -> session -> userdata('is_logged_in'))
		{
			
			$this->db->join('production','production.batch_id = production_batch.batch_reference','left');
			$this->db->join('products','products.product_id = production_batch.product_id','left');
			
			$this->db->from('production_batch');
	
			$this -> db -> where('production_batch.product_id', $pid);
			$query = $this -> db -> get();
			$data = $query -> result_array();
			return $data;
		}
	}

	function get_total_produced_by_date(){
		$start = $this->input->post('sdate');
		$end = $this->input->post('edate');
		
		$this->db->where('date_produced >=',$start);
		$this->db->where('date_produced <=',$end);
		
		$this->db->select('sum(net_production_cost) as total');
		
		$q = $this->db->get('production');
		return $q->row();
	}
	
	function get_total_produced(){
		
		$this->db->select('sum(net_production_cost) as total');
		$q = $this->db->get('production');
		return $q->row();
	}
	
	
	function get_produced_by_date(){
		$start = $this->input->post('sdate');
		$end = $this->input->post('edate');
		$this->db->where('date_produced >=',$start);
		$this->db->where('date_produced <=',$end);
		$this->db->join('users','users.id = purchases.user_id','left');
		$this->db->join('suppliers', 'suppliers.supplier_id = purchases.supplier_id', 'left');
		
		$this->db->order_by('date_produced','desc');
		$query = $this->db->get('production');
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		return false;
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