<?php date_default_timezone_set('Asia/Manila');
if (!defined('BASEPATH')) exit('No direct script access allowed');

class production_model extends CI_Model{
 	
	
	/***************************************************/
	/**********      FINISHED GOODS          **********/
	/*************************************************/
	/**
	 * Produce Finished Good Function
	 * creates Finished Good from raw materials
	 */
	function produce_newFG()
    {
    	
		$this->db->where('product_Name',$this->input->post('product_Name'));
		$this->db->where('supplier_ID','1');
		$this->db->where('category_ID','1');
		
		$val = $this->db->get('products');
		
		if($val->num_rows() == 1){
			$this->session->set_flashdata('error','Product already exist. If you want to produce more go to the product page.');
		}

		else{
			
			$total = 0;
			foreach($_POST['rm_ID'] as $val => $rm)
			{
				
				//Gets Raw Material 			
				$this->db->select('current_count');
				$this->db->from('products');
				$this->db->where('product_id', $rm);
				$oldqty = $this->db->get()->row('current_count');
				$nqty = (($oldqty) - ($this->input->post('quantity') * $_POST['qpu'][$val]));
				
				//Gets Total Cost Per Unit
				$this->db->select('price');
				$this->db->from('products');
				$this->db->where('product_id', $rm);
				$price = $this->db->get()->row('price');
				$total = ($price + $total);
				
				//Updates Quantity	
				$process = array(
					'current_count' => $nqty,
				);
					
				$this->db->where('product_id', $rm);
				$this->db->update('products', $process);
						
			}
			
			//$qty = explode(' ', $this->input->post('qpu'));
			//$rm = explode(' ', $this->input->post('rm_ID'));
			
			
			$data = array(
				'product_Name' => $this->input->post('product_Name'),
				'current_count' => $this->input->post('quantity'),
				'holding_cost' => $this->input->post('holding_cost'),
				'price' => $total,
				'sale_Price' => $total,
				'supplier_ID' => '1',
				'category_ID' => '1',
				'class_ID' => $this->input->post('class_ID'),
				'description' => $this->input->post('description'),
				'um' => $this->input->post('um'),
				'date_created'=> date('Y-m-j H:i:s'),
				'product_status' => '1',
	        );
			  
			$this->db->insert('products', $data);
			$this->session->set_flashdata('success','You have successfully added a new product');
			
			$net_cost = $total * $this->input->post('quantity');
			$remark_id = $this->db->insert_id();
			
			foreach($_POST['rm_ID'] as $val => $rm)
			{
				$ingr = array(
					'id_for' => $remark_id,
					'product_id' => $rm,
					'ingredient_ctr' => $val,
					'ingredient_qty' => $_POST['qpu'][$val],
				);
				
				$this->db->insert('ingredients', $ingr);
				
			}
			
			$production = array(
				'product_id' => $remark_id,
				'previous_count'		=> '0',
				'total_produced'		=> $this->input->post('quantity'),
				'production_cost_pu'	=> $total,
				'net_fg_cost'			=> $net_cost,
				'date_produced'			=> date('Y-m-j H:i:s'),
				'process_status' 		=> '1',
				
			);
				
			$this->db->insert('production', $production);
			
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Production',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'Produced a new product',
				'date_created'=> date('Y-m-j H:i:s'),
				
			);
			
			$this->db->insert('audit_trail', $audit);
		}  
	}		
	
	/**
	 * Reproduce Finished Goods Function
	 * 
	 */
	function produce_FG($pid)
    {
    	$total = 0;
    	foreach($_POST['rm_ID'] as $val => $rm)
		{
			//Gets Raw Material 			
			$this->db->select('current_count');
			$this->db->from('products');
			$this->db->where('product_id', $rm);
			$oldqty = $this->db->get()->row('current_count');
			$nqty = (($oldqty) - ($this->input->post('quantity') * $_POST['qpu'][$val]));
				
			//Gets Total Cost Per Unit
			$this->db->select('price');
			$this->db->from('products');
			$this->db->where('product_id', $rm);
			$price = $this->db->get()->row('price');
			$total = ($price + $total);
				
			//Updates Quantity	
			$process = array(
				'current_count' => $nqty,
			);
					
			$this->db->where('product_id', $rm);
			$this->db->update('products', $process);
							
		}
		
		 			
		$this->db->select('current_count');
		$this->db->from('products');
		$this->db->where('product_id', $pid);
		$oldc = $this->db->get()->row('current_count');
		$nc = ($oldc) + ($this->input->post('quantity'));
			
		$data = array(				
			'current_count' => $nc,
	    );
		
		$this->db->where('product_id', $pid);
		$this->db->update('products', $data);
			
		$net_cost = $price * $this->input->post('quantity');
			
		$production = array(
			'product_id' 			=> $pid,
			'previous_count'		=> $oldc,
			'total_produced'		=> $this->input->post('quantity'),
			'production_cost_pu'	=> $total,
			'net_fg_cost'			=> $net_cost,
			'date_produced'			=> date('Y-m-j H:i:s'),
			'process_status' 		=> '1',
		);
			
		$this->db->insert('production', $production);
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Production',
			'remark_id'	=> $pid,
			'remarks'	=> 'produced a product',
			'date_created'=> date('Y-m-j H:i:s'),
		);
			
		$this->db->insert('audit_trail', $audit);

		$this->session->set_flashdata('success','Successfully Produced Product.');
	}

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

    
}

