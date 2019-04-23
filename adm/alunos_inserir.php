<?php require_once 'global.php';

$aluno = new Aluno();
$aluno->nome = $_POST["nome"];
$aluno->email = $_POST["email"];
$aluno->senha = $_POST["senha"];

try {
	$aluno->inserir();
	ControleFase::atualizarRanking();
	session_start();
	$_SESSION["logadogemini"]=1;
	$_SESSION["iduser"]=$aluno->id;
	$primeiro_nome = explode(" ", $aluno->nome);
	$_SESSION["user"]=$primeiro_nome[0];
	header("Location: dashboard.php");
} catch (Exception $e) {
	Erro::trataErro($e);
}