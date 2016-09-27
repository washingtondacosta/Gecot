<!DOCTYPE html>

<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 2;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: index.php"); exit;
}
?>

<?php
include 'DAO/DAO.class.php';
include 'aplicacao/model/Ocorrencia.class.php';
include 'aplicacao/dao/OcorrenciaDAO.class.php';
include 'aplicacao/view/OcorrenciaView.class.php';
?>
<html>


<head>
<title>Ocorrências</title>
    		<meta name="description" content="Blueprint: Tooltip Menu" />
		<meta name="keywords" content="Tooltip Menu, navigation, tooltip, menu, css, web development, template" />
		<meta name="author" content="Codrops" />
		<link rel="stylesheet" type="text/css" href="css/default.css"/>
		<script src="css/modernizr.custom.js"></script>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
</head>

<body id="p1">


<?php 
echo "<div id='menu'>";
include 'menu.php';
echo "</div>";

echo '<div id="containerMain">';
include 'menuabaOcorrencia.php';

?>
<fieldset>
<legend><b>Abertura de Ocorrências</b></legend>
<h4>Para abrir ocorrências preencha os campos baixo:</h4>

<table width="750" border="0" cellpadding="0" cellspacing="0">
  <tr>
    
    <td><p><img src="http://vpn.oticasboris.com.br/insVisitaSecrel/images/logobt.png" width="146" height="68" alt="http://192.168.0.150/insVisitaSecrel/images/logobt.png"></p><br></td>
    <td align="left" width="530"><?php
OcorrenciaView::main(OcorrenciaView::TELA_ADMINCADOCORRENCIA);
?></td>
  </tr>
  </table>
  
</fieldset>
<div id="rodape"><h5>Desenvolvido por Departamento de Tecnologia da Informação<br>
Boris Trading Licenciamentos de Marcas Ltda<br>
CNPJ: 07.489.382.0001-81<br>
Av. Dom Luís 300, Shopping Avenida Lj 117/118<br>
Fone: (85) 3305.4545 / (85) 3246.7519 <br>
</h5></div>
</div>
<script src="css/cbpTooltipMenu.min.js"></script>
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script>
</body>
</html>
