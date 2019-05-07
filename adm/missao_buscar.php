<?php require_once 'global.php';

$missao = new Missao();
$missao->id = $_POST["id"];

try {
	$missao->carregar();
	echo json_encode($missao);
} catch (Exception $e) {
	echo $e;
}