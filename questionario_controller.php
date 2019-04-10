<?php require_once 'global.php';

if (isset($_POST["acao"])) $acao = $_POST["acao"];
else exit();

if ($acao == "responder"){
	$questionario = new Questionario();
	$questionario->idAluno = $_POST["idAluno"];
	try {
		echo $questionario->selecionarAlternativa($_POST["idAlternativa"]);
	} catch (Exception $e) {
		echo "erro: " . $e->getMessage();
	}	
}

