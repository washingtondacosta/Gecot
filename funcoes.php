<?php
class funcoes{
	//funчуo que formata a data
	public function Formatadata($data){
		//recebe o parтmetro e armazena em um array separado por -
		$data = explode('-', $data);
		$hora = explode(' ', $data[02]);
		//armazena na variavel data os valores do vetor data e concatena /
		$data = $hora[0].'/'.$data[1].'/'.$data[0].' '.$hora[1];
	
		//retorna a string da ordem correta, formatada
		return $data;
	}
	
}