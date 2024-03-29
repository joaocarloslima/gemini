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
	public $prazoFormatado;
	public $prazoLocalTime;
	public $xp;
	public $anexo;
	public $listaCompleta;
	public $atividadesParaAvaliar = 0;
	public $xpObtido = 0;
	public $anexoEnviado;
	public $feedback = "";

	public function inserir(){
		$conexao = Conexao::pegarConexao();
		$query = "INSERT INTO fases (nome, descricao, tipo, prazo, xp, idMissao, anexo) VALUES (
		'$this->nome',
		'$this->descricao',
		'$this->tipo',
		'$this->prazo',
		'$this->xp',
		'$this->idMissao',
		'$this->anexo'
	)";
	if(!$conexao->exec($query)) throw new Exception("Erro ao inserir fase");
	else $this->id =  $conexao->lastInsertId();
}

public function atualizar(){
	$query = "UPDATE fases SET nome=:nome, descricao=:descricao, tipo=:tipo, prazo=:prazo, xp=:xp, anexo=:anexo WHERE idFase=:idFase";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->bindValue(':idFase', $this->id);
	$stmt->bindValue(':nome', $this->nome);
	$stmt->bindValue(':descricao', $this->descricao);
	$stmt->bindValue(':tipo', $this->tipo);
	$stmt->bindValue(':prazo', $this->prazo);
	$stmt->bindValue(':xp', $this->xp);
	$stmt->bindValue(':anexo', $this->anexo);

	if(!$stmt->execute()) throw new Exception("Erro ao atualizar fase");
}

public function carregar(){ 
	$query = "SELECT fases.*, missoes.nome as missao FROM fases INNER JOIN missoes on missoes.idMissao=fases.idMissao WHERE fases.idFase=:idFase";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->bindValue(':idFase', $this->id);
	$stmt->execute();
	$linha = $stmt->fetch(PDO::FETCH_ASSOC);
	$this->nome = $linha['nome'];
	$this->descricao = $linha['descricao'];
	$this->tipo = $linha['tipo'];
	$this->setPrazo($linha['prazo']);
	$this->xp = $linha['xp'];
	$this->idMissao = $linha['idMissao'];
	$this->missao = $linha['missao'];
	$this->anexo = $linha['anexo'];

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
		$fase->setPrazo($linha['prazo']);
		$fase->xp = $linha['xp'];
		$fase->idMissao = $linha['idMissao'];
		$fase->missao = $linha['missao'];
		$fase->anexo = $linha['anexo'];
		$atividade = new Atividade();
		$atividade->idFase = $fase->id;
		if ($fase->tipo=="Atividade") $fase->atividadesParaAvaliar += count( $atividade->buscarAtividadesNaoAvaliadas() );
		array_push($fases, $fase);
		$this->idMissao = $linha['idMissao'];
		$this->missao = $linha['missao'];
	}
	$this->listaCompleta = $fases;
}

public function duplicar($idMissao){
	try{
		//duplicar a fase
		$idFaseOriginal = $this->id;
		$this->idMissao = $idMissao;
		$this->inserir();
		//copiar as questoes
		if ($this->tipo == "Questionário"){
			$questoes = Questao::listarQuestoes($idFaseOriginal);
			foreach ($questoes as $questao) {
				$questao->duplicar($this->id);
			}
		}
	}catch(Exception $e){
		throw new Exception("Erro ao duplicar questao da fase".$e->getMessage());
	}

}

public function apagar(){
	$query = "DELETE FROM fases WHERE idFase=:id";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->bindValue(':id', $this->id);
	if(!$stmt->execute()) throw new Exception("Erro ao apagar fase");
}

public function setPrazo($prazo){
	$this->prazo = $prazo;
	$this->prazoFormatado = (new DateTime($prazo))->format('d/m/Y H:i');
	$this->prazoLocalTime = str_replace(" ", "T", $this->prazo);
}

public function alunoJaFez($idAluno){
	$query = "SELECT * FROM alunos_fases WHERE idAluno=:idAluno AND idFase=:idFase";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->bindValue(":idAluno", $idAluno);
	$stmt->bindValue(":idFase", $this->id);
	$stmt->execute();
	$linha = $stmt->fetch(PDO::FETCH_ASSOC);
	return !is_null($linha["finalizadoEm"]);
}

public function professorJaCorrigiu($idAluno){
	$query = "SELECT * FROM alunos_fases WHERE idAluno=:idAluno AND idFase=:idFase AND xp IS NOT NULL";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->bindValue(":idAluno", $idAluno);
	$stmt->bindValue(":idFase", $this->id);
	$stmt->execute();
	if ($stmt->rowCount() > 0){
		$linha = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->xpObtido = $linha["xp"];
		$this->feedback = $linha["feedback"];
		$this->anexoEnviado = $linha["anexo"];
		return true;
	}else{
		return false;
	} 
}

public function alunoTemPermissao($idAluno){
	$prazo = strtotime($this->prazo);
    $hoje = strtotime(date('Y-m-d H:i:s'));
    if ($prazo <= $hoje) return false;
    $missao = new Missao();
    $missao->id = $this->idMissao;
    $missao->carregar();
    if (!$missao->alunoTemPermissao($idAluno)) return false;
	if ($this->alunoJaFez($idAluno)) return false;
	return true;
}

}