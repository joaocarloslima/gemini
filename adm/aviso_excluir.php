<?php require_once 'global.php';
session_start();

$aviso = new Aviso();
$aviso->id = $_POST["id"];

try {
	$aviso->apagar();
    $_SESSION["success"] = "<strong>Sucesso.</strong> Aviso apagado.";
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa.</strong> Erro ao apagar Aviso";
}
header("Location: avisos.php");