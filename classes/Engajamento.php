<?php
require_once("global.php");

class Engajamento {
	public $id;
	public $idAluno;
	public $data;
	public $q1;
	public $q2;
	public $q3;
	public $q4;
	public $q5;
	public $q6;
	public $q7;
	public $q8;
	public $q9;
	public $scoreVigor;
	public $scoreDedicacao;
	public $scoreAbsorcao;
	
	public function inserir(){
		$query = "INSERT INTO questionario_engajamento (idAluno, data, q1, q2, q3, q4, q5, q6, q7, q8, q9 ) VALUES (
			:idAluno,
			NOW(),
			:q1,
			:q2,
			:q3,
			:q4,
			:q5,
			:q6,
			:q7,
			:q8,
			:q9
		)";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idAluno', $this->idAluno);
	    $stmt->bindValue(':q1', $this->q1);
	    $stmt->bindValue(':q2', $this->q2);
	    $stmt->bindValue(':q3', $this->q3);
	    $stmt->bindValue(':q4', $this->q4);
	    $stmt->bindValue(':q5', $this->q5);
	    $stmt->bindValue(':q6', $this->q6);
	    $stmt->bindValue(':q7', $this->q7);
	    $stmt->bindValue(':q8', $this->q8);
	    $stmt->bindValue(':q9', $this->q9);

		if(!$stmt->execute()) throw new Exception("Erro ao gravar questionário");
		else {
			//gravar o score na tabela do aluno
			$aluno = new Aluno();
			$aluno->id = $this->idAluno;
			$aluno->atualizarEngajamento( $this->score() );
			Log::gravarLog($this->idAluno, "responder questionario engajamento");
		}
	}

	//pega o último score do aluno
	public function score(){
		$query = "SELECT ((q1+q2+q3+q4+q5+q6+q7+q8+q9)/9) as score FROM questionario_engajamento WHERE idAluno='$this->idAluno' ORDER BY data DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
	    	$linha = $lista[0];
			return number_format($linha["score"],2);
	    }else{
	    	return null;
	    }
	}

	//pega o último status do aluno
	public function status(){
    	$score = $this->score();
    	if ($score<=1.77) $retorno = "muito baixo";
    	else if ($score<=2.88) $retorno = "baixo";
    	else if ($score<=4.66) $retorno = "médio";
    	else if ($score<=5.50) $retorno = "alto";
    	else $retorno = "muito alto";
    	return $retorno;
	}



	//pega o último vigor do aluno
	public function vigor(){
		$query = "SELECT ((q1+q2+q5)/3) as score FROM questionario_engajamento WHERE idAluno='$this->idAluno' ORDER BY data DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
			$linha = $lista[0];
	    	$this->scoreVigor = $linha["score"];
			$retorno = "";
	    	if ($linha["score"]<=2) $retorno = "muito baixo";
	    	else if ($linha["score"]<=3.25) $retorno = "baixo";
	    	else if ($linha["score"]<=4.80) $retorno = "médio";
	    	else if ($linha["score"]<=5.65) $retorno = "alto";
	    	else $retorno = "muito alto";
	    	return $retorno;
	    }else{
	    	return null;
	    }
	}

	//pega o último status de dedicaçao do aluno
	public function dedicacao(){
		$query = "SELECT ((q3+q4+q8)/3) as score FROM questionario_engajamento WHERE idAluno='$this->idAluno' ORDER BY data DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
			$linha = $lista[0];
	    	$this->scoreDedicacao = $linha["score"];
			$retorno = "";
	    	if ($linha["score"]<=1.33) $retorno = "muito baixa";
	    	else if ($linha["score"]<=2.9) $retorno = "baixa";
	    	else if ($linha["score"]<=4.70) $retorno = "média";
	    	else if ($linha["score"]<=5.69) $retorno = "alta";
	    	else $retorno = "muito alta";
	    	return $retorno;
	    }else{
	    	return null;
	    }
	}

	//pega o último status de absorção do aluno
	public function absorcao(){
		$query = "SELECT ((q6+q7+q9)/3) as score FROM questionario_engajamento WHERE idAluno='$this->idAluno' ORDER BY data DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
			$linha = $lista[0];
	    	$this->scoreAbsorcao = $linha["score"];
			$retorno = "";
	    	if ($linha["score"]<=1.77) $retorno = "muito baixa";
	    	else if ($linha["score"]<=2.33) $retorno = "baixa";
	    	else if ($linha["score"]<=4.20) $retorno = "média";
	    	else if ($linha["score"]<=5.33) $retorno = "alta";
	    	else $retorno = "muito alta";
	    	return $retorno;
	    }else{
	    	return null;
	    }
	}

}