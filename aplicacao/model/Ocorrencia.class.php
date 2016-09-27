
<?php
class Ocorrencia {
	private $cod;
	private $setorsolicitante;
	private $data;
	private $pessoasolicitante;
	private $solicitacao;
	private $status;
	private $atendedor;
	private $tipoProblema;
	private $deslocamento;
	private $formaDeslocamento;
	private $solucaoAplicada;
	private $avaliacaoAtendimento;
	private $dtfinal;
	
	public function setCod($cod) {
		$this->cod = $cod;
	}
	public function getCod() {
		return $this->cod;
	}
	public function setSetorsolicitante($setorsolicitante) {
		$this->setorsolicitante = $setorsolicitante;
	}
	public function getSetorsolicitante() {
		return $this->setorsolicitante;
	}
	public function setData($data) {
		$this->data = $data;
	}
	public function getData() {
		return $this->data;
	}
	public function setPessoasolicitante($pessoasolicitante) {
		$this->pessoasolicitante = $pessoasolicitante;
	}
	public function getPessoasolicitante() {
		return $this->pessoasolicitante;
	}
	public function setSolicitacao($solicitacao) {
		$this->solicitacao = $solicitacao;
	}
	public function getSolicitacao() {
		return $this->solicitacao;
	}
	public function setStatus($status) {
		$this->status = $status;
	}
	public function getStatus() {
		return $this->status;
	}
	public function setAtendedor($atendedor) {
		$this->atendedor = $atendedor;
	}
	public function getAtendedor() {
		return $this->atendedor;
	}
	
	public function setTipoProblema($tipoProblema) {
		$this->tipoProblema = $tipoProblema;
	}
	public function getTipoProblema() {
		return $this->tipoProblema;
	}
	
	public function setDeslocamento($deslocamento) {
		$this->deslocamento = $deslocamento;
	}
	public function getDeslocamento() {
		return $this->deslocamento;
	}
	
	public function setFormaDeslocamento($formaDeslocamento) {
		$this->formaDeslocamento = $formaDeslocamento;
	}
	public function getFormaDeslocamento() {
		return $this->formaDeslocamento;
	}
	
	public function setSolucaoAplicada($solucaoAplicada) {
		$this->solucaoAplicada = $solucaoAplicada;
	}
	public function getSolucaoAplicada() {
		return $this->solucaoAplicada;
	}
	
	public function setAvaliacaoAtendimento($avaliacaoAtendimento) {
		$this->avaliacaoAtendimento = $avaliacaoAtendimento;
	}
	public function getAvaliacaoAtendimento() {
		return $this->avaliacaoAtendimento;
	}
	
	public function setDtfinal($dtfinal) {
		$this->dtfinal = $dtfinal;
	}
	public function getDtfinal() {
		return $this->dtfinal;
	}
	
	//função que formata a data
	public function Formatadata($data){
		//recebe o parâmetro e armazena em um array separado por -
		$data = explode('-', $data);
		$hora = explode(' ', $data[02]);
		//armazena na variavel data os valores do vetor data e concatena /
		$data = $hora[0].'/'.$data[1].'/'.$data[0].' '.$hora[1];
	
		//retorna a string da ordem correta, formatada
		return $data;
	}
	
	public function Consulta($setorsolicitante = null, $data = null, $pessoasolicitante = null, $solicitacao = null, $status = null) {
		if ($setorsolicitante != null)
			$this->setorsolicitante = $setorsolicitante;
		if ($data != null)
			$this->data = $data;
		if ($pessoasolicitante != null)
			$this->pessoasolicitante = $pessoasolicitante;
		if ($solicitacao != null)
			$this->solicitacao = $solicitacao;
		if ($status != null)
			$this->status = $status;
	}
	const NIVEL_USUADMIN = 1;
	const NIVEL_USUPADRAO = 2;
}
?>