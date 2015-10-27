<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class purchases extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		$this -> load -> model('reports_model');
		$this -> load -> model('products_model');
		$this -> load -> model('purchases_model');		
		$this -> load -> model('users_model');
	}

	public function index($offset = 0)
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '1')
	    {
	    	
			
			//Pagination
			$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
			$total_row = $this->reports_model->getPurchasesCtr();
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'purchases/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'purchases',
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
			$data['purchases'] = $this->reports_model->getPurchases($config['per_page'], $offset);

			$data['main_content'] = 'purchases_table';
			$this -> load -> view('includes/adminTemplate', $data);
		}

		else
	    {
			redirect(base_url(), 'refresh');
		}
	}
	
	public function purchase_order() {
		if($this->session->userdata('is_logged_in') && (($this->session->userdata('user_type') <= '2') || ($this->session->userdata('user_type') == '5')))
	    {
			$code = $this->uri->segment(3);
			
			//Dropdowns 
			$data['cls'] = $this -> products_model -> getClass();
			$data['supplier'] = $this -> products_model -> getSupplier();
			
			$data['po'] = $this -> purchases_model -> getPO($code);
			$data['to'] = $this->purchases_model->get_total($code);
			$data['main_content'] = 'purchase_raw_material';
			$this -> load -> view('includes/adminTemplate', $data);
		}
		
		else if($this->session->userdata('is_logged_in'))
	    {
			$this -> session -> set_flashdata('error', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
		} 
		
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}
	
	
	public function add_order($code){
		if($this->session->userdata('is_logged_in') && (($this->session->userdata('user_type') <= '2') || ($this->session->userdata('user_type') == '5')))
	    {
			$this -> purchases_model -> add_order($code);
			redirect('purchases/purchase_order/'.$code, 'refresh');
		}
		 
		else if($this->session->userdata('is_logged_in')){
			$this -> session -> set_flashdata('error', 'You don\'t have permission to access this page.');
			redirect($base_url(), 'refresh');
		}
		
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}

	public function place_order($code){
		if($this->session->userdata('is_logged_in') && (($this->session->userdata('user_type') <= '2') || ($this->session->userdata('user_type') == '5')))
	    {
			$this -> purchases_model -> place_order($code);
			redirect('purchases/purchase_order/'.$code, 'refresh');
		}
		 
		else if($this->session->userdata('is_logged_in')){
			$this -> session -> set_flashdata('error', 'You don\'t have permission to access this page.');
			redirect($base_url(), 'refresh');
		}
		
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
	public function report($offset = 0)
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '1')
	    {
	    	
			//UserData
	    	$uid = $this->session->userdata('user_id');
	    	$data['log'] = $this -> users_model -> get_log($uid);
				
			//Pagination
			$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
			$total_row = $this->reports_model->getPurchasesCtr();
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'purchases/report',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'purchases/report',
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
    		
    		$data['total'] = $this->reports_model->get_total_purchases();
			$data['purchases'] = $this->reports_model->getPurchases($config['per_page'], $offset);

			$data['main_content'] = 'purchases_report';
			$this -> load -> view('includes/adminTemplate', $data);
		}

		else
	    {
			redirect(base_url(), 'refresh');
		}
	}
	
	
	public function purchase_invoice()
	{
		
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '1')
	    {			
			$pid = $this -> uri -> segment(3);
			$data['rec'] = $this -> reports_model -> get_purchase_rec($pid);
			
			$data['main_content'] = 'view_purchase';
			$this->load->view('includes/adminTemplate', $data);
		}
	
		else
	    {
			//If no session, redirect to login page
			$this->session->set_flashdata('message','You need to be logged in to continue');
			redirect('login', 'refresh');
		}
		
	}
	
	function by_date(){
		
		$data['sdate'] = $this->input->post('sdate');
		$data['edate'] = $this->input->post('edate');
		
		$data['total'] = $this->reports_model->get_total_purchases_by_date();
		$data['purchases'] = $this->reports_model->get_purchases_by_date();
		
		$data['main_content'] = 'purchases_report';
		$this -> load -> view('includes/admintemplate', $data);
	}
	
	
	
	function search() {
		
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '1')
	    {
			
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
			$search = $this -> input -> post('search');
			redirect('purchases/search_result/'.$search);
						
		} else if ($this->session->userdata('is_logged_in') && !$this->session->userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
			$search = $this -> input -> post('search');
			redirect('purchases/search_result/'.$search);
			
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}

	function search_result($search) {
		
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '1')
	    {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
				
			$data['search'] = $this -> reports_model -> search_purchases($search);
			
			$data['main_content'] = 'purchases_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this->session->userdata('is_logged_in') && !$this->session->userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
						
			
			
			$data['search'] = $this -> products_model -> search($search);
			
			$data['main_content'] = 'purchases_table';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}
	

	
}
?>
