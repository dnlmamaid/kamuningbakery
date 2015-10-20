<?php date_default_timezone_set('Asia/Manila');
if (!defined('BASEPATH')) exit('No direct script access allowed');

class products_model extends CI_Model{
 	
	/**
	 * Products Counter Function
	 */
	public function getProductsCtr() {
		if($this -> session -> userdata('is_admin')){
			return $this->db->count_all_results('products');
		}
		else{
			$this -> db -> where('products.product_status', '1');
			return $this->db->count_all_results('products');
		}
	}
	
	/**
	 * Products Counter Function
	 */
	public function getProductsCtrbyCat($cid) {
		if($this -> session -> userdata('is_admin')){
			$this -> db -> where('products.category_ID', $cid);
			return $this->db->count_all_results('products');
		}
		else{
			
			$this -> db -> where('products.product_status', '1');
			$this -> db -> where('products.category_ID', $cid);
			return $this->db->count_all_results('products');
		}
	}

	/**
	 * Get Products Function
	 * -- all kinds of products
	 */
	function getProducts($limit, $start)
	{
		if($this -> session -> userdata('is_logged_in')){
			$this -> db -> join('suppliers', 'suppliers.supplier_id = products.supplier_ID', 'left');
			$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
			$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
			$this->db->limit($limit, $start);
			$this -> db -> order_by('date_created', 'desc');
			$query = $this->db->get('products');
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}
			
			return $data;
			}
			return false;
		}
		else{
			$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
			$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
			$this->db->limit($limit, $start);
			$this -> db -> where('products.product_status', '1');
			$this -> db -> order_by('date_created', 'desc');
			$query = $this->db->get('products');
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}
			
			return $data;
			}
			return false;
			
		}
	}

	/**
	 * get product by category function
	 * 
	 * 
	 */
	function get_product_by_category($limit, $start, $cid) {
		if($this -> session -> userdata('is_logged_in')){
			
			$this->db->limit($limit, $start);
			$this -> db -> join('suppliers', 'suppliers.supplier_id = products.supplier_ID', 'left');
			$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
			$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
			$this -> db -> where('products.category_ID', $cid);
			$this -> db -> order_by('date_created', 'desc');
			$query = $this->db->get('products');
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}
			
			return $data;
			}
			return false;
		}
		else if(!$this -> session -> userdata('is_admin')){
			$this->db->limit($limit, $start);
			$this -> db -> join('product_category', 'product_category.category_ID = products.category_ID', 'left');
			$this -> db -> where('products.status', '1');
			$this -> db -> where('products.category_ID', $cid);
			$this -> db -> order_by('date_created', 'desc');
			$query = $this->db->get('products');
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$data[] = $row;
			}
			
			return $data;
			}
			return false;
			
		}

	}
	
	
	/**
	 * Get Products Supplier Function
	 * -- gets products supplied by the supplier
	 */
	function getProductSupplier($sid)
	{
		if($this -> session -> userdata('is_logged_in'))
		{
			$this->db->limit(6);	
			$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
			$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
			$this->db->from('products');
			$this -> db -> order_by('quantity', 'asc');	
			$this -> db -> where('supplier_ID', $sid);
			$query = $this -> db -> get();
			$data = $query -> result_array();
			return $data;	
		}
		
	}
	
	/**
	 * get product record function
	 * 
	 * 
	 */
	function get_product_rec($pid)
	{

		$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
		$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
		$this -> db -> join('suppliers', 'suppliers.supplier_id = products.supplier_ID', 'left');
		$this -> db -> where('product_ID', $pid);
		$q = $this -> db -> get('products');
		
		return $q -> result();
	}
	
	
	/**
	 * get class record function
	 * 
	 * 
	 */
	function get_class_rec($clid) {
		
		$this -> db -> where('class_ID', $clid);
		$q = $this -> db -> get('product_class');
		
		return $q -> result();
	}
	
	/**
	 * get category record function
	 * 
	 * 
	 */
	function get_cat_rec($cid) {
		
		$this -> db -> where('category_id', $cid);
		$q = $this -> db -> get('product_category');
		
		return $q -> result();
	}
	
	/**
	 * Get Category Function 
	 * 
	 */
	function getRawMats()
    {
		$this -> db -> where('category_ID', '2');
		$q = $this->db->get('products');
		$data = $q->result_array();
		return $data;
	}	
	
	
	function new_purchase_order()
    {
		
		$this->db->where('product_Name',$this->input->post('product_Name'));
		$this->db->where('supplier_ID',$this->input->post('supplier_ID'));
		
		$val = $this->db->get('products');
		if($val->num_rows() == 1){
			$this->session->set_flashdata('error','Product already exist. If you want to replenish a product use the Purchase Order Form');
		}

		else{
			
			$data = array(
				'product_Name' => $this->input->post('product_Name'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price'),
				'supplier_ID' => $this->input->post('supplier_ID'),
				'category_ID' => $this->input->post('category_ID'),
				'rm_ID' => '0',
				'class_ID' => $this->input->post('class_ID'),
				'description' => $this->input->post('description'),
				'um' => $this->input->post('um'),
				'date_created'=> date('Y-m-j H:i:s'),
				'product_status' => $this->input->post('product_status'),
	        );
			  
			$this->db->insert('products', $data);
			$this->session->set_flashdata('success','You have successfully added a new product');
			
			$remark_id = $this->db->insert_id();
			$code = random_string('alnum',11);
			$total = $this->input->post('price') * $this->input->post('quantity');
			
			$purchase = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'product_id'	=> $remark_id,
				'supplier_id'	=> $this->input->post('supplier_ID'),
				'reference'	=> $code,
				'purchase_quantity'	=> $this->input->post('quantity'),
				'ppu'	=> $this->input->post('price'),
				'ordering_cost'	=> $total,
				'purchase_date'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('purchases', $purchase);
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'created/purchased product',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
			
	        
		}
	}
	
	function purchase_order($id)
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
				'quantity' => $newquantity,
				'price' => $newprice,					
		    );
		
			$this->db->where('product_ID', $id);
			$this->db->update('products', $data);
			
			$total = $this->input->post('price') * $this->input->post('quantity');
			$code = random_string('alnum',11);
			
			$purchase = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'product_id'	=> $id,
				'supplier_id'	=> $this->input->post('supplier_id'),
				'reference'	=> $code,
				'purchase_quantity'	=> $this->input->post('quantity'),
				'ppu'	=> $this->input->post('price'),
				'ordering_cost'	=> $total,
				'purchase_date'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('purchases', $purchase);
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products',
				'remark_id'	=> $id,
				'remarks'	=> 'purchased additional product',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
			
			
			
			
			$this->session->set_flashdata('success','Successfully Purchased Product.');
	}

	/**
	  * update_product function.
	 * 
	 * @access public
	 */
	public function update_product($id)
	{
		$this->db->where('product_id !=',$id);
		$this->db->where('product_Name',$this->input->post('product_Name'));
		$this->db->where('supplier_ID',$this->input->post('supplier_ID'));
		$val = $this->db->get('products');
		if(($val->num_rows() == 1)){
			$this->session->set_flashdata('error','Product already exist.');
		}

		else{
			
			$data = array(
					'product_Name' => $this->input->post('product_Name'),
					
					'price' => $this->input->post('price'),
					'supplier_ID' => $this->input->post('supplier_ID'),
					'category_ID' => $this->input->post('category_ID'),
					'class_ID' => $this->input->post('class_ID'),
					'description' => $this->input->post('description'),
					'um' => $this->input->post('um'),
					'date_created'=> date('Y-m-j H:i:s'),
					'product_status' => $this->input->post('product_status'),
		    );
		
			$this->db->where('product_ID', $id);
			$this->db->update('products', $data);
			
			$this->session->set_flashdata('success','Successfuly updated information.');
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products',
				'remark_id'	=> $id,
				'remarks'	=> 'updated product',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
		}
	}
	
		/**
	  * Disable function.
	 *  disables a product so that lower level user won't be able to interact with it
	 * @access public
	 */
	public function disable($id)
	
	{
		$data = array(
		'product_status'	=> '0',
		);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $data);
		
		$remark_id = $id;
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'disabled product',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
		
	}
	
	/**
	  * Enable function.
	 *  Enables a product
	 * @access public
	 */
	public function enable($id)
	
	{
		$data = array(
		'product_status'	=> '1',
		);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $data);
		
		$remark_id = $id;
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'products',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'enabled product',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
		$this->db->insert('audit_trail', $audit);
		
		
	}
	
	
	/**
	  * update_class function.
	 * 
	 * @access public
	 */
	public function update_class($clid)
	{
		$this->db->where('class_Name',$this->input->post('class_Name'));
		$val = $this->db->get('product_Class');
		if(($val->num_rows() == 1) && !$this->db->where('class_ID', $clid)){
			$this->session->set_flashdata('message','Class already exist.');
		}

		else{
			
			$data = array(
					'class_Name' => $this->input->post('class_Name'),
					'is_active' => $this->input->post('is_active'),
		    );
		
			$this->db->where('class_ID', $clid);
			$this->db->update('product_Class', $data);
			
			$this->session->set_flashdata('success','Successfuly updated information.');

			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products/Class',
				'remark_id'	=> $id,
				'remarks'	=> 'created account',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);			
		}
	}
	
	/**
	  * update_category function.
	 * 
	 * @access public
	 */
	public function update_cat($id)
	{
		$this->db->where('category_Name',$this->input->post('category_Name'));
		$val = $this->db->get('product_category');
		if(($val->num_rows() == 1) && !$this->db->where('category_ID', $id)){
			$this->session->set_flashdata('message','category already exist.');
		}

		else{
			
			$data = array(
					'category_Name' => $this->input->post('category_Name'),
					'is_active' => $this->input->post('is_active'),
		    );
		
			$this->db->where('category_ID', $id);
			$this->db->update('product_category', $data);
			
			$this->session->set_flashdata('success','Successfuly updated information.');
			
			
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products/Category',
				'remark_id'	=> $id,
				'remarks'	=> 'updated category',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
		}
	}
	
	
    
	/**
	 * Get Category Function 
	 * 
	 */
	function getCategory()
    {
		$this->db->order_by('category_id', 'asc'); 
		$this -> db -> where('is_active', '1');
		$q = $this->db->get('product_category');
		$data = $q->result_array();
		return $data;
	}	
	
	
	/**
	 * Get Supplier Function 
	 * 
	 */
	function getSupplier()
    {
		$this->db->order_by('supplier_id', 'asc'); 
		$this -> db -> where('is_active', '1');
		$q = $this->db->get('suppliers');
		$data = $q->result_array();
		return $data;
	}	
	
	/**
	 * Get Category for Products Function 
	 * 
	 */
	function getCategoryFP()
    {    	
		$this->db->order_by('category_id', 'desc'); 
		$q = $this->db->get('product_category');
		$data = $q->result_array();
		return $data;
	}	
	
	/**
	 * Get Class for Products Function 
	 * 
	 */
	function getClassFP()
    {
		$this->db->order_by('is_active', 'asc');
		$this->db->order_by('class_ID', 'desc'); 
		
		$q = $this->db->get('product_class');
		$data = $q->result_array();
		return $data;
	}	
	
	
	/**
	 * Add Category Function
	 * 
	 */
	function addCategory()
    {
    	$this->db->where('category_Name', $this->input->post('category_Name'));
		$val = $this->db->get('product_category');
		if($val->num_rows() == 1){
			$this->session->set_flashdata('message','Category Already Exists');
		}
		
		else{
				
			$data = array(
				'category_Name' => $this->input->post('category_Name'),
				'is_active' => $this->input->post('is_active'),
	        );
			  
			$this->db->insert('product_category', $data);
			$this->session->set_flashdata('success','You have successfully added a new product category.');
			
			$remark_id = $this->db->insert_id();
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products/Category',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'created category',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
	        
		}  
	}
	
	
	/**
	 * Get Class Function 
	 * 
	 */
	function getClass()
    {
		$this->db->order_by('class_id', 'asc'); 
		$this -> db -> where('is_active', '1');
		$q = $this->db->get('product_Class');
		$data = $q->result_array();
		return $data;
	}	
	
	/**
	 * Add Classification Function
	 * 
	 */
	function addClass()
    {
    	$this->db->where('class_Name', $this->input->post('class_Name'));
		$val = $this->db->get('product_Class');
		if($val->num_rows() == 1){
			$this->session->set_flashdata('message','Class already exists.');
		}
		
		else{
				
			$data = array(
				'class_Name' => $this->input->post('class_Name'),
				'is_active' => $this->input->post('is_active'),
	        );
			  
			$this->db->insert('product_Class', $data);
			$this->session->set_flashdata('success','You have successfully added a new product class.');
			
			$remark_id = $this->db->insert_id();
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products/Classes',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'created class',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
	        
		}  
	}
	
	/**
	 * Produce Finished Good Function
	 * creates Finished Good from raw materials
	 */
	function produceFG()
    {
		if($this->input->post('rm_ID1')){
			$this->db->where('product_id',$this->input->post('rm_ID1'));
			$this->db->where('supplier_ID',$this->input->post('supplier_ID'));
		}
		
		
		
		$val = $this->db->get('products');
		if($val->num_rows() == 1){
			$this->session->set_flashdata('error','Product already exist. If you want to replenish a product use the Purchase Order Form');
		}

		else{
			
			$rm_ID = array(
				$this->input->post('rm_ID1'),
				$this->input->post('rm_ID2'),
				$this->input->post('rm_ID3'),
				$this->input->post('rm_ID4'),
				$this->input->post('rm_ID5'),
				$this->input->post('rm_ID6'),
				$this->input->post('rm_ID7'),
				$this->input->post('rm_ID8'),
				$this->input->post('rm_ID9'),
				$this->input->post('rm_ID10'),
			);
			$rm_ID = implode('', $rm_ID);
		
			$data = array(
				'product_Name' => $this->input->post('product_Name'),
				'quantity' => $this->input->post('quantity'),
				'price' => $this->input->post('price'),
				'supplier_ID' => $this->input->post('supplier_ID'),
				'category_ID' => $this->input->post('category_ID'),
				'class_ID' => $this->input->post('class_ID'),
				'rm_ID' => $rm_ID,
				'description' => $this->input->post('description'),
				'um' => $this->input->post('um'),
				'date_created'=> date('Y-m-j H:i:s'),
				'product_status' => $this->input->post('product_status'),
	        );
			  
			$this->db->insert('products', $data);
			$this->session->set_flashdata('success','You have successfully added a new product');
			
			$remark_id = $this->db->insert_id();
			$total = $this->input->post('price') * $this->input->post('quantity');
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'created/purchased product',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
			$code = random_string('alnum',11);
			
			$purchase = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'product_id'	=> $remark_id,
				'supplier_id'	=> $this->input->post('supplier_ID'),
				'reference'	=> $code,
				'ordering_cost'	=> $total,
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('purchases', $purchase);
	        
		}  
	}		
			
	/*
	 * delete product function
	 */	
	function remove($id)
    {
	    $this->db->where('product_ID',$id);
		$query = $this->db->delete('products');
	    $this->session->set_flashdata('success','Entry Deleted.');
		
		
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Products',
			'remark_id'	=> $id,
			'remarks'	=> 'deleted product',
			'date_created'=> date('Y-m-j H:i:s'),
				
		);
			
		$this->db->insert('audit_trail', $audit);
    }
	
	/*
	 * delete category function
	 */	
	function remove_cat($id)
    {
	    $this->db->where('category_ID',$id);
		$query = $this->db->delete('product_category');
	    $this->session->set_flashdata('success','Entry Deleted.');
    }
	/*
	 * delete class function
	 */	
	function remove_class($id)
    {
    	$this->db->where('class_id',$id);	
		$query = $this->db->delete('product_class');
	    $this->session->set_flashdata('success','Entry Deleted.');
		
		
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products/Classes',
				'remark_id'	=> $id,
				'remarks'	=> 'delete class',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
    }
    
   
    function search($keyword)
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
