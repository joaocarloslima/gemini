<?php
require_once("global.php");

class ControleFase {
	public $idFase;
	public $idAluno;
	public $desempenho;
	public $resposta;
	public $anexo;
	public $xp;

	public function gravarRespostaAtividade(){
		$conexao = Conexao::pegarConexao();
		$query = "UPDATE alunos_fases SET finalizadoEm=NOW(), resposta='$this->resposta', anexo='$this->anexo' WHERE idAluno=$this->idAluno AND idFase=$this->idFase";
		if(!$conexao->exec($query)) throw new Exception("Erro ao gravar resposta");
		else Log::gravarLog($this->idAluno, "concluiu atividade "); 
	}

	public function concluir(){
		$conexao = Conexao::pegarConexao();
		$query = "UPDATE alunos_fases SET finalizadoEm=NOW(), xp=(SELECT XP FROM fases WHERE idFase=$this->idFase)*$this->desempenho WHERE idAluno=$this->idAluno AND idFase=$this->idFase";
		if(!$conexao->exec($query)) throw new Exception("Erro ao concluir fase");
		else Log::gravarLog($this->idAluno, "concluiu fase "); 
	}

	public function iniciar(){
		$conexao = Conexao::pegarConexao();
		//inserir apenas se não existir
		$query = "INSERT INTO alunos_fases (iniciadoEm, idAluno, idFase) 
					SELECT * FROM (SELECT NOW(), $this->idAluno, $this->idFase) AS tmp
					WHERE NOT EXISTS (
					    SELECT idFase FROM alunos_fases WHERE idAluno = $this->idAluno AND idFase=$this->idFase
					) LIMIT 1";
		if($conexao->exec($query)){
			Log::gravarLog($this->idAluno, "iniciou fase "); 
		}
	}


	public function getNotificacoes(){
		$query = "SELECT alunos_fases.*, fases.nome, fases.idMissao FROM alunos_fases INNER JOIN fases ON fases.idFase=alunos_fases.idFase WHERE idAluno = $this->idAluno AND feedback IS NOT NULL AND feedbackVisualizadoEm IS NULL";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $notificacoes = array();
	    while ($linha = $stmt->fetch()){
	    	$notificacoes[$linha["idMissao"]] = $linha["nome"];
	    }
	    return $notificacoes;
	}

	public function marcarFeedbackComoLido($idFase, $idAluno){
		$conexao = Conexao::pegarConexao();
		$query = "UPDATE alunos_fases SET feedbackVisualizadoEm=NOW() WHERE idAluno=$idAluno AND idFase=$idFase";
		if(!$conexao->exec($query)) throw new Exception("Erro ao marcar feedback como lido");
	}


}