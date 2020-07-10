<?php 

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){

		$this->idusuario = $value;	
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){

		$this->deslogin = $value;	
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){

		$this->dessenha = $value;	
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){

		$this->dtcadastro = $value;	
	}

	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuarios = :ID", array(
			":ID"=>$id
	    ));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuarios']);
			$this->setDeslogin($row['desloguin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new Datetime($row['dtcadastro']));

		}

	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY desloguin;");

	}

	public static function search($loguin){

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE desloguin LIKE :SEARCH ORDER BY desloguin", array(
			":SEARCH"=>"%".$loguin."%"
		));

	}


	public function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE desloguin = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
	    ));

		if (count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row['idusuarios']);
			$this->setDeslogin($row['desloguin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new Datetime($row['dtcadastro']));

		} else {

			throw new Exception("Login e/ou senha invalods.");

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
}

 ?>