<?php 


class Model {
	private $table;

	function __construct($name) {
		$this->table = $name;
		$this->db = new DB();
	}

	public function getAll(){
		$this->db->query("SELECT * FROM ".$this->table);
		$this->db->execute();
		$workers = $this->db->select();
		return (count($workers) > 0)?$workers:null;
	}

	public function get($id) {
		$this->db->query("SELECT * FROM ".$this->table." WHERE id = ?");
		$this->db->execute(array($id));
		$worker = $this->db->getRow();
		return (count($worker) > 0)?$worker:null;
	}

	public function delete($id) {
		$this->db->query("DELETE FROM ".$this->table." WHERE id = ?");
		$this->db->execute(array($id));

	}


	public function insert($params) {
		$cols = "";
		$vals = "";
		$realVals = array();
		foreach ($params as $key => $value) {
			$cols .= $key.",";
			$vals .= "?,";
			$realVals[] = $value;
		}
		$cols = rtrim($cols, ",");
		$vals = rtrim($vals, ",");
		$q = "INSERT INTO ".$this->table." (".$cols.") VALUES (".$vals.") ";
		$this->db->query($q);
		$this->db->execute($realVals);
	}

	public function update($params) {
		$updates = "";
		$realVals = array();
		$id = null;
		foreach ($params as $key => $value) {
			if ($key != "id") {
				$updates .= $key." = ?,";
				$realVals[] = $value;
			} else {
				$id = $value;
			}
		}

		$realVals[] = $id;
		print_r($realVals);
		$updates = rtrim($updates, ",");
		$q = "UPDATE ".$this->table." SET ".$updates." WHERE id = ?";
		print_r($q);
		$this->db->query($q);
		$this->db->execute($realVals);
	}


}

?>