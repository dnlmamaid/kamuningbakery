<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class requests extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		$this -> load -> model('requests_model');		
		$this -> load -> model('users_model');
	}

	public function index($offset = 0)		
	{
		//Pagination
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
		$total_row = $this->requests_model->getrequestsCtr();
			
		$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'requests/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'requests',
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
		
		if($data['paginglinks']!= ''){
			if(($this->pagination->cur_page*$this->pagination->per_page) > $total_row){
      			$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.$total_row.' of '.$total_row;
      		}
			else{
      			$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$total_row;
			} 			
    	}   
    		
    	//Dropdown
		$data['requests'] = $this->requests_model->getRequests($config['per_page'], $offset);
			
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') <= '2'){
			
			$data['main_content'] = 'requests_table';
			$this -> load -> view('includes/adminTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '4'){
			
			$data['main_content'] = 'requests_table';
			$this -> load -> view('includes/bTemplate', $data);
		
		} else if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '5'){
			
			$data['main_content'] = 'requests_table';
			$this -> load -> view('includes/pTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '6'){
			
			$data['main_content'] = 'requests_table';
			$this -> load -> view('includes/skTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in')){
			
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
			
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
	public function request_order()
	{
		
		$data['prod'] = $this -> requests_model -> getProducts();
		$code = $this->uri->segment(3);
			
		$data['ro'] = $this -> requests_model -> getRO($code);
		$data['requests'] = $this -> requests_model -> getROrders($code);		
			
		if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') <= '2')){
			
			$data['main_content'] = 'request_order';
			$this -> load -> view('includes/adminTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '4'){
			
			$data['main_content'] = 'request_order';
			$this -> load -> view('includes/bTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '5'){
			
			$data['main_content'] = 'request_order';
			$this -> load -> view('includes/pTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in')) {
			
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
			
		} 
		
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}
	
	
	
	
	
	public function add_order($code){
		if($this->session->userdata('is_logged_in') && (($this->session->userdata('user_type') <= '2') || ($this->session->userdata('user_type') == '4')))
	    {
			$this -> requests_model -> add_order($code);
			redirect($this->agent->referrer(), 'refresh');
		}
		 
		else if($this->session->userdata('is_logged_in')){
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect($base_url(), 'refresh');
		}
		
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
	public function update($code){
		if($this->session->userdata('is_logged_in') && (($this->session->userdata('user_type') <= '2') || ($this->session->userdata('user_type') == '4')))
	    {
			$this -> requests_model -> update($code);
			redirect($this->agent->referrer(), 'refresh');
		}
		 
		else if($this->session->userdata('is_logged_in')){
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect($base_url(), 'refresh');
		}
		
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}

	public function create_request_order(){
		if($this->session->userdata('is_logged_in') && (($this->session->userdata('user_type') <= '2') || ($this->session->userdata('user_type') == '4')))
	    {
	    	$code = date('d').'0'.random_string('alnum',8);	
			$this -> requests_model -> create_ro($code);
			redirect('requests/request_order/'.$code, 'refresh');
		}
		 
		else if($this->session->userdata('is_logged_in')){
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect($base_url(), 'refresh');
		}
		
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
	
	public function approve($id)
	{
		$this -> requests_model -> approve($id);
		redirect($this->agent->referrer(), 'refresh');
	}
	
	
	
	public function disapprove($id)
	{
		$this -> requests_model -> disapprove($id);
		redirect($this->agent->referrer(), 'refresh');
	}
	
		
		
	function search() {
		
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '1')
	    {
		
			$search = $this -> input -> post('search');
			redirect('requests/search_result/'.$search);
						
		} else if ($this->session->userdata('is_logged_in') && !$this->session->userdata('is_admin')) {
						
			$search = $this -> input -> post('search');
			redirect('requests/search_result/'.$search);
			
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}

	function search_result($search) {
		
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '1')
	    {
						
			$data['search'] = $this -> requests_model -> search_requests($search);
			
			$data['main_content'] = 'requests_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this->session->userdata('is_logged_in') && !$this->session->userdata('is_admin')) {
			
			$data['search'] = $this -> products_model -> search($search);
			
			$data['main_content'] = 'requests_table';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}
	

	
}
?>
