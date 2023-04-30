<?php

Class Database{
 
	private $server = "mysql:host=localhost;dbname=ecomm";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "There is some problem in connection: " . $e->getMessage();
 		}
 
    }


	public function execute_query($sql, $params = null){
		if ($params == null) {
			$nb=$this->conn->query($sql);
			$resultat->execute($nb);
		}
		else {
			$resultat=$this->conn->prepare($sql);
			$resultat->execute($params);
		}
		return $resultat;
		}
 
	public function close(){
   		$this->conn = null;
 	}
 
}

$pdo = new Database();
 
?>