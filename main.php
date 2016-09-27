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
	header ( "Location: index.php" );
	exit ();
}
?>

<html>


<head>
<title>Gecot - Home</title>
<meta name="description" content="Blueprint: Tooltip Menu" />
<meta name="keywords"
	content="Tooltip Menu, navigation, tooltip, menu, css, web development, template" />
<meta name="author" content="Codrops" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script src="css/modernizr.custom.js"></script>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1">
</head>

<body id="home">


<?php

echo "<div id='menu'>";
include 'menu.php';
echo "</div>";

echo '<div id="containerInicio">';
echo '<div id="areaTelaInicio">
Bem vindo ' . $_SESSION ['UsuarioNome'] . '
</div>
		
	<div id="divContainerAinit"><div id="div1Areainit"></div></div>
		<div id="rodape">
<h5>Desenvolvido por Departamento de Tecnologia da Informação<br>
Boris Trading Licenciamentos de Marcas Ltda<br>
CNPJ: 07.489.382.0001-81<br>
Av. Dom Luís 300, Shopping Avenida Lj 117/118<br>
Fone: (85) 3305.4545 / (85) 3246.7519 <br>

</h5></div>
		</div>';

?>
<script src="css/cbpTooltipMenu.min.js"></script>
	<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script>
</body>
</html>