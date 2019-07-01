<?php
require_once "global.php";
class Log
{
	public $id;
	public $idAluno;
	public $nomeAluno;
	public $foto;
	public $data;
	public $acao;
	public $dataFormatada;

    public static function gravarLog($idAluno, $acao)
    {
	    $query = "INSERT INTO log (data, idAluno, acao) VALUES (now(), :idAluno, :acao) ";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idAluno', $idAluno);
	    $stmt->bindValue(':acao', $acao);
	    $stmt->execute();

	    //registrar o acesso
	    $query = "SELECT *, TIMESTAMPDIFF(MINUTE, dataLogout, NOW()) as tempoDesdeUltimoAcesso FROM tempo_acesso WHERE idAluno=$idAluno AND data = CURDATE() ORDER BY dataLogout DESC LIMIT 1";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    $lista = $stmt->fetchAll();
	    //se já tiver registro de acesso hoje, altera, caso contrário cria
	    if (count($lista)>0){
	    	//se a última ação foi a mais de 10 minutos, criar outro registro de acesso
	    	$registro = $lista[0];
	    	if ($registro["tempoDesdeUltimoAcesso"]>10){
	    		$query = "INSERT INTO tempo_acesso (idAluno, data, dataLogin, dataLogout) VALUES (:idAluno, NOW(), NOW(), NOW()) ";
	    	}else{
	    		$query = "UPDATE tempo_acesso SET dataLogout=NOW() WHERE idAluno=$idAluno AND data = CURDATE() ORDER BY dataLogout DESC LIMIT 1";
	    	}
	    }else{
	    	$query = "INSERT INTO tempo_acesso (idAluno, data, dataLogin, dataLogout) VALUES (:idAluno, NOW(), NOW(), NOW()) ";
	    }
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idAluno', $idAluno);
	    $stmt->execute();
    }

    public static function getUltimosLogs(){
		$query = "SELECT log.*, alunos.* FROM log INNER JOIN alunos ON alunos.idAluno=log.idAluno ORDER BY data DESC LIMIT 20";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
    	$logs = array();
		if(!$stmt->execute()) throw new Exception("Erro ao buscar logs");
	    else{
		    while ($linha = $stmt->fetch()){
		    	$log = new Log();
		    	$log->id = $linha["idLog"];
		    	$log->idAluno = $linha["idAluno"];
		    	$log->nomeAluno = $linha["nome"];
		    	$log->data = (new DateTime($linha["data"]))->format('d/m H:i');
		    	$log->acao = $linha["acao"];
		    	$log->foto = $linha["foto"];
		    	array_push($logs, $log);
		    }
		}
	    return $logs;
	}
    


}