<?php require_once 'global.php';
session_start();

$perfil = new PerfilAprendizagem();
$perfil->idAluno = $_SESSION["iduser"];
$perfil->q01 = $_POST["r1"];
$perfil->q02 = $_POST["r2"];
$perfil->q03 = $_POST["r3"];
$perfil->q04 = $_POST["r4"];
$perfil->q05 = $_POST["r5"];
$perfil->q06 = $_POST["r6"];
$perfil->q07 = $_POST["r7"];
$perfil->q08 = $_POST["r8"];
$perfil->q09 = $_POST["r9"];
$perfil->q10 = $_POST["r10"];
$perfil->q11 = $_POST["r11"];
$perfil->q12 = $_POST["r12"];
$perfil->q13 = $_POST["r13"];
$perfil->q14 = $_POST["r14"];
$perfil->q15 = $_POST["r15"];
$perfil->q16 = $_POST["r16"];

try {
	$perfil->inserir();
	ControleFase::atualizarRanking($_SESSION["iduser"]);
    $_SESSION["success"] = "<strong>Questionário respondido com sucesso.</strong> Obrigado pelas informações";
	header("Location: perfil.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa!</strong> Não foi possível salvar as respostas. Informe o professor sobre o problema.";
}