<?php
require_once 'conexao.class.php';
class Area {
	private $con;
	private $id;
	private $nome_area;
	private $descricao_area;

	public function __construct(){
		$this->con = new Conexao();
	}
	public function __set($atributo, $valor){
		$this->atributo = $valor;
	}
	public function __get($atributo){
		return $this->atributo;
	}

	public function adicionar($nome_area, $descricao_area){
		$areaExistente = $this->existeArea($nome_area);

		if(count($areaExistente) == 0){
		try {
			$this->nome_area = $nome_area;
			$this->descricao_area = $descricao_area;
				$sql = $this->con->conectar()->prepare("INSERT INTO area(nome_area, descricao_area) VALUES (:nome_area, :descricao_area)");
				$sql->bindParam(":nome_area", $this->nome_area, PDO::PARAM_STR);
				$sql->bindParam(":descricao_area", $this->descricao_area, PDO::PARAM_STR);
				$sql->execute();
				return TRUE;
		} catch(PDOException $ex) {
			return 'erro: '.$ex->getMessage();
		}
		}else{
			
			return FALSE;
			}	
	}

	public function existeArea($nome_area){
		$sql ="SELECT id FROM area WHERE nome_area = :nome_area";
		$sql = $this->con->conectar()->prepare($sql);
		$sql->bindValue(':nome_area', $nome_area);
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
			$sql = $this->con->conectar()->prepare("SELECT id, nome_area, descricao_area FROM area");
			$sql->execute();
			return $sql->fetchAll();
		} catch(PDOException $ex){
			return 'ERRO: '.$ex->getMessage();
		}
	}
	public function busca($id){
		try{
			$sql = $this->con->conectar()->prepare("SELECT * FROM area WHERE id = :id");
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

	public function editar($nome_area, $descricao_area, $id){
		$areaExistente = $this->existeArea($nome_area);

		if(count($areaExistente) > 0 && $areaExistente['id'] != $id){
			return FALSE;
		}else{
			try{
			$sql = $this->con->conectar()->prepare("UPDATE area SET nome_area = :nome_area, descricao_area = :descricao_area WHERE id = :id");
			
			$sql->bindValue(':nome_area', $nome_area);
			$sql->bindValue(':descricao_area', $descricao_area);
			$sql->bindValue(':id', $id);
			$sql->execute();
			return TRUE;
			}catch(PDOException $ex){
				echo "ERRO: ".$ex->getMessage();
			}
		}
	}
	public function excluir($id){
		$sql = $this->con->conectar()->prepare("DELETE FROM area WHERE id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
}

?>