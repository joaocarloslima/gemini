<?php require_once 'global.php';
session_start();

$aviso = new Aviso();
$aviso->titulo = $_POST["titulo"];
$aviso->texto = $_POST["texto"];
$aviso->paraTurma = ($_POST["paraTurma"]=="1")?1:0;
$aviso->idDestinatario = $_POST["destinatario"];
try {
	$aviso->inserir();
	$_SESSION["success"] = "<strong>Sucesso </strong> Aviso cadastrado";
	header("Location: avisos.php");
} catch (Exception $e) {
	$_SESSION["danger"] = "<strong>Erro </strong> Aviso não cadastrado";
	Erro::trataErro($e);
}