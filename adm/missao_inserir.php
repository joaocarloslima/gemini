<?php require_once 'global.php';
session_start();
$missao = new Missao();
$missao->nome = $_POST["nome"];
$missao->descricao = $_POST["descricao"];
$missao->levelminimo = $_POST["levelminimo"];
$missao->liberada = isset($_POST["liberada"])?1:0;;
$missao->idTurma = $_POST["turma"];

//upload da imagem
$nomedoarquivo = $_FILES["imagem"]["name"];
$extensao = end((explode(".", $nomedoarquivo))); 
$arquivo = 'assets/img/missoes/img_missao' . time() . "." . $extensao;
move_uploaded_file($_FILES['imagem']['tmp_name'], $arquivo);
$missao->imagem = $arquivo;

try {
	$missao->inserir();
	
	
	$_SESSION["success"] = "<strong>Sucesso </strong> Missão cadastrada";

	header("Location: missoes.php");
} catch (Exception $e) {
	$_SESSION["danger"] = "<strong>Erro </strong> Missão não cadastrada";
	Erro::trataErro($e);
}