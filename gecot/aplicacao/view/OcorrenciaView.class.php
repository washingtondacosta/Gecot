
<?php
class OcorrenciaView {
	const TELA_PADRAO = 0;
	const TELA_USUARIO = 1;
	const TELA_ADMIN = 2;
	const TELA_CONSULTA = 3;
	const TELA_ADMINCADOCORRENCIA = 4;
	const TELA_ABREOCORRENCIA = 5;
	public $ocorrenciadao;
	public function OcorrenciaView() {
		$this->ocorrenciadao = new OcorrenciaDAO ();
	}
	public function mostraTelaUsuario() {
		/*
		 * if (isset ( $_POST ['deletar'] )) { $usuapaga = new Ocorrencia (); $usuapaga->setCod ( $_POST ['cod'] ); if ($this->ocorrenciadao->deletaOcorrencia ( $usuapaga )) { echo "Ocorrência deletada com sucesso"; echo '<meta http-equiv="refresh" content="2;url=index.php">'; } else { echo "Ocorrência não deletada"; echo '<meta http-equiv="refresh" content="2;url=index.php">'; } return; }
		 */
		echo '<form action="" method="post">
		<br>Local:<select required name="setorsolicitante">
  <option value="nenhuma">Selecione o setor</option>
  <optgroup title=lojas>
    <option value="Galeria Professor Brandão">Galeria Professor Brandão</option>
    <option value="Loja Pedro I">Loja Pedro I</option>
	<option value="Shopping Acaiaca">Shopping Acaiaca</option>
	<option value="Shopping Avenida">Shopping Avenida</option>
	<option value="Shopping Benfica">Shopping Benfica</option>
	<option value="Shopping Parangaba">Shopping Parangaba</option>
    
  </optgroup>
  <optgroup title=setores>
  <option value="separador">------------------------</option>
	<option value="Estoque de Armação">Estoque de Armação</option>
    <option value="Estoque de lentes">Estoque de Lentes</option>
    <option value="Laboratório">Laboratório</option>
	<option value="Financeiro">Financeiro</option>
	<option value="Recursos Humanos">Recursos Humanos</option>
	<option value="Diretoria/administração">Diretoria/administração</option>
	<option value="Departamento de T.I">Departamento de T.I</option>
	<option value="Jurídico">Jurídico</option>
	<option value="Almoxarifado">Almoxarifado</option>
	<option value="Recepção">Recepção</option>
	</optgroup>
  
</select><br> <br><input type="checkbox" name="outros" value="Outros"> Outros: <input type="text" name="outroslocais" placeholder="Apenas marque se o local não estiver listado" size=60><br>
				<br>Data: <input
			type="datetime-local" name="data" required><br> <br>Responsável pela abertura de chamado: <input type="text"
			name="pessoasolicitante" size=50 required><br> <br>Descrição do problema:<br><textarea cols=60 rows=5 wrap=virtual name="solicitacao" required></textarea><br>
				<input type="hidden" value="Pendente" name="status"><br><br>
				<input type="submit" value="Enviar"><br><br>
				
	</form>';
		
		if (isset ( $_POST ['setorsolicitante'] ) && isset ( $_POST ['solicitacao'] )) {
			
			$Ocorrencia = new Ocorrencia ();
			
			$Ocorrencia->setSetorsolicitante ( $_POST ['setorsolicitante'] );
			$Ocorrencia->setData ( $_POST ['data'] );
			$Ocorrencia->setPessoasolicitante ( $_POST ['pessoasolicitante'] );
			$Ocorrencia->setSolicitacao ( $_POST ['solicitacao'] );
			$Ocorrencia->setStatus ( $_POST ['status'] );
			
			if ($this->ocorrenciadao->insereOcorrencia ( $Ocorrencia )) {
				echo "Sua ocorrência foi aberta com sucesso e está com o status de pendente no HelpDesk";
				echo '<meta http-equiv="refresh" content="5;url=index.php">';
			} else
				echo "Houve falha na tentativa de abertura de ocorrência, tente novamente";
		}
	}
	public function mostraTelaAdminCadOcorrencia() {
		/*
		 * if (isset ( $_POST ['deletar'] )) { $usuapaga = new Ocorrencia (); $usuapaga->setCod ( $_POST ['cod'] ); if ($this->ocorrenciadao->deletaOcorrencia ( $usuapaga )) { echo "Ocorrência deletada com sucesso"; echo '<meta http-equiv="refresh" content="2;url=index.php">'; } else { echo "Ocorrência não deletada"; echo '<meta http-equiv="refresh" content="2;url=index.php">'; } return; }
		 */
		echo '<form action="" method="post">
		<br>Local:<select required name="setorsolicitante">
  <option value="nenhuma">Selecione o setor</option>
  <optgroup title=lojas>
    <option value="Galeria Professor Brandão">Galeria Professor Brandão</option>
    <option value="Loja Pedro I">Loja Pedro I</option>
	<option value="Shopping Acaiaca">Shopping Acaiaca</option>
	<option value="Shopping Avenida">Shopping Avenida</option>
	<option value="Shopping Benfica">Shopping Benfica</option>
	<option value="Shopping Parangaba">Shopping Parangaba</option>
	
  </optgroup>
  <optgroup title=setores>
  <option value="separador">------------------------</option>
	<option value="Estoque de Armação">Estoque de Armação</option>
    <option value="Estoque de lentes">Estoque de Lentes</option>
    <option value="Laboratório">Laboratório</option>
	<option value="Financeiro">Financeiro</option>
	<option value="Recursos Humanos">Recursos Humanos</option>
	<option value="Diretoria/administração">Diretoria/administração</option>
	<option value="Departamento de T.I">Departamento de T.I</option>
	<option value="Jurídico">Jurídico</option>
	<option value="Almoxarifado">Almoxarifado</option>
	<option value="Recepção">Recepção</option>
	</optgroup>
	
</select><br> <br><input type="checkbox" name="outros" value="Outros"> Outros: <input type="text" name="outroslocais" placeholder="Apenas marque se o local não estiver listado" size=60><br>
				<br>Data: <input
			type="datetime-local" name="data" required><br> <br>Responsável pela abertura de chamado: <input type="text"
			name="pessoasolicitante" size=50 required><br> <br>Descrição do problema:<br><textarea cols=60 rows=5 wrap=virtual name="solicitacao" required></textarea><br>
				<input type="hidden" value="Pendente" name="status"><br><br>
				<input type="submit" value="Enviar"><br><br>
	
	</form>';
		
		if (isset ( $_POST ['setorsolicitante'] ) && isset ( $_POST ['solicitacao'] )) {
			
			$Ocorrencia = new Ocorrencia ();
			
			$Ocorrencia->setSetorsolicitante ( $_POST ['setorsolicitante'] );
			$Ocorrencia->setData ( $_POST ['data'] );
			$Ocorrencia->setPessoasolicitante ( $_POST ['pessoasolicitante'] );
			$Ocorrencia->setSolicitacao ( $_POST ['solicitacao'] );
			$Ocorrencia->setStatus ( $_POST ['status'] );
			
			if ($this->ocorrenciadao->insereOcorrencia ( $Ocorrencia )) {
				echo "Sua ocorrência foi aberta com sucesso e está com o status de pendente no HelpDesk";
				echo '<meta http-equiv="refresh" content="5;url=sysOcorrencia.php?a1=0">';
			} else
				echo "Houve falha na tentativa de abertura de ocorrência, tente novamente";
		}
	}
	public function mostraTelaAdmin() {
		if (isset ( $_POST ['atualizar'] )) {
			$ocorreatualiza = new Ocorrencia ();
			$ocorreatualiza->setCod ( $_POST ['cod'] );
			$ocorreatualiza->setStatus ( $_POST ['status'] );
			$ocorreatualiza->setAtendedor ( $_POST ['atendedor'] );
			$ocorreatualiza->setTipoProblema ( $_POST ['tipoproblema'] );
			$ocorreatualiza->setDeslocamento ( $_POST ['deslocamento'] );
			$ocorreatualiza->setFormaDeslocamento ( $_POST ['formadeslocamento'] );
			$ocorreatualiza->setSolucaoAplicada ( $_POST ['solucaoaplicada'] );
			$ocorreatualiza->setAvaliacaoAtendimento ( $_POST ['avaliacaoatendimento'] );
			$ocorreatualiza->setDtfinal ( $_POST ['dtfinal'] );
			if ($this->ocorrenciadao->atualizaOcorrencia ( $ocorreatualiza )) {
				echo "Ocorrência atualizada com sucesso";
				echo '<meta http-equiv="refresh" content="2;url=chamadasAbertas.php">';
			} else {
				echo "Ocorrência não atualizada";
				echo '<meta http-equiv="refresh" content="2;url=chamadasAbertas.php">';
			}
			return;
		}
		
		$lista = $this->ocorrenciadao->retornaOcorrencia ();
		
		echo "<table border='1' width='100%'>";
		echo "<tr>
				<th>Código</th>
				<th>Setor solicitante</th>
				<th>Data de abertura</th>
				<th>Responsável pela Abertura</th>
				<th>Status</th>
				</tr>";
		
		foreach ( $lista as $ocorre ) {
			echo "<tr>";
			echo "<td>" . $ocorre->getCod () . "</td>";
			echo "<td>" . $ocorre->getSetorsolicitante () . "</td>";
			echo "<td width='20%'>" . $ocorre->Formatadata ( $ocorre->getData () ) . "</td>";
			echo "<td>" . $ocorre->getPessoasolicitante () . "</td>";
			echo "<td>" . $ocorre->getStatus () . "</td>";
			echo "<td>" . '<form action="" method="post">
					<input type="submit" name="visualizar" value="Visualizar">
					<input type="hidden" name="cod" value="' . $ocorre->getCod () . '">
			</form>' . "</td>";
			echo "</tr>";
		}
		echo "</table><br>";
		
		if (isset ( $_POST ['visualizar'] )) {
			$visuocorrencia = new Ocorrencia ();
			$visuocorrencia->setCod ( $_POST ['cod'] );
			if ($this->ocorrenciadao->retornaOcorrencia ()) {
				
				$lista = $this->ocorrenciadao->retornaUmaOcorrencia ( $visuocorrencia->getCod ( $_POST ['cod'] ) );
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<td><table border='1' width='100%'>";
				echo "<tr>
				<th>Código</th>
				<th>Setor solicitante</th>
				<th>Data de abertura</th>
				<th>Responsável pela Abertura</th>
				<th>Status</th>
				</tr>";
				
				foreach ( $lista as $ocorre ) {
					echo "<tr>";
					echo "<td>" . $ocorre->getCod () . "</td>";
					echo "<td>" . $ocorre->getSetorsolicitante () . "</td>";
					echo "<td width='20%'>" . $ocorre->Formatadata ( $ocorre->getData () ) . "</td>";
					echo "<td>" . $ocorre->getPessoasolicitante () . "</td>";
					echo "<td>" . '<form action="" method="post"><select name="status">
                  <option value="' . $ocorre->getStatus () . '">' . $ocorre->getStatus () . '</option>
                  <option value="Finalizado">Finalizado</option>
                  <option value="Inconcluido">Inconcluido</option>
                  <option value="Em andamento">Em andamento</option>
                  <option value="Pendente">Pendente</option>
                  		</form>' . "</td>";
					echo "</tr>";
					echo "</table>";
				}
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Descrição do problema</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td align='left'>" . $ocorre->getSolicitacao () . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Atendedor</th>";
				echo "<th>Tipo do problema</th>";
				echo "<th>Deslocamento</th>";
				echo "<th>Forma de deslocamento</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . '<form action="" method="post"><select name="atendedor">
                  <option value="' . $ocorre->getAtendedor () . '">' . $ocorre->getAtendedor () . '</option>
                  <option value="Isaac Uchôa">Isaac Uchôa</option>
                  <option value="Washington da Costa">Washington da Costa</option>
                  <option value="Ambos">Ambos</option>
                  		</form>' . "</td>";
				echo "<td>" . '<form action="" method="post"><select name="tipoproblema">
                  <option value="' . $ocorre->getTipoProblema () . '">' . $ocorre->getTipoProblema () . '</option>
                  <option value="Hardware">Hardware</option>
                  <option value="Impressora">Impressora</option>
                  <option value="Rede/Internet">Rede/Internet</option>
                  <option value="Help Desk">Help Desk</option>
                  <option value="CFTV">CFTV</option>
                  <option value="Treinamento">Treinamento</option>
                  <option value="Mídia/Gráfico">Mídia/Gráfico</option>
                  <option value="Sistema/ERP">Sistema/ERP</option>
                  <option value="Extra setorial">Extra setorial</option>
                  <option value="Telefonia">Telefonia</option>
                  <option value="Organizacional">Organizacional</option>
                  		
                  		</form>' . "</td>";
				echo "<td>" . '<form action="" method="post"><select name="deslocamento">
                  <option value="' . $ocorre->getDeslocamento () . '">' . $ocorre->getDeslocamento () . '</option>
                  <option value="SIM">SIM</option>
                  <option value="NÃO">NÃO</option>
                  		</form>' . "</td>";
				echo "<td>" . '<form action="" method="post"><select name="formadeslocamento">
                  <option value="' . $ocorre->getFormaDeslocamento () . '">' . $ocorre->getFormaDeslocamento () . '</option>
                  <option value="Ônibus">Ônibus</option>
                  <option value="Moto-Táxi">Moto-Táxi</option>
                  <option value="Não motorizado">Não motorizado</option>
                  <option value="Veículo da empresa">Veículo da empresa</option>
                  <option value="Veículo do atendedor">Veículo do atendedor</option>
                  		</form>' . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Solução aplicada</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . '<textarea cols=90 rows=5 wrap=virtual name="solucaoaplicada" required>' . $ocorre->getSolucaoAplicada () . '</textarea>' . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Avaliação do atendimento</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . '<textarea cols=90 rows=4 wrap=virtual name="avaliacaoatendimento">' . $ocorre->getAvaliacaoAtendimento () . '</textarea>' . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Data de finalização</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> " . '<form action="" method="post"><input type="datetime-local" name="dtfinal" value="' . $ocorre->getDtfinal () . '">' . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . '<form action="" method="post"><input type="submit" name="atualizar" value="Atualizar">
						       <input type="hidden" name="cod" value="' . $ocorre->getCod () . '">
						</form>' . "</td>";
				echo "</tr>";
				echo "</table>";
			} else
				
				return;
		}
	}
	
	// /============================================================================================///
	public function mostraTelaAbreOcorrencia() {
		if (isset ( $_POST ['atualizar'] )) {
			$ocorreatualiza = new Ocorrencia ();
			$ocorreatualiza->setCod ( $_POST ['cod'] );
			$ocorreatualiza->setStatus ( $_POST ['status'] );
			$ocorreatualiza->setAtendedor ( $_POST ['atendedor'] );
			$ocorreatualiza->setTipoProblema ( $_POST ['tipoproblema'] );
			$ocorreatualiza->setDeslocamento ( $_POST ['deslocamento'] );
			$ocorreatualiza->setFormaDeslocamento ( $_POST ['formadeslocamento'] );
			$ocorreatualiza->setSolucaoAplicada ( $_POST ['solucaoaplicada'] );
			$ocorreatualiza->setAvaliacaoAtendimento ( $_POST ['avaliacaoatendimento'] );
			$ocorreatualiza->setDtfinal ( $_POST ['dtfinal'] );
			if ($this->ocorrenciadao->atualizaOcorrencia ( $ocorreatualiza )) {
				echo "Ocorrência atualizada com sucesso";
				echo '<meta http-equiv="refresh" content="2;url=chamadasAbertas.php">';
			} else {
				echo "Ocorrência não atualizada";
				echo '<meta http-equiv="refresh" content="2;url=chamadasAbertas.php">';
			}
			return;
		}
		
		if (isset ( $_POST ['visualizar'] )) {
			$visuocorrencia = new Ocorrencia ();
			$visuocorrencia->setCod ( $_POST ['cod'] );
			if ($this->ocorrenciadao->retornaOcorrencia ()) {
				
				$lista = $this->ocorrenciadao->retornaUmaOcorrencia ( $visuocorrencia->getCod ( $_POST ['cod'] ) );
				
				echo "<div id=visuocorrencia>";
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<td><table border='1' width='100%'>";
				echo "<tr>
				<th>Código</th>
				<th>Setor solicitante</th>
				<th>Data de abertura</th>
				<th>Responsável pela Abertura</th>
				<th>Status</th>
				</tr>";
				
				foreach ( $lista as $ocorre ) {
					echo "<tr>";
					echo "<td>" . $ocorre->getCod () . "</td>";
					echo "<td>" . $ocorre->getSetorsolicitante () . "</td>";
					echo "<td width='20%'>" . $ocorre->Formatadata ( $ocorre->getData () ) . "</td>";
					echo "<td>" . $ocorre->getPessoasolicitante () . "</td>";
					echo "<td>" . '<form action="" method="post"><select name="status">
                  <option value="' . $ocorre->getStatus () . '">' . $ocorre->getStatus () . '</option>
                  <option value="Finalizado">Finalizado</option>
                  <option value="Inconcluido">Inconcluido</option>
                  <option value="Em andamento">Em andamento</option>
                  <option value="Pendente">Pendente</option>
                  		</form>' . "</td>";
					echo "</tr>";
					echo "</table>";
				}
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Descrição do problema</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td align='left'>" . $ocorre->getSolicitacao () . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Atendedor</th>";
				echo "<th>Tipo do problema</th>";
				echo "<th>Deslocamento</th>";
				echo "<th>Forma de deslocamento</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . $ocorre->getAtendedor () . "</td>";
				echo "<td>" . $ocorre->getTipoProblema () . "</td>";
				echo "<td>" . $ocorre->getDeslocamento () . "</td>";
				echo "<td>"  . $ocorre->getFormaDeslocamento () . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Solução aplicada</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td align='left'>" . $ocorre->getSolucaoAplicada () . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Avaliação do atendimento</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . $ocorre->getAvaliacaoAtendimento () .  "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Data de finalização</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> " . $ocorre->getDtfinal () . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . '<form action="" method="post"><input type="submit" name="atualizar" value="Atualizar">
						       <input type="hidden" name="cod" value="' . $ocorre->getCod () . '">
						       <input type=button value=Imprimir onclick=window.print();>
						</form>' . "</td>";
				echo "</tr>";
				echo "</table></div>";
			} else
				
				return;
		}
	}
	// /============================================================================================///
	public function mostraTelaConsulta() {
		if (isset ( $_POST ['atualizar'] )) {
			$ocorreatualiza = new Ocorrencia ();
			$ocorreatualiza->setCod ( $_POST ['cod'] );
			$ocorreatualiza->setStatus ( $_POST ['status'] );
			if ($this->ocorrenciadao->atualizaStatusOcorrencia ( $ocorreatualiza )) {
				echo "Ocorrência atualizada com sucesso";
				echo '<meta http-equiv="refresh" content="2;url=chamadasAbertas.php">';
			} else {
				echo "Ocorrência não atualizada";
				echo '<meta http-equiv="refresh" content="2;url=chamadasAbertas.php">';
			}
			return;
		}
		
		echo '<table><tr>
				<form action="" method="post">
				Data de finalização:
				De: <input type="datetime-local" name="data1">
				a <input type="datetime-local" name="data2">
		        <input type="submit" name="Filtrar" value="Filtrar">
				
				</form></tr></table>';
		
		$data1 = $_POST [data1];
		$data2 = $_POST [data2];
		
		$lista = $this->ocorrenciadao->retornaOcorrenciaFinal ();
		
		$contagem = $this->ocorrenciadao->contaOcorrencia ( $data1, $data2 );
		$atendedor1 = $this->ocorrenciadao->contaOcorrenciaAtendedor1 ( $data1, $data2 );
		$atendedor2 = $this->ocorrenciadao->contaOcorrenciaAtendedor2 ( $data1, $data2 );
		
		$contaLimoeiro = $this->ocorrenciadao->contaOcorrenciaLimoeiro ( $data1, $data2 );
		$contaLimoeiroAt1 = $this->ocorrenciadao->contaOcorrenciaLimoeiroAt1 ( $data1, $data2 );
		$contaLimoeiro2 = $this->ocorrenciadao->contaOcorrenciaLimoeiro2 ( $data1, $data2 );
		$contaLimoeiro2At1 = $this->ocorrenciadao->contaOcorrenciaLimoeiro2At1 ( $data1, $data2 );
		$contaVPOtica = $this->ocorrenciadao->contaOcorrenciaVPOtica ( $data1, $data2 );
		$contaVPOticaAt1 = $this->ocorrenciadao->contaOcorrenciaVPOticaAt1 ( $data1, $data2 );
		$contaOticaJairta = $this->ocorrenciadao->contaOcorrenciaJairta ( $data1, $data2 );
		$contaOticaJairtaAt1 = $this->ocorrenciadao->contaOcorrenciaJairtaAt1 ( $data1, $data2 );
		$contaFerreiraLopez = $this->ocorrenciadao->contaOcorrenciaFerreiraLopez ( $data1, $data2 );
		$contaFerreiraLopezAt1 = $this->ocorrenciadao->contaOcorrenciaFerreiraLopezAt1 ( $data1, $data2 );
		$contaVPOtica2 = $this->ocorrenciadao->contaOcorrenciaVPOticaFilial ( $data1, $data2 );
		$contaVPOtica2At1 = $this->ocorrenciadao->contaOcorrenciaVPOticaFilialAt1 ( $data1, $data2 );
		$contaEstoqueArmacao = $this->ocorrenciadao->contaOcorrenciaEstoqueArmacao ( $data1, $data2 );
		$contaEstoqueArmacaoAt1 = $this->ocorrenciadao->contaOcorrenciaEstoqueArmacaoAt1 ( $data1, $data2 );
		$contaEstoqueLentes = $this->ocorrenciadao->contaOcorrenciaEstoqueLentes ( $data1, $data2 );
		$contaEstoqueLentesAt1 = $this->ocorrenciadao->contaOcorrenciaEstoqueLentesAt1 ( $data1, $data2 );
		$contaLaboratorio = $this->ocorrenciadao->contaOcorrenciaLaboratorio ( $data1, $data2 );
		$contaLaboratorioAt1 = $this->ocorrenciadao->contaOcorrenciaLaboratorioAt1 ( $data1, $data2 );
		$contaFinanceiro = $this->ocorrenciadao->contaOcorrenciaFinanceiro ( $data1, $data2 );
		$contaFinanceiroAt1 = $this->ocorrenciadao->contaOcorrenciaFinanceiroAt1 ( $data1, $data2 );
		$contaRH = $this->ocorrenciadao->contaOcorrenciaRH ( $data1, $data2 );
		$contaRHAt1 = $this->ocorrenciadao->contaOcorrenciaRHAt1 ( $data1, $data2 );
		$contaDiretoria = $this->ocorrenciadao->contaOcorrenciaDiretoria ( $data1, $data2 );
		$contaDiretoriaAt1 = $this->ocorrenciadao->contaOcorrenciaDiretoriaAt1 ( $data1, $data2 );
		$contaDTI = $this->ocorrenciadao->contaOcorrenciaDTI ( $data1, $data2 );
		$contaDTIAt1 = $this->ocorrenciadao->contaOcorrenciaDTIAt1 ( $data1, $data2 );
		$contaJuridico = $this->ocorrenciadao->contaOcorrenciaJuridico ( $data1, $data2 );
		$contaJuridicoAt1 = $this->ocorrenciadao->contaOcorrenciaJuridicoAt1 ( $data1, $data2 );
		$contaAlmoxarifado = $this->ocorrenciadao->contaOcorrenciaAlmoxarifado ( $data1, $data2 );
		$contaAlmoxarifadoAt1 = $this->ocorrenciadao->contaOcorrenciaAlmoxarifadoAt1 ( $data1, $data2 );
		$contaRecepcao = $this->ocorrenciadao->contaOcorrenciaRecepcao ( $data1, $data2 );
		$contaRecepcaoAt1 = $this->ocorrenciadao->contaOcorrenciaRecepcaoAt1 ( $data1, $data2 );
		echo "<table border='1' width='100%'>";
		echo "<tr>";
		echo "<th>Ocorrências finalizadas</th>";
		echo "<th>QT. Atendedor Washington da Costa</th>";
		echo "<th>QT. Atendedor Isaac Uchôa</th>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>$contagem</td>";
		echo "<td>$atendedor1</td>";
		echo "<td>$atendedor2</td>";
		echo "</tr>";
		echo "</table><br>";
		
		echo "<table border='1' width='100%'>";
		echo "<div>";
		echo '<th>Contagem total de chamadas finalizadas por setor</th>';
		echo '<th>Total</th>';
		echo '<th>Washington da Costa</th>';
		echo '<th>Isaac Uchôa</th>';
		echo "</div>";
		echo "<tr>
		       <td>Galeria Professor Brandão</td>
		       <td>$contaVPOtica</td>
		       <td>$contaVPOticaAt1</td>
		       </tr>";
		echo "<tr>
		       <td>Loja Pedro I</td>
		       <td>$contaOticaJairta</td>
		       <td>$contaOticaJairtaAt1</td>
		</tr>";
		echo "<tr>
		        <td>Shopping Acaiaca</td>
		        <td>$contaFerreiraLopez</td>
		        <td>$contaFerreiraLopezAt1</td>
		</tr>";
		echo "<tr>
				<td>Shopping Avenida</td>
				<td>$contaLimoeiro</td>
				<td>$contaLimoeiroAt1</td>
				</tr>";
		echo "<tr>
		        <td>Shopping benfica</td>
		        <td>$contaVPOtica2</td>
		        <td>$contaVPOtica2At1</td>
		        </tr>";
		echo "<tr>
		         <td>Shopping Parangaba</td>
		         <td>$contaLimoeiro2</td>
		         <td>$contaLimoeiro2At1</td>
		         </tr>";
		echo "<tr>
		         <td>Estoque de Armação</td>
		         <td>$contaEstoqueArmacao</td>
		         <td>$contaEstoqueArmacaoAt1</td>
		         </tr>";
		echo "<tr>
		         <td>Estoque de Lentes</td>
		         <td>$contaEstoqueLentes</td>
		         <td>$contaEstoqueLentesAt1</td>
		         </tr>";
		echo "<tr>
		         <td>Laboratório</td>
		         <td>$contaLaboratorio</td>
		         <td>$contaLaboratorioAt1</td>
		         </tr>";
		echo "<tr>
		         <td>Financeiro</td>
		         <td>$contaFinanceiro</td>
		         <td>$contaFinanceiroAt1</td>
		         </tr>";
		echo "<tr>
		         <td>Recursos Humanos</td>
		         <td>$contaRH</td>
		         <td>$contaRHAt1</td>
		         </tr>";
		echo "<tr>
		         <td>Diretoria / Administração</td>
		         <td>$contaDiretoria</td>
		         <td>$contaDiretoriaAt1</td>
		         </tr>";
		echo "<tr>
		         <td>Departamento de T.I</td>
		         <td>$contaDTI</td>
		         <td>$contaDTIAt1</td>
		         </tr>";
		echo "<tr>
		         <td>Jurídico</td>
		         <td>$contaJuridico</td>
		         <td>$contaJuridicoAt1</td>
		         </tr>";
		echo "<tr>
		         <td>Almoxarifado</td>
		         <td>$contaAlmoxarifado</td>
		         <td>$contaAlmoxarifadoAt1</td>
		         </tr>";
		echo "<tr>
		         <td>Recepção</td>
		         <td>$contaRecepcao</td>
		         <td>$contaRecepcaoAt1</td>
		         </tr>";
		echo "<tr>
		         <th>TOTAL</th>
		         <th>$contagem</th>
		         <th>$atendedor1</th>
		         <th>$atendedor2</th>
		         </tr>";
		echo "</table><br>";
		
		if (isset ( $_POST ['Filtrar'] )) {
			
			$data1 = $_POST [data1];
			$data2 = $_POST [data2];
			
			$lista = $this->ocorrenciadao->retornaOcorrenciaFinalFiltro ( $data1, $data2 );
			
			echo "<table border='1' width='100%'>";
			
			echo "<tr>
				<th>Código</th>
				<th>Setor solicitante</th>
				<th>Data de abertura</th>
				<th>Data de Finalização</th>
				<th>Responsável pela Abertura</th>
				<th>Tipo do problema</th>
				<th>Atendedor</th>
				</tr>";
			
			foreach ( $lista as $ocorre ) {
				echo "<tr>";
				echo "<td>" . $ocorre->getCod () . "</td>";
				echo "<td width='25%'>" . $ocorre->getSetorsolicitante () . "</td>";
				echo "<td width='20%'>" . $ocorre->Formatadata ( $ocorre->getData () ) . "</td>";
				echo "<td width='15%'>" . $ocorre->Formatadata ( $ocorre->getDtfinal () ) . "</td>";
				echo "<td width='15%'>" . $ocorre->getPessoasolicitante () . "</td>";
				echo "<td>" . $ocorre->getTipoProblema () . "</td>";
				echo "<td width='40%'>" . $ocorre->getAtendedor () . "</td>";
				echo "<td>" . '<form action="abreocorrencia.php" method="post" target="_blank">
					<input type="submit" name="visualizar" value="Visualizar">
					<input type="hidden" name="cod" value="' . $ocorre->getCod () . '">
			</form>' . "</td>";
				echo "</tr>";
			}
			echo "</table><br>";
		}
		
		if (isset ( $_POST ['visualizar'] )) {
			$visuocorrencia = new Ocorrencia ();
			$visuocorrencia->setCod ( $_POST ['cod'] );
			if ($this->ocorrenciadao->retornaOcorrencia ()) {
				
				$lista = $this->ocorrenciadao->retornaUmaOcorrencia ( $visuocorrencia->getCod ( $_POST ['cod'] ) );
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<td><table border='1' width='100%'>";
				echo "<tr>
				<th>Código</th>
				<th>Setor solicitante</th>
				<th>Data de abertura</th>
				<th>Responsável pela Abertura</th>
				<th>Status</th>
				</tr>";
				
				foreach ( $lista as $ocorre ) {
					echo "<tr>";
					echo "<td>" . $ocorre->getCod () . "</td>";
					echo "<td>" . $ocorre->getSetorsolicitante () . "</td>";
					echo "<td width='20%'>" . $ocorre->Formatadata ( $ocorre->getData () ) . "</td>";
					echo "<td>" . $ocorre->getPessoasolicitante () . "</td>";
					echo "<td>" . '<form action="" method="post"><select name="status">
                  <option value="' . $ocorre->getStatus () . '">' . $ocorre->getStatus () . '</option>
                  <option value="Finalizado">Finalizado</option>
                  <option value="Inconcluido">Inconcluido</option>
                  <option value="Em andamento">Em andamento</option>
                  <option value="Pendente">Pendente</option>
                  		</form>' . "</td>";
					echo "</tr>";
					echo "</table>";
				}
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Descrição do problema</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td align='left'>" . $ocorre->getSolicitacao () . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Atendedor</th>";
				echo "<th>Tipo do problema</th>";
				echo "<th>Deslocamento</th>";
				echo "<th>Forma de deslocamento</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>" . $ocorre->getAtendedor () . "</td>";
				echo "<td>" . $ocorre->getTipoProblema () . "</td>";
				echo "<td>" . $ocorre->getDeslocamento () . "</td>";
				echo "<td>" . $ocorre->getFormaDeslocamento () . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Solução aplicada</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td align='left'><br>" . $ocorre->getSolucaoAplicada () . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Avaliação do atendimento</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td align='left'><br>" . $ocorre->getAvaliacaoAtendimento () . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<table border='1' width='100%'>";
				echo "<tr>";
				echo "<th>Data de finalização</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td> " . $ocorre->Formatadata ( $ocorre->getDtfinal () ) . "</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "</td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td>" . '<form action="" method="post"><input type="submit" name="atualizar" value="Atualizar">
						       <input type="hidden" name="cod" value="' . $ocorre->getCod () . '">
						</form>' . "</td>";
				echo "</tr>";
				echo "</table>";
			} else
				
				return;
		}
	}
	public static function main($tela) {
		switch ($tela) {
			
			case self::TELA_PADRAO :
				echo "TELA PADRÃO";
				break;
			
			case self::TELA_USUARIO :
				
				$telaUsuario = new OcorrenciaView ();
				$telaUsuario->mostraTelaUsuario ();
				break;
			
			case self::TELA_ADMIN :
				
				$telaAdmin = new OcorrenciaView ();
				$telaAdmin->mostraTelaAdmin ();
				break;
			
			case self::TELA_CONSULTA :
				
				$telaConsulta = new OcorrenciaView ();
				$telaConsulta->mostraTelaConsulta ();
				break;
			
			case self::TELA_ADMINCADOCORRENCIA :
				
				$telaAdminCadOcorrencia = new OcorrenciaView ();
				$telaAdminCadOcorrencia->mostraTelaAdminCadOcorrencia ();
				break;
			
			case self::TELA_ABREOCORRENCIA :
				
				$telaAbreOcorrencia = new OcorrenciaView ();
				$telaAbreOcorrencia->mostraTelaAbreOcorrencia();
				break;
				
			
			default :
				echo "PADRÃO";
				break;
		}
	}
}
