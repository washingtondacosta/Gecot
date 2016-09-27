<?php
class Empresa {
	private $cod;
	private $nome;
	private $razao_social;
	private $cnpj;
	private $cgf;
	private $logradouro;
	private $numero;
	private $complemento;
	private $cep;
	private $bairro;
	private $municipio;
	private $localidade;
	private $proprietario;
	private $status;
	public function setCod($cod) {
		$this->cod = $cod;
	}
	public function getCod() {
		return $this->cod;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getNome() {
		return $this->nome;
	}
	public function setRazaoSocial($razao_social) {
		$this->razao_social = $razao_social;
	}
	public function getRazaoSocial() {
		return $this->razao_social;
	}
	
	public function setCnpj($cnpj) {
		$this->cnpj = $cnpj;
	}
	public function getCnpj() {
		return $this->cnpj;
	}
	
	public function setCgf($cgf) {
		$this->cgf = $cgf;
	}
	public function getCgf() {
		return $this->cgf;
	}
	
	public function setLogradouro($logradouro) {
		$this->logradouro = $logradouro;
	}
	public function getLogradouro() {
		return $this->logradouro;
	}
	
	public function setNumero($numero) {
		$this->numero = $numero;
	}
	public function getNumero() {
		return $this->numero;
	}
	
	public function setComplemento($complemento) {
		$this->complemento = $complemento;
	}
	public function getComplemento() {
		return $this->complemento;
	}
	
	public function setCep($cep) {
		$this->cep = $cep;
	}
	public function getCep() {
		return $this->cep;
	}
	
	public function setBairro($bairro) {
		$this->bairro = $bairro;
	}
	public function getBairro() {
		return $this->bairro;
	}
	
	public function setMunicipio($municipio) {
		$this->municipio = $municipio;
	}
	public function getMunicipio() {
		return $this->municipio;
	}
	
	public function setLocalidade($localidade) {
		$this->localidade = $localidade;
	}
	public function getLocalidade() {
		return $this->localidade;
	}
	
	public function setProprietario($proprietario) {
		$this->proprietario = $proprietario;
	}
	public function getProprietario() {
		return $this->proprietario;
	}
	
	public function setStatus($status) {
		$this->status = $status;
	}
	public function getStatus() {
		return $this->status;
	}
}
