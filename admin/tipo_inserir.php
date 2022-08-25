<?php

// Variaveis de Ambiente
include('../config.php');
// Sistema de Autenticação
include('acesso_conn.php'); // importante
// Conexão com banco
include('../connections/conn.php');


if($_POST){

    $id_tipo    = $_POST['id_tipo'];
    $sigla_tipo   = $_POST['sigla_tipo'];
    $rotulo_tipo     = $_POST['rotulo_tipo'];

    $campos = "id_tipo, sigla_tipo, rotulo_tipo";
    $values = "'$id_tipo_produto','$destaque_produto','$descri_produto'";
    $query = " insert into tbtipos ($campos) values($values); ";
    $resultado = $conn->query($query); 

    
    // Apos o inset redireciona a pagina
    if(mysqli_insert_id($conn)){
        header("location:tipos_lista.php");

    } 
    else{
       header("location:tipos_lista.php"); 

    }
}



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" >
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css" >
    <title> <?php echo SYS_NAME;?> - Inserir Produtos </title>
</head>
<body class="" >
    <?php include('menu_adm.php');?>

    <main class="container" >
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h4 class="breacrumb text-warning">
                    <a href="produtos_lista.php">
                        <button class="btn btn-danger" >

                        <span class="glyphicon glyphicon-chevron-left" ></span>

                        </button>
                    </a>
                
                    Inserindo Produtos
                </h4>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="tipo_inserir.php" id="form_tipo_inserir" name="form_tipo_inserir" method="post" enctype="multipart/form-data" >
                            <!-- Seleciona o tipo do produto -->

                            <label for="sigla_tipo">Sigla:</label>
                            <div class="input-group" >
                                <span class="input-group-addon" >
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" name="sigla_tipo" id="sigla_tipo" placeholder="Digite o Título do Produto" maxlength="100" required >
                            </div>
                            <br>
                            <label for="rotulo_tipo">Rotulo:</label>
                            <div class="input-group" >
                                <span class="input-group-addon" >
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" name="rotulo_tipo" id="rotulo_tipo" placeholder="Digite o Título do Produto" maxlength="100" required >
                            </div>
                            <br>
                            
                            <!-- btn Enviar -->
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>