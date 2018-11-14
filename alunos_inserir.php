<?php require_once 'global.php';

$aluno = new Aluno();
$aluno->nome = $_POST["nome"];
$aluno->email = $_POST["email"];
$aluno->senha = $_POST["senha"];

try {
	$id = $aluno->inserir();
	session_start('gemini');
	$_SESSION["logado"]=1;
	$_SESSION["iduser"]=$id;
	header("Location: dashboard.php");
} catch (Exception $e) {
	Erro::trataErro($e);
}