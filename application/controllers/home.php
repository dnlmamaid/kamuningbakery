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
		
			$data['main_content'] = 'home';
			$this->load->view('includes/admintemplate', $data);		

	}
	
	
	/**
	* login function.
	* 
	*/	
	function validate_account()
	{
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password','required');
		
        if($this->form_validation->run() == FALSE){
        	$this->session->set_flashdata('error', 'The credentials you have entered does not match');
        	redirect('login');
			                
		}
		
		else
		{
			
			if($this->users_model->check_account_db() == TRUE){
				
				$email = $this->input->post('email');
				
				$user_id = $this->users_model->get_user_id_from_email($email);
				$user    = $this->users_model->get_user($user_id);
				
				$data = array(
					'user_id' => $user -> id,
					'email' => $user -> email,
					'is_logged_in' => true,
					'is_admin' => $user->is_admin,
					
				);
				
				$this -> session -> set_userdata($data);
				redirect('dashboard', 'refresh');	
							
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
	
	function reset_password()
    {
		$email = $this->input->post('email');
		if($user_id = $this->users_model->get_user_id_from_email($email)){
			
			$this->users_model->change_password($user_id, $email);
			$this->session->set_flashdata('success', 'Please check your email for your new password');
			$this->index();   
		}
		else{
			$this->session->set_flashdata('error', 'The Email you have entered is not yet associated with the site');
			$this->index();                     
		}
    }
	

}
?>