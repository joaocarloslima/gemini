<?php
require_once("global.php");

class AlunoPlayer {
	public $id;
	public $nome;
	public $foto;
	public $email;
	public $senha;
	public $idTurma;
	public $turma;
	public $perfilAprendizagem;
	public $perfilJogador;
	public $engajamento;
	public $xp;
	public $nivel;
	public $conquistas;
	public $faltaParaProximoNivel;

	public function carregar(){
		$query = "SELECT alunos.*, matriculas.*, turmas.* FROM alunos 
		INNER JOIN matriculas on matriculas.idAluno=alunos.idAluno 
		INNER JOIN turmas on turmas.idTurma=matriculas.idTurma
		WHERE alunos.idAluno=:id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(":id", $this->id);
		$stmt->execute();
		$linha = $stmt->fetch();

		$this->id = $linha['idAluno'];
		$this->nome = $linha['nome'];
		$this->email = $linha['email'];
		$this->foto = $linha['foto'];
		$this->idTurma = $linha['idTurma'];
		$this->turma = $linha['sigla'];
		$this->perfilAprendizagem = $linha['perfilAprendizagem'];
		$this->perfilJogador = $linha['perfilJogador'];
		$this->engajamento = $linha['engajamento'];
		$this->xp = $this->getXPDoAluno();
		$this->nivel = $this->getNivel();
		$this->conquistas = $this->getQtdeConquistas();
		$this->faltaParaProximoNivel = $this->getFaltaParaProximoNivel();
	}

	public function getXPDoAluno (){
		$query = "SELECT SUM(xp) as total FROM alunos_fases WHERE idAluno = $this->id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->execute();
		$xp = 0;
		if ( $linha = $stmt->fetch() ){
			$xp = ($linha["total"]=="")?0:$linha["total"];
		}
		return $xp;
	}

	public function getNivel(){
		$xp = $this->xp;
		if ($xp < 200) return 1;
		if ($xp < 400) return 2;
		if ($xp < 600) return 3;
		if ($xp < 800) return 4;
		if ($xp < 1000) return 5;
		if ($xp < 2000) return 6;
		if ($xp < 3000) return 7;
	}

	public function getFaltaParaProximoNivel(){
		$nivel = $this->nivel;
		$xp = $this->xp;
		if ($nivel==1) return 200 - $xp;
		if ($nivel==2) return 400 - $xp;
		if ($nivel==3) return 600 - $xp;
		if ($nivel==4) return 800 - $xp;
		if ($nivel==5) return 1000 - $xp;
		if ($nivel==6) return 2000 - $xp;
		if ($nivel==7) return 3000 - $xp;

	}

	public function getQtdeConquistas (){
		$query = "SELECT COUNT(*) as total FROM alunos_conquistas WHERE idAluno = $this->id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->execute();
		if ($linha = $stmt->fetch()){
			return $linha["total"];
		}else{
			return 0;
		}
	}

	public function cmp($a, $b){
		return $a->xp > $b->xp;
	}




}