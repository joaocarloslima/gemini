<?php
require_once("global.php");

class Aluno {
	public $id;
	public $nome;
	public $email;
	public $senha;
	
	public function inserir(){
		$query = "INSERT INTO alunos (nome, email, senha) VALUES (
			'$this->nome',
			'$this->email',
			md5('$this->senha')
		)";
		$conexao = Conexao::pegarConexao();
		if(!$conexao->exec($query)) throw new Exception("Erro ao inserir aluno");
		else {
			$this->id = $conexao->lastInsertId();
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

	//carregar os dados do aluno através do id
	public function carregar(){ 
	    $query = "SELECT nome, email, senha FROM alunos WHERE idAluno = :id";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':id', $this->id);
	    $stmt->execute();
	    $linha = $stmt->fetch();
	    $this->nome = $linha['nome'];
	    $this->email = $linha['email'];
	    $this->senha = $linha['senha'];
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

}

