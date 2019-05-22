<?php require_once 'global.php';
session_start();

$conquista = new Conquista();
$conquista->id = $_POST["idCompetencia"];
$conquista->idAluno = $_POST["idAluno"];

try {
	$conquista->inserirParaAluno();
	echo "ok";
} catch (Exception $e) {
	echo "erro";
	Erro::trataErro($e);
}