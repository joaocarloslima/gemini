<?php
require_once "global.php";
class Questao
{

	public $idFase;
	public $enunciado;
	public $idElemento;

    public function inserirQuestao()
    {
	    $query = "INSERT INTO questoes (idFase, idElemento) VALUES (:idFase, :idElemento) ";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idFase', $this->idFase);
	    $stmt->bindValue(':idElemento', $this->idElemento);
	    $stmt->execute();
	}

    public function editarQuestao()
    {
	    $query = "UPDATE questoes SET enunciado=:enunciado WHERE idFase=:idFase AND idElemento=:idElemento";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':enunciado', $this->enunciado);
	    $stmt->bindValue(':idFase', $this->idFase);
	    $stmt->bindValue(':idElemento', $this->idElemento);
	    $stmt->execute();
	}

    public function apagarQuestao()
    {
	    $query = "DELETE FROM questoes WHERE idFase=:idFase AND idElemento= :idElemento";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idElemento', $this->idElemento);
	    $stmt->bindValue(':idFase', $this->idFase);
	    $stmt->execute();
	}

}