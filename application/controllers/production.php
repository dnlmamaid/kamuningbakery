<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class production extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		$this -> load -> model('reports_model');		
		$this -> load -> model('production_model');
		$this -> load -> model('products_model');
	}

	public function index($offset = 0)
	{
		//Pagination
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
		$total_row 	= $this->reports_model->getProducedCtr();
			
		$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'production/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'production',
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
		   
		$data['production'] = $this->reports_model->getProduction($config['per_page'], $offset);
			
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2'){
			$data['main_content'] = 'production_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '4'){
	
			$data['main_content'] = 'production_table';
			$this -> load -> view('includes/bTemplate', $data);

		}else
	    {
			redirect(base_url(), 'refresh');
		}
	}
	
	
	/*public function produce_goods()
	{
		
		if(($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2') || ($this -> session -> userdata('user_type') == '4'))
	    {			
			$data['cls'] = $this -> products_model -> getClass();
			$data['rm'] = $this -> products_model -> getRawMats();
			
			 
			$data['main_content'] = 'product_production';
			$this->load->view('includes/productionTemplate', $data);
		}
	
		else
	    {
			//If no session, redirect to login page
			$this->session->set_flashdata('message','You need to be logged in to continue');
			redirect('login', 'refresh');
		}
		
	}*/
	
	function search()
	{
		
		if(($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '5')){
			$search = $this -> input -> post('search');
			redirect('production/search_result/'.$search);
						
		} else if ($this -> session -> userdata('is_logged_in')) {
			
		
			$search = $this -> input -> post('search');
			redirect('production/search_result/'.$search);
			
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect(base_url(), 'refresh');
		}
	
	}

	function search_result($search)
	{
		
		if(($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2')){
				
			$data['search'] = $this -> production_model -> search($search);
			
			$data['main_content'] = 'production_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if(($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3')){
			
			$data['search'] = $this -> production_model -> search($search);
			
			$data['main_content'] = 'production_table';
			$this -> load -> view('includes/accTemplate', $data);
		} else if(($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '4')){
			
			$data['search'] = $this -> production_model -> search($search);
			
			$data['main_content'] = 'production_table';
			$this -> load -> view('includes/bTemplate', $data);
		} else if(($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '5')){
			
			$data['search'] = $this -> production_model -> search($search);
			
			$data['main_content'] = 'production_table';
			$this -> load -> view('includes/pTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect(base_url(), 'refresh');
		}
	
	}
	
	
	public function report($offset = 0)
	{
		//Pagination
			$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
			$total_row = $this->reports_model->getProducedCtr();
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'production/report',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'production/report',
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
    		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2')
	    {
	    	
    		$data['total'] = $this->reports_model->get_total_produced();
			$data['production_c'] = $this->reports_model->getMProduction();
			$data['production_t'] = $this->reports_model->getProduction($config['per_page'], $offset);
			
			$data['main_content'] = 'production_report';
			$this -> load -> view('includes/adminTemplate', $data);
			
		} else if(($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3')){
			
    		$data['total'] = $this->reports_model->get_total_produced();
			$data['products'] = $this->reports_model->getProduction($config['per_page'], $offset);

			$data['main_content'] = 'production_report';
			$this -> load -> view('includes/accTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in')){
			$this -> session-> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
			
		} else{
			redirect(base_url(), 'refresh');
		}
	}

	function by_date(){
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') <= '2')
	    {
			$data['sdate'] = $this->input->post('sdate');
			$data['edate'] = $this->input->post('edate');
			
			$data['total'] = $this->reports_model->get_total_production_by_date();
			$data['production_c'] = $this->reports_model->get_produced_by_dateuo();
			$data['production_t'] = $this->reports_model->get_produced_by_date();
			
			$data['main_content'] = 'production_report';
			$this -> load -> view('includes/admintemplate', $data);
		}
	}

	public function create_production_batch(){
		if($this->session->userdata('is_logged_in') && (($this->session->userdata('user_type') <= '2') || ($this->session->userdata('user_type') == '4')))
	    {
	    	$code = date('mdY').random_string('alnum',3);	
			$this -> production_model -> create_batch($code);
			redirect('production/production_batch/'.$code, 'refresh');
		}
		 
		else if($this->session->userdata('is_logged_in')){
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
		}
		
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
	public function production_batch()
	{
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') <= '2'){
			$code = $this->uri->segment(3);
			//Dropdowns 
			$data['cls'] = $this -> products_model -> getClass();
			$data['rm'] = $this -> products_model -> getRawMats();
			$data['fg'] = $this -> production_model	 -> getFG();
			
			$data['batch'] = $this -> production_model -> getBatch($code);
			$data['processed'] = $this -> production_model -> getProcessed($code);
			$data['to'] = $this->production_model->get_total_pc($code);
			
			$data['main_content'] = 'production_batch';
			$this -> load -> view('includes/productionTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '4'){
			$code = $this->uri->segment(3);
			//Dropdowns 
			$data['cls'] = $this -> products_model -> getClass();
			$data['rm'] = $this -> products_model -> getRawMats();
			$data['fg'] = $this -> production_model	 -> getFG();
			
			$data['batch'] = $this -> production_model -> getBatch($code);
			$data['processed'] = $this -> production_model -> getProcessed($code);
			$data['to'] = $this->production_model->get_total_pc($code);
			
			$data['main_content'] = 'production_batch';
			$this -> load -> view('includes/bTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in')){
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
			
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function add_to_batch($code){
		if($this->session->userdata('is_logged_in') && (($this->session->userdata('user_type') <= '2') || ($this->session->userdata('user_type') == '4')))
	    {
			$this -> production_model -> add_to_batch($code);
			redirect($this->agent->referrer(), 'refresh');
		}
		 
		else if($this->session->userdata('is_logged_in')){
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
		}
		
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
	public function process_info($id) {
		//Dropdowns 
		
		$data['cls'] = $this -> products_model -> getClass();
		$data['supplier'] = $this -> products_model -> getSupplier();
		$data['details'] = $this -> production_model -> getProd_Rec($id);
		$pid = $this->production_model->get_pid_from_production($id);
		$data['ing'] = $this -> products_model -> getIng($id, $pid);
		
		if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') <= '2'){
		
			$data['main_content'] = 'process_info';
			$this -> load -> view('includes/adminTemplate', $data);
			
		} else if($this->session->userdata('is_logged_in') && $this->session->userdata('user_type') == '4'){
			
			$data['main_content'] = 'process_info';
			$this -> load -> view('includes/bTemplate', $data);
		
		} else if($this->session->userdata('is_logged_in')){
			$this -> session -> set_flashdata('error', 'You don\'t have permission to access this page.');
			redirect(base_url(), 'refresh');
		} 
		
		else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('error', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}
	
	function getIngredients()
	{
		
		$data = $this -> products_model -> getIng($pid);
		echo json_encode($data);
	}


}
?>
