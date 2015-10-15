<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class audit_trail extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		$this -> load -> model('reports_model');		
		$this -> load -> model('users_model');
	}

	public function index($offset = 0)
	{
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			//Pagination
			$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
			$total_row = $this->reports_model->getAuditCtr();
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'audit_trail/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'audit_trail',
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
			$data['audit'] = $this->reports_model->getAudit($config['per_page'], $offset);

			$data['main_content'] = 'audit_table';
			$this -> load -> view('includes/adminTemplate', $data);
		}

		else
	    {
			redirect(base_url(), 'refresh');
		}
	}
	
	
	public function view_action()
	{
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {			
			$data['utype'] = $this->users_model->getuType();
			
			$aid = $this -> uri -> segment(3);
			$data['rec'] = $this -> reports_model -> get_audit_rec($aid);
			
			$data['main_content'] = 'view_audit';
			$this->load->view('includes/adminTemplate', $data);
		}
	
		else
	    {
			//If no session, redirect to login page
			$this->session->set_flashdata('message','You need to be logged in to continue');
			redirect('login', 'refresh');
		}
		
	}
	
	function search()
	{
		
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
				
			$search = $this -> input -> post('search');
			redirect('audit_table/search_result/'.$search);
						
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			
		
			$search = $this -> input -> post('search');
			redirect('audit_table/search_result/'.$search);
			
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect(base_url(), 'refresh');
		}
	
	}

	function search_result($search)
	{
		
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
				
			$data['search'] = $this -> reports_model -> search($search);
			
			$data['main_content'] = 'audit_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			
			$data['search'] = $this -> reports_model -> search($search);
			
			$data['main_content'] = 'audit_table';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect(base_url(), 'refresh');
		}
	
	}
	
}
?>
