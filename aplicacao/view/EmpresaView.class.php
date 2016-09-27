<?php
class EmpresaView {
	const TELA_PADRAO = 0;
	const TELA_ADMIN = 1;
	const TELA_CONSULTA = 2;
	public $empresadao;
	public function EmpresaView() {
		$this->empresadao = new EmpresaDAO ();
	}
	public function mostraTelaAdmin() {
		
		/*
		 * if (isset ( $_POST ['deletar'] )) { $usuapaga = new Ocorrencia (); $usuapaga->setCod ( $_POST ['cod'] ); if ($this->ocorrenciadao->deletaOcorrencia ( $usuapaga )) { echo "Ocorrência deletada com sucesso"; echo '<meta http-equiv="refresh" content="2;url=index.php">'; } else { echo "Ocorrência não deletada"; echo '<meta http-equiv="refresh" content="2;url=index.php">'; } return; }
		 */
		echo 
				'<form action="" method="post"> 
				Nome: <input type="text" name="nomeempresa" size=50><br><br>
				Razão Social*: <input type="text" name="razaoempresa" size=50 required><br><br>
				CNPJ*: <input type="text" name="cnpjempresa" size=20 maxlength=14 required>
				CGF: <input type="text" name="cgfempresa" size=20 maxlength=14 ><br><br>
				Status: <select name="status">
				<option value="Ativa">Ativa</option>
                <option value="Inativa">Inativa</option>
				</select><br><br>
				Logradouro*: <input type="text" name="logradouroempresa" size=45 required>
				Número*: <input type="text" name="numeroempresa" size=2 maxlength=4 required><br><br>
				Complemento: <input type="text" name="complempresa" size=20>
				CEP: <input type="text" name="cepempresa" size=15 maxlength=8 placeholder="Somente números"><br><br>
				Bairro*: <input type="text" name="bairroempresa" size=20 required>
				Município*: <input type="text" name="municipioempresa" size=30 required><br><br>
				Proprietário*: <input type="text" name="nomeproprietario" size=30 required><br><br>
				Localidade: <select name="localidade">
				<option value="Capital">Capital</option>
                <option value="Interior">Interior</option>
				</select><br><br><br>
				
				(*)Campos obrigatórios<br><br>
				<input type="submit" name="enviar"><br><br>
				
				
		</form>';
		
		if (isset ( $_POST ['cnpjempresa'] ) && isset ( $_POST ['razaoempresa'] )) {
			
			$Empresa = new Empresa ();
			
			$Empresa->setNome( $_POST ['nomeempresa'] );
			$Empresa->setRazaoSocial($_POST['razaoempresa']);
			$Empresa->setCnpj($_POST['cnpjempresa']);
			$Empresa->setCgf($_POST['cgfempresa']);
			$Empresa->setLogradouro($_POST['logradouroempresa']);
			$Empresa->setNumero($_POST['numeroempresa']);
			$Empresa->setComplemento($_POST['complempresa']);
			$Empresa->setCep($_POST['cepempresa']);
			$Empresa->setBairro($_POST['bairroempresa']);
			$Empresa->setMunicipio($_POST['municipioempresa']);
			$Empresa->setLocalidade($_POST['localidade']);
			$Empresa->setProprietario($_POST['nomeproprietario']);
			$Empresa->setStatus($_POST['status']);

			
			if ($this->empresadao->insereEmpresa ( $Empresa)) {
				echo '<br>'."Nova empresa cadastrada com sucesso";
				echo '<meta http-equiv="refresh" content="5;url=empresas.php">';
			} else
				echo "Houve falha no cadastro, tente novamente";
		}
	}
	
	public function mostraTelaConsulta() {
		
		
		$lista = $this->empresadao->retornaEmpresa();
		
		echo "<table border='1' width='100%'>";
		echo "<tr>
				<th>COD</th>
				<th>Nome</th>
				<th>Razão Social</th>
				<th>CNPJ</th>
				<th>CGF</th>
				<th>Endereço</th>
				<th>Localidade</th>
				<th>Proprietário</th>
				<th>Status</th>
				</tr>";
		
		foreach ( $lista as $empres ) {
			echo "<tr>";
			echo "<td>" . $empres->getCod () . "</td>";
			echo "<td>" . $empres->getNome() . "</td>";
			echo "<td width='30%'>" .'<b>'. $empres->getRazaoSocial() .'</b>'. "</td>";
			echo "<td width='20%'>" . $empres->getCnpj() . "</td>";
			echo "<td width='10%'>" . $empres->getCgf() . "</td>";
			echo "<td width='40%' align='left'>" . $empres->getLogradouro() .' '. $empres->getNumero().' '.$empres->getComplemento().' -<b> '.$empres->getBairro().' -</b> CEP: '.$empres->getCep().' '.$empres->getMunicipio()."</td>";
			echo "<td>" . $empres->getLocalidade() . "</td>";
			echo "<td>" . $empres->getProprietario() . "</td>";
			echo "<td>" . $empres->getStatus() . "</td>";
			/*echo "<td>" . '<form action="" method="post">
					<input type="submit" name="visualizar" value="Visualizar">
					<input type="hidden" name="cod" value="' . $ocorre->getCod () . '">
			</form>' . "</td>";*/
			echo "</tr>";
		}
		
		echo "</table><br>";
		
		echo '<form action="" method="Post">
		
			<input type=button value=imprimir onclick=window.print();>
		
			</form>';
		
		
	}
	
	
	
	public static function main($tela) {
		switch ($tela) {
			
			case self::TELA_PADRAO :
				echo "TELA PADRÃO";
				break;
			
			case self::TELA_ADMIN :
				
				$telaAdmin = new EmpresaView ();
				$telaAdmin->mostraTelaAdmin ();
				break;
				
			case self::TELA_CONSULTA :
				
				$telaConsulta = new EmpresaView ();
				$telaConsulta->mostraTelaConsulta();
				break;
			
			default :
				echo "PADRÃO";
				break;
		}
	}
}
