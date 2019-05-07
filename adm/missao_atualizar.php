<?php require_once 'global.php';
session_start();

if (isset($_POST["acao"]) && $_POST["acao"]=="swapliberada"){

	$missao = new Missao();
	$missao->id = $_POST["id"];

	try {
		$missao->trocarLiberada();
		echo "sucesso";
	} catch (Exception $e) {
		echo "erro";
	}
}

if (isset($_POST["acao"]) && $_POST["acao"]=="editar"){
	$missao = new Missao();
	$missao->id = $_POST["idMissao"];
	$missao->nome = $_POST["nome"];
	$missao->descricao = $_POST["descricao"];
	$missao->levelminimo = $_POST["levelminimo"];
	$missao->idTurma = $_POST["turma"];
	//var_dump($missao);
	try {
		$missao->editar();
		$_SESSION["success"] = "<strong>Sucesso </strong> Missão alterada";
		header("Location: missoes.php");
	} catch (Exception $e) {
		$_SESSION["danger"] = "<strong>Erro </strong> Erro ao editar missão. ". $e->getMessage();
		Erro::trataErro($e);
	}
}
