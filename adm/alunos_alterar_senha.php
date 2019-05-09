<?php require_once 'global.php';
session_start();

$aluno = new Aluno();
$aluno->id = $_POST["id"];
$aluno->senha = $_POST["senha"];

try {
	$aluno->alterarSenha();
    $_SESSION["success"] = "<strong>Sucesso.</strong> Dados alterados.";
	header("Location: alunos.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa.</strong> Erro ao alterar dados";
	header("Location: alunos.php");

}