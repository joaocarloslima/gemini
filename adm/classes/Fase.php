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

	public function inserir(){
		$conexao = Conexao::pegarConexao();
		$query = "INSERT INTO fases (nome, descricao, tipo, prazo, xp, idMissao) VALUES (
		'$this->nome',
		'$this->descricao',
		'$this->tipo',
		'$this->prazo',
		'$this->xp',
		'$this->idMissao'
	)";
	if(!$conexao->exec($query)) throw new Exception("Erro ao inserir fase");
	else $this->id =  $conexao->lastInsertId();
}

public function carregar(){ 
	$query = "SELECT fases.*, missoes.nome as missao FROM fases INNER JOIN missoes on missoes.idMissao=fases.idMissao WHERE fases.idMissao=:idFase";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->bindValue(':idMissao', $this->id);
	$stmt->execute();
	$linha = $stmt->fetch(PDO::FETCH_ASSOC);
	$this->nome = $linha['nome'];
	$this->descricao = $linha['descricao'];
	$this->tipo = $linha['tipo'];
	$this->prazo = $linha['prazo'];
	$this->xp = $linha['xp'];
	$this->idMissao = $linha['idMissao'];
	$this->missao = $linha['missao'];

}

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

public function duplicar($idMissao){
	//duplicar a fase
	$this->idMissao = $idMissao;
	$idNovaFase = $this->inserir();
	//copiar as questoes e as medalhas
}

public function apagar(){
	$query = "DELETE FROM fases WHERE idFase=:id";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->bindValue(':id', $this->id);
	if(!$stmt->execute()) throw new Exception("Erro ao apagar fase");
}


}