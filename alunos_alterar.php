<?php require_once 'global.php';
session_start('gemini');

$aluno = new Aluno();
$aluno->id = $_SESSION["iduser"];
$aluno->nome = $_POST["nome"];
$aluno->email = $_POST["email"];
$aluno->senha = $_POST["senha"];

try {
	$aluno->atualizar();
    $_SESSION["success"] = "<strong>Sucesso.</strong> Dados alterados.";
	header("Location: perfil.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa.</strong> Erro ao alterar dados";
	header("Location: perfil.php");

}