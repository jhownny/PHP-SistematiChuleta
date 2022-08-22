<?php 
// incluindo variaveis de ambiente, acesso e banco de dados
include('../config.php');
include('acesso_conn.php');// importante
include('../connections/conn.php');

if($_POST){
    // Guardando o nome da imagem no banco de dados e arquivo na pasta imagens   
    if($_FILES['imagem_produto']['nome']){
        $nome_img = $_FILES['imagem_produto']['nome'];
        $tmp_img = $_FILES['imagem_produto']['tmp_name'];
        $pasta_img = "../imagens/".$nome_img;
        move_uploaded_file($tmp_img, $pasta_img);

    }else{
        
        $nome_img = $_POST['imagem_produto_atual'];

    }
    // receber os dados do formulario
    // organizar o0s campos na mesma ordem
    $id_tipo_produto    = $_POST['id_tipo_produto'];
    $destaque_produto   = $_POST['destaque_produto'];
    $descri_produto     = $_POST['descri_produto'];
    $resumo_produto    = $_POST['resumo_produto'];
    $valor_produto    = $_POST['valor_produto'];
    $imagem_produto = $nome_img;

    // Campo do form para filtrar o registro 
    $id_filtro = $_POST['id_filtro'];

    // Consulta (query) SQL para inserção de dados
    $query = "update tbprodutos set
    destaques_produto = '".$destaque_produto."', 
    descri_produto = '".$descri_produto."', 
    resumo_produto = '".$resumo_produto."', 
    valor_produto = '".$valor_produto."', 
    imagem_produto = '".$imagem_produto."', 
    id_tipo_produto = '".$id_tipo_produto."' 
    where id_produto = '".$id_filtro."'";	




}

?>