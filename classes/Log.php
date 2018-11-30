<?php
require_once "global.php";
class Log
{
    public static function gravarLog($idAluno, $acao)
    {
	    $query = "INSERT INTO log (data, idAluno, acao) VALUES (now(), :idAluno, :acao) ";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idAluno', $idAluno);
	    $stmt->bindValue(':acao', $acao);
	    $stmt->execute();
    }
}