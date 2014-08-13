<?php 


class WorkersModel extends Model{

	function __construct() {
		parent::__construct("workers");
	}

	function getAll() {
		$this->db->query("SELECT *, w.description as description, w.id as id, p.title as position FROM workers AS w 
			LEFT JOIN positions AS p 
			ON p.id = w.position_id");
		$this->db->execute();
		$workers = $this->db->select();
		return (count($workers) > 0)?$workers:null;
	}
}

?>