<?php
require_once("global.php");

class Aviso {
	public $id;
	public $titulo;
	public $texto;
	public $data;
	public $paraTurma;
	public $idDestinatario;

	public function buscarAvisosDoAluno($idAluno, $idTurma){ 
		$query = "SELECT * FROM avisos WHERE (idDestinatario=:idAluno AND paraTurma=0) OR (idDestinatario=:idTurma AND paraTurma=1) ORDER BY data DESC";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(":idAluno", $idAluno);
		$stmt->bindValue(":idTurma", $idTurma);
		$stmt->execute();
		$avisos = array();
		while ($linha = $stmt->fetch()){
			$aviso = new Aviso();
			$aviso->id = $linha['idAviso'];
			$aviso->titulo = $linha['titulo'];
			$aviso->texto = $linha['texto'];
			$aviso->data = (new DateTime($linha['data']))->format('d/m H:i');
			array_push($avisos, $aviso);
		}
		return $avisos;
	}

	public function buscarTodos(){ 
		$query = "SELECT * FROM avisos ORDER BY data DESC";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->execute();
		$avisos = array();
		while ($linha = $stmt->fetch()){
			$aviso = new Aviso();
			$aviso->id = $linha['idAviso'];
			$aviso->titulo = $linha['titulo'];
			$aviso->texto = $linha['texto'];
			$aviso->data = (new DateTime($linha['data']))->format('d/m H:i');
			array_push($avisos, $aviso);
		}
		return $avisos;
	}

	public function apagar(){
		$query = "DELETE FROM avisos WHERE idAviso=:id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
		if(!$stmt->execute()) throw new Exception("Erro ao apagar aviso");
	}

	public function inserir(){
		$conexao = Conexao::pegarConexao();
		$query = "INSERT INTO avisos (titulo, texto, data, paraTurma, idDestinatario) VALUES (
		'$this->titulo',
		'$this->texto',
		NOW(),
		$this->paraTurma,
		$this->idDestinatario
	)";
	if(!$conexao->exec($query)) throw new Exception("Erro ao inserir aviso");
		else $this->id =  $conexao->lastInsertId();
	}
}