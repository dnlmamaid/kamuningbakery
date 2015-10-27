<?php date_default_timezone_set('Asia/Manila');
if (!defined('BASEPATH')) exit('No direct script access allowed');

class purchases_model extends CI_Model{
 	
	/**
	 * get Purchase Order function
	 * used for multiple orders in a single purchase
	 */
	function getPO($code)
	{
		
		$this -> db -> where('purchase_orders.order_reference', $code);
		
		$this -> db -> join('products', 'products.product_id = purchase_orders.product_id', 'left');
		$this -> db -> join('suppliers', 'suppliers.supplier_id = products.supplier_ID', 'right');
		$this -> db -> join('product_class', 'product_class.class_id = products.class_ID', 'right');
		$this -> db -> join('purchases', 'purchases.purchase_reference = purchase_orders.order_reference', 'left');
		
		$q = $this -> db -> get('purchase_orders');
		
		if($q->num_rows()){
			return $q -> result();
		}
		
		else{
			return false;	
		}
	}
	
	function add_order($code)
    {		
		$this->db->where('product_Name',$this->input->post('product_Name'));
		$this->db->where('supplier_ID',$this->input->post('supplier_ID'));
		$this->db->where('category_ID',$this->input->post('category_ID'));
		$val = $this->db->get('products');
		
		if($val->num_rows() == 1){
			$this->session->set_flashdata('error','Product already exist. If you want to replenish a product use the Purchase Order Form');
		}

		else{
			
			$data = array(
				'product_Name' => $this->input->post('product_Name'),
				'quantity' => '0',
				'current_count' => '0',
				'price' => $this->input->post('price'),
				'sale_Price' => '0',
				'holding_cost' => $this->input->post('holding_cost'),
				'supplier_ID' => $this->input->post('supplier_ID'),
				'category_ID' => '2',
				'rm_ID' => '0',
				'qty' => '0',
				'class_ID' => $this->input->post('class_ID'),
				'description' => $this->input->post('description'),
				'um' => $this->input->post('um'),
				'date_created'=> date('Y-m-j H:i:s'),
				'product_status' => $this->input->post('product_status'),
	        );
			  
			$this->db->insert('products', $data);
			$this->session->set_flashdata('success','You have successfully added an order');
			
			$remark_id = $this->db->insert_id();
			
			$total = ($this->input->post('price') * $this->input->post('quantity'));
			
			$order = array(
				'product_id'=> $remark_id,
				'order_reference'	=> $code,
				'order_quantity'	=> $this->input->post('quantity'),
				'ppu'	=> $this->input->post('price'),
				'ordering_cost'	=> $total,				
			);
			
			$this->db->insert('purchase_orders', $order);
		        
		}
	}
	
	function get_total($code){
		
		$this->db->where('order_reference',$code);
		$this->db->select('sum(ordering_cost) as total');
		$q = $this->db->get('purchase_orders');
		return $q->row();
		
	}

	function place_order($code)
    {
    	$tc = $this->input->post('total_cost');
		$dc = $this->input->post('discount')/100;
		$tc = $tc - $dc;	
		$purchase = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'supplier_ID' => $this->input->post('supplier_id'),
			'purchase_reference'	=> $code,
			'total_cost' => $tc,
			'discount' => $this->input->post('discount'),
			'date_ordered'=> date('Y-m-j H:i:s'),
			'date_received'=> $this->input->post('date_received'),
			'po_status'=> '0',
		);
			  
		$this->db->insert('purchases', $purchase);
		
		$this->session->set_flashdata('success','You have successfully ordered the product/s');
			
		$remark_id = $this->db->insert_id();
			
		$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Purchases',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'Placed a purchase order',
				'date_created'=> date('Y-m-j H:i:s'),
		);
				
		$this->db->insert('audit_trail', $audit);
	}
	
	function purchase_order($id)
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
			'quantity' => $newquantity,
			'price' => $newprice,					
		);
		
		$this->db->where('product_ID', $id);
		$this->db->update('products', $data);
			
		$total = $this->input->post('price') * $this->input->post('quantity');
		$code = random_string('alnum',11);
			
		$purchase = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'product_id'	=> $id,
			'supplier_id'	=> $this->input->post('supplier_id'),
			'order_reference'	=> $code,
			'purchase_quantity'	=> $this->input->post('quantity'),
			'ppu'	=> $this->input->post('price'),
			'ordering_cost'	=> $total,
			'purchase_date'=> date('Y-m-j H:i:s'),
		);
			
		$this->db->insert('purchases', $purchase);
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Products',
			'remark_id'	=> $id,
			'remarks'	=> 'purchased additional product',
			'date_created'=> date('Y-m-j H:i:s'),
		);
			
		$this->db->insert('audit_trail', $audit);
	
		$this->session->set_flashdata('success','Successfully Purchased Product.');
	}

	
	
	
}