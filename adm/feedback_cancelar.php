<?php require_once 'global.php';
session_start();

$atividade = new Atividade();
$atividade->idFase = $_POST["idFase"];
$atividade->idAluno = $_POST["idAluno"];

try {
	$atividade->cancelarFeedback();
    $_SESSION["success"] = "<strong>Sucesso.</strong> Feedback cancelado com sucesso.";
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa!</strong> Erro ao cancelar feedback.";
}

header("Location: avaliar_fase.php?id=". $atividade->idFase);