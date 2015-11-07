<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('users_model');
		$this -> load -> model('reports_model');		
		$this -> load -> model('products_model');
	}


	/**
	* 
	* 
	*/	
	function index() {
		if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') <= '2'))
	    {
	    	$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
	    	$data['audit'] = $this->reports_model->getAudit('5', $offset);
			$data['sales'] = $this->reports_model->getHSales('5', $offset);
			$data['products'] = $this->reports_model->getLow('5', $offset);
			$data['requests'] = $this->reports_model->getRequests('5', $offset);		
			$data['main_content'] = 'home';
			$this->load->view('includes/admintemplate', $data);		
		}
		
	
		else if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '3'))
	    {
			$data['main_content'] = 'home';
			$this->load->view('includes/accTemplate', $data);		
		}
		
		else if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '4'))
	    {
			$data['main_content'] = 'home';
			$this->load->view('includes/btemplate', $data);		
		}
		
		else if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '5'))
	    {
			$data['main_content'] = 'home';
			$this->load->view('includes/ptemplate', $data);		
		}
		
		else if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '6'))
	    {
			$data['main_content'] = 'home';
			$this->load->view('includes/sktemplate', $data);		
		}
		
		else
	    {
			//If no session, redirect to login page
			$this->session->set_flashdata('message','You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
}
?>