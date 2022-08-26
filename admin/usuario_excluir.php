<?php 
// incluindo o sistema de autenticação
include('acesso_conn.php');

// 
include('../connections');

// incluindo conexão com banco de dados
include('../connections/conn.php');

$id_usu = $_GET['id_usuario'];

// removendo usando delete (Permanente)
//$query = "delete from tbusuarios where id_usuario = $id_usu;";

// "removendo" usuario na area do cliente
$query = "update tbusuarios set deletado = default where id_usuario = $id_usu;";

$resultado = $conn->query($query);
if(mysqli_insert_id($conn)){
    header("location: usuarios_lista.php");

}else{
    header("loaction: usuarios_lista.php");

}


?>