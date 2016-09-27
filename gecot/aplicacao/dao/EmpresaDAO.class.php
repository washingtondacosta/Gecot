<?php

class EmpresaDAO extends DAO {
	public function OcorrenciaDAO(PDO $conexao = null) {
		if ($conexao == null) {
				
			parent::DAO ();
		} else
			parent::DAO ( $conexao );
	}
	
	public function insereEmpresa(Empresa $empresa) {
		$nome = $empresa->getNome();
		$razao_social = $empresa->getRazaoSocial();
		$cnpj = $empresa->getCnpj();
		$cgf = $empresa->getCgf();
		$logradouro = $empresa->getLogradouro();
		$numero = $empresa->getNumero();
		$complemento = $empresa->getComplemento();
		$cep=$empresa->getCep();
		$bairro = $empresa->getBairro();
		$municipio = $empresa->getMunicipio();
		$localidade = $empresa->getLocalidade();
		$proprietario = $empresa->getProprietario();
		$status = $empresa -> getStatus();

	
		$inserir = "insert into empresa(nome,razao_social,cnpj,cgf,logradouro,numero,complemento,cep,bairro,municipio,localidade,proprietario,status) values('$nome',
		'$razao_social','$cnpj','$cgf','$logradouro','$numero','$complemento','$cep','$bairro','$municipio','$localidade',
'$proprietario','$status')";
	
		if ($this->conexao->query ( $inserir ))
				
			return true;
	
		else
			return false;
	}

	public function retornaEmpresa() {
		$result = array ();
	
		$listagem = $this->conexao->query ( "select * from empresa order by cod desc" );
	
		foreach ( $listagem as $linha ) {
				
			$empresa = new Empresa ( $linha ['cod'], $linha ['nome'],$linha ['razao_social'], $linha ['cnpj'], $linha['cgf'], $linha ['logradouro'], $linha ['numero'],$linha['complemento'],
		$linha['cep'],$linha['bairro'], $linha['municipio'],$linha['localidade'],$linha['proprietario'],$linha['status'] );
			
			$empresa->setCod ( $linha ['cod'] );
			$empresa->setNome( $linha ['nome'] );
			$empresa->setRazaoSocial($linha['razao_social']);
			$empresa->setCnpj($linha['cnpj']);
			$empresa->setCgf($linha['cgf']);
			$empresa->setLogradouro($linha['logradouro']);
			$empresa->setNumero($linha['numero']);
			$empresa->setComplemento($linha['complemento']);
			$empresa->setCep($linha['cep']);
			$empresa->setBairro($linha['bairro']);
			$empresa->setMunicipio($linha['municipio']);
			$empresa->setLocalidade($linha['localidade']);
			$empresa->setProprietario($linha['proprietario']);
			$empresa->setStatus($linha['status']);
			
			$result [] = $empresa;
		}
	
		return $result;
	}
	
	
}
