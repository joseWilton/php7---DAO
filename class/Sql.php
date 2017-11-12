<?php 

class Sql extends PDO{// agora a classe sql pode usar os recursos do pdo
	private $conn;

	public function __construct(){// quando chamar a classe, irá conectar automaticamente no banco
		$this->conn =new PDO("mysql:host=localhost;dbname=exercicio","root","");
	}

	private function setParams($statment, $parameters = array()){
		foreach ($parameters as $key => $value) {
			$this->setParam($key, $value);	
		}
	}
	private function setParam($statment,$key,$value){
		$statment->bindParam($key, $value);
	}
	public function query($rawQuery, $params = array()){
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}
	public function select($rawQuery,$params =array()){
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC); //para vir só os dados associativos.

	}
}

?>