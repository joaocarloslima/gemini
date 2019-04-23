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
		$conexao = Conexao::pegarConexao();

		//verificar se é a primeira vez do aluno, se for insere as respostas das alternativas
		$q = "SELECT * FROM alunos_fases WHERE idAluno=:idAluno AND idFase=:idFase";
		$s = $conexao->prepare($q);
		$s->bindValue(':idFase', $this->idFase);
		$s->bindValue(':idAluno', $this->idAluno);
		$s->execute();
		if ($s->fetchColumn() < 1) $this->iniciarQuestionario();

		$query = "SELECT * FROM questoes WHERE idFase=:idFase";
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

	private function iniciarQuestionario(){
		$conexao = Conexao::pegarConexao();
		$query = "SELECT * FROM questoes WHERE idFase=:idFase";
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':idFase', $this->idFase);
		$stmt->execute();
		while ($questao = $stmt->fetch()){
			$idQuestao = $questao["idQuestao"];
			$queryAlt = "SELECT * FROM alternativas WHERE idQuestao=:idQuestao";
			$stmtAlt = $conexao->prepare($queryAlt);
			$stmtAlt->bindValue(':idQuestao', $idQuestao);
			$stmtAlt->execute();
			while ($alternativa = $stmtAlt->fetch()) {
				$idAlternativa = $alternativa["idAlternativa"];
				$queryItem = "INSERT INTO alunos_respostas (idAluno, idAlternativa, selecionada) VALUES (:idAluno,:idAlternativa,0)";
				$stmtItem = $conexao->prepare($queryItem);
				$stmtItem->bindValue(':idAluno', $this->idAluno);
				$stmtItem->bindValue(':idAlternativa', $idAlternativa);
				$stmtItem->execute();
			}
		}
	}
}
