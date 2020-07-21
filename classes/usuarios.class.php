<?php

require_once 'conexao.class.php';

class Usuario {
	private $con;
	private $id;
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
	public function fazerLogin($email, $senha){
		$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
		$sql = $this->con->conectar()->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $senha);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();

			$_SESSION['logado'] = $sql['id'];
			return TRUE;
		}
		return FALSE;
	}

	public function setUsuario($id){
		$this->id = $id;
		$sql = "SELECT * FROM usuarios WHERE id = :id";
		$sql = $this->con->conectar()->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();

			$this->permissao = explode(',', $sql['permissao']); //explode torna variável em array
		}
	}

	public function adicionar($email, $nome, $senha, $permissao){
		$emailexistente = $this->existeEmail($email);

		if(count($emailexistente) == 0){
		try {
			$this->nome = $nome;
			$this->email = $email;
			$this->senha = md5($senha);
			$this->permissao = $permissao;
				$sql = $this->con->conectar()->prepare("INSERT INTO usuarios(nome, email, senha, permissao) VALUES (:nome, :email, :senha, :permissao)");
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

	public function existeEmail($email){
		$sql = $this->con->conectar()->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindParam(":email", $email, PDO::PARAM_STR);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}else{
			$array = array();
		}
		return $array;
	}

	public function listar(){
		try{
			$sql = $this->con->conectar()->prepare("SELECT id, nome, email, senha, permissao FROM usuarios");
			$sql->execute();
			return $sql->fetchAll();
		} catch(PDOException $ex){
			return 'ERRO: '.$ex->getMessage();
		}
	}
	public function busca($id){
		try{
			$sql = $this->con->conectar()->prepare("SELECT * FROM usuarios WHERE id = :id");
			$sql->bindValue(':id', $id);
			$sql->execute();

			if($sql->rowCount() > 0){
				return $sql->fetch();
			}else{
				return array();
			}
		}catch(PDOException $ex){
			echo "ERRO: ".$ex->getMessage();
		}
	}

	public function editar($nome, $email, $senha, $permissao, $id){
		$emailexistente = $this->existeEmail($email);
		if(count($emailexistente) > 0 && $emailexistente['id'] != $id){
			return FALSE;
		}else{
			try{
			$sql = $this->con->conectar()->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, permissao = :permissao WHERE id = :id");
			
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':email', $email);
			$sql->bindValue(':senha', md5($senha));
			$sql->bindValue(':permissao', $permissao);
			$sql->bindValue(':id', $id);
			$sql->execute();
			return TRUE;
			}catch(PDOException $ex){
				echo "ERRO: ".$ex->getMessage();
			}
		}
	}
	public function excluir($id){
		$sql = $this->con->conectar()->prepare("DELETE FROM usuarios WHERE id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
}