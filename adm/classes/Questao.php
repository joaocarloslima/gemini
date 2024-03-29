<?php
require_once "global.php";
class Questao
{

	public $id;
	public $idFase;
	public $enunciado;
	public $idElemento;
	public $alternativas = array();

	public function inserirQuestao()
	{
		$query = "INSERT INTO questoes (idFase) VALUES (:idFase) ";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':idFase', $this->idFase);
		$stmt->execute();
		$this->id = $conexao->lastInsertId();
		return $this->id;
	}

	public function editarQuestao()
	{
		$query = "UPDATE questoes SET enunciado=:enunciado WHERE idQuestao=:idQuestao";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':enunciado', $this->enunciado);
		$stmt->bindValue(':idQuestao', $this->id);
		$stmt->execute();
	}

	public function apagarQuestao()
	{
		$query = "DELETE FROM questoes WHERE idQuestao=:idQuestao";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':idQuestao', $this->id);
		$stmt->execute();

		$query = "DELETE FROM alternativas WHERE idQuestao=:idQuestao";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':idQuestao', $this->id);
		$stmt->execute();

	}

	public function duplicar($idFase){
		try{
			$this->idFase = $idFase;
			$this->inserirQuestao();
			$this->editarQuestao();
			foreach ($this->alternativas as $alternativa) {
				$alternativa->duplicar($this->id);
			}
		}catch(Exception $e){
			throw new Exception("Erro ao duplicar questao da fase");
		}

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

			$queryAlt = "SELECT * FROM alternativas WHERE idQuestao=:idQuestao";
			$stmtAlt = $conexao->prepare($queryAlt);
			$stmtAlt->bindValue(':idQuestao', $questao->id);
			$stmtAlt->execute();
			$alternativas = array();
			while ($linhaAlt = $stmtAlt->fetch()) {
				$alternativa = new Alternativa();
				$alternativa->id = $linhaAlt["idAlternativa"];
				$alternativa->idQuestao = $linhaAlt["idQuestao"];
				$alternativa->texto = $linhaAlt["texto"];
				$alternativa->correta = $linhaAlt["correta"];
				array_push($alternativas, $alternativa);
			}
			$questao->alternativas = $alternativas;

			array_push($questoes, $questao);
		}
		return $questoes;
	}
}