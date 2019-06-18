<?php
require_once("global.php");

class ControleFase {
	public $idFase;
	public $idAluno;
	public $desempenho;
	public $resposta;
	public $anexo;
	public $xp=0;

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
		else {
			Log::gravarLog($this->idAluno, "concluiu fase ");
		}
	}

	public function iniciar(){
		$conexao = Conexao::pegarConexao();
		//inserir apenas se não existir
		$query = "INSERT INTO alunos_fases (iniciadoEm, idAluno, idFase) 
		VALUES (NOW(), $this->idAluno, $this->idFase) ON DUPLICATE KEY UPDATE iniciadoEm=iniciadoEm";
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

public function cancelarEnvio(){
	$conexao = Conexao::pegarConexao();
	$query = "UPDATE alunos_fases SET finalizadoEm=NULL WHERE idAluno=$this->idAluno AND idFase=$this->idFase";
	if(!$conexao->exec($query)) throw new Exception("Erro ao cancelar envio");
}

public static function atualizarRanking($idAluno){
	$a = new AlunoPlayer();
	$a->id = $idAluno;
	$a->carregar();
	$alunos = new Alunos();
	$alunos->buscarTodos(1, $a->idTurma);
	$posicao=1;
	$conexao = Conexao::pegarConexao();
	foreach ($alunos->lista as $aluno) {
		if (!isset($aluno->xp)) $aluno->xp=0;
		$query = "INSERT INTO ranking (idAluno, posicao, data, xp) VALUES ($aluno->id, $posicao, NOW(), $aluno->xp) ON DUPLICATE KEY UPDATE posicao=$posicao, xp=$aluno->xp";
		$conexao->exec($query);
		$posicao++;
	}
}

public function carregar(){
	$query = "SELECT alunos_fases.* FROM alunos_fases WHERE idAluno = $this->idAluno AND idFase=$this->idFase";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->execute();
	$linha = $stmt->fetch();
	$this->xp = $linha["xp"];
}

public function getTimeline(){
	$query = "SELECT alunos_fases.*, alunos_fases.xp as xpObtido, alunos_fases.anexo as anexoEnviado, fases.nome as nomeFase, fases.idMissao, missoes.nome as nomeMissao, fases.descricao, fases.tipo FROM alunos_fases INNER JOIN fases ON fases.idFase=alunos_fases.idFase INNER JOIN missoes ON missoes.idMissao=fases.idMissao WHERE idAluno = $this->idAluno ORDER BY finalizadoEm";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($query);
	$stmt->execute();
	$fases = array();
	while ($linha = $stmt->fetch()){
		$fase = new Fase();
		$fase->id = $linha["idFase"];
		$fase->nome = $linha["nomeFase"];
		$fase->descricao =  $linha["descricao"];
		$fase->tipo = $linha["tipo"];
		$fase->idMissao = $linha["idMissao"];
		$fase->missao = $linha["nomeMissao"];
		$fase->xp = $linha["xp"];
		$fase->anexo = $linha["anexo"];
		$fase->xpObtido = $linha["xpObtido"];
		$fase->anexoEnviado = $linha["anexoEnviado"];
		$fase->feedback = $linha["feedback"];
		$fase->finalizadoEm = $linha["finalizadoEm"];
		array_push($fases, $fase);
	}
	return $fases;
}

public function alunoTemPermissao(){
		
}


}