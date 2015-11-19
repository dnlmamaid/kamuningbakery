<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		$this -> load -> model('reports_model');
		$this -> load -> model('sales_model');		
		$this -> load -> model('users_model');
	}

	public function index($offset = 0)
	{
		//Pagination
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
		$total_row = $this->reports_model->getSalesCtr();
			
		$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'sales/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'sales',
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
   
		$data['sales'] = $this->sales_model->getSales($config['per_page'], $offset);
			
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2'){
			$data['main_content'] = 'sales_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3'){
	    	
			$data['main_content'] = 'sales_table';
			$this -> load -> view('includes/accTemplate', $data);
		} else if($this->session->userdata('is_logged_in')){
	    	$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
		} else{
	    	$this->session->set_flashdata('error','You need to be logged in to continue');
			redirect(base_url(), 'refresh');
		}
	}
	
	public function sales_invoice() {
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2'){
			$sid = $this -> uri -> segment(3);
			$data['rec'] = $this -> reports_model -> get_sales_rec($sid);
			
			$data['main_content'] = 'view_sales_invoice';
			$this->load->view('includes/adminTemplate', $data);
		} else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3'){
			$sid = $this -> uri -> segment(3);
			$data['rec'] = $this -> reports_model -> get_sales_rec($sid);
			
			$data['main_content'] = 'view_sales_invoice';
			$this->load->view('includes/accTemplate', $data);	
		} else if($this->session->userdata('is_logged_in')){
	    	$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
		} else{
	    	$this->session->set_flashdata('error','You need to be logged in to continue');
			redirect(base_url(), 'refresh');
		}

	}

	public function report()
	{
		//Pagination
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
		$total_row = $this->reports_model->getSalesCtr();
			
		$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'sales/report',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'sales/report',
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
   
    	$data['products'] = $this->reports_model->getPSold(); // Dropdown
    	$data['total'] = $this->reports_model->get_total_sales();
		
		$data['hsp'] = $this->reports_model->getHSales();
		
		$data['sales_t'] = $this->reports_model->getSales($config['per_page'], $offset);	
		$data['sales_c'] = $this->reports_model->getMSales();
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2'){
	  		
			$data['main_content'] = 'sales_report';
			$this -> load -> view('includes/adminTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3'){
			
			$data['main_content'] = 'sales_report';
			$this -> load -> view('includes/accTemplate', $data);
				
		} else if($this->session->userdata('is_logged_in')){
			
	    	$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
			
		} else{
			
	    	$this->session->set_flashdata('error','You need to be logged in to continue');
			redirect(base_url(), 'refresh');
			
		}
	}

	function by_date(){
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2'){
			$data['sdate'] = $this->input->post('sdate');
			$data['edate'] = $this->input->post('edate');
			$data['products'] = $this->reports_model->getPSold(); // Dropdown
			$data['total'] = $this->reports_model->get_total_sales_by_date();
			$data['sales_c'] = $this->reports_model->get_sales_by_dateuo();
			$data['sales_t'] = $this->reports_model->get_sales_by_date();
			
			$data['main_content'] = 'sales_report';
			$this -> load -> view('includes/admintemplate', $data);
		} else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3'){			
			$data['sdate'] = $this->input->post('sdate');
			$data['edate'] = $this->input->post('edate');
			
			$data['total'] = $this->reports_model->get_total_sales_by_date();
			$data['sales'] = $this->reports_model->get_sales_by_date();
			
			$data['main_content'] = 'sales_report';
			$this -> load -> view('includes/acctemplate', $data);	
		} else if($this->session->userdata('is_logged_in')){
	    	$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
		} else{
	    	$this->session->set_flashdata('error','You need to be logged in to continue');
			redirect(base_url(), 'refresh');
		}	
	}

	public function report_by_product($sid)
	{
		
		//UserData
	    $uid = $this->session->userdata('user_id');
	    $data['log'] = $this -> users_model -> get_log($uid);
				
		//Pagination
		$offset = ($this->uri->segment(4) != '' ? $this->uri->segment(4): 0);
		$total_row = $this->reports_model->getSalesCtrByP($sid);
			
		$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'sales/report_by_product/'.$sid,
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'sales/report_by_product/'.$sid,
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
    	
    	$data['products'] = $this->reports_model->getPSold(); // Dropdown
    	$data['total'] = $this->reports_model->get_total_sales_by_product($sid);
		$data['sales'] = $this->reports_model->getSalesByP($config['per_page'], $offset, $sid);
			
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2'){
	  		
			$data['main_content'] = 'sales_report_by_product';
			$this -> load -> view('includes/adminTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3'){
			
			$data['main_content'] = 'sales_report_by_product';
			$this -> load -> view('includes/accTemplate', $data);
				
		} else if($this->session->userdata('is_logged_in')){
			
	    	$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
			
		} else{
			
	    	$this->session->set_flashdata('error','You need to be logged in to continue');
			redirect(base_url(), 'refresh');
			
		}
	}
		
	public function create_sales_tab(){
		if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') <= '3'))
	    {
	    	$code = date('dY').random_string('alnum',5);	
			$this -> sales_model -> create_si($code);
			redirect('sales/daily_sales/'.$code, 'refresh');
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
	
	public function daily_sales()
	{
		if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') <= '2')){
			$code = $this->uri->segment(3);
			//Dropdowns 
			$data['products'] = $this -> sales_model -> getPonSale();
			$data['si'] = $this -> sales_model -> getSI($code);
			$data['invoices'] = $this -> sales_model -> getInvoices($code);
			$data['to'] = $this->sales_model->get_total($code);
			
			$data['main_content'] = 'daily_sales';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '3')){
	    
			$code = $this->uri->segment(3);
			//Dropdowns 
			$data['products'] = $this -> sales_model -> getPonSale();
			$data['si'] = $this -> sales_model -> getSI($code);
			$data['invoices'] = $this -> sales_model -> getInvoices($code);
			$data['to'] = $this->sales_model->get_total($code);
			
			$data['main_content'] = 'daily_sales';
			$this -> load -> view('includes/accTemplate', $data);
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
	public function add_sales($code){
		if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') <= '3'))
	    {
			$this -> sales_model -> add_sales($code);
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
	
	
	public function update_sales($code){
		if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') <= '3'))
	    {
			$this -> sales_model -> update_sales($code);
			redirect('sales', 'refresh');
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
	
	public function view_sales_invoice()
	{
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2'){
			$sid = $this -> uri -> segment(3);
			$data['rec'] = $this -> reports_model -> get_sales_rec($sid);
			
			$data['main_content'] = 'view_sales_invoice';
			$this->load->view('includes/adminTemplate', $data);
		} else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3'){			
			$sid = $this -> uri -> segment(3);
			$data['rec'] = $this -> reports_model -> get_sales_rec($sid);
			
			$data['main_content'] = 'view_sales_invoice';
			$this->load->view('includes/accTemplate', $data);
		} else if($this->session->userdata('is_logged_in')){
	    	$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
		} else{
	    	$this->session->set_flashdata('error','You need to be logged in to continue');
			redirect(base_url(), 'refresh');
		}
		
	}
	
	
	
	function search()
	{
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '3')
	    {
				
			$search = $this -> input -> post('search');
			redirect('sales/search_result/'.$search);
						
		} else if($this->session->userdata('is_logged_in')){
	    	$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
		} else{
	    	$this->session->set_flashdata('error','You need to be logged in to continue');
			redirect(base_url(), 'refresh');
		}	
	
	}

	function search_result($search)
	{
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2')
	    {
				
			$data['search'] = $this -> sales_model -> search($search);
			$data['main_content'] = 'sales_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			
			$data['search'] = $this -> sales_model -> search($search);
			$data['main_content'] = 'sales_table';
			$this -> load -> view('includes/accTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in')){
	    	$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
		} else{
	    	$this->session->set_flashdata('error','You need to be logged in to continue');
			redirect(base_url(), 'refresh');
		}	
	
	}

	
}
?>
