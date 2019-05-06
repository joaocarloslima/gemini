<?php require_once 'global.php';

$aluno = new Alunos();
$aluno->id = $_POST["id"];

try {
	$aluno->excluir();
    $_SESSION["success"] = "<strong>Sucesso.</strong> Aluno excluído com sucesso";
	header("Location: alunos.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa.</strong> Erro ao excluir aluno";
	header("Location: alunos.php");

}