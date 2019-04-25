<?php require_once 'global.php';
session_start();

$aluno = new Aluno();
$aluno->id = $_SESSION["iduser"];

//upload da imagem
$nomedoarquivo = $_FILES["foto"]["name"];
$extensao = end((explode(".", $nomedoarquivo))); 
$arquivo = 'assets/img/alunos/foto_aluno' . time() . "." . $extensao;
move_uploaded_file($_FILES['foto']['tmp_name'], $arquivo);
$aluno->foto = $arquivo;

try {
	$aluno->trocarFoto();
    $_SESSION["success"] = "<strong>Sucesso.</strong> Dados alterados.";
    //var_dump($aluno);
	header("Location: perfil.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa.</strong> Erro ao alterar dados";
	header("Location: perfil.php");

}