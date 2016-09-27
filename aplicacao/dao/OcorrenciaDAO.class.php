<?php

class OcorrenciaDAO extends DAO {
	public function OcorrenciaDAO(PDO $conexao = null) {
		if ($conexao == null) {
			
			parent::DAO ();
		} else
			parent::DAO ( $conexao );
	}
	
	
	public function insereOcorrencia(Ocorrencia $ocorrencia) {
		$setorsolicitante = $ocorrencia->getSetorsolicitante ();
		$data = $ocorrencia->getData ();
		$pessoasolicitante = $ocorrencia->getPessoasolicitante ();
		$solicitacao = $ocorrencia->getSolicitacao ();
		$status = $ocorrencia->getStatus ();
		
		$inserir = "insert into ocorrencias(setorsolicitante,data,pessoa_solicitante,solicitacao,status) values('$setorsolicitante',
    	'$data','$pessoasolicitante','$solicitacao','$status')";
		
		if ($this->conexao->query ( $inserir ))
			
			return true;
		
		else
			return false;
	}
	public function deletaOcorrencia(Ocorrencia $ocorrencia) {
		$cod = $ocorrencia->getCod ();
		
		$deleta = "delete from ocorrencias where cod='$cod'";
		
		if ($this->conexao->query ( $deleta ))
			
			return true;
		
		else
			return false;
	}
	public function atualizaOcorrencia(Ocorrencia $ocorrencia) {
		$cod = $ocorrencia->getCod ();
		$status = $ocorrencia->getStatus ();
		$atendedor = $ocorrencia->getAtendedor ();
		$tipoProblema = $ocorrencia->getTipoProblema ();
		$deslocamento = $ocorrencia->getDeslocamento ();
		$formadeslocamento = $ocorrencia->getFormaDeslocamento ();
		$solucaoaplicada = $ocorrencia->getSolucaoAplicada ();
		$avaliacaoatendimento = $ocorrencia->getAvaliacaoAtendimento ();
		$dtfinal = $ocorrencia->getDtfinal ();
		
		$atualiza = "update ocorrencias set status='$status',atendedor='$atendedor',tipo_problema='$tipoProblema'
	,deslocamento='$deslocamento',forma_deslocamento='$formadeslocamento',solucao_aplicada='$solucaoaplicada',avaliacao_do_atendimento='$avaliacaoatendimento',dtfinal='$dtfinal' where cod='$cod'";
		
		if ($this->conexao->query ( $atualiza ))
			
			return true;
		
		else
			return false;
	}
	public function atualizaStatusOcorrencia(Ocorrencia $ocorrencia) {
		$cod = $ocorrencia->getCod ();
		$status = $ocorrencia->getStatus ();
		$dtfinal = $ocorrencia->getDtfinal ();
		
		$atualiza = "update ocorrencias set status='$status',dtfinal='$dtfinal' where cod='$cod'";
		
		if ($this->conexao->query ( $atualiza ))
			
			return true;
		
		else
			return false;
	}
	/*
	 * public function retornaLista() { $result = array (); $listagem = $this->conexao->query ( "select DATE_FORMAT(data, '%d/%m/%Y %H:%i:%s') * from ocorrencias order by cod desc" ); foreach ( $listagem as $linha ) { $ocorrencia = new Ocorrencia ( $linha ['cod'], $linha ['setorsolicitante'], $linha ['data'], $linha ['pessoa_solicitante'], $linha ['status'] ); $ocorrencia->setCod ( $linha ['cod'] ); $ocorrencia->setSetorsolicitante ( $linha ['setorsolicitante'] ); $ocorrencia->setData ( $linha ['data'] ); $ocorrencia->setPessoasolicitante ( $linha ['pessoa_solicitante'] ); $ocorrencia->setStatus ( $linha ['status'] ); $result [] = $ocorrencia; } return $result; }
	 */
	public function retornaOcorrencia() {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where status<>'Finalizado' order by cod desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'], $linha ['setorsolicitante'], $linha ['data'], $linha ['pessoa_solicitante'], $linha ['status'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$ocorrencia->setSetorsolicitante ( $linha ['setorsolicitante'] );
			$ocorrencia->setData ( $linha ['data'] );
			$ocorrencia->setPessoasolicitante ( $linha ['pessoa_solicitante'] );
			$ocorrencia->setStatus ( $linha ['status'] );
			$result [] = $ocorrencia;
		}
		
		return $result;
	}
	
	
	// Início das funções para contadores
	
	public function contaOcorrencia($data1,$data2) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where atendedor<>'ambos' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
		
		return count ( $result );
	}
	public function contaOcorrenciaAtendedor1($data1,$data2) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where atendedor='Washington da Costa' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
		
		return count ( $result );
	}
	public function contaOcorrenciaAtendedor2($data1,$data2) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where atendedor='Isaac Uchôa' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
		
		return count ( $result );
	}
	public function contaOcorrenciaLimoeiro($data1,$data2) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Shopping Avenida' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
		
		return count ( $result );
	}
	
	public function contaOcorrenciaLimoeiroAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Shopping Avenida' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
				
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	public function contaOcorrenciaLimoeiro2($data1,$data2) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Shopping Parangaba' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
		
		return count ( $result );
	}
	
	public function contaOcorrenciaLimoeiro2At1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Shopping Parangaba' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
				
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	public function contaOcorrenciaVPOtica($data1,$data2) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Galeria Professor Brandao' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
		
		return count ( $result );
	}
	
	public function contaOcorrenciaVPOticaAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Galeria Professor Brandao' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
				
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	public function contaOcorrenciaJairta($data1,$data2) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Loja Pedro I' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
		
		return count ( $result );
	}
	
	public function contaOcorrenciaJairtaAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Loja Pedro I' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
				
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	public function contaOcorrenciaFerreiraLopez($data1,$data2) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Shopping Acaiaca' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
		
		return count ( $result );
	}
	
	public function contaOcorrenciaFerreiraLopezAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Shopping Acaiaca' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
				
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	public function contaOcorrenciaVPOticaFilial($data1,$data2) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Shopping Benfica' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
		
		return count ( $result );
	}
	
	public function contaOcorrenciaVPOticaFilialAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Shopping Benfica' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
				
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaEstoqueArmacao($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Estoque de Armação' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
				
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaEstoqueArmacaoAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Estoque de Armação' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaEstoqueLentes($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Estoque de Lentes' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaEstoqueLentesAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Estoque de Lentes' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaLaboratorio($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Laboratorio' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaLaboratorioAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Laboratorio' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendente='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaFinanceiro($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Financeiro' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaFinanceiroAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Financeiro' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaRH($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Recursos Humanos' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaRHAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Recursos Humanos' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaDiretoria($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Diretoria/administração' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaDiretoriaAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Diretoria/administração' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaDTI($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Departamento de T.I' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaDTIAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Departamento de T.I' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaJuridico($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Juridico' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaJuridicoAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Juridico' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaAlmoxarifado($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Almoxarifado' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaAlmoxarifadoAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Almoxarifado' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaRecepcao($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Recepção' and status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	public function contaOcorrenciaRecepcaoAt1($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where setorsolicitante='Recepção' and status='Finalizado' and dtfinal between '$data1' and '$data2' and atendedor='Washington da Costa' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
	
			$ocorrencia = new Ocorrencia ( $linha ['cod'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$result [] = $ocorrencia;
		}
	
		return count ( $result );
	}
	
	
	// Fim das funções de contadores
	public function retornaUmaOcorrencia($cod) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where cod=$cod order by cod desc" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'], $linha ['setorsolicitante'], $linha ['data'], $linha ['pessoa_solicitante'], $linha ['status'], $linha ['solicitacao'], $linha ['atendedor'], $linha ['tipo_problema'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$ocorrencia->setSetorsolicitante ( $linha ['setorsolicitante'] );
			$ocorrencia->setData ( $linha ['data'] );
			$ocorrencia->setPessoasolicitante ( $linha ['pessoa_solicitante'] );
			$ocorrencia->setStatus ( $linha ['status'] );
			$ocorrencia->setSolicitacao ( $linha ['solicitacao'] );
			$ocorrencia->setAtendedor ( $linha ['atendedor'] );
			$ocorrencia->setTipoProblema ( $linha ['tipo_problema'] );
			$ocorrencia->setDeslocamento ( $linha ['deslocamento'] );
			$ocorrencia->setFormaDeslocamento ( $linha ['forma_deslocamento'] );
			$ocorrencia->setSolucaoAplicada ( $linha ['solucao_aplicada'] );
			$ocorrencia->setAvaliacaoAtendimento ( $linha ['avaliacao_do_atendimento'] );
			$ocorrencia->setDtfinal ( $linha ['dtfinal'] );
			
			$result [] = $ocorrencia;
		}
		
		return $result;
	}
	public function retornaOcorrenciaFinal() {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select * from ocorrencias where status='Finalizado' order by dtfinal desc LIMIT 5" );
		
		foreach ( $listagem as $linha ) {
			
			$ocorrencia = new Ocorrencia ( $linha ['cod'], $linha ['setorsolicitante'], $linha ['data'], $linha ['pessoa_solicitante'], $linha ['atendedor'], $linha ['tipo_problema'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$ocorrencia->setSetorsolicitante ( $linha ['setorsolicitante'] );
			$ocorrencia->setData ( $linha ['data'] );
			$ocorrencia->setDtfinal ( $linha ['dtfinal'] );
			$ocorrencia->setPessoasolicitante ( $linha ['pessoa_solicitante'] );
			$ocorrencia->setTipoProblema ( $linha ['tipo_problema'] );
			$ocorrencia->setAtendedor ( $linha ['atendedor'] );
			$result [] = $ocorrencia;
		}
		
		return $result;
	}
	
	public function retornaOcorrenciaFinalFiltro($data1,$data2) {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from ocorrencias where status='Finalizado' and dtfinal between '$data1' and '$data2' order by dtfinal desc" );
	
		foreach ( $listagem as $linha ) {
				
			$ocorrencia = new Ocorrencia ( $linha ['cod'], $linha ['setorsolicitante'], $linha ['data'], $linha ['pessoa_solicitante'], $linha ['atendedor'], $linha ['tipo_problema'] );
			$ocorrencia->setCod ( $linha ['cod'] );
			$ocorrencia->setSetorsolicitante ( $linha ['setorsolicitante'] );
			$ocorrencia->setData ( $linha ['data'] );
			$ocorrencia->setDtfinal ( $linha ['dtfinal'] );
			$ocorrencia->setPessoasolicitante ( $linha ['pessoa_solicitante'] );
			$ocorrencia->setTipoProblema ( $linha ['tipo_problema'] );
			$ocorrencia->setAtendedor ( $linha ['atendedor'] );
			$result [] = $ocorrencia;
		}
	
		return $result;
	}
}