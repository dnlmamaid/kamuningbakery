<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class products extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		$this -> load -> model('products_model');
	}

	public function index($offset = 0) {
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
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
			'base_url' => base_url().'products/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'products',
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
			
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			$data['notif'] = $this -> users_model -> getNotif();//gets member applicants
			$data['notif_n_ctr'] = $this -> users_model -> getNotifNCtr();//ctr for member applicants

			$data['main_content'] = 'products_page';
			$this -> load -> view('includes/adminTemplate', $data);
			
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
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
			'base_url' => base_url().'products/page',
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'products',
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
			
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs			
			
			$data['main_content'] = 'products_page';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}
	

	public function category($cid)
	{
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
			
			//Pagination
			$offset = ($this->uri->segment(4) != '' ? $this->uri->segment(4): 0);
			$total_row = $this->products_model->getProductsCtrbyCat($cid);
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 4,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'products/category/'.$cid,
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'products/category/'.$cid,
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
   
			$data['products'] = $this->products_model->get_product_by_category($config['per_page'], $offset, $cid);
			
			
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			$data['notif'] = $this -> users_model -> getNotif();//gets member applicants
			$data['notif_n_ctr'] = $this -> users_model -> getNotifNCtr();//ctr for member applicants
			
			
			
			$data['main_content'] = 'products_page';
			$this -> load -> view('includes/adminTemplate', $data);
			
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			//Pagination
			$offset = ($this->uri->segment(4) != '' ? $this->uri->segment(4): 0);
			$total_row = $this->products_model->getProductsCtrbyCat($cid);
			
			$config = array(
			'total_rows' => $total_row,
			'per_page' => 8, 
			'uri_segment' => 4,
			'num_links' => 1,
			'first_link' => 'First',
			'last_link'=> 'Last',
			'base_url' => base_url().'products/category/'.$cid,
			'suffix' => '?=ref'.http_build_query($_GET, '', "&"),
			'first_url' => base_url().'products/category/'.$cid,
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
   
			$data['products'] = $this->products_model->get_product_by_category($config['per_page'], $offset, $cid);
			
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();

			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs

			$data['main_content'] = 'products_page';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	
	public function categories()
	{
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
			
			$data['cat'] = $this -> products_model -> getCategoryFP();
			
			
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			$data['notif'] = $this -> users_model -> getNotif();//gets member applicants
			$data['notif_n_ctr'] = $this -> users_model -> getNotifNCtr();//ctr for member applicants

			$data['main_content'] = 'category_table';
			$this -> load -> view('includes/adminTemplate', $data);
			
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			
			$this->session->set_flashdata('message','You don\'t have permission to access this page.');
			redirect('dashboard', 'refresh');
			
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function classes()
	{
		
			
			$data['cls'] = $this -> products_model -> getClassFP();
			
	

			$data['main_content'] = 'class_table';
			$this -> load -> view('includes/adminTemplate', $data);
			
		

	}

	public function create_new_product() {
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();

			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			$data['notif'] = $this -> users_model -> getNotif();//gets member applicants
			$data['notif_n_ctr'] = $this -> users_model -> getNotifNCtr();//ctr for member applicants

			$data['main_content'] = 'new_product_page';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('profile', 'refresh');
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function update($id)
	{
		$this -> products_model -> update_product($id);
		redirect('products/edit_product/'.$id, 'refresh');
		
	}
	
	public function updateClass($id)
	{
		$this -> products_model -> update_class($id);
		redirect('products/edit_class/'.$id, 'refresh');
		
	}
	
	public function updateCat($id)
	{
		$this -> products_model -> update_cat($id);
		redirect('products/edit_category/'.$id, 'refresh');
		
	}

	public function view_product() {
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {

			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			$data['notif'] = $this -> users_model -> getNotif();//gets member applicants
			$data['notif_n_ctr'] = $this -> users_model -> getNotifNCtr();//ctr for member applicants
			
			$pid = $this -> uri -> segment(3);
			$data['rec'] = $this -> products_model -> get_product_rec($pid);
			$data['products'] = $this -> products_model -> getSimilarProducts($pid);
			
			$data['main_content'] = 'view_product_page';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);
			
			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			
			$pid = $this -> uri -> segment(3);
			$data['rec'] = $this -> products_model -> get_product_rec($pid);
			$data['products'] = $this -> products_model -> getSimilarProducts($pid);	
			
			
			$data['main_content'] = 'view_product_page';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function edit_product() {
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			$data['notif'] = $this -> users_model -> getNotif();//gets member applicants
			$data['notif_n_ctr'] = $this -> users_model -> getNotifNCtr();//ctr for member applicants
			
			$pid = $this -> uri -> segment(3);
			$data['rec'] = $this -> products_model -> get_product_rec($pid);
			
			$data['main_content'] = 'view_product_page';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('products', 'refresh');
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function edit_class() {
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			$data['notif'] = $this -> users_model -> getNotif();//gets member applicants
			$data['notif_n_ctr'] = $this -> users_model -> getNotifNCtr();//ctr for member applicants
			
			$clid = $this -> uri -> segment(3);
			$data['rec'] = $this -> products_model -> get_class_rec($clid);
			
			$data['main_content'] = 'view_class_page';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('products', 'refresh');
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function edit_category() {
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
		
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			$data['notif'] = $this -> users_model -> getNotif();//gets member applicants
			$data['notif_n_ctr'] = $this -> users_model -> getNotifNCtr();//ctr for member applicants
			
			$cid = $this -> uri -> segment(3);
			$data['rec'] = $this -> products_model -> get_cat_rec($cid);
			
			$data['main_content'] = 'view_cat_page';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('products', 'refresh');
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}

	}

	public function create() {
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
			$this -> products_model -> addProduct();
			redirect('products/create_new_product', 'refresh');
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('profile', 'refresh');
		}
	}

	public function add_category() {
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
			$this -> products_model -> addCategory();
			redirect($this->agent->referrer(), 'refresh');
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('profile', 'refresh');
		}
	}
	
	public function add_class() {
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
			$this -> products_model -> addClass();
			redirect($this->agent->referrer(), 'refresh');
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$this -> session -> set_flashdata('message', 'You don\'t have permission to access this page.');
			redirect('profile', 'refresh');
		}
	}
	
	
	public function do_upload($id) {
		if ($this -> input -> post('upload')) {
			
			$config = array(
				'upload_path' => $this->image_path,
				'allowed_types' => 'gif|jpg|png',
				'max_size' => '10024',
				'quality' => '100%',
				'remove_spaces' => TRUE,
			);
			
			$this -> load -> library('upload', $config);
			$this->upload->initialize($config);
			
			if (!$this -> upload -> do_upload()){
				
				$error = array(
					'error' => $this -> upload -> display_errors()
				);
				
				redirect('products/edit_product/'.$pid, $error);
			} 
			
			else {
				$pid = $this -> uri -> segment(3);
				$data = $this -> upload -> data();
				$this -> thumb($data);
				
				$this -> upload_model -> add_image($id);
				
				$data = array(
					'upload_data' => $this -> upload -> data()
				);
				
				redirect('products/edit_product/'.$pid, 'refresh');  
				
			}
		}
		
		else {
			redirect('products/upload');
		}
	}

	function thumb($data) {
		
		$config = array(
			'image_library' => 'gd2',
			'source_image' => $data['full_path'], 
			'new_image' => $this->thumb_path.'/'.$data['raw_name'].$data['file_ext'],
			'create_thumb' => TRUE,
			'maintain_ratio'=> TRUE,
			'width' => '250',
			'height' => '250',
		);
		$this -> load -> library('image_lib', $config);
		$this->image_lib->initialize($config);
		$this -> image_lib -> resize();
	}
	
	
	function search() {
		
		if ($this -> session -> userdata('is_logged_in') && $this -> session -> userdata('is_admin')) {
			
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			$data['notif'] = $this -> users_model -> getNotif();//gets member applicants
			$data['notif_n_ctr'] = $this -> users_model -> getNotifNCtr();//ctr for member applicants
	
			
			$search = $this -> input -> post('search');
			redirect('products/search_result/'.$search);
						
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
			
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			
			$search = $this -> input -> post('search');
			redirect('products/search_result/'.$search);
			
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
			
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			$data['notif'] = $this -> users_model -> getNotif();//gets member applicants
			$data['notif_n_ctr'] = $this -> users_model -> getNotifNCtr();//ctr for member applicants
				
			$data['search'] = $this -> products_model -> search($search);
			
			$data['main_content'] = 'products_page';
			$this -> load -> view('includes/adminTemplate', $data);
		} else if ($this -> session -> userdata('is_logged_in') && !$this -> session -> userdata('is_admin')) {
			$data['cat'] = $this -> products_model -> getCategory();
			$data['cls'] = $this -> products_model -> getClass();
						
			/* User Data */
			$id = $this -> session -> userdata('user_id');
			$email = $this -> session -> userdata('email');
			$data['log'] = $this -> users_model -> get_log($id);

			/* Notification */
			
			$data['nmsgs'] = $this -> users_model -> getNMail($email);//gets unread msgs
			$data['notif_m_ctr'] = $this -> users_model -> getMailNCtr($email);//ctr for unread msgs
			
			$data['search'] = $this -> products_model -> search($search);
			
			$data['main_content'] = 'products_page';
			$this -> load -> view('includes/memberTemplate', $data);
		} else {
			//If no session, redirect to login page
			$this -> session -> set_flashdata('message', 'You need to be logged in to continue');
			redirect('login', 'refresh');
		}
	
	}
	
	public function delete($id)
	{
		$this -> products_model -> remove($id);
		redirect($this->agent->referrer(), 'refresh');
	}
	
	public function deleteClass($id)
	{
		$this -> products_model -> remove_class($id);
		redirect('products/classes', 'refresh');
	}
	
	public function deleteCat($id)
	{
		$this -> products_model -> remove_cat($id);
		redirect('products/categories', 'refresh');
	}
}
?>
