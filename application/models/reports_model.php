<?php
Class reports_model extends CI_Model {

	/******* CRUD *******************/

	/*
	 * Get all Audit Trail
	 */
	public function getAudit($limit, $start) {
		$this->db->join('users','users.id = audit_trail.user_id','left');
		$this -> db -> limit($limit, $start);
		$this -> db -> order_by('date_created', 'desc');
		$query = $this -> db -> get('audit_trail');
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		return false;
	}
	
	
	public function getAuditCtr() {
		$this -> db -> select('*');
		$this -> db -> from('audit_trail');
		$query = $this -> db -> get();
		$result = $query -> num_rows();
		return $result;
	}
	
	/**
	 * Get Audit Record function
	 * 
	 * 
	 */
	function get_audit_rec($aid) {
		$this->db->join('users','users.id = audit_trail.user_id','left');
		$this -> db -> where('audit_id', $aid);
		$q = $this -> db -> get('audit_trail');
		
		return $q -> result();

	}
}
?>