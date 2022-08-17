<?php 
include ('connections/conn.php');

$idTipo = $_GET['id_tipo'];
$consulta = "select * from vw_tbprodutos where id_tipo_produto = ".$idTipo." order by descri_produto";

echo $consulta;
?>