<?php 
include "verificar_login.php";

require_once 'global.php';

$controleFase = new ControleFase();
$controleFase->idFase = $_POST["idFase"];
$controleFase->idAluno = $_SESSION["iduser"];
$controleFase->desempenho = $_POST["desempenho"];

try {
	$controleFase->concluir();
	echo "sucesso";
} catch (Exception $e) {
	Erro::trataErro($e);
	echo "erro";
}

