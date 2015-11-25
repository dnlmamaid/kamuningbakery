<?php date_default_timezone_set('Asia/Manila');
if (!defined('BASEPATH')) exit('No direct script access allowed');

class purchases_model extends CI_Model{
 	
	/**
	 * get Purchase Order function
	 * 
	 */
	function getPO($code)
	{
		
		$this->db->where('purchases.purchase_reference', $code);
		$this->db->join('purchase_orders', 'purchase_orders.order_reference = purchases.purchase_reference', 'left');
		$this->db->join('suppliers', 'suppliers.supplier_id = purchases.supplier_id', 'left');
		$q = $this->db->get('purchases');
		
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
	function getOrders($code)
	{
		
		$this->db->where('purchase_orders.order_reference', $code);
		
		$this->db->join('products', 'products.product_id = purchase_orders.product_id', 'left');
		$this->db->join('product_class', 'product_class.class_id = products.class_ID', 'right');
		$this->db->join('purchases', 'purchases.purchase_reference = purchase_orders.order_reference', 'left');
		
		$q = $this->db->get('purchase_orders');
		
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
	function getPOR($id)
	{
		
		$this->db->where('order_id', $id);
		
		$this->db->join('products', 'products.product_id = purchase_orders.product_id', 'left');
		$this->db->join('product_class', 'product_class.class_id = products.class_ID', 'right');
		$this->db->join('purchases', 'purchases.purchase_reference = purchase_orders.order_reference', 'left');
		$this->db->join('suppliers', 'suppliers.supplier_id = purchases.supplier_ID', 'right');
		
		$q = $this->db->get('purchase_orders');
		
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
		$val = $this->db->get('products');
		
		if($val->num_rows() == 1){
			$this->session->set_flashdata('Error','Product Alread Exists Use The Add Old Product Form for ordering old products');
		}else{
			
			$data = array(
				'product_Name' => $this->input->post('product_Name'),
				'current_count' => '0',
				'price' => $this->input->post('price'),
				'sale_Price' => '0',
				'holding_cost' => $this->input->post('holding_cost'),
				'ro_lvl' => '0',
				'category_ID' => '2',
				'class_ID' => $this->input->post('class_ID'),
				'description' => $this->input->post('description'),
				'um' => $this->input->post('um'),
				'date_created'=> date('Y-m-j H:i:s'),
				'product_status' => '0',
			);
				  
			$this->db->insert('products', $data);
			$this->session->set_flashdata('success','You have successfully added an order');
				
			$remark_id = $this->db->insert_id();
			
			$total = ($this->input->post('price') * $this->input->post('quantity'));
			
			$order = array(
				'product_id'=> $remark_id,
				'order_reference'	=> $code,
				'qty_before_order'	=> '0',
				'order_quantity'	=> $this->input->post('quantity'),
				'ppu'	=> $this->input->post('price'),
				'ordering_cost'	=> $total,				
			);
			
			$this->db->insert('purchase_orders', $order);
				
			$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Purchases',
				'remark_id'	=> $remark_id,
				'remarks'	=> 'Added a product on a purchase order',
				'date_created'=> date('Y-m-j H:i:s'),
			);
	
			$this->db->insert('audit_trail', $audit);
		}
	}

	function add_order_o($code)
	{
		$pid = $this->input->post('product_id');
		
		$this->db->select('current_count');
		$this->db->from('products');
		$this->db->where('product_id', $pid);
		$cc = $this->db->get()->row('current_count');
    	
		
		$total = ($this->input->post('price') * $this->input->post('quantity'));

		$order = array(
			'product_id'		=> $pid,
			'order_reference'	=> $code,
			'qty_before_order'	=> $cc,
			'order_quantity'	=> $this->input->post('quantity'),
			'ppu'	=> $this->input->post('price'),
			'ordering_cost'	=> $total,				
		);
			
		$this->db->insert('purchase_orders', $order);
					
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Purchases',
			'remark_id'	=> $pid,
			'remarks'	=> 'Added a product on a purchase order',
			'date_created'=> date('Y-m-j H:i:s'),
		);					
		$this->db->insert('audit_trail', $audit);		
	}
	
	function get_total($code){
		
		$this->db->where('order_reference',$code);
		$this->db->select('sum(ordering_cost) as total');
		$q = $this->db->get('purchase_orders');
		return $q->row();
		
	}

	function create_po($code)
    {
	    
		$purchase = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'supplier_id' => $this->input->post('supplier_id'),
			'purchase_reference'	=> $code,
			'total_cost' => '0',
			'discount' => '0',
			'date_ordered'=> date('Y-m-j H:i:s'),
			'date_received'=> $this->input->post('date_received'),
			'po_status'=> '0',
		);
			  
		$this->db->insert('purchases', $purchase);
		
		$this->session->set_flashdata('success','You have successfully created a purchase order');
			
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


	function update_po($id)
    {
    	$order = array(
			'order_reference' => $this->input->post('order_reference'),
		);
			  
		$this->db->where('order_reference', $id);    
		$this->db->update('purchase_orders', $order);
		
	    
		$purchase = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'supplier_id' => $this->input->post('supplier_id'),
			'date_ordered'=> $this->input->post('date_ordered'),
			'date_received'=> $this->input->post('date_received'),
			'purchase_reference' => $this->input->post('order_reference'),
		);
			  
		$this->db->where('purchase_reference', $id);  
		$this->db->update('purchases', $purchase);
		
		
		
		
		$this->session->set_flashdata('success','You have successfully updated the purchase order');
			
		$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Purchases',
				'remark_id'	=> $id,
				'remarks'	=> 'Updated a purchase order',
				'date_created'=> date('Y-m-j H:i:s'),
		);
				
		$this->db->insert('audit_trail', $audit);
	}
	
	
	function update_o($id)
    {
	    $oc = $this->input->post('order_quantity') * $this->input->post('price');
		$order = array(
			'order_quantity' => $this->input->post('order_quantity'),
			'ppu' => $this->input->post('price'),
			'ordering_cost'=> $oc,
			
		);
			  
		$this->db->where('order_id', $id);  
		$this->db->update('purchase_orders', $order);
		
		$this->session->set_flashdata('success','You have successfully updated the order');
			
		$audit = array(
				'user_id'	=> $this->session->userdata('user_id'),
				'module'	=> 'Purchases',
				'remark_id'	=> $id,
				'remarks'	=> 'Updated a order info',
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
			'current_count' => $newquantity,
			'price' => $newprice,					
		);
		
		$this->db->where('product_id', $id);
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

	
	function receive_order($id)
    {
    	
		$this->db->select('order_quantity');
		$this->db->from('purchase_orders');
		$this->db->where('order_id', $id);
		$oq = $this->db->get()->row('order_quantity');
		
		$this->db->select('qty_received');
		$this->db->from('purchase_orders');
		$this->db->where('order_id', $id);
		$qr = $this->db->get()->row('qty_received');
		
		$noq = $oq - $qr;
				
		if($this->input->post('order_quantity') <= $noq){
		
			if($this->input->post('order_quantity') == $noq)
			{
				$this->db->select('current_count');
				$this->db->from('products');
				$this->db->where('product_id', $this->input->post('product_id'));
				$oldquantity = $this->db->get()->row('current_count');
		    	$newquantity = $oldquantity + $this->input->post('order_quantity');
				
				$this->db->select('price');
				$this->db->from('products');
				$this->db->where('product_id', $this->input->post('product_id'));
				$prce = $this->db->get()->row('price');
					
				$np = ($prce + $this->input->post('ppu'))/2;
				
				$receive = array(
					'price' => $np,
					'current_count'	=> $newquantity,
					'product_status'=> '1',
				);
				
			    $this->db->where('product_id',$this->input->post('product_id'));
				$this->db->update('products', $receive);
				
				
				$this->db->select('total_cost');
				$this->db->from('purchases');
				$this->db->where('purchase_reference', $this->input->post('order_reference'));
				$oamt = $this->db->get()->row('total_cost');
		    	$newamt = $oamt + $this->input->post('ordering_cost');
				
				$purchase = array(
					'total_cost'	=> $newamt,
				);
				
				$this->db->where('purchase_reference',$this->input->post('order_reference'));
				$this->db->update('purchases', $purchase);
				
			    $this->session->set_flashdata('success','Product received and updated');
				
				$order = array(			
					'order_status'=> '1',
					'qty_received'=> ($qr + $this->input->post('order_quantity')),
				);
						
				$this->db->where('order_id',$id);
				$this->db->update('purchase_orders', $order);	
				
				$audit = array(
					'user_id'	=> $this->session->userdata('user_id'),
					'module'	=> 'Purchases',
					'remark_id'	=> $id,
					'remarks'	=> 'received product',
					'date_created'=> date('Y-m-j H:i:s'),
						
				);
					
				$this->db->insert('audit_trail', $audit);
			}

			else if($noq - $this->input->post('order_quantity') == '0'){
												
				$this->db->select('current_count');
				$this->db->from('products');
				$this->db->where('product_id', $this->input->post('product_id'));
				$oldquantity = $this->db->get()->row('current_count');
		    	$newquantity = $oldquantity + $this->input->post('order_quantity');
				
				$this->db->select('price');
				$this->db->from('products');
				$this->db->where('product_id', $this->input->post('product_id'));
				$prce = $this->db->get()->row('price');
					
				$np = ($prce + $this->input->post('ppu'))/2;
				
				$receive = array(
					'price' => $np,
					'current_count'	=> $newquantity,
					'product_status'=> '1',
				);
				
			    $this->db->where('product_id',$this->input->post('product_id'));
				$this->db->update('products', $receive);
				
				
				$this->db->select('total_cost');
				$this->db->from('purchases');
				$this->db->where('purchase_reference', $this->input->post('order_reference'));
				$oamt = $this->db->get()->row('total_cost');
		    	$newamt = $oamt + $this->input->post('ordering_cost');
				
				$purchase = array(
					'total_cost'	=> $newamt,
				);
				
				$this->db->where('purchase_reference',$this->input->post('order_quantity'));
				$this->db->update('purchases', $purchase);
				
			    $this->session->set_flashdata('success', 'Product received and updated');
				
				$order = array(			
					'order_status'=> '1',
					'qty_received' => $oq,
				);
						
				$this->db->where('order_id',$id);
				$this->db->update('purchase_orders', $order);	
				
				$audit = array(
					'user_id'	=> $this->session->userdata('user_id'),
					'module'	=> 'Purchases',
					'remark_id'	=> $id,
					'remarks'	=> 'received product',
					'date_created'=> date('Y-m-j H:i:s'),
						
				);			
				$this->db->insert('audit_trail', $audit);
	
				
			}
			
			else{
						
				$nqr = $qr + $this->input->post('order_quantity');
				
				$this->db->select('current_count');
				$this->db->from('products');
				$this->db->where('product_id', $this->input->post('product_id'));
				$oldquantity = $this->db->get()->row('current_count');
		    	$newquantity = $oldquantity + $this->input->post('order_quantity');
				
				$this->db->select('price');
				$this->db->from('products');
				$this->db->where('product_id', $this->input->post('product_id'));
				$prce = $this->db->get()->row('price');
					
				$np = ($prce + $this->input->post('ppu'))/2;
				
				$receive = array(
					'price' => $np,
					'current_count'	=> $newquantity,
					'product_status'=> '1',
				);
				
			    $this->db->where('product_id',$this->input->post('product_id'));
				$this->db->update('products', $receive);											
				
			    $this->session->set_flashdata('success', $this->input->post('order_quantity').' Amount of product received and updated');
				
				$order = array(			
					'order_status'=> '0',
					'qty_received' => $nqr,
				);
						
				$this->db->where('order_id',$id);
				$this->db->update('purchase_orders', $order);	
				
				$audit = array(
					'user_id'	=> $this->session->userdata('user_id'),
					'module'	=> 'Purchases',
					'remark_id'	=> $id,
					'remarks'	=> 'received product',
					'date_created'=> date('Y-m-j H:i:s'),
						
				);
					
				$this->db->insert('audit_trail', $audit);
				
			}
		}
		else{
			$this->session->set_flashdata('error','You cannot receive more than you have ordered.');
		}

    }
	
	function remove_order($id)
    {
	    $this->db->where('order_id',$id);
		$query = $this->db->delete('purchase_orders');
	    $this->session->set_flashdata('success','Entry Deleted.');
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Purchases',
			'remark_id'	=> $id,
			'remarks'	=> 'deleted a product order',
			'date_created'=> date('Y-m-j H:i:s'),
				
		);
			
		$this->db->insert('audit_trail', $audit);
    }
	
	
	function receive_po($id)
    {
    	$receive = array(
			'po_status'	=> '1',
			'date_received'=> date('Y-m-j H:i:s'),
		);
		
	    $this->db->where('purchase_id',$id);
		$this->db->update('purchases', $receive);
	    $this->session->set_flashdata('success','Cleared the purchase order');
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Purchases',
			'remark_id'	=> $id,
			'remarks'	=> 'Cleared a purchase order',
			'date_created'=> date('Y-m-j H:i:s'),
				
		);
			
		$this->db->insert('audit_trail', $audit);
    }
	
	
	function remove_purchase($id)
    {
	    $this->db->where('purchase_id',$id);
		$query = $this->db->delete('purchases');
	    $this->session->set_flashdata('success','Entry Deleted.');
			
		$audit = array(
			'user_id'	=> $this->session->userdata('user_id'),
			'module'	=> 'Purchases',
			'remark_id'	=> $id,
			'remarks'	=> 'deleted a purchase order',
			'date_created'=> date('Y-m-j H:i:s'),
				
		);
			
		$this->db->insert('audit_trail', $audit);
    }
	
}