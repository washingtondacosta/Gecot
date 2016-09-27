<?php


class DAO{
	protected $conexao;
	const TIPO_SQL_SERVER = 0;
	const TIPO_MYSQL = 1;
	private $tipoDeConexao;
	public function getTipoDeConexao(){
		return $this->tipoDeConexao;
	}
	public function DAO(PDO $conexao = null){
		if($conexao != null){
			$this->conexao = $conexao;
		}else
		{

			$this->tipoDeConexao = self::TIPO_MYSQL;
			$this->conexao = new PDO ( 'mysql:host=192.168.0.219;port=3306;dbname=gecot', 'formulario', 'boris1234' );
			//$this->tipoDeConexao = self::TIPO_SQL_SERVER;
			//$this->conexao = new Conexao("mssql", "192.168.0.4", "1433", "formulario@boris", "f0rmular10sql", 'formularioboris');
			
			
		}		
	}
	public function setConexao(PDO $conexao){
		$this->conexao = $conexao;
	}
	public function getConexao(){
		return $this->conexao;
	}	
	/**
	 * Com este metodo podemos ter uma lista de tabelas do banco selecionado. 
	 * @return multitype:
	 */
	public function retornaVetorDeTabelas(){
		return array();		
	}
	
	public function retornaVetorDeBancos(){
		return array();
	}
	public function retornaListaDeCampos($talbela){
		return array();
	}
}


?>