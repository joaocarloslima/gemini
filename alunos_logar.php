<?php require_once 'global.php';
session_start();

$aluno = new Aluno();
$aluno->email = $_POST["email"];
$aluno->senha = $_POST["senha"];

try {
	$aluno->logar();
	$_SESSION["logadogemini"]=1;
	$_SESSION["iduser"]=$aluno->id;
	$primeiro_nome = explode(" ", $aluno->nome);
	$_SESSION["user"]=$primeiro_nome[0];
	header("Location: dashboard.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>E-mail ou senha inválido.</strong> Tente novamente ou entre em contato com o professor";
	header("Location: login.php");
}