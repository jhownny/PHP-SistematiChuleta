<?php 
// incluindo o sistema de autenticação
include('acesso_conn.php');

// 
include('../connections');

// incluindo conexão com banco de dados
include('../connections/conn.php');

$id_tipo = $_GET['id_tipo'];

// removendo usando delete (Permanente)
//$query = "delete from tbtipos where id_tipo = $id_prod;";

// "removendo" tipo na area do cliente
$query = "update tbtipos set deletado = default where id_tipo = $id_tipo;";

$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location: tipos_lista.php");

}else{
    header("loaction: tipos_lista.php");

}


?>