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
		
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
	    $data['audit'] = $this->reports_model->getAudit('5', $offset);
		$data['hsp'] = $this->reports_model->getHSales();
		$data['purchases_c'] = $this->reports_model->getMPurchases();
		$data['sales_c'] = $this->reports_model->getMSales();
		$data['products'] = $this->reports_model->getLow('5');
		$data['requests'] = $this->reports_model->getRequests('5');
		
		if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') <= '2'))
	    {
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
	    	$data['purchases_c'] = $this->reports_model->getMPurchases();
			$data['main_content'] = 'home';
			$this->load->view('includes/ptemplate', $data);		
		}
		
		else if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '6'))
	    {
			$data['main_content'] = 'home';
			$this->load->view('includes/sktemplate', $data);		
		}
		
		
	}
	
}
?>