<?php require_once 'global.php';
session_start();

$perfil = new PerfilJogador();
$perfil->idAluno = $_SESSION["iduser"];
$perfil->q01 = $_POST["r01"];
$perfil->q02 = $_POST["r02"];
$perfil->q03 = $_POST["r03"];
$perfil->q04 = $_POST["r04"];
$perfil->q05 = $_POST["r05"];
$perfil->q06 = $_POST["r06"];
$perfil->q07 = $_POST["r07"];
$perfil->q08 = $_POST["r08"];
$perfil->q09 = $_POST["r09"];
$perfil->q10 = $_POST["r10"];
$perfil->q11 = $_POST["r11"];
$perfil->q12 = $_POST["r12"];
$perfil->q13 = $_POST["r13"];
$perfil->q14 = $_POST["r14"];
$perfil->q15 = $_POST["r15"];
$perfil->q16 = $_POST["r16"];
$perfil->q17 = $_POST["r17"];
$perfil->q18 = $_POST["r18"];
$perfil->q19 = $_POST["r19"];
$perfil->q20 = $_POST["r20"];
$perfil->q21 = $_POST["r21"];
$perfil->q22 = $_POST["r22"];
$perfil->q23 = $_POST["r23"];
$perfil->q24 = $_POST["r24"];

try {
	$perfil->inserir();
    $_SESSION["success"] = "<strong>Questionário respondido com sucesso.</strong> Obrigado pelas informações";
	header("Location: perfil.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa!</strong> Não foi possível salvar as respostas. Informe o professor sobre o problema.";

}