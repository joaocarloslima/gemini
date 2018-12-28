<?php
require_once("global.php");

class Alunos {

	public $lista;
	
	//buscar todos os alunos
	public function buscarTodos(){ 
	    $query = "SELECT alunos.*, matriculas.*, turmas.* FROM alunos 
	    			INNER JOIN matriculas on matriculas.idAluno=alunos.idAluno 
	    			INNER JOIN turmas on turmas.idTurma=matriculas.idTurma";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $alunos = array();
	    while ($linha = $stmt->fetch()){
	    	$aluno = new Aluno();
		    $aluno->id = $linha['idAluno'];
		    $aluno->nome = $linha['nome'];
		    $aluno->foto = $linha['foto'];
		    $aluno->idTurma = $linha['idTurma'];
		    $aluno->turma = $linha['sigla'];
		    $aluno->perfilAprendizagem = $linha['perfilAprendizagem'];
		    $aluno->perfilJogador = $linha['perfilJogador'];
		    array_push($alunos, $aluno);
	    }
	    $this->lista = $alunos;
	}


}

