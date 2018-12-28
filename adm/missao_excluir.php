<?php require_once 'global.php';
session_start();

$missao = new Missao();
$missao->id = $_POST["id"];

try {
	$missao->apagar();
    $_SESSION["success"] = "<strong>Sucesso.</strong> Missão apagada.";
	header("Location: missoes.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa.</strong> Erro ao apagar missão";
	header("Location: missoes.php");

}