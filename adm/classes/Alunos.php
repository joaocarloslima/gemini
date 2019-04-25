<?php
require_once("global.php");

class Alunos {

	public $lista;
	
	//buscar todos os alunos
	public function buscarTodos($ordenarPorXP=0, $idTurma=0){ 
		$query = "SELECT alunos.*, matriculas.*, turmas.* FROM alunos 
		INNER JOIN matriculas on matriculas.idAluno=alunos.idAluno 
		INNER JOIN turmas on turmas.idTurma=matriculas.idTurma";
		if ($idTurma !=0) $query.= " WHERE matriculas.idTurma=$idTurma";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->execute();
		$alunos = array();

		while ($linha = $stmt->fetch()){

			$aluno = new AlunoPlayer();
			$aluno->id = $linha['idAluno'];
			$aluno->carregar();
			array_push($alunos, $aluno);
		}
		$this->lista = $alunos;
		if ($ordenarPorXP) usort($this->lista, function($a, $b) {return ($a->xp < $b->xp); });
	}

}

