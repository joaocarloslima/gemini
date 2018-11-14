<?php
require_once("Conexao.php");
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
		else return $conexao->lastInsertId();
	}
}