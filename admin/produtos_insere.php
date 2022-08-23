<?php

// Variaveis de Ambiente
include('../config.php');
// Sistema de Autenticação
include('acesso_conn.php'); // importante
// Conexão com banco
include('../connections/conn.php');

$campos_insert = "id_tipo_produto, destaque_produto, descri_produto, resumo_produto, valor_produto, imagem_produto";

if($_FILES['imagem_produto']['name']){
    $nome_img   = $_FILES['imagem_produto']['nome'];
    $tmp_img    = $_FILES['imagem_produto']['tmp_name'];
    $pasta_img  = "../imagens/".$nome_img;
    move_uploaded_file($tmp_img, $pasta_img); 
}


// chave estrangeira tipo
$query_tipo = "select * from tbtipos order by rotulo_tipo asc";
$lista_fk = $conn->query($query_tipo);
$linha_fk = $lista_fk->fetch_assoc();



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
<body class="fundofixo" >
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
                        <form action="produtos_insere.php" id="form_produto_insere" name="form_produto_insere" method="post" enctype="multipart/form-data" >
                            <!-- Seleciona o tipo do produto -->
                            <label for="id_tipo_produto">Tipo:</label>
                            <div class="input-group">
                                <span class="input-group-addon" >
                                    <span class="glyphicon glyphicon-task">

                                    </span>
                                </span>
                                <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>

                                </select>
                            </div>
                            <br>
                            <label for="destaque_produto">Destaque:</label>
                            <div class="input-group" >
                                <label for="destaque_produto_s" class="radio-inline" >
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Sim">

                                        Sim

                                </label>
                                <div class="input-group" >
                                <label for="destaque_produto_n" class="radio-inline" >
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Não" checked>

                                        Não

                                </label>
                            </div>
                            <br>
                            <label for="descri_produto">Descrição:</label>
                            <div class="input-group" >
                                <span class="input-group-addon" >
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" name="descri_produto" id="descri_produto" placeholder="Digite o Título do Porduto" maxlength="100" required >
                            </div>
                            <br>
                            <label for="resumo_produto">Resumo:</label>
                            <div class="input-group" >
                                <span class="input-group-addon" >
                                    <span class="glyphicno glyphicon-lista-alt" aria-hidden="true" ></span>
                                </span>
                                <textarea name="resumo_produto" id="resumo_produto" cols="30" rows="8" placeholder="Digite os detalhes do produto" class="form-control" ></textarea>
                            </div>
                            <br>
                            <label for="valor_produto">valor:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true" ></span>
                                </span>
                                <input type="number" class="form-control" id="valor_produto" min="0" step="0.01"  >
                            </div>
                            <br>
                            <label for="imagem_produto">Imagem:</label>
                            <div class="input-group" >
                                <span class="inputgroup-addon" aria-hidden="true" >
                                    <span class="glyphicon glyphicon-picture" aria-hidden="true" >
                                </span>
                                <img src="file" alt="" name="" >
                            </span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById("imagem_produto").onchange = function(){
            var reader = new FileReader();
            if(this.files[0].size>528385){
                alert("a imagem deve ter no máximo 500KB");
                $("#imagem").attr("src", "blank");
                $("#imagem").hide;
                $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
                $("#imagem_produto").unwrap();
                return false;
            }

            // verifica se o input do tipo file possui dado
            if(this.file[0].type.indexOF("image")==-1){
                alert("Forma Inválido, escolha uma imagem!");
                $("#imagem").attr("src", "blank");
                $("#imagem").hide;
                $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
                $("#imagem_produto").unwrap();
                return false;

            }
            reader.onload = function (e){
                // obter dados carregados e renderizar a miniatuar 
                document.getElementById("imagem").src = e.target.result;
                $("#imagem").show();
            }
            reader.readAsDataURL(this.files[0]);
        }
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>