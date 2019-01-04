<?php
require_once("global.php");

class PerfilAprendizagem {
	public $id;
	public $idAluno;
	public $data;
	public $q01;
	public $q02;
	public $q03;
	public $q04;
	public $q05;
	public $q06;
	public $q07;
	public $q08;
	public $q09;
	public $q10;
	public $q11;
	public $q12;
	public $q13;
	public $q14;
	public $q15;
	public $q16;

	public $scoreV;
	public $scoreA;
	public $scoreR;
	public $scoreK;
	public $perfil;
	
	public function inserir(){
		$query = "INSERT INTO questionario_aprendizagem (idAluno, data, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16 ) VALUES (
			:idAluno,
			NOW(),
			:q01,
			:q02,
			:q03,
			:q04,
			:q05,
			:q06,
			:q07,
			:q08,
			:q09,
			:q10,
			:q11,
			:q12,
			:q13,
			:q14,
			:q15,
			:q16
		)";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idAluno', $this->idAluno);
	    $stmt->bindValue(':q01', $this->q01);
	    $stmt->bindValue(':q02', $this->q02);
	    $stmt->bindValue(':q03', $this->q03);
	    $stmt->bindValue(':q04', $this->q04);
	    $stmt->bindValue(':q05', $this->q05);
	    $stmt->bindValue(':q06', $this->q06);
	    $stmt->bindValue(':q07', $this->q07);
	    $stmt->bindValue(':q08', $this->q08);
	    $stmt->bindValue(':q09', $this->q09);
	    $stmt->bindValue(':q10', $this->q10);
	    $stmt->bindValue(':q11', $this->q11);
	    $stmt->bindValue(':q12', $this->q12);
	    $stmt->bindValue(':q13', $this->q13);
	    $stmt->bindValue(':q14', $this->q14);
	    $stmt->bindValue(':q15', $this->q15);
	    $stmt->bindValue(':q16', $this->q16);

		if(!$stmt->execute()) throw new Exception("Erro ao gravar questionário");
		else {
			$aluno = new Aluno();
			$aluno->id = $this->idAluno;
			$aluno->atualizarPerfilAprendizagem( $this->perfil() );
			Log::gravarLog($this->idAluno, "responder questionario aprendizagem");
		}
	}

	//calcular as caracteristicas de aprendizagem do aluno
	public function score($criterio){
		$query = "SELECT (
					IF (q1='$criterio', 1 ,0) + 
					IF (q2='$criterio', 1 ,0) + 
					IF (q3='$criterio', 1 ,0) +
					IF (q4='$criterio', 1 ,0) +
					IF (q5='$criterio', 1 ,0) +
					IF (q6='$criterio', 1 ,0) +
					IF (q7='$criterio', 1 ,0) +
					IF (q8='$criterio', 1 ,0) +
					IF (q9='$criterio', 1 ,0) +
					IF (q10='$criterio', 1 ,0) +
					IF (q11='$criterio', 1 ,0) +
					IF (q12='$criterio', 1 ,0) +
					IF (q13='$criterio', 1 ,0) +
					IF (q14='$criterio', 1 ,0) +
					IF (q15='$criterio', 1 ,0) +
					IF (q16='$criterio', 1 ,0)
				) AS score FROM questionario_aprendizagem WHERE idAluno=$this->idAluno";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
	    	$linha = $lista[0];
			return number_format($linha["score"],0);
	    }else{
	    	return null;
	    }
	}


	public function perfil(){
		$scores = array (
				"Visual" => $this->score("V"), 
				"Auditivo" => $this->score("A"), 
				"Leitor Escritor" => $this->score("R"),
				"Cinestésico" => $this->score("K")
			);
		$maior = array_search(max($scores),$scores);
		return $maior;
	}

	public function descricao($perfil){
		$descricao = "";
		if ($perfil == "Visual") $descricao = "Você consegue aprender mais por meio de representações gráficas como mapas, diagramas e fluxogramas. Mapas mentais podem ser ótimas ferramentas na hora de estudar. Sublinhar, circular e grifar são boas estratégias para compreender um conteúdo novo.";
		if ($perfil == "Auditivo") $descricao = "Você prefere ouvir e falar na hora de aprender algo novo. Palestras, discusões, podcasts e bate-papos são as suas maiores referências de ensino.";
		if ($perfil == "Leitor Escritor") $descricao = "Você dá preferência por informações apresentadas na forma de palavras. Ler e escrever é o seu melhor exercício na hora de aprender algo novo.";
		if ($perfil == "Cinestésico" )$descricao = "Você prefere aprender na prática, realizando coisas, interangindo. Você não consegue focar muito a sua atenção em atividades monótonas. Tente sempre encontrar a aplicação de algo que esteja aprendendo.";
		return $descricao;
	}

}