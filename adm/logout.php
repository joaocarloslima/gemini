<?php require_once 'global.php';
session_start(); 
$professor = new Professor();
$professor->logout();
header("Location: login.php");
