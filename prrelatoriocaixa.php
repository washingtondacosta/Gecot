<!DOCTYPE html>
<?php
// A sessão precisa ser iniciada em cada página diferente
if (! isset ( $_SESSION ))
	session_start ();

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (! isset ( $_SESSION ['UsuarioID'] ) or ($_SESSION ['UsuarioNivel'] < $nivel_necessario)) {
	// Destrói a sessão por segurança
	session_destroy ();
	// Redireciona o visitante de volta pro login
	header ( "Location: ../index.php" );
	exit ();
}
?>

<?php
include 'conexao.php';
include 'funcoes.php';
?>

<html>


<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

	<div id="container">

<?php
$loja = $_POST ['idloja'];
$DataInicial = $_POST ['DataInicial'];
$DataFinal = $_POST ['DataFinal'];

$instrucaoSQL = "SELECT     dbo.loja.cidade, dbo.loja.endereco, dbo.formauditoria.datadereferencia, dbo.Auditor.nome, dbo.formauditoria.nrminuta, dbo.formauditoria.dinheiro, 
                      dbo.formauditoria.cartao, dbo.formauditoria.che_pre, dbo.formauditoria.restantedevenda, dbo.formauditoria.carne, dbo.formauditoria.totaldavenda, 
                      dbo.formauditoria.chequedia
FROM         dbo.Auditor INNER JOIN
                      dbo.formauditoria ON dbo.Auditor.id = dbo.formauditoria.idauditor INNER JOIN
                      dbo.loja ON dbo.formauditoria.idloja = dbo.loja.id
where dbo.loja.endereco='$loja' and datadereferencia between '$DataInicial' and '$DataFinal'";
$consulta = mssql_query ( $instrucaoSQL );
$numRegistros = mssql_num_rows ( $consulta );

$instrucaoSQL3 = "SELECT     sum(dbo.formauditoria.dinheiro) as dinheiro
FROM         dbo.loja INNER JOIN dbo.formauditoria ON dbo.loja.id = dbo.formauditoria.idloja
where dbo.loja.endereco='$loja' and  datadereferencia between '$DataInicial' and '$DataFinal'";
$consulta3 = mssql_query ( $instrucaoSQL3 );

$instrucaoSQL4 = "SELECT     sum(dbo.formauditoria.cartao) as cartao
FROM         dbo.loja INNER JOIN dbo.formauditoria ON dbo.loja.id = dbo.formauditoria.idloja
where dbo.loja.endereco='$loja' and  datadereferencia between '$DataInicial' and '$DataFinal'";
$consulta4 = mssql_query ( $instrucaoSQL4 );

$instrucaoSQL5 = "SELECT     sum(dbo.formauditoria.che_pre) as che_pre
FROM         dbo.loja INNER JOIN dbo.formauditoria ON dbo.loja.id = dbo.formauditoria.idloja
where dbo.loja.endereco='$loja' and  datadereferencia between '$DataInicial' and '$DataFinal'";
$consulta5 = mssql_query ( $instrucaoSQL5 );

$instrucaoSQL6 = "SELECT     sum(dbo.formauditoria.chequedia) as chequedia
FROM         dbo.loja INNER JOIN dbo.formauditoria ON dbo.loja.id = dbo.formauditoria.idloja
where dbo.loja.endereco='$loja' and  datadereferencia between '$DataInicial' and '$DataFinal'";
$consulta6 = mssql_query ( $instrucaoSQL6 );

$instrucaoSQL7 = "SELECT     sum(dbo.formauditoria.carne) as carne
FROM         dbo.loja INNER JOIN dbo.formauditoria ON dbo.loja.id = dbo.formauditoria.idloja
where dbo.loja.endereco='$loja' and  datadereferencia between '$DataInicial' and '$DataFinal'";
$consulta7 = mssql_query ( $instrucaoSQL7 );

$instrucaoSQL8 = "SELECT     sum(dbo.formauditoria.restantedevenda) as restantedevenda
FROM         dbo.loja INNER JOIN dbo.formauditoria ON dbo.loja.id = dbo.formauditoria.idloja
where dbo.loja.endereco='$loja' and  datadereferencia between '$DataInicial' and '$DataFinal'";
$consulta8 = mssql_query ( $instrucaoSQL8 );

$instrucaoSQL9 = "SELECT     sum(dbo.formauditoria.totaldavenda) as totaldavenda
FROM         dbo.loja INNER JOIN dbo.formauditoria ON dbo.loja.id = dbo.formauditoria.idloja
where dbo.loja.endereco='$loja' and  datadereferencia between '$DataInicial' and '$DataFinal'";
$consulta9 = mssql_query ( $instrucaoSQL9 );

if (isset ( $_POST ['enviar'] )) {
	
	echo '<p>';
	
	echo "<div id='resultado'>";
	
	date_default_timezone_set ( "America/Fortaleza" );
	
	echo "<div id='main'>";
	echo "<h2>Loja: $loja</h2>";
	echo "<h3>Periodo:" . date ( 'd/m/Y', strtotime ( $DataInicial ) ) . ' a ' . date ( 'd/m/Y', strtotime ( $DataFinal ) ) . "</h3>";
	echo "<h3>Emitido em: " . date ( 'd-m-Y H:i' ) . "</h3>";
	echo "</div>";
	
	echo '<table>
			<tr>
			<th>Data da venda</th>
		    <th>VL. INFORMADO POR</th>
			<th>NR. MINUTA</th>
			<th>DINHEIRO</th>
			<th>CART&Atilde;O</th>
			<th>CHEQUE-PR&Eacute;</th>
			<th>CHEQUE DO DIA</th>
			<th>CARN&Ecirc;</th>
			<th>RESTANTE DE VENDA</th>
			<th>TOTAL
			</th>
			</tr>
			<tr>';
	
	while ( $cadaLinha = mssql_fetch_array ( $consulta ) ) {
		echo "<td>" . date ( 'd/m/Y', strtotime ( $cadaLinha [datadereferencia] ) ) . "</td>";
		echo "<td>$cadaLinha[nome]</td>";
		echo "<td>$cadaLinha[nrminuta]</td>";
		echo "<td>" . number_format ( $cadaLinha [dinheiro], 2, '.', '' ) . "</td>";
		echo "<td>" . number_format ( $cadaLinha [cartao], 2, '.', '' ) . "</td>";
		echo "<td>" . number_format ( $cadaLinha [che_pre], 2, '.', '' ) . "</td>";
		echo "<td>" . number_format ( $cadaLinha [chequedia], 2, '.', '' ) . "</td>";
		echo "<td>" . number_format ( $cadaLinha [carne], 2, '.', '' ) . "</td>";
		echo "<td>" . number_format ( $cadaLinha [restantedevenda], 2, '.', '' ) . "</td>";
		echo "<td>" . number_format ( $cadaLinha [totaldavenda], 2, '.', '' ) . "</td>";
		echo '</tr>';
	}
	
	echo "<tr>
                      		<th>-</th>
                      		<th>-</th>
		                    <th>-</th>
                      		<th>DINHEIRO</th>
                      		<th>CARTAO</th>
                      		<th>CREQUE-PRE</th>
                      		<th>CHEQUE DO DIA</th>
                      		<th>CARNE</th>
                      		<th>RESTANTE DE VENDA</th>
                      		<th>TOTAL</th>
                      		</tr>";
	echo "<td style='background:#ccc;font-size:14pt;'>" . "</td>";
	echo "<td style='background:#ccc;font-size:14pt;'>" . 'TOTALIZADORES' . "</td>";
	echo "<td style='background:#ccc;font-size:14pt;'>" . "</td>";
	echo "<td style='background:#ccc;font-size:14pt;'>R$ ";
	while ( $cadaLinha3 = mssql_fetch_array ( $consulta3 ) ) {
		echo number_format ( $cadaLinha3 [dinheiro], 2, '.', '' );
	}
	echo "</td>";
	echo "<td style='background:#ccc;font-size:14pt;'>R$ ";
	while ( $cadaLinha4 = mssql_fetch_array ( $consulta4 ) ) {
		echo number_format ( $cadaLinha4 [cartao], 2, '.', '' );
	}
	echo "</td>";
	echo "<td style='background:#ccc;font-size:14pt;'>R$ ";
	while ( $cadaLinha5 = mssql_fetch_array ( $consulta5 ) ) {
		echo number_format ( $cadaLinha5 [che_pre], 2, '.', '' );
	}
	echo "</td>";
	echo "<td style='background:#ccc;font-size:14pt;'>R$ ";
	while ( $cadaLinha6 = mssql_fetch_array ( $consulta6 ) ) {
		echo number_format ( $cadaLinha6 [chequedia], 2, '.', '' );
	}
	echo "</td>";
	echo "<td style='background:#ccc;font-size:14pt;'>R$ ";
	while ( $cadaLinha7 = mssql_fetch_array ( $consulta7 ) ) {
		echo number_format ( $cadaLinha7 [carne], 2, '.', '' );
	}
	echo "</td>";
	echo "<td style='background:#ccc;font-size:14pt;'>R$ ";
	while ( $cadaLinha8 = mssql_fetch_array ( $consulta8 ) ) {
		echo number_format ( $cadaLinha8 [restantedevenda], 2, '.', '' );
	}
	echo "</td>";
	echo "<td style='background:#ccc;font-size:14pt;'>R$ ";
	while ( $cadaLinha9 = mssql_fetch_array ( $consulta9 ) ) {
		echo number_format ( $cadaLinha9 [totaldavenda], 2, '.', '' );
	}
	echo "</td>";
	echo "</tr>";
	
	echo '</table><br>';
	
	echo "<div id='rodape'>";
	
	echo "</div>";
	
	echo "</div>";
}

?>

</div>
</body>
</html>