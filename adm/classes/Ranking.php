<?php
require_once("global.php");

class Ranking {

	public $posicao = array();
	public $dias = array();
	public $xp = array();

	function __construct ($id){
		$this->getDados($id);
	}
	
	public function getDados($idAluno){
		$query = "SELECT *, day(data) as dia FROM ranking WHERE idAluno=$idAluno ORDER BY data DESC LIMIT 15";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();

	    while ($linha = $stmt->fetch()) {
	    	array_push($this->posicao, $linha["posicao"]);
	    	array_push($this->dias, $linha["dia"]);
	    	array_push($this->xp, $linha["xp"]);
	    }
	}

	public function getDias(){
		return json_encode(array_reverse($this->dias));
	}

	public function getXP(){
		return json_encode(array_reverse($this->xp));
	}

	public function getPosicoes(){
		return json_encode(array_reverse($this->posicao));
	}

	public function getMaior(){
		return max($this->posicao);
	}

	public function getMaiorXP(){
		return max($this->xp);
	}

	public function getPosicao(){
		return $this->posicao[0];
	}

	public function getEvolucao(){
		$atual = $this->getPosicao();
		if (sizeof($this->posicao)-1<6)$i=sizeof($this->posicao)-1; else $i=6;
		$anterior = $this->posicao[$i];
		$x = $this->numeroParaTexto(abs($atual - $anterior));
		$subs = (abs($atual-$anterior)>1)?"posições":"posição";
		if ($atual == $anterior) 
			$evolucao = "<i class='material-icons text-warning'>remove</i> se manteve na mesma posição";
		if ($atual > $anterior) 
			$evolucao = "<i class='material-icons text-danger'>arrow_downward</i> caiu $x $subs na última semana";
		if ($atual < $anterior) 
			$evolucao = "<i class='material-icons text-success'>arrow_upward</i> subiu $x $subs na última semana";
		return $evolucao;
	}

	private function numeroParaTexto($n){
		switch ($n) {
			case 1:
				return "uma";
				break;
			case 2:
				return "duas";
				break;
			case 3:
				return "três";
				break;
			case 4:
				return "quatro";
				break;
			case 5:
				return "cinco";
				break;
			case 6:
				return "seis";
				break;
			case 7:
				return "sete";
				break;
			case 8:
				return "oito";
				break;
			case 9:
				return "nove";
				break;
			case 10:
				return "dez";
				break;
			
			default:
				return $n;
				break;
		}
	}

}
