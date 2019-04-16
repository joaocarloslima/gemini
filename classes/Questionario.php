<?php
require_once("global.php");

class Questionario {
	public $idFase;
	public $idAluno;

	public function selecionarAlternativa($idAlternativa)
	{
		$query = "INSERT INTO alunos_respostas (idAluno, idAlternativa) VALUES (:idAluno,:idAlternativa) ON DUPLICATE KEY UPDATE selecionada = NOT selecionada";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':idAluno', $this->idAluno);
		$stmt->bindValue(':idAlternativa', $idAlternativa);
		echo $stmt->execute();
	}

	public function listarQuestoes()
    {
	    $query = "SELECT * FROM questoes WHERE idFase=:idFase";
	    $conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(':idFase', $this->idFase);
	    $stmt->execute();
 		$questoes = array();
		while ($linha = $stmt->fetch()){
			$questao = new Questao();
			$questao->id = $linha['idQuestao'];
			$questao->idFase = $linha['idFase'];
			$questao->enunciado = $linha['enunciado'];
			$questao->idElemento = $linha['idElemento'];

			$queryAlt = "SELECT alternativas.*, alunos_respostas.selecionada, alunos_respostas.idAluno FROM alternativas LEFT JOIN alunos_respostas ON alternativas.idAlternativa=alunos_respostas.idAlternativa WHERE idQuestao=:idQuestao AND (idAluno=:idAluno OR idAluno is NULL)";
			$stmtAlt = $conexao->prepare($queryAlt);
			$stmtAlt->bindValue(':idQuestao', $questao->id);
			$stmtAlt->bindValue(':idAluno', $this->idAluno);
			$stmtAlt->execute();
			$alternativas = array();
			while ($linhaAlt = $stmtAlt->fetch()) {
				$alternativa = new Alternativa();
				$alternativa->id = $linhaAlt["idAlternativa"];
				$alternativa->idQuestao = $linhaAlt["idQuestao"];
				$alternativa->texto = $linhaAlt["texto"];
				$alternativa->correta = $linhaAlt["correta"];
				$alternativa->selecionada = $linhaAlt["selecionada"];
				array_push($alternativas, $alternativa);
			}
			$questao->alternativas = $alternativas;

			array_push($questoes, $questao);
		}
		return $questoes;
	}

}
