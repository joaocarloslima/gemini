<?php
require_once("global.php");

class Fase {
	public $id;
	public $nome;
	public $descricao;
	public $tipo;
	public $idMissao;
	public $missao;
	public $prazo;
	public $xp;
	public $listaCompleta;

	public function buscarFasesDaMissao($idMissao){ 
	    $query = "SELECT fases.*, missoes.nome as missao FROM fases INNER JOIN missoes on missoes.idMissao=fases.idMissao WHERE fases.idMissao=:idMissao";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idMissao', $idMissao);
	    $stmt->execute();
	    $fases = array();
	    while ($linha = $stmt->fetch()){
	    	$fase = new Fase();
		    $fase->id = $linha['idFase'];
		    $fase->nome = $linha['nome'];
		    $fase->descricao = $linha['descricao'];
		    $fase->tipo = $linha['tipo'];
		    $fase->prazo = $linha['prazo'];
		    $fase->xp = $linha['xp'];
		    $fase->idMissao = $linha['idMissao'];
		    $fase->missao = $linha['missao'];
		    array_push($fases, $fase);
		    $this->idMissao = $linha['idMissao'];
		    $this->missao = $linha['missao'];
	    }
	    $this->listaCompleta = $fases;
	}

}