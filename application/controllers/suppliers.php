<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class suppliers extends CI_Controller {


	public function __construct()
		{
        parent::__construct();
		$this -> load -> model('users_model');
		$this -> load -> model('products_model');
		
	}

	public function index($offset = 0)
	{
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
	    	
	    	//Pagination
			$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
			$total_row = $this->users_model->getAllUsersCtr();
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 2,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'suppliers/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'suppliers',
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
      			$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$total_row;
    		}   
			$data['suppliers'] = $this->users_model->getSuppliers($config['per_page'], $offset);
			
			$data['utype'] = $this->users_model->getuType();
			
			$data['main_content'] = 'suppliers_table';
			$this->load->view('includes/adminTemplate', $data);
			
		}

		else
	    {
			//If no session, redirect to login page
			$this->session->set_flashdata('message','You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}

	public function profile()
	{
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {			
			$data['utype'] = $this->users_model->getuType();
			
			/* Notification */
			
			$data['notif'] = $this->users_model->getNotif(); //gets member applicants
			$data['notif_n_ctr'] = $this->users_model->getNotifNCtr();//ctr for member applicants
			
			$mid = $this -> uri -> segment(3);
			$data['rec'] = $this -> users_model -> get_supplier_rec($mid);
			$data['products'] = $this -> products_model -> getProductSupplier($mid);
			$data['main_content'] = 'suppliers_profile';
			$this->load->view('includes/adminTemplate', $data);
		}
		
		else if($this->session->userdata('is_logged_in') && !$this->session->userdata('user_type'))
	    {
	    	
			
			$data['main_content'] = 'suppliers_table';
			$this->load->view('includes/memberTemplate', $data);
		}
		
		else
	    {
			//If no session, redirect to login page
			$this->session->set_flashdata('message','You need to be logged in to continue');
			redirect('login', 'refresh');
		}
		
	}


	public function update($id)
	{
		if($this->session->userdata('is_logged_in')){
			$id = $this -> uri -> segment(3);
			$this -> users_model -> update_supplier($id);
			
			redirect('suppliers/profile/'.$id, 'refresh');
		}
		
		else{
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
		
	}
	
	
	public function add()
	{
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			$this -> users_model -> create_supplier();
			$this->session->set_flashdata('success','Successfully Created User');
			redirect('suppliers', 'refresh');
		}

		else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') != '1')
		{
			
			$this->session->set_flashdata('message','You don\'t have permission to access this page.');
			redirect('home', 'refresh');
		}
		
		else{
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
	
	public function remove($id)
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type')=='1')
		{
			$this -> users_model -> remove($id);
			$this->session->set_flashdata('message','Successfully Deleted Entry');
			redirect('suppliers', 'refresh');
		}
		
		else if ($this -> session -> userdata('is_logged_in') && $this->session->userdata('user_type') != '1'){
			
			$this->session->set_flashdata('message','You don\'t have permission to access this page.');
			redirect('home', 'refresh');
		} 
		
		else{
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
	
	
	public function disable($id)
	{
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			
			$this -> users_model -> disable_s($id);
			
			$this->session->set_flashdata('success','Account Disabled');
			redirect('suppliers', 'refresh');
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
			
			$this -> users_model -> enable_s($id);
			
			$this->session->set_flashdata('success','Account Enabled');
			redirect('suppliers', 'refresh');
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
	
	
	
	function search() {
		
		if($this->session->userdata('is_logged_in'))
		{			
			$search = $this -> input -> post('search');
			redirect('suppliers/search_result/'.$search);
						
		}
		
		else 
		{
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}

	function search_result($search) {
		
		if ($this -> session -> userdata('is_logged_in'))
		{
			$data['search'] = $this -> users_model -> search_suppliers($search);
			
			$data['main_content'] = 'suppliers_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} 
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}
	
}