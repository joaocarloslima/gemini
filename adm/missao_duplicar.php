<?php require_once 'global.php';
session_start();

if (isset($_GET["idmissao"])){

	$missao = new Missao();
	$missao->id = $_GET["idmissao"];

	try {
		$missao->duplicar();
	    $_SESSION["success"] = "<strong>Sucesso.</strong> Missão duplicada.";
	} catch (Exception $e) {
	    $_SESSION["danger"] = "<strong>Eita.</strong> Falha ao duplicar.". $e->getMessage();
	}
	header("Location: missoes.php");

}
