<?php
require_once("global.php");

class Professor {
	public $id;
	public $nome;
	public $login;
	public $senha;
	
	//carregar os dados do professor através do id
	public function carregar(){ 
	    $query = "SELECT nome, login, senha FROM professores WHERE idProfessor = :id";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':id', $this->id);
	    $stmt->execute();
	    $linha = $stmt->fetch();
	    $this->nome = $linha['nome'];
	    $this->login = $linha['login'];
	    $this->senha = $linha['senha'];
	}

	//carrega os dados através do login e senha
	public function logar(){ 
	    $query = "SELECT idProfessor, nome FROM professores WHERE login=:login AND senha=md5(:senha)";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':login', $this->login);
	    $stmt->bindValue(':senha', $this->senha);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    if (count($lista)>0){
		    $linha = $lista[0];
	    	$this->id = $linha['idProfessor'];
	    	$this->nome = $linha['nome'];
	    }else{
	    	throw new Exception("Login e/ou senha inválidos");
	    }
	}

	//sair do sistema
	public function logout(){ 
		session_destroy();
	}

}

