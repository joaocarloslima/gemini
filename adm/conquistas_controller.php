<?php require_once 'global.php';
session_start();

$conquista = new Conquista();
$conquista->id = $_POST["idCompetencia"];
$conquista->idAluno = $_POST["idAluno"];

try {
	$conquista->inserirParaAluno();
	$_SESSION["success"] = "<strong>Sucesso. </strong> Competência Adicionada";
	header("Location: conquistas.php");
} catch (Exception $e) {
	Erro::trataErro($e);
	$_SESSION["danger"] = "<strong>Opa!</strong> Erro ao salvar competências.";
}