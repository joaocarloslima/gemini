<?php require_once 'global.php';
session_start();
$fase = new Fase();
$fase->nome = $_POST["nome"];
$fase->descricao = $_POST["descricao"];
$fase->xp = $_POST["xp"];
$fase->idMissao = $_POST["idMissao"];
$fase->tipo = $_POST["tipo"];
$fase->prazo = $_POST["prazo"];

//upload do anexo
if (!empty($_FILES['arquivo']['name'])) {
	$nomedoarquivo = $_FILES["arquivo"]["name"];
	$extensao = end((explode(".", $nomedoarquivo))); 
	$arquivo = 'anexos/arquivo' . time() . "." . $extensao;
	move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo);
	$fase->anexo = $arquivo;
}

try {
	$fase->inserir();
	$_SESSION["success"] = "<strong>Sucesso </strong> Fase cadastrada";
	header("Location: fases.php?idmissao=".$fase->idMissao);
} catch (Exception $e) {
	$_SESSION["danger"] = "<strong>Erro </strong> Fase não cadastrada";
	Erro::trataErro($e);
}