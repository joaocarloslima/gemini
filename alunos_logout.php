<?php require_once 'global.php';
session_start(); 
$aluno = new Aluno();
$aluno->id = $_SESSION["iduser"];
$aluno->logout();
header("Location: login.php");
