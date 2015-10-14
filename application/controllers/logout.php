<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class logout extends CI_Controller {

	function __construct() {
		parent::__construct();
		
	}


	/**
	* login view.
	* 
	*/	
	function index() {
		
		$this->session->unset_userdata('is_logged_in');
		session_destroy();
		$this->session->set_flashdata('message','You have successfully logged out');
		redirect('login', 'refresh');		

	}

	
}
?>