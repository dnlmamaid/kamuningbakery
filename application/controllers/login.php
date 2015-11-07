<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('users_model');
	}


	/**
	* login view.
	* 
	*/	
	function index() {
		if($this->session->userdata('is_logged_in'))
	    {
			redirect(base_url(), 'refresh');
		}	
		
		else{
			$data['main_content'] = 'login_form';
			$this->load->view('includes/logintemplate', $data);	
		}
		

	}
	
	
	/**
	* login function.
	* 
	*/	
	function validate_account()
	{
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password','required');
		
        if($this->form_validation->run() == FALSE){
        	$this->session->set_flashdata('error', 'The credentials you have entered does not match');
        	redirect('login');
			                
		}
		
		else
		{
			
			if($this->users_model->check_account_db() == TRUE){
				
				$username = $this->input->post('username');
				
				$user_id = $this->users_model->get_user_id_from_username($username);
				$user    = $this->users_model->get_user($user_id);
				
				$data = array(
					'user_id' => $user -> id,
					'username' => $user -> username,
					'user_type' => $user -> user_type,
					'is_logged_in' => true,
				);
				
				$this -> session -> set_userdata($data);
				redirect(base_url(), 'refresh');	
							
			}
			
			else{
				$this->session->set_flashdata('error', 'The credentials you have entered does not match');
        		redirect('login');
			}			               
        }
    }
	
	
	function check_account()
    {
		$query = $this->users_model->check_account_db();
		if($query){
			return true;
		}
		else{
			return false;
		}
    }
	

}
?>