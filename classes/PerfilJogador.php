<?php
require_once("global.php");

class PerfilJogador {
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
	public $q17;
	public $q18;
	public $q19;
	public $q20;
	public $q21;
	public $q22;
	public $q23;
	public $q24;

	public $scoreEmpreendedor;
	public $scoreDisruptor;
	public $scoreEspiritoLivre;
	public $scoreFilantropo;
	public $scoreJogador;
	public $scoreSocializador;
	
	public function inserir(){
		$query = "INSERT INTO questionario_jogador (idAluno, data, q01, q02, q03, q04, q05, q06, q07, q08, q09, q10, q11, q12, q13, q14, q15, q16, q17, q18, q19, q20, q21, q22, q23, q24 ) VALUES (
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
			:q16,
			:q17,
			:q18,
			:q19,
			:q20,
			:q21,
			:q22,
			:q23,
			:q24
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
	    $stmt->bindValue(':q17', $this->q17);
	    $stmt->bindValue(':q18', $this->q18);
	    $stmt->bindValue(':q19', $this->q19);
	    $stmt->bindValue(':q20', $this->q20);
	    $stmt->bindValue(':q21', $this->q21);
	    $stmt->bindValue(':q22', $this->q22);
	    $stmt->bindValue(':q23', $this->q23);
	    $stmt->bindValue(':q24', $this->q24);

		if(!$stmt->execute()) throw new Exception("Erro ao gravar questionário");
		else {
			$aluno = new Aluno();
			$aluno->id = $this->idAluno;
			$aluno->atualizarPerfilJogador( $this->perfil() );
			Log::gravarLog($this->idAluno, "responder questionario jogador");
		}
	}

	//pegar o score de empreendedor
	public function empreendedor(){
		$query = "SELECT (q01+q02+q03+q04) as score FROM questionario_jogador WHERE idAluno='$this->idAluno' ORDER BY data DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
			$linha = $lista[0];
	    	$this->scoreEmpreendedor = $linha["score"];
	    	return $this->scoreEmpreendedor;
	    }else{
	    	return null;
	    }
	}

	//pegar o score de disruptor
	public function disruptor(){
		$query = "SELECT (q05+q06+q07+q08) as score FROM questionario_jogador WHERE idAluno='$this->idAluno' ORDER BY data DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
			$linha = $lista[0];
	    	$this->scoreDisruptor = $linha["score"];
	    	return $this->scoreDisruptor;
	    }else{
	    	return null;
	    }
	}

	//pegar o score de espirito livre
	public function espiritoLivre(){
		$query = "SELECT (q09+q10+q11+q12) as score FROM questionario_jogador WHERE idAluno='$this->idAluno' ORDER BY data DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
			$linha = $lista[0];
	    	$this->scoreEspiritoLivre = $linha["score"];
	    	return $this->scoreEspiritoLivre;
	    }else{
	    	return null;
	    }
	}

	//pegar o score de filantropo
	public function filantropo(){
		$query = "SELECT (q13+q14+q15+q16) as score FROM questionario_jogador WHERE idAluno='$this->idAluno' ORDER BY data DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
			$linha = $lista[0];
	    	$this->scoreFilantropo = $linha["score"];
	    	return $this->scoreFilantropo;
	    }else{
	    	return null;
	    }
	}

	//pegar o score de jogador
	public function jogador(){
		$query = "SELECT (q17+q18+q19+q20) as score FROM questionario_jogador WHERE idAluno='$this->idAluno' ORDER BY data DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
			$linha = $lista[0];
	    	$this->scoreJogador = $linha["score"];
	    	return $this->scoreJogador;
	    }else{
	    	return null;
	    }
	}

	//pegar o score de socializador
	public function socializador(){
		$query = "SELECT (q21+q22+q23+q24) as score FROM questionario_jogador WHERE idAluno='$this->idAluno' ORDER BY data DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
			$linha = $lista[0];
	    	$this->scoreSocializador = $linha["score"];
	    	return $this->scoreSocializador;
	    }else{
	    	return null;
	    }
	}

	public function perfil(){
		$this->empreendedor();
		$this->disruptor();
		$this->espiritoLivre();
		$this->jogador();
		$this->filantropo();
		$this->socializador();
		$scores = array (
				"Empreendedor" => $this->scoreEmpreendedor, 
				"Disruptor" => $this->scoreDisruptor, 
				"Espírito Livre" => $this->scoreEspiritoLivre,
				"Jogador" => $this->scoreJogador,
				"Filantropo" => $this->scoreFilantropo,
				"Socializador" => $this->scoreSocializador
			);
		$maior = array_search(max($scores),$scores);
		return $maior;
	}

	public function descricao($perfil){
		$descricao = "";
		if ($perfil == "Empreendedor") $descricao = "Isso indica que você se motiva por dominar temas. Os empreendedores buscam aprender coisas novas, procurando sempre por desafios a superar.";
		if ($perfil == "Disruptor") $descricao = "Isso indica que você se motiva pela mudança. Em geral, os disruptores querem quebrar as regras, agindo diretamente ou através de outros usuários para forçar uma mudança positiva ou negativa no sistema";
		if ($perfil == "Espírito Livre") $descricao = "Você é um tipo de jogador motivado pela autonomia e auto-expressão. Gosta de criar coisas e explorar o jogo";
		if ($perfil == "Filantropo" )$descricao = "Você é um tipo de jogador motivado por um propósito e por um significado. Estes jogadores são altruístas e gostam de auxiliar e proporcionar conquistas aos outros usuários sem nenhuma expectativa de recompensa";
		if ($perfil == "Jogador") $descricao = "Isso indica que você se motiva por recompensas. Jogadores com esse perfil fazem o que é necessário para coletar as recompensas existentes em um sistema e sempre buscam o melhor para si mesmos.";
		if ($perfil == "Socializador") $descricao = "Isso indica que você se motiva pelos relacionamentos. Deseja interagir com os demais e criar relações sociais.";
		return $descricao;
	}

}