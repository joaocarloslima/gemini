<?php require_once 'global.php';
session_start();

$aluno = new Aluno();
$aluno->id = $_SESSION["iduser"];


$upload = new UploadImagem(); 
$upload->width = 200; 
$upload->height = 200; 


$nomedoarquivo = $_FILES["foto"]["name"];
$extensao = end((explode(".", $nomedoarquivo))); 
$novonomearquivo = 'foto_aluno' . time() . "." . $extensao;
$aluno->foto = "assets/img/alunos/".$novonomearquivo;

try {
	$upload->salvar("assets/img/alunos/", $_FILES['foto'], $novonomearquivo);
	$aluno->trocarFoto();
    $_SESSION["success"] = "<strong>Sucesso.</strong> Dados alterados.";
    //var_dump($aluno);
	header("Location: perfil.php");
} catch (Exception $e) {
	Erro::trataErro($e);
    $_SESSION["danger"] = "<strong>Opa.</strong> Erro ao trocar foto. " . $e->getMessage();
	header("Location: perfil.php");

}