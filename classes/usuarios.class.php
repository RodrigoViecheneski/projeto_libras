<?php

require_once 'conexao.class.php';

class Usuario {
	private $con;
	private $idUsuario;
	private $nome;
	private $email;
	private $senha;
	private $permissao;

	public function __construct() {
		$this->con = new Conexao();
	}
	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
	public function __get($atributo) {
		return $this->$atributo;
	}

	public function adicionar($dados){
		$emailexistente = $this->existeEmail($dados['email']);

		if(count($emailexistente) == 0){
		try {
			$this->nome = $dados['nome'];
			$this->email = $dados['email'];
			$this->senha = md5($dados['senha']);
			$this->permissao = $dados['permissao'];
				$sql = $this->con->conectar()->prepare("INSERT INTO usuarios(nome, email, senha, permissao) VALUES (:nome, :email, :senha, :permissao);");
				$sql->bindParam(":nome", $this->nome, PDO::PARAM_STR);
				$sql->bindParam(":email", $this->email, PDO::PARAM_STR);
				$sql->bindParam(":senha", $this->senha, PDO::PARAM_STR);
				$sql->bindParam(":permissao", $this->permissao, PDO::PARAM_STR);
				$sql->execute();
				return TRUE;
		} catch(PDOException $ex) {
			return 'erro: '.$ex->getMessage();
		}
		}else{
			return FALSE;
			}	
	}

	public function existeEmail($dados){
		try {
		$this->idUsuario = $dados['id'];
		$this->email = $dados['email'];
		$sql = $this->con->conectar()->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindParam(":id", $this->idUsuario, PDO::PARAM_INT);
		$sql->bindParam(":email", $this->email, PDO::PARAM_STR);
		$sql->execute();
		
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
			
		}else{
			$array = array();
		}
		return $array;
	}catch(PDOException $ex){
		return 'erro: '.$ex->getMessage();
	}
	}

	public function listar(){
		try{
			$sql = $this->con->conectar()->prepare("SELECT id, nome, email, senha, permissao FROM usuarios;");
			$sql->execute();
			return $sql->fetchAll();
		} catch(PDOException $ex){
			return 'ERRO: '.$ex->getMessage();
		}
	}

}