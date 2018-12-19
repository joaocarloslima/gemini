<?php
require_once("global.php");

class TempoDeEstudo {

	public $tempos = array();
	public $dias = array();

	function __construct ($id){
		$this->getDados($id);
	}
	
	public function getDados($idAluno){
		$query = "SELECT  DATE_FORMAT(data, '%d/%m') as dia, SUM(timestampdiff(MINUTE, dataLogin, dataLogout)) as tempo FROM `tempo_acesso` WHERE idAluno=$idAluno GROUP BY data ORDER BY data LIMIT 7";
		$conexao = Conexao::pegarConexao();
	    $stmt = $conexao->prepare($query);
	    $stmt->execute();
	    while ($linha = $stmt->fetch()) {
	    	array_push($this->tempos, $linha["tempo"]);
	    	array_push($this->dias, $linha["dia"]);
	    }
	}

	public function getDias(){
		return json_encode($this->dias);
	}

	public function getTempos(){
		return json_encode($this->tempos);
	}

	public function getMaior(){
		return max($this->tempos);
	}

}
