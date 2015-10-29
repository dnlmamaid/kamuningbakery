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
				
				//Gets Total Cost
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
			
			$prod_cost = $price * $this->input->post('quantity');
			$remark_id = $this->db->insert_id();
			
			foreach($_POST['rm_ID'] as $val => $rm)
			{
				$ingr = array(
					'id_for' => $remark_id,
					'product_id' => $rm,
					'ingredient_qty' => $_POST['qpu'][$val],
				);
				
				$this->db->insert('ingredients', $ingr);
				
			}
			
			$production = array(
				'product_id' => $remark_id,
				'total_produced'		=> $this->input->post('quantity'),
				'total_production_cost'	=> $prod_cost,
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
	function produce_FG($id)
    {
    	foreach($_POST['rm_ID'] as $val => $rm)
		{
			$this->db->select('price');
			$this->db->from('products');
			$this->db->where('product_id', $id);
			$oldprice = $this->db->get()->row('price');
	    	$newprice = ($this->input->post('price') + $oldprice)/2;
				
			$this->db->select('quantity');
			$this->db->from('products');
			$this->db->where('product_id', $id);
			$oldquantity = $this->db->get()->row('quantity');
	    	$newquantity = $this->input->post('quantity') + $oldquantity;
				
			$data = array(
				'current_count' => $newquantity,
			);
			
			$this->db->where('product_ID', $id);
			$this->db->update('products', $data);
		}
			
		$total = $this->input->post('price') * $this->input->post('quantity');
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Production',
			'remark_id'	=> $id,
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
			
			return $this->db->count_all_results('production');
		}
		else{
			return $this->db->count_all_results('production');
		}
	}
	
	function get_total()
	{
		//$this->db->where('order_reference',$code);
		$this->db->select('sum(total_production_cost) as total');
		$q = $this->db->get('production');
		return $q->row();
		
	}

    
}
