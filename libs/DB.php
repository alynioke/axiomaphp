<?php 


class DB {
 
    private $dbh;
    private $error;
    private $stmt;
 
    public function __construct(){
		$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';
		$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		try {
			$this->dbh = new PDO($dsn, DB_USER, DB_PASS, $options);
		} catch (PDOException $ex) {
			$this->error = $e->getMessage();
		} 	
    }

	public function query ($query) {
		$this->stmt = $this->dbh->prepare($query);
	}

	public function getRow() {
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function select() {
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function execute($params = false) {
		if ($params)
			$this->stmt->execute($params);
		else 
			$this->stmt->execute();
	}
}
?>