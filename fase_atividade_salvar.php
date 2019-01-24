<?php require_once 'global.php';
session_start();

$controleFase = new ControleFase();
$controleFase->idAluno = $_SESSION["iduser"];
$controleFase->idFase = $_POST["idFase"];
$controleFase->resposta = $_POST["resposta"];

if (!empty($_FILES['anexo']['name'])) {
//upload do arquivo
	$nomedoarquivo = $_FILES["anexo"]["name"];
	$extensao = end((explode(".", $nomedoarquivo))); 
	$arquivo = 'atividades/atividade' . time() . "." . $extensao;
	move_uploaded_file($_FILES['anexo']['tmp_name'], $arquivo);
	$controleFase->anexo = $arquivo;
}

try {
	$controleFase->gravarRespostaAtividade();
	$_SESSION["success"] = "<strong>Sucesso.</strong> Atividade respondida. Aguarde o feedback do professor.";
} catch (Exception $e) {
	Erro::trataErro($e);
	$_SESSION["danger"] = "<strong>Opa!</strong> Não foi possível salvar as respostas. Informe o professor sobre o problema.";
}
header("Location: missoes.php");