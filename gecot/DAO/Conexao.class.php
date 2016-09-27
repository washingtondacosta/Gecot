<?php

class Conexao extends PDO{
	private $recursoDeConexao;
	private $tipoDeConexao;
	private $ultimoIdInserido; 
	public function Conexao($tipoDeConexao, $host, $porta, $usuario , $senha, $banco = null){
		
		$this->tipoDeConexao = $tipoDeConexao;
		
		if($tipoDeConexao == "mssql"){
			$this->recursoDeConexao = mssql_connect($host.':'.$porta, $usuario, $senha);	
			if($banco != null){
				mssql_select_db($banco, $this->recursoDeConexao);
			}	
			
		}
	}
	
	
	/**
	 * *  pode vir um insert, select, update ou delete, 
	 * 
	 * Se vier um selecte ele retorna o array com os elementos indexados pela coluna. 
	 * Se vier um update, delete ou insert é algo meio booleano. Vai retornar algo no array ou nulo.
	 * 
	 * @param String $sql
	 * @return multitype:
	 */ 
	public function query($sql){
		$listaDeLinhas = array();
		
		if(substr_count($sql, "SELECT") || substr_count($sql, "select") ){
			$result = mssql_query($sql, $this->recursoDeConexao);
			while($row = mssql_fetch_array($result)){
				$listaDeLinhas[] = $row;
			}	
		}else{
			$result = mssql_query($sql, $this->recursoDeConexao);
			$listaDeLinhas = $result;
			
			
		}
		
		return $listaDeLinhas;
		
		
	}
	public function rowCount(){
	//contando as linhas afetadas pelo ultimo recurso. 
		
		
	}
	/*
	public function lastInsertId(){ 
		$sql = "SELECT SCOPE_IDENTITY()";
		$result = mssql_query($sql, $this->recursoDeConexao);
		$vetor = $this->query($sql);
		return $vetor[0][0];
	}
	*/
	
	
	
}



?>