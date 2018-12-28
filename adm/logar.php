<?php require_once 'global.php';
session_start();

$professor = new Professor();
$professor->login = $_POST["login"];
$professor->senha = $_POST["senha"];

try {
	$professor->logar();
	$_SESSION["logadogeminiadm"]=1;
	$_SESSION["iduser"]=$professor->id;
	$primeiro_nome = explode(" ", $professor->nome);
	$_SESSION["user"]=$primeiro_nome[0];
	header("Location: dashboard.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Login ou senha inválido.</strong> Tente novamente ou entre em contato com o adminstrador";
	header("Location: login.php");
}