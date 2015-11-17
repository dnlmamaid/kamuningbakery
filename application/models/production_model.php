<?php date_default_timezone_set('Asia/Manila');
if (!defined('BASEPATH')) exit('No direct script access allowed');

class production_model extends CI_Model{
 	
	
	/***************************************************/
	/**********      FINISHED GOODS          **********/
	/*************************************************/
	
	/**
	 * FinishedGoods Counter Function
	 */
	public function getFGCtr() {
		if($this -> session -> userdata('is_logged_in')){
			$this -> db -> where('category_ID', '1');
			return $this->db->count_all_results('products');
		}
		else{
			$this -> db -> where('category_ID', '1');
			return $this->db->count_all_results('products');
		}
	}
	
	function search($keyword) {

		if ($this -> session -> userdata('is_logged_in')) {

			$var = urldecode($keyword);
			$this -> db -> join('products', 'products.product_id = production.product_id', 'left');
			$this->db->or_like('product_Name', $var);
			$this->db->or_like('price', $var);		
			$this->db->or_like('products.description', $var);
			$query = $this->db->get('production');
			$rows = $query -> num_rows();
			$this -> session -> set_flashdata('search', $rows . ' matching record(s) found.');
			return $query -> result();
		}

	}
	
	
	
	function create_batch($code)
    {
	    
		$prod = array(
			'batch_id' => $code,
			'user_id'	=> $this->session->userdata('user_id'),
			'date_produced'=> date('Y-m-j H:i:s'),
			'net_produced_qty'=> '0',
			'net_production_cost'=> '0',
		);
			  
		$this->db->insert('production', $prod);
		
		$this->session->set_flashdata('success','You have successfully created a production batch');
			
		$remark_id = $this->db->insert_id();
			
		$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Production',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'Created a Production Batch',
				'date_created'=> date('Y-m-j H:i:s'),
		);
				
		$this->db->insert('audit_trail', $audit);
	}
	
	function add_to_batch($code)
    {		
		$this->db->where('product_Name',$this->input->post('product_Name'));
		$val = $this->db->get('products');
		//IF PRODUCT IS NOT NEW
		if($val->num_rows() == 1){
			
			$ctr = 0;	
			$total = 0;
			$net_cost = 0;
			//Gets Product ID 			
			$this->db->select('product_id');
			$this->db->from('products');
			$this->db->where('product_Name', $this->input->post('product_Name'));
			$pid = $this->db->get()->row('product_id');
			
			//Stores Ingredients in an array			
			$this->db->where('id_for', $pid);
			$q = $this->db->get('ingredients');
			
			foreach($q->result() as $row){
					
				$rm = $row->product_id;
				$unit = $row->ingredient_qty/$row->qty_can_produce;
				$qty = $unit * $this->input->post('quantity');
					
				//Gets Raw Material & Subtracts the amount used for production 			
				$this->db->select('current_count');
				$this->db->from('products');
				$this->db->where('product_id', $rm);
				$oldqty = $this->db->get()->row('current_count');
				$nqty = ($oldqty - $qty);
					
				if($nqty < 0){
					$ctr ++;
				}
			}
			
			if($ctr == '0'){
				
				$this->db->where('id_for', $pid);
				$q = $this->db->get('ingredients');
			
		    	foreach($q->result() as $row)
				{
					$rm = $row->product_id;
					
					//multiplies the ingredient qty to times of production
					$qty = $row->ingredient_qty * $this->input->post('quantity');
						
					//Gets Raw Material & Subtracts the amount used for production 			
					$this->db->select('current_count');
					$this->db->from('products');
					$this->db->where('product_id', $rm);
					$oldqty = $this->db->get()->row('current_count');
					$nqty = ($oldqty - $qty);
						
					//Gets Total Cost Per Unit of Raw Materials
					$this->db->select('price');
					$this->db->from('products');
					$this->db->where('product_id', $rm);
					$price = $this->db->get()->row('price');
					
					//total production cost of product (sum of price of raw materials per unit)  
					$total = $total + $price;
					
					//price of raw materials * number of units used for production
					$cost = $price * $qty;
					
					$net_cost = $net_cost + $cost;
						
					//Updates Quantity of Raw Materials Used
					$process = array(
						'current_count' => $nqty,
					);
							
					$this->db->where('product_id', $rm);
					$this->db->update('products', $process);
					
					$qcp = $row->qty_can_produce;
									
				}
				
				//Get the Current Count of The Product to be produced and adds the number of units produced
				$this->db->select('current_count');
				$this->db->from('products');
				$this->db->where('product_id', $pid);
				$oldc = $this->db->get()->row('current_count');
				
				$nc = $oldc + ($qcp * $this->input->post('quantity'));
				
				//total = 4.932/24(inputpost)
				//per unit = 0.224
				//Gets the price per unit of product produced
				$p = $total / $this->input->post('quantity');
					
				$data = array(
					'current_count' => $nc,
			    );
				
				$this->db->where('product_id', $pid);
				$this->db->update('products', $data);
								
				$batch = array(
					'product_id'			=> $pid,
					'batch_reference'		=> $code,
					'previous_count'		=> $oldc,
					'units_produced'		=> $this->input->post('quantity'),
					'production_cpu'		=> $total,
					'total_production_cost'	=> $net_cost,
					
				);
				
				$this->db->insert('production_batch', $batch);
				
				$this->db->select('net_produced_qty');
				$this->db->from('production');
				$this->db->where('batch_id', $code);
				$onpq = $this->db->get()->row('net_produced_qty');
				$nnpq = (($onpq) + $this->input->post('quantity'));
				
				$this->db->select('net_production_cost');
				$this->db->from('production');
				$this->db->where('batch_id', $code);
				$onpc = $this->db->get()->row('net_production_cost');
				$nnpc = (($onpc) + $net_cost);
				
				$prod = array(
					'net_produced_qty'		=> $nnpq,
					'net_production_cost'	=> $nnpc,
				);
			
				$this->db->where('batch_id', $code);
				$this->db->update('production', $prod);
				
				$audit = array(
					'user_id'	=> $this->session->userdata('user_id'),
					'module'	=> 'Production',
					'remark_id'	=> $pid,
					'remarks'	=> 'Produced a product',
					'date_created'=> date('Y-m-j H:i:s'),
				);
					
				$this->db->insert('audit_trail', $audit);
		
				$this->session->set_flashdata('success','Successfully Produced Product.');
			}

			else{
				
				$this->session->set_flashdata('error','Production Failed. 1 or more Raw Materials required for production is insufficient.');
			}
			
			
		}
		
		//IF PRODUCT IS NEW
		else{
				
			$ctr = 0;					
			$total = 0;
			$net_cost = 0;
			foreach($_POST['rm_ID'] as $val => $rm){
				//Gets Raw Material 			
				$this->db->select('current_count');
				$this->db->from('products');
				$this->db->where('product_id', $rm);
				$oldqty = $this->db->get()->row('current_count');
				$nqty = (($oldqty) - $_POST['qpu'][$val]);
					
				if($nqty < 0){
					$ctr ++;
				}
			}
			
			if($ctr == '0'){
				foreach($_POST['rm_ID'] as $val => $rm){
				    //Gets Raw Material 			
					$this->db->select('current_count');
					$this->db->from('products');
					$this->db->where('product_id', $rm);
					$oldqty = $this->db->get()->row('current_count');
					$nqty = (($oldqty) - $_POST['qpu'][$val]);
					$qty = $_POST['qpu'][$val];
													
					//Gets Total Cost of Raw Mats Per Unit
					$this->db->select('price');
					$this->db->from('products');
					$this->db->where('product_id', $rm);
					$price = $this->db->get()->row('price');
					
					//multiplies the price per unit with the quantity used on production divided by the number of units produced
					//0.042 * 544 / 24
					//0.078php/ml * 120ml = 9.36 php / 24 pcs = 0.39 php per 24 pcs of milk
					//0.952 flour
					//0.1875 egg
					//0.529 white sugar
					//0,4754 butter
					
					//total production cost of product (sum of price of raw materials per unit)  
					$total = $total + $price;
					
					//price of raw materials * number of units used for production
					$cost = $price * $qty;
					
					$net_cost = $net_cost + $cost;
					
					//Updates Quantity	
					$process = array(
						'current_count' => $nqty,
					);
										
					$this->db->where('product_id', $rm);
					$this->db->update('products', $process);
				}
				 
				//price per unit
				
				$p = $total / $net_cost;
				
				$data = array(
					'product_Name' => $this->input->post('product_Name'),
					'current_count' => $this->input->post('quantity'),
					'holding_cost' => '0',
					'price' => $p,
					'sale_Price' => ($p * 2),
					'category_ID' => '1',
					'class_ID' => $this->input->post('class_ID'),
					'description' => $this->input->post('description'),
					'um' => $this->input->post('um'),
					'date_created'=> date('Y-m-j H:i:s'),
					'product_status' => '1',
		        );
				  
				$this->db->insert('products', $data);
				$this->session->set_flashdata('success','You have successfully produced a new product');
				
				$remark_id = $this->db->insert_id();
				
				foreach($_POST['rm_ID'] as $val => $rm)
				{
					$ingr = array(
						'id_for' => $remark_id,
						'product_id' => $rm,
						'ingredient_ctr' => $val,
						'ingredient_qty' => $_POST['qpu'][$val],
						'qty_can_produce' => $this->input->post('quantity'),
					);
					
					$this->db->insert('ingredients', $ingr);
					
				}
				
				$batch = array(
					'product_id'			=> $remark_id,
					'batch_reference'		=> $code,
					'previous_count'		=> '0',
					'units_produced'		=> $this->input->post('quantity'),
					'production_cpu'		=> $total,
					'total_production_cost'	=> $net_cost,
					
				);
				
				$this->db->insert('production_batch', $batch);
				
				$this->db->select('net_produced_qty');
				$this->db->from('production');
				$this->db->where('batch_id', $code);
				$onpq = $this->db->get()->row('net_produced_qty');
				$nnpq = (($onpq) + $this->input->post('quantity'));
				
				$this->db->select('net_production_cost');
				$this->db->from('production');
				$this->db->where('batch_id', $code);
				$onpc = $this->db->get()->row('net_production_cost');
				$nnpc = (($onpc) + $net_cost);
				
				$prod = array(
					'net_produced_qty'		=> $nnpq,
					'net_production_cost'	=> $nnpc,
				);
			
				$this->db->where('batch_id', $code);
				$this->db->update('production', $prod);
				
				$audit = array(
					'user_id'	=> $this->session->userdata('user_id'),
					'module'	=> 'Production',
					'remark_id'	=> $remark_id,
					'remarks'	=> 'Produced a new product',
					'date_created'=> date('Y-m-j H:i:s'),
					
				);
				
				$this->db->insert('audit_trail', $audit);
				
			}

			else{
				$this->session->set_flashdata('error','Production Failed. 1 or more Raw Materials required for production is insufficient.');
			}
			/*
			$this->db->trans_begin();
			try{
				
				foreach($_POST['rm_ID'] as $val => $rm){
				    //Gets Raw Material 			
					$this->db->select('current_count');
					$this->db->from('products');
					$this->db->where('product_id', $rm);
					$oldqty = $this->db->get()->row('current_count');
					$nqty = (($oldqty) - $_POST['qpu'][$val]);
						
					//Gets Total Cost Per Unit
					$this->db->select('price');
					$this->db->from('products');
					$this->db->where('product_id', $rm);
					$price = $this->db->get()->row('price');
					$total = ($price + $total);
					
					if($nqty > 0){
						//Updates Quantity	
						$process = array(
							'current_count' => $nqty,
						);
										
						$this->db->where('product_id', $rm);
						$this->db->update('products', $process);
					}
				}
				$this->db->trans_commit();
			}
			
			catch(Exception $e){
			  	$this->db->trans_rollback();
			  	$this->session->set_flashdata('error','Production Failed. 1 or more Raw Materials required for production is insufficient.');
				exit;
			}
			*/
			
																								
			
				//$qty = explode(' ', $this->input->post('qpu'));
				//$rm = explode(' ', $this->input->post('rm_ID'));
				

			       
		}
	}

	
	/**
	 * get Purchase Order function
	 * 
	 */
	function getBatch($code)
	{
		$this -> db -> where('production.batch_id', $code);
		$this -> db -> join('users', 'users.id = production.user_id', 'left');
		$this -> db -> join('production_batch', 'production_batch.batch_reference = production.batch_id', 'left');
		$q = $this -> db -> get('production');
		
		if($q->num_rows()){
			return $q -> result();
		}
		
		else{
			return false;	
		}
	}
	
	/**
	 * get Orders function
	 * used for multiple orders in a single purchase
	 */
	function getProcessed($code)
	{
		
		$this -> db -> where('batch_reference', $code);
		$this -> db -> join('products', 'products.product_id = production_batch.product_id', 'left');
		$q = $this -> db -> get('production_batch');
		
		if($q->num_rows()){
			return $q -> result();
		}
		
		else{
			return false;	
		}
	}
	
	/**
	 * get Purchase Order Record function
	 * gets specific purchase order record
	 */
	function getProd_Rec($id)
	{
		
		$this -> db -> where('pb_id', $id);
		$this -> db -> join('products', 'products.product_id = production_batch.product_id', 'left');
		$this -> db -> join('production', 'production.batch_id = production_batch.batch_reference', 'left');
		$this -> db -> join('users', 'users.id = production.user_id', 'right');
		$q = $this -> db -> get('production_batch');
		
		if($q->num_rows()){
			return $q -> result();
		}
		
		else{
			return false;	
		}
	}
	
	function get_total_pc($code){
		
		$this->db->where('batch_reference',$code);
		$this->db->select('sum(total_production_cost) as total');
		$q = $this->db->get('production_batch');
		return $q->row();
		
	}
	
    /**
	 * Get FG Function
	 *	get Goods produced from the past for reproduction
	 */
	function getFG() {
		$this->db->where('category_ID', '1');
		$q = $this->db->get('products');
		$data = $q -> result_array();
		return $data;
	}
	
	//gets product id from production batch id
	public function get_pid_from_production($id){
		
		$this->db->select('product_id');
		$this->db->from('production_batch');
		$this->db->where('pb_id', $id);

		return $this->db->get()->row('product_id');
		
	}

	
}

