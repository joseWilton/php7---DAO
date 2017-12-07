<?php

class Usuario{
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}
	public function getDeslogin(){
		return $this->deslogin;
	}
	public function getDessenha(){
		return $this->dessenha;
	}
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setIdusuario($value){
		return $this->idusuario = $value;
	}
	public function setDeslogin($value){
		return $this->deslogin = $value;
	}
	public function setDessenha($value){
		return $this->dessenha = $value;
	}
	public function setDtcadastro($value){
		return $this->dtcadastro = $value;
	}
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM td_usuarios WHERE idusuario = :ID",array(
			":ID"=>$id
		));
		if(count($results)>0){
			$this->Dados($results[0]);
		}
	}
	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
	public static function getUsers(){
		$sql = new Sql();
		return $sql-> select("SELECT *from td_usuarios ORDER BY deslogin");
	}
	public static function search($Login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM td_usuarios WHERE deslogin LIKE :procura ORDER BY deslogin",array(
			":procura" => "%".$Login."%"
		));
	}
	public function login($usuario,$senha){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM td_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD",array(
			":LOGIN" => $usuario,
			":PASSWORD" => $senha
		));
		if(count($results)>0){
			$this->Dados($results[0]);
		}else{
			throw new Exception("Login incorreto");

		}
	}
	public function Dados($dados){

		$this->setIdusuario($dados['idusuario']);
		$this->setDeslogin($dados['deslogin']);
		$this->setDessenha($dados['dessenha']);
		$this->setDtcadastro(new dateTime($dados['dtcadastro']));
	}
	public function insert(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)",array(
			":LOGIN" =>$this->getDeslogin(),
			":PASSWORD" => $this->getDessenha()
		));
		if(count($results)>0){
			$this->Dados($results[0]);
		}
	}

	public function update($login, $senha){
		$this->setDeslogin($login);
		$this->setDessenha($senha);
		$sql = new Sql();

		$sql-> query("UPDATE td_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID",array(
			':LOGIN'=> $this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha(),
			':ID'=>$this->getIdusuario()
		));
	}
}

?>
