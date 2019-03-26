<?php require_once 'global.php';

if (isset($_POST["acao"])) $acao = $_POST["acao"];
else exit();

if ($acao == "new"){
	$questao = new Questao();
	$questao->idFase = $_POST["idFase"];
	$questao->idElemento = $_POST["idElemento"];

	try {
		$questao->inserirQuestao();
		echo "sucesso";
	} catch (Exception $e) {
		echo "erro";
	}	
}

if ($acao == "edit"){
	$questao = new Questao();
	$questao->idFase = $_POST["idFase"];
	$questao->enunciado = $_POST["enunciado"];
	$questao->idElemento = $_POST["idElemento"];

	try {
		$questao->editarQuestao();
		echo "sucesso";
	} catch (Exception $e) {
		echo "erro". $e;
	}	
}

if ($acao == "del"){
	$questao = new Questao();
	$questao->idFase = $_POST["idFase"];
	$questao->idElemento = $_POST["idElemento"];
	$questao->enunciado = $_POST["enunciado"];

	try {
		$questao->apagarQuestao();
		echo "sucesso";
	} catch (Exception $e) {
		echo "erro";
	}	
}
