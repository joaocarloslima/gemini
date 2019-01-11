<?php
require_once 'config.php';

spl_autoload_register('carregarClasse');
spl_autoload_register('carregarClasseAdm');

function carregarClasse($nomeClasse)
{
    if (file_exists('classes/' . $nomeClasse . '.php')) {
        require_once 'classes/' .$nomeClasse . '.php';
    }
}

function carregarClasseAdm($nomeClasse)
{
    if (file_exists('adm/classes/' . $nomeClasse . '.php')) {
        require_once 'adm/classes/' .$nomeClasse . '.php';
    }
}