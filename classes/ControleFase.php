<?php
require_once("global.php");

class ControleFase {
	public $idFase;
	public $idAluno;
	public $desempenho;
	public $xp;

	public function concluir(){
		$conexao = Conexao::pegarConexao();
		$query = "UPDATE alunos_fases SET finalizadoEm=NOW(), xp=$this->desempenho WHERE idAluno=$this->idAluno AND idFase=$this->idFase";
		if(!$conexao->exec($query)) throw new Exception("Erro ao concluir fase");
	}
}