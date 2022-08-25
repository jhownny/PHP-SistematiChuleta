<?php 
// incluindo o sistema de autenticação
include('acesso_conn.php');

// 
include('../connections');

// incluindo conexão com banco de dados
include('../connections/conn.php');

$id_prod = $_GET['id_produto'];

// removendo usando delete (Permanente)
//$query = "delete from tbprodutos where id_produto = $id_prod;";

// "removendo" produto na area do cliente
$query = "update tbprodutos set deletado = default where id_produto = $id_prod;";

$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location: produtos_lista.php");

}else{
    header("loaction: produtos_lista.php");

}


?>

