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
