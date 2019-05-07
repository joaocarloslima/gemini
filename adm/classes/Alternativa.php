<?php
require_once "global.php";
class Alternativa
{

	public $id;
	public $idQuestao;
	public $texto;
	public $correta;
	public $selecionada;

    public function inserirAlternativa()
    {
	    $query = "INSERT INTO alternativas (idQuestao) VALUES (:idQuestao) ";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idQuestao', $this->idQuestao);
	    $stmt->execute();
	    $this->id = $conexao->lastInsertId();
	    return $this->id;
	}

    public function editarAlternativa()
    {
	    $query = "UPDATE alternativas SET texto=:texto WHERE idAlternativa=:idAlternativa";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idAlternativa', $this->id);
	    $stmt->bindValue(':texto', $this->texto);
	    $stmt->execute();
	}

    public function apagarAlternativa()
    {
	    $query = "DELETE FROM alternativas WHERE idAlternativa=:idAlternativa";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idAlternativa', $this->id);
	    $stmt->execute();
	}

    public function swapCorreta()
    {
	    $query = "UPDATE alternativas SET correta = NOT correta WHERE idAlternativa=:idAlternativa";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idAlternativa', $this->id);
	    $stmt->execute();
	}

	public function duplicar($idNovaQuestao){
		$this->idQuestao = $idNovaQuestao;
		$this->inserirAlternativa();
		$this->editarAlternativa();
		if ($this->correta) $this->swapCorreta();
	}

}