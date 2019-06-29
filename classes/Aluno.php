<?php
require_once("global.php");

class Aluno {
	public $id;
	public $nome;
	public $email;
	public $senha;
	public $foto;
	public $idTurma;
	
	public function inserir(){
		$erro = false;
		$conexao = Conexao::pegarConexao();
		$queryAluno = "INSERT INTO alunos (nome, email, senha) VALUES (
			'$this->nome',
			'$this->email',
			md5('$this->senha')
		)";
		if(!$conexao->exec($queryAluno)) $erro = true;
		$this->id = $conexao->lastInsertId();
		
		$queryMatricula = "INSERT INTO matriculas (idAluno, idTurma) VALUES ($this->id, $this->idTurma)";
		if(!$conexao->exec($queryMatricula)) $erro = true;

		if ($erro){
			throw new Exception("Erro ao inserir aluno");
		}else{
			Log::gravarLog($this->id, "criar conta");
		}
	}

	//atualizar dados do perfil
	public function atualizar(){
		if (strlen($this->senha)==0){
			$query = "UPDATE alunos SET nome=:nome, email=:email WHERE idAluno=:id";
		}else{
			$query = "UPDATE alunos SET nome=:nome, email=:email, senha=md5('$this->senha') WHERE idAluno=:id";
		}
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':id', $this->id);
	    $stmt->bindValue(':nome', $this->nome);
	    $stmt->bindValue(':email', $this->email);

		if(!$stmt->execute()) throw new Exception("Erro ao alterar dados");
		else {
			Log::gravarLog($this->id, "alterar perfil");
		}
	}

	//trocar senha do aluno pelo painel do professor
	public function alterarSenha(){
		$query = "UPDATE alunos SET senha=md5('$this->senha') WHERE idAluno=:id";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':id', $this->id);

		if(!$stmt->execute()) throw new Exception("Erro ao alterar dados");
	}

	//trocar referencia para a foto do aluno
	public function trocarFoto(){
		$query = "UPDATE alunos SET foto=:foto WHERE idAluno=:id";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':id', $this->id);
	    $stmt->bindValue(':foto', $this->foto);
		if(!$stmt->execute()) throw new Exception("Erro ao alterar dados");
		else {
			Log::gravarLog($this->id, "alterar foto de perfil");
		}
	}

	//carregar os dados do aluno através do id
	public function carregar(){ 
	    $query = "SELECT nome, email, senha, foto, matriculas.idTurma FROM alunos INNER JOIN matriculas ON matriculas.idAluno=Alunos.idAluno WHERE alunos.idAluno = :id";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':id', $this->id);
	    $stmt->execute();
	    $linha = $stmt->fetch();
	    $this->nome = $linha['nome'];
	    $this->email = $linha['email'];
	    $this->senha = $linha['senha'];
	    $this->foto = $linha['foto'];
	    $this->idTurma = $linha['idTurma'];
	}

	//carrega os dados através do email e senha
	public function logar(){ 
	    $query = "SELECT idAluno, nome FROM alunos WHERE email=:email AND senha=md5(:senha)";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':email', $this->email);
	    $stmt->bindValue(':senha', $this->senha);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
		    $linha = $lista[0];
	    	$this->id = $linha['idAluno'];
	    	$this->nome = $linha['nome'];
    		Log::gravarLog($this->id, "login");
	    }else{
	    	throw new Exception("E-mail e/ou senha inválidos");
	    }
	}

	//sair do sistema
	public function logout(){ 
		Log::gravarLog($this->id, "logout");
		session_destroy();
	}

	//atualizar engajamento
	public function atualizarEngajamento($score){
		$query = "UPDATE alunos SET engajamento=:score WHERE idAluno=:id";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':id', $this->id);
	    $stmt->bindValue(':score', $score);

		if(!$stmt->execute()) throw new Exception("Erro ao alterar engajamento");
	}

	//atualizar perfil de jogador
	public function atualizarPerfilJogador($perfil){
		$query = "UPDATE alunos SET perfilJogador=:perfil WHERE idAluno=:id";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':id', $this->id);
	    $stmt->bindValue(':perfil', $perfil);

		if(!$stmt->execute()) throw new Exception("Erro ao alterar perfil de jogador");
	}

	//atualizar perfil de aprendizagem
	public function atualizarPerfilAprendizagem($perfil){
		$query = "UPDATE alunos SET perfilAprendizagem=:perfil WHERE idAluno=:id";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':id', $this->id);
	    $stmt->bindValue(':perfil', $perfil);

		if(!$stmt->execute()) throw new Exception("Erro ao alterar perfil de aprendizagem");
	}

}

