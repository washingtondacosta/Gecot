<?php
// Dados do banco
$dbhost   = "192.168.0.4";   #Nome do host
$db       = "formularioboris";   #Nome do banco de dados
$user     = "formulario@boris"; #Nome do usu�rio
$password = "f0rmular10sql";   #Senha do usu�rio

@mssql_connect($dbhost,$user,$password) or die("N�o foi poss�vel a conex�o com o servidor!");
@mssql_select_db("$db") or die("N�o foi poss�vel selecionar o banco de dados!");

?>