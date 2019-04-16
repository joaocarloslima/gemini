<?php 
include "verificar_login.php";

require_once 'global.php';

$controleFase = new ControleFase();
$controleFase->idFase = $_POST["idFase"];
$controleFase->idAluno = $_SESSION["iduser"];

$questionario = new Questionario();
$questionario->idFase =$_POST["idFase"];
$questionario->idAluno = $_SESSION["iduser"];
$questoes = $questionario->listarQuestoes();

//corrigir questoes
$acertos = 0;
$qtde_alternativas = 0;
foreach ($questoes as $questao) {
	$qtde_alternativas += sizeof($questao->alternativas);
	foreach ($questao->alternativas as $alternativa) {
		if (isset($_POST["a".$alternativa->id])) $selecionada = 1; else $selecionada = 0;
		if ($alternativa->correta == $selecionada) $acertos++; else $acertos--;
	}
}
$acertos = ($acertos<0)?0:$acertos;
$desempenho = $acertos/$qtde_alternativas;


//salvar e retornar desempenho
$controleFase->desempenho = $desempenho;

try {
	$controleFase->concluir();
	echo $desempenho;
} catch (Exception $e) {
	Erro::trataErro($e);
	echo "erro";
}

