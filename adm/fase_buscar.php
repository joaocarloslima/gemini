<?php require_once 'global.php';

$fase = new Fase();
$fase->id = $_POST["id"];

try {
	$fase->carregar();
	echo json_encode($fase);
} catch (Exception $e) {
	echo $e;
}