<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('users_model');
	}


	/**
	* login view.
	* 
	*/	
	function index() {
		if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '1'))
	    {
			$data['main_content'] = 'home';
			$this->load->view('includes/admintemplate', $data);		
		}
		
		else if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '2'))
	    {
			$data['main_content'] = 'home';
			$this->load->view('includes/mgrtemplate', $data);		
		}
		
		else if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '3'))
	    {
			$data['main_content'] = 'home';
			$this->load->view('includes/acctanttemplate', $data);		
		}
		
		else if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '4'))
	    {
			$data['main_content'] = 'home';
			$this->load->view('includes/bakertemplate', $data);		
		}
		
		else if($this->session->userdata('is_logged_in') && ($this->session->userdata('user_type') == '5'))
	    {
			$data['main_content'] = 'home';
			$this->load->view('includes/purchasertemplate', $data);		
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