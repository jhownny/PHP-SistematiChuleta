<?php 
// incluindo variaveis de ambiente, acesso e banco de dados
include('../config.php');
include('acesso_conn.php');// importante
include('../connections/conn.php');

if($_POST){
    // Guardando o nome da imagem no banco de dados e arquivo na pasta imagens   
    if($_FILES['imagem_produto']['nome']){
        $nome_img   = $_FILES['imagem_produto']['nome'];
        $tmp_img    = $_FILES['imagem_produto']['tmp_name'];
        $pasta_img  = "../imagens/".$nome_img;
        move_uploaded_file($tmp_img, $pasta_img);

    }else{
        
        $nome_img = $_POST['imagem_produto_atual'];

    }
    // receber os dados do formulario
    // organizar o0s campos na mesma ordem
    $id_tipo_produto    =   $_POST['id_tipo_produto'];
    $destaque_produto   =   $_POST['destaque_produto'];
    $descri_produto     =   $_POST['descri_produto'];
    $resumo_produto     =   $_POST['resumo_produto'];
    $valor_produto      =   $_POST['valor_produto'];
    $imagem_produto     =   $nome_img;

    // Campo do form para filtrar o registro 
    $id_filtro = $_POST['id_filtro'];

    // Consulta (query) SQL para inserção de dados
    $query = "update tbprodutos set
        destaques_produto  =   '".$destaque_produto."', 
        descri_produto     =   '".$descri_produto."', 
        resumo_produto     =   '".$resumo_produto."', 
        valor_produto      =   '".$valor_produto."', 
        imagem_produto     =   '".$imagem_produto."',
        where id_produto   =   '".$id_filtro."'";
    $resultado = $conn->query($query);	

    // apos a ação a página será direcionada
    if (mysqli_insert_id($conn)){
        header('location:produtos_lista.php');

    }else{
        header('location:produtos_lista.php');

    }

}

// Consulta para recuperar os dados do filtro da chamada da pagina
$id_alterar     = $_GET['id_produto'];
$query_busca    = "select * from tbprodutos where id_produto = '".$id_alterar;
$lista          = $conn->query($query_busca);
$linha          = $lista->fetch_assoc();
$total_linhas   = $lista->num_rows;


$consulta_fk        = "select * from tbtipos order by rotulo_tipo asc";
$lista_fk           = $conn->query($consulta_fk);
$linha_fk           = $lista_fk->fetch_assoc();
$total_linhas_fk    = $lista_fk->num_rows;


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SYS_NAME;?> - Admin (Alterar)</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo" >
    <?php include('menu_adm.php') ?>
    <main>
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                <h2 class="breadcrumb text-danger">
                    <a href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left">
                            </span>
                        </button>
                    </a>
                    Atualizando produtos
                </h2>
            </div>
        </div>
    </main>
    
</body>
</html>