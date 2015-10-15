<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class products_model extends CI_Model{
 	
	/**
	 * Products Counter Function
	 */
	public function getProductsCtr() {
		if($this -> session -> userdata('is_admin')){
			return $this->db->count_all_results('products');
		}
		else{
			$this -> db -> where('products.is_active', '1');
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
			
			$this -> db -> where('products.is_active', '1');
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
		if($this -> session -> userdata('is_admin')){
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
			$this -> db -> where('products.is_active', '1');
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
	 * Get Similar Products Function
	 * -- gets similar products from current viewed product
	 */
	function getSimilarProducts($pid)
	{
		if($this -> session -> userdata('is_admin')){
			$this->db->limit(6);	
			$this->db->select('class_ID');
			$this->db->from('products');	
			$this -> db -> where('product_ID', $pid);
			$class = $this->db->get()->row('class_ID');
			
			$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
			$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
			$this -> db -> select('*');
			$this -> db -> from('products');
			
			$this -> db -> where('products.product_ID !=', $pid);
			$this -> db -> where('products.class_ID', $class);
			$this -> db -> order_by('date_created', 'desc');
			$query = $this -> db -> get();
			$data = $query -> result_array();
			return $data;	
		}
		
		else if(!$this -> session -> userdata('is_admin')){	
			$this->db->limit(6);	
			$this->db->select('class_ID');
			$this->db->from('products');	
			$this -> db -> where('product_ID', $pid);
			$class = $this->db->get()->row('class_ID');
			
			$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
			$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
			$this -> db -> select('*');
			$this -> db -> from('products');
			$this -> db -> where('products.is_active', '1');
			$this -> db -> where('products.product_ID !=', $pid);
			$this -> db -> where('products.class_ID', $class);
			$this -> db -> order_by('date_created', 'desc');
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
	function get_product_rec($pid) {
		
		$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
		$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
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
	 * get product record function
	 * 
	 * 
	 */
	function get_cat_rec($cid) {
		
		$this -> db -> where('category_id', $cid);
		$q = $this -> db -> get('product_category');
		
		return $q -> result();
	}
	
	/**
	 * get product by category function
	 * 
	 * 
	 */
	function get_product_by_category($limit, $start, $cid) {
		if($this -> session -> userdata('is_admin')){
			
			$this->db->limit($limit, $start);
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
			$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
			$this -> db -> where('products.is_active', '1');
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
	

	function get_by_category()
	{
		$this->db->order_by('category_ID', 'asc');
		$this -> db -> where('category_ID', $this->input->post('category_ID'));

	}

	/**
	  * update_product function.
	 * 
	 * @access public
	 */
	public function update_product($id)
	{	$this->db->where('product_Name',$this->input->post('product_Name'));
		$this->db->where('product_Code',$this->input->post('product_Code'));
		$val = $this->db->get('products');
		if(($val->num_rows() == 1) && !$this->db->where('product_ID', $id)){
			$this->session->set_flashdata('message','Product name or code already exist.');
		}

		else{
			
			$data = array(
					'product_Name' => $this->input->post('product_Name'),
					'product_Code' => $this->input->post('product_Code'),
					'price' => $this->input->post('price'),
					'material' => $this->input->post('material'),
					'category_ID' => $this->input->post('category_ID'),
					'class_ID' => $this->input->post('class_ID'),
					'product_Description' => $this->input->post('product_Description'),
					'is_active' => $this->input->post('is_active'),
		    );
		
			$this->db->where('product_ID', $id);
			$this->db->update('products', $data);
			
			$this->session->set_flashdata('success','Successfuly updated information.');
		}
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
					'category_Definition' => $this->input->post('category_Definition'),
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
				'definition' => $this->input->post('definition'),
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
	 * Add Product Function
	 * checks name and code if available then creates new product
	 */
	function addProduct()
    {
    	$this->db->where('product_Name',$this->input->post('product_Name'));
		$val = $this->db->get('products');
		if($val->num_rows() == 1){
			$this->session->set_flashdata('message','Product already exist.');
		}

		else{
				
			$data = array(
				'product_Name' => $this->input->post('product_Name'),
				'material' => $this->input->post('material'),
				'price' => $this->input->post('price'),
				'category_ID' => $this->input->post('category_ID'),
				'class_ID' => $this->input->post('class_ID'),
				'description' => $this->input->post('description'),
				'um' => $this->input->post('um'),
				
				
				'is_active' => $this->input->post('is_active'),
	        );
			  
			$this->db->insert('products', $data);
			$this->session->set_flashdata('success','You have successfully added a new product');
			
			$remark_id = $this->db->insert_id();
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Products',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'created product',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
	        
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
			
	    	$this -> db -> join('product_category', 'product_category.category_id = products.category_ID', 'left');
			$this -> db -> join('product_Class', 'product_class.class_id = products.class_ID', 'left');
	        $this->db->or_like('product_Name', $var);
			$this->db->or_like('price', $var);
	        $this->db->or_like('category_name', $var);
			$this->db->or_like('class_Name', $var);
	        $this->db->or_like('material', $var); 
	        $this->db->or_like('product_Code', $var);
			$this->db->or_like('product_Description', $var); 
			$query = $this -> db -> get('products');
			$rows = $query -> num_rows();
			$this -> session -> set_flashdata('search', $rows.' matching record(s) found.');
			return $query -> result();
		}
	
	}


    
}
