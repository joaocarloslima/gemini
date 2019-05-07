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
	public $xp;
	public $listaCompleta;
	public $percentualConcluido;
	public $atividadesParaAvaliar=0;

	public function carregar(){
		$query = "SELECT missoes.*, turmas.sigla FROM missoes INNER JOIN turmas on turmas.idTurma=missoes.idTurma WHERE idMissao=:id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(":id", $this->id);
		$stmt->execute();
		$linha = $stmt->fetch();
		$this->nome = $linha['nome'];
		$this->descricao = $linha['descricao'];
		$this->levelminimo = $linha['levelMinimo'];
		$this->liberada = $linha['liberada'];
		$this->ordem = $linha['ordem'];
		$this->idTurma = $linha['idTurma'];
		$this->turma = $linha['sigla'];
		$this->idTurma = $linha['idTurma'];
		$this->imagem = $linha['imagem'];
	}

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
			$fase = new Fase();
			$fase->buscarFasesDaMissao($missao->id);
			foreach ($fase->listaCompleta as $fase) {
				$atividade = new Atividade();
				$atividade->idFase = $fase->id;
				$missao->atividadesParaAvaliar += count( $atividade->buscarAtividadesNaoAvaliadas() );
			}
			array_push($missoes, $missao);
		}
		$this->listaCompleta = $missoes;
	}

	//buscar as missoes de um aluno pelo idAluno
	public function buscarMissoesDoAluno($idAluno){ 
		$query = "SELECT alunos.idAluno, missoes.*, (SELECT sum(fases.xp) from fases where fases.idMissao=missoes.idMissao) as xp, turmas.sigla FROM missoes INNER JOIN turmas on turmas.idTurma=missoes.idTurma INNER JOIN matriculas ON matriculas.idTUrma=missoes.idTurma INNER JOIN alunos ON alunos.idAluno=matriculas.idAluno WHERE liberada=1 AND alunos.idAluno=$idAluno ORDER BY levelMinimo";
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
			$missao->xp = $linha['xp'];
			$fases = new Fase();
			$fases->buscarFasesDaMissao($missao->id);
			$fasesConcluidas = 0;
			foreach ($fases->listaCompleta as $fase) {
				if ($fase->alunoJaFez($idAluno)) $fasesConcluidas++;
			}
			$missao->percentualConcluido = (count($fases->listaCompleta)==0)?0:intval($fasesConcluidas / count($fases->listaCompleta) * 100);
			array_push($missoes, $missao);
		}
		return $missoes;
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
	//TO-DO apagar as fase, questoes e alternativas que fazem parte desta missao
}

public function editar(){
	$query = "UPDATE missoes SET nome=:nome, descricao=:descricao, levelMinimo=:levelMinimo, idTurma=:idTurma WHERE idMissao=:id";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->bindValue(':id', $this->id);
	$stmt->bindValue(':nome', $this->nome);
	$stmt->bindValue(':descricao', $this->descricao);
	$stmt->bindValue(':levelMinimo', $this->levelminimo);
	$stmt->bindValue(':idTurma', $this->idTurma);
	if(!$stmt->execute()) throw new Exception("Erro ao editar missao");
}


public function trocarLiberada(){
	$query = "UPDATE missoes SET liberada = NOT liberada WHERE idMissao=:id";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->bindValue(':id', $this->id);
	if(!$stmt->execute()) throw new Exception("Erro ao mudar status missao");
}

public function duplicar(){
	//copiar a missao
	$idMissaoOriginal = $this->id;
	$this->carregar();
	$this->inserir();
	
	//copiar as fases
	$fases = new Fase();
	$fases->buscarFasesDaMissao($idMissaoOriginal);
	foreach ($fases->listaCompleta as $fase) {
		try{
			$fase->duplicar($this->id);
		}catch(Exception $e){
			throw new Exception("Erro ao duplicar fase da missao. ".$e->getMessage());
		}
	}
}

}