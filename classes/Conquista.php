<?php
require_once("global.php");

class Conquista {
	public $id;
	public $nome;
	public $descricao;
	public $imagem;
	public $cor;
	public $totalDePassos;
	public $idAluno = 0;
	public $obtidas;

	public function buscarTodas(){ 
		if ($this->idAluno==0){
			//buscar sem o desempenho do aluno
			$query = "SELECT *, 0 AS obtidas FROM conquistas ORDER BY nome";
		}else{
			//buscar contando as conquistas
			$query = "SELECT conquistas.*, alunos_conquistas.idAluno, SUM(if(idAluno=$this->idAluno, 1, 0)) AS obtidas FROM `conquistas` LEFT  JOIN alunos_conquistas ON conquistas.idConquista=alunos_conquistas.idConquista GROUP BY idconquista";
		}
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->execute();
		$conquistas = array();
		while ($linha = $stmt->fetch()){
			$conquista = new Conquista();
			$conquista->id = $linha['idConquista'];
			$conquista->nome = $linha['nome'];
			$conquista->descricao = $linha['descricao'];
			$conquista->imagem = $linha['imagem'];
			$conquista->cor = $linha['cor'];
			$conquista->totalDePassos = $linha['totalPassos'];
			$conquista->obtidas = $linha['obtidas'];
			array_push($conquistas, $conquista);
		}
		return $conquistas;
	}

	public function inserirParaAluno(){
		$conexao = Conexao::pegarConexao();
		$query = "INSERT INTO alunos_conquistas (idConquista, idAluno, obtidaEm) VALUES ($this->id, $this->idAluno, NOW() )";
		if(!$conexao->exec($query)) throw new Exception("Erro ao adicionar competencia para aluno");
	}
}