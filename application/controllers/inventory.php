<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventory extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		
		$this -> load -> model('products_model');		
		$this -> load -> model('users_model');
		$this -> load -> model('production_model');
	}

	public function index($offset = 0)
	{
		//Pagination
		$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
		$total_row = $this->products_model->getProductsCtr();
			
		$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'products_table/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'products_table',
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
		$data['products'] = $this->products_model->getProducts($config['per_page'], $offset);
			
			
		$data['cat'] = $this -> products_model -> getCategory();
		$data['cls'] = $this -> products_model -> getClass();
			
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2')
	    {
			
			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/adminTemplate', $data);
		}

		else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3')
	    {
			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/accTemplate', $data);
		}
		
		else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '4')
	    {
			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/bTemplate', $data);
		}
		
		else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '5')
	    {
			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/pTemplate', $data);
		}
		
		else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '6')
	    {
			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/skTemplate', $data);
		}

		else
	    {
			//If no session, redirect to login page
			$this->session->set_flashdata('error','You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	}
	
	
	
	public function raw_materials()
	{
			
			//Pagination
			$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
			$total_row = $this->products_model->getRawMatsCtr();
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 3,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'inventory/raw_materials/',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'inventory/raw_materials/',
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
   			
			$data['products'] = $this->products_model->get_product_by_rm($config['per_page'], $offset);
			
			if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2')
		    {
				
				$data['main_content'] = 'products_table';
				$this -> load -> view('includes/adminTemplate', $data);
			}
	
			else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3')
		    {
				$data['main_content'] = 'products_table';
				$this -> load -> view('includes/accTemplate', $data);
			}
			
			else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '4')
		    {
				$data['main_content'] = 'products_table';
				$this -> load -> view('includes/bTemplate', $data);
			}
			
			else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '5')
		    {
				$data['main_content'] = 'products_table';
				$this -> load -> view('includes/pTemplate', $data);
			}
			
			else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '6')
		    {
				$data['main_content'] = 'products_table';
				$this -> load -> view('includes/skTemplate', $data);
			}
	
			else
		    {
				//If no session, redirect to login page
				$this->session->set_flashdata('error','You need to be logged in to continue');
				redirect('login', 'refresh');
			}
						
	}

	public function finished_goods()
	{
				
			//Pagination
			$offset = ($this->uri->segment(3) != '' ? $this->uri->segment(3): 0);
			$total_row = $this->production_model->getFGCtr();
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 4,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'inventory/finished_goods/',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'inventory/finished_goods/',
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
   
			$data['products'] = $this->products_model->get_product_by_fg($config['per_page'], $offset);
			
						
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
		
			if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') <= '2')
		    {
				
				$data['main_content'] = 'products_table';
				$this -> load -> view('includes/adminTemplate', $data);
			}
	
			else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '3')
		    {
				$data['main_content'] = 'products_table';
				$this -> load -> view('includes/accTemplate', $data);
			}
			
			else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '4')
		    {
				$data['main_content'] = 'products_table';
				$this -> load -> view('includes/bTemplate', $data);
			}
			
			else if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '5')
		    {
				$data['main_content'] = 'products_table';
				$this -> load -> view('includes/pTemplate', $data);
			}
						
			else
		    {
				//If no session, redirect to login page
				$this->session->set_flashdata('error','You need to be logged in to continue');
				redirect('login', 'refresh');
			}
			
		
	}

	
	
	function search() {
		
		if($this->session->userdata('is_logged_in') && $this -> session -> userdata('user_type') == '1')
	    {
			
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
		
	
			
			$search = $this -> input -> post('search');
			redirect('products_table/search_result/'.$search);
						
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			
			
			$search = $this -> input -> post('search');
			redirect('products_table/search_result/'.$search);
			
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}

	function search_result($search) {
		
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
			$data['search'] = $this -> products_model -> search($search);
			
			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
						
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			
			
			$data['search'] = $this -> products_model -> search($search);
			
			$data['main_content'] = 'products_table';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}
	

}
?>
