<?php 
session_start();
if (!isset($_SESSION["logadogemini"])){
	$_SESSION["info"] = "<strong>Opa!</strong> Você precisa logar para acessar essa página.";
	header("Location: login.php");
	die();
}
