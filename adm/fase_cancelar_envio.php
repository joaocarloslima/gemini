<?php require_once 'global.php';
session_start();

$controleFase = new ControleFase();
$controleFase->idFase = $_GET["idFase"];
$controleFase->idAluno = $_GET["idAluno"];

try {
	$controleFase->cancelarEnvio();
	$_SESSION["success"] = "<strong>Sucesso </strong> Envio cancelado";
	header("Location: avaliar_fase.php?id=".$controleFase->idFase);
} catch (Exception $e) {
	$_SESSION["danger"] = "<strong>Erro </strong> Não foi possível cancelar o envio.";
	Erro::trataErro($e);
	header("Location: avaliar_fase.php?id=".$controleFase->idFase);
}