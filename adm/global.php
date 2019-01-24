<?php
require_once 'config.php';

spl_autoload_register('carregarClasse');
spl_autoload_register('carregarClasseAluno');

function carregarClasse($nomeClasse)
{
    if (file_exists('classes/' . $nomeClasse . '.php')) {
        require_once 'classes/' .$nomeClasse . '.php';
    }

}

function carregarClasseAluno($nomeClasse)
{
    if (file_exists('../classes/' . $nomeClasse . '.php')) {
        require_once '../classes/' .$nomeClasse . '.php';
    }

}