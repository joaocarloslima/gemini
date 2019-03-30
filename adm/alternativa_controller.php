<?php require_once 'global.php';

if (isset($_POST["acao"])) $acao = $_POST["acao"];
else exit();

if ($acao == "new"){
	$alternativa = new Alternativa();
	$alternativa->idQuestao = $_POST["idQuestao"];
	try {
		echo $alternativa->inserirAlternativa();
	} catch (Exception $e) {
		echo "erro";
	}	
}

if ($acao == "edit"){
	$alternativa = new Alternativa();
	$alternativa->id = $_POST["idAlternativa"];
	$alternativa->texto = $_POST["texto"];
	try {
		$alternativa->editarAlternativa();
		echo "sucesso";
	} catch (Exception $e) {
		echo "erro". $e;
	}	
}

if ($acao == "del"){
	$alternativa = new Alternativa();
	$alternativa->id = $_POST["id"];
	try {
		$alternativa->apagarAlternativa();
		echo "sucesso";
	} catch (Exception $e) {
		echo "erro";
	}	
}

if ($acao == "swapCorreta"){
	$alternativa = new Alternativa();
	$alternativa->id = $_POST["id"];
	try {
		$alternativa->swapCorreta();
		echo "sucesso";
	} catch (Exception $e) {
		echo "erro";
	}	
}
