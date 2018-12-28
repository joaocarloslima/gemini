<?php
require_once("global.php");

class Missao {
	public $id;
	public $nome;
	public $descricao;
	public $ordem;
	public $liberada;
	public $idTurma;
	public $turma;
	public $levelminimo;
	public $imagem;
	public $listaCompleta ;

	//buscar todos as missoes
	public function buscarTodas(){ 
	    $query = "SELECT missoes.*, turmas.sigla FROM missoes INNER JOIN turmas on turmas.idTurma=missoes.idTurma";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $missoes = array();
	    while ($linha = $stmt->fetch()){
	    	$missao = new Missao();
		    $missao->id = $linha['idMissao'];
		    $missao->nome = $linha['nome'];
		    $missao->descricao = $linha['descricao'];
		    $missao->levelminimo = $linha['levelMinimo'];
		    $missao->liberada = $linha['liberada'];
		    $missao->ordem = $linha['ordem'];
		    $missao->idTurma = $linha['idTurma'];
		    $missao->turma = $linha['sigla'];
		    $missao->idTurma = $linha['idTurma'];
		    $missao->imagem = $linha['imagem'];
		    array_push($missoes, $missao);
	    }
	    $this->listaCompleta = $missoes;
	}

	public function inserir(){
		$conexao = Conexao::pegarConexao();
		$query = "INSERT INTO missoes (nome, descricao, levelMinimo, liberada, idTurma, imagem) VALUES (
			'$this->nome',
			'$this->descricao',
			'$this->levelminimo',
			'$this->liberada',
			'$this->idTurma',
			'$this->imagem'
		)";
		if(!$conexao->exec($query)) throw new Exception("Erro ao inserir missao");
		else $this->id =  $conexao->lastInsertId();
	}

	public function apagar(){
		$query = "DELETE FROM missoes WHERE idMissao=:id";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':id', $this->id);
		if(!$stmt->execute()) throw new Exception("Erro ao apagar missao");
	}

}