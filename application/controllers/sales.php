<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sales extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		$this -> load -> model('reports_model');
		$this -> load -> model('products_model');		
		$this -> load -> model('users_model');
	}

	public function index($offset = 0)
	{
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2'){
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
			$data['sales'] = $this->reports_model->getSales($config['per_page'], $offset);

			$data['main_content'] = 'sales_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3'){
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
			$data['sales'] = $this->reports_model->getSales($config['per_page'], $offset);

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

	public function report($offset = 0)
	{
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2'){
	    	
			//UserData
	    	$uid = $this->session->userdata('user_id');
	    	$data['log'] = $this -> users_model -> get_log($uid);
				
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
    		
    		$data['total'] = $this->reports_model->get_total_sales();
			$data['sales'] = $this->reports_model->getSales($config['per_page'], $offset);

			$data['main_content'] = 'sales_report';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3'){
			//UserData
	    	$uid = $this->session->userdata('user_id');
	    	$data['log'] = $this -> users_model -> get_log($uid);
				
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
    		
    		$data['total'] = $this->reports_model->get_total_sales();
			$data['sales'] = $this->reports_model->getSales($config['per_page'], $offset);

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
	
	function by_date(){
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2'){
			$data['sdate'] = $this->input->post('sdate');
			$data['edate'] = $this->input->post('edate');
			
			$data['total'] = $this->reports_model->get_total_sales_by_date();
			$data['sales'] = $this->reports_model->get_sales_by_date();
			
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
	
	

	
}
?>
