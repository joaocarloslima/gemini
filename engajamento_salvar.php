<?php require_once 'global.php';
session_start();

$engajamento = new Engajamento();
$engajamento->idAluno = $_SESSION["iduser"];
$engajamento->q1 = $_POST["resposta1"];
$engajamento->q2 = $_POST["resposta2"];
$engajamento->q3 = $_POST["resposta3"];
$engajamento->q4 = $_POST["resposta4"];
$engajamento->q5 = $_POST["resposta5"];
$engajamento->q6 = $_POST["resposta6"];
$engajamento->q7 = $_POST["resposta7"];
$engajamento->q8 = $_POST["resposta8"];
$engajamento->q9 = $_POST["resposta9"];
$engajamento->q10 = $_POST["resposta10"];
$engajamento->q11 = $_POST["resposta11"];
$engajamento->q12 = $_POST["resposta12"];
$engajamento->q13 = $_POST["resposta13"];
$engajamento->q14 = $_POST["resposta14"];
$engajamento->q15 = $_POST["resposta15"];
$engajamento->q16 = $_POST["resposta16"];
$engajamento->q17 = $_POST["resposta17"];

try {
	$engajamento->inserir();
	ControleFase::atualizarRanking($_SESSION["iduser"]);
    $_SESSION["success"] = "<strong>Questionário respondido com sucesso.</strong> Obrigado pelas informações";
	header("Location: perfil.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa!</strong> Não foi possível salvar as respostas. Informe o professor sobre o problema.";

}