<?php
require_once("global.php");

class Questionario {
	public $idFase;
	public $idAluno;

	public function selecionarAlternativa($idAlternativa)
	{
		$query = "INSERT INTO alunos_respostas (idAluno, idAlternativa) VALUES (:idAluno,:idAlternativa) ON DUPLICATE KEY UPDATE selecionada = NOT selecionada";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':idAluno', $this->idAluno);
		$stmt->bindValue(':idAlternativa', $idAlternativa);
		$stmt->execute();
	}
}
