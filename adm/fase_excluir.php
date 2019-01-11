<?php require_once 'global.php';
session_start();

$fase = new Fase();
$fase->id = $_POST["id"];
$fase->idMissao = $_POST["idMissao"];

try {
	$fase->apagar();
    $_SESSION["success"] = "<strong>Sucesso.</strong> Fase apagada.";
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa.</strong> Erro ao apagar Fase";
}
header("Location: fases.php?idmissao=".$fase->idMissao);