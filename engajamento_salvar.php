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

try {
	$engajamento->inserir();
	ControleFase::atualizarRanking($_SESSION["iduser"]);
    $_SESSION["success"] = "<strong>Questionário respondido com sucesso.</strong> Obrigado pelas informações";
	header("Location: perfil.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa!</strong> Não foi possível salvar as respostas. Informe o professor sobre o problema.";

}