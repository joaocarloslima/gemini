<?php require_once 'global.php';
session_start();

$atividade = new Atividade();
$atividade->idFase = $_POST["idFase"];
$atividade->idAluno = $_POST["idAluno"];
$atividade->feedback = $_POST["feedback"];
$atividade->desempenho = $_POST["desempenho"];

try {
	$atividade->salvarFeedback();
    $_SESSION["success"] = "<strong>Sucesso.</strong> Feedback salvo com sucesso.";
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa!</strong> Erro ao salvar feedback.";
}

header("Location: avaliar_fase.php?id=". $atividade->idFase);