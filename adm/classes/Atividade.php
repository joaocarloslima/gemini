<?php
require_once("global.php");

class Atividade {
	public $id;
	public $idFase;
	public $idAluno;
	public $aluno;
	public $fotoAluno;
	public $resposta;
	public $anexo;
	public $finalizadoEm;
	public $feedback;
	public $feedbackVisualizadoEm;
	public $xp;
	public $desempenho;

	//carrega os dados da atividade através do idAluno e idFase
	public function carregar(){
		$query = "SELECT alunos_fases.*, alunos.nome, alunos.idAluno, alunos.foto FROM alunos_fases INNER JOIN alunos ON alunos.idAluno=alunos_fases.idAluno WHERE alunos.idAluno=:idAluno AND idFase=:idFase ORDER BY alunos.nome";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':idAluno', $this->idAluno);
		$stmt->bindValue(':idFase', $this->idFase);
		if(!$stmt->execute()) throw new Exception("Erro ao carregar dados da atividade");
		else{
			$linha = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->aluno = $linha['nome'];
			$this->fotoAluno = $linha['foto'];
			$this->resposta = $linha['resposta'];
			$this->anexo = $linha['anexo'];
			$this->xp = $linha['xp'];
			$this->feedback = $linha['feedback'];
			$this->feedbackVisualizadoEm = ($linha['feedbackVisualizadoEm']=="")?"":(new DateTime($linha['feedbackVisualizadoEm']))->format('d/m H:i');
			$this->finalizadoEm = (new DateTime($linha['finalizadoEm']))->format('d/m H:i');
		}
	}

	//retorna um array de Atividades a partir do idFase
	public function buscarAtividadesNaoAvaliadas (){
		$query = "SELECT * FROM alunos_fases WHERE idFase=:idFase AND finalizadoEm IS NOT NULL AND feedback IS NULL";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(":idFase", $this->idFase);
    	$atividades = array();
		if(!$stmt->execute()) throw new Exception("Erro ao buscar atividades nao avaliadas");
	    else{
		    while ($linha = $stmt->fetch()){
		    	$atividade = new Atividade();
		    	$atividade->idAluno = $linha["idAluno"];
		    	$atividade->idFase = $linha["idFase"];
		    	$atividade->carregar();
		    	array_push($atividades, $atividade);
		    }
		}
	    return $atividades;
	}

	//retorna um array de Atividades a partir do idFase
	public function buscarAtividadesJaAvaliadas (){
		$query = "SELECT * FROM alunos_fases WHERE idFase=:idFase AND feedback IS NOT NULL";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->bindValue(":idFase", $this->idFase);
    	$atividades = array();
		if(!$stmt->execute()) throw new Exception("Erro ao buscar atividades avaliadas");
	    else{
		    while ($linha = $stmt->fetch()){
		    	$atividade = new Atividade();
		    	$atividade->idAluno = $linha["idAluno"];
		    	$atividade->idFase = $linha["idFase"];
		    	$atividade->carregar();
		    	array_push($atividades, $atividade);
		    }
		}
	    return $atividades;
	}

	//salva o feedback do professor na atividade, atribuindo o XP equivalente para o aluno
	public function salvarFeedback(){
		$conexao = Conexao::pegarConexao();
		$query = "UPDATE alunos_fases SET xp=(SELECT XP FROM fases WHERE idFase=$this->idFase)*$this->desempenho, feedback='$this->feedback' WHERE idAluno=$this->idAluno AND idFase=$this->idFase";
		if(!$conexao->exec($query)) throw new Exception("Erro ao salvar feedback");
		ControleFase::atualizarRanking();
	}

	//calcela o feedback do professor na atividade
	public function cancelarFeedback(){
		$conexao = Conexao::pegarConexao();
		$query = "UPDATE alunos_fases SET xp=NULL, feedback=NULL, feedbackVisualizadoEm=NULL WHERE idAluno=$this->idAluno AND idFase=$this->idFase";
		if(!$conexao->exec($query)) throw new Exception("Erro ao cancelar feedback");
		ControleFase::atualizarRanking();
	}

}