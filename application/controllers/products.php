<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class products extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		$this -> load -> model('products_model');
		$this -> load -> model('production_model');
		$this -> load -> model('purchases_model');
		$this -> load -> model('reports_model');
	}

	public function index($offset = 0) {
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
	    	$data['rm'] = $this -> products_model -> getRawMats();
			//Pagination
			$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
			$total_row = $this->products_model->getProductsCtr();
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'products/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'products',
			'cur_tag_open' => '<li><a class="current">',
			'cur_tag_close' => '</a></li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
			);
			$this->pagination->initialize($config);
			$data['paginglinks'] = $this->pagination->create_links();
			 if($data['paginglinks']!= '') {
			 	if(($this->pagination->cur_page*$this->pagination->per_page) > $total_row)
				{
      				$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.$total_row.' of '.$total_row;
      			}
				else{
      			$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$total_row;
				} 			
      			
    		}   
			$data['products'] = $this->products_model->getProducts($config['per_page'], $offset);
		
			
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
			

			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/adminTemplate', $data);
			
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			//Pagination
			$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
			$total_row = $this->products_model->getProductsCtr();
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'products/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'products',
			'cur_tag_open' => '<li><a class="current">',
			'cur_tag_close' => '</a></li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
			);
			$this->pagination->initialize($config);
			$data['paginglinks'] = $this->pagination->create_links();
			 if($data['paginglinks']!= '') {
      			if(($this->pagination->cur_page*$this->pagination->per_page) > $total_row)
				{
      				$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.$total_row.' of '.$total_row;
      			}
				else{
      			$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$total_row;
				}
    		}   
			$data['products'] = $this->products_model->getProducts($config['per_page'], $offset);
			
			
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
						
			
			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function classes()
	{		
		
			$data['cls'] = $this -> products_model -> getClassFP();
			$data['main_content'] = 'class_table';
			$this -> load -> view('includes/adminTemplate', $data);
					
	}
		
	public function update($id)
	{
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			$this -> products_model -> update_product($id);
			redirect('products/view_product/'.$id, 'refresh');
		}
		
	}
	
	public function updateClass($id)
	{
		$this -> products_model -> update_class($id);
		redirect('products/edit_class/'.$id, 'refresh');
		
	}
	
	public function updateCat($id)
	{
		$this -> products_model -> update_cat($id);
		redirect('products/edit_category/'.$id, 'refresh');
		
	}

	public function view_product() {
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '1')
	    {	
			$pid = $this -> uri -> segment(3);
			//Dropdowns
			$data['supplier'] = $this -> products_model -> getSupplier();
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			$data['rm'] = $this -> products_model -> getRawMats();
			
			
			//Record Values
			$data['ing'] = $this -> products_model -> getIng_P($pid);
			$data['qcp'] = $this -> products_model -> getQCP($pid);
			
			//Annual Demand
			$data['ad'] = $this -> reports_model -> getAnnualDemand($pid);
			
			//Monthly Use
			$data['avg'] = $this -> reports_model -> getMonthlyUsage($pid);
			
			//LeadTime
			$data['su'] = $this -> reports_model -> getLeadTime($pid);
			
			$data['production'] = $this -> reports_model -> getProductionHistory($pid);
			$data['purchases'] = $this -> reports_model -> getPurchaseHistory($pid);
			$data['sales'] = $this -> reports_model -> getSalesHistory($pid);
			
			$data['rec'] = $this -> products_model -> get_product_rec($pid);
						
			$data['main_content'] = 'product_page';
			$this->load->view('includes/productionTemplate', $data);
		}
		else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') != '1')
	    {
			
			$pid = $this -> uri -> segment(3);
			$data['rec'] = $this -> products_model -> get_product_rec($pid);
			$data['products'] = $this -> products_model -> getSimilarProducts($pid);	
			$data['rm'] = $this -> products_model -> getRawMats();
			
			$data['main_content'] = 'product_page';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function edit_class() {
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
		
			$clid = $this -> uri -> segment(3);
			$data['rec'] = $this -> products_model -> get_class_rec($clid);
			
			$data['main_content'] = 'view_class_page';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('products', 'refresh');
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function edit_category() {
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {

			$cid = $this -> uri -> segment(3);
			$data['rec'] = $this -> products_model -> get_cat_rec($cid);
			
			$data['main_content'] = 'view_cat_page';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('products', 'refresh');
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function produce() {
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			$this -> production_model -> produce_newFG();
			redirect('production', 'refresh');
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('profile', 'refresh');
		}
	}
	

	
	public function add_class() {
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			$this -> products_model -> addClass();
			redirect($this->agent->referrer(), 'refresh');
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('profile', 'refresh');
		}
	}
	
	
	
	function search() {
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
	
			
			$search = $this -> input -> post('search');
			redirect('products/search_result/'.$search);
						
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
			
			
			$search = $this -> input -> post('search');
			redirect('products/search_result/'.$search);
			
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}

	function search_result($search) {
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
				
			$data['search'] = $this -> products_model -> search($search);
			
			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
						
			
			
			$data['search'] = $this -> products_model -> search($search);
			
			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}

	public function disable($id)
	{
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			
			$this -> products_model -> disable($id);
			
			$this->session->set_flashdata('success','Product disabled and will not be seen by level 1 users');
			redirect('products', 'refresh');
		}
		
		else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') != '1')
		{
			
			$this->session->set_flashdata('message','You don\'t have permission to access this page.');
			redirect($base_url, 'refresh');
		} 
		
		else{
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}

	public function enable($id)
	{		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			
			$this -> products_model -> enable($id);
			
			$this->session->set_flashdata('success','Product Enabled');
			redirect('products', 'refresh');
		}
		else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') != '1')
		{
			
			$this->session->set_flashdata('message','You don\'t have permission to access this page.');
			redirect($base_url, 'refresh');
		} 
		
		else{
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
	public function delete($id)
	{
		$this -> products_model -> remove($id);
		redirect($this->agent->referrer(), 'refresh');
	}
	
	public function deleteClass($id)
	{
		$this -> products_model -> remove_class($id);
		redirect('products/classes', 'refresh');
	}
	
	public function deleteCat($id)
	{
		$this -> products_model -> remove_cat($id);
		redirect('products/categories', 'refresh');
	}
}
?>
