<?php 
// incluindo o sistema de autenticação
include('acesso_conn.php');

//incluindo o arquivo de conexão
include('../connections/conn.php');

// selecionando os dados
$consulta = " select*from tbusuarios";

// busacr a lista completa de usuarios
$lista = $conn->query($consulta);

// separar produtos por linha
$linha = $lista->fetch_assoc();

//conatr número de linhas da lista
$total_linhas = $lista->num_rows;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>