<?php
// Dados do banco
$dbhost   = "192.168.0.4";   #Nome do host
$db       = "formularioboris";   #Nome do banco de dados
$user     = "formulario@boris"; #Nome do usuário
$password = "f0rmular10sql";   #Senha do usuário

@mssql_connect($dbhost,$user,$password) or die("Não foi possível a conexão com o servidor!");
@mssql_select_db("$db") or die("Não foi possível selecionar o banco de dados!");

?>