<?php
require_once "global.php";
class Alternativa
{

	public $id;
	public $idQuestao;
	public $texto;
	public $correta;

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
	    $query = "UPDATE alternativas SET texto=:texto, correta=:correta WHERE idAlternativa=:idAlternativa";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idAlternativa', $this->id);
	    $stmt->bindValue(':texto', $this->texto);
	    $stmt->bindValue(':correta', $this->correta);
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

    public static function listarQuestoes($idFase)
    {
	    $query = "SELECT * FROM questoes WHERE idFase=:idFase";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idFase', $idFase);
	    $stmt->execute();
 		$questoes = array();
		while ($linha = $stmt->fetch()){
			$questao = new Questao();
			$questao->id = $linha['idQuestao'];
			$questao->idFase = $linha['idFase'];
			$questao->enunciado = $linha['enunciado'];
			$questao->idElemento = $linha['idElemento'];
			array_push($questoes, $questao);
		}
		return $questoes;
	}
}