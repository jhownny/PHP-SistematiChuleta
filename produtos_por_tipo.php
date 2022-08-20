<?php 
include ('connections/conn.php');

$idTipo = $_GET['id_tipo'];
$consulta = "select * from vw_tbprodutos where id_tipo_produto = ".$idTipo." order by descri_produto";
$lista = $conn->query($consulta);
$linha = $lista->fetch_assoc();
$totalLinhas = ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" >
    <title>Produtos por Tipo</title>
</head>
<body class="fundofixo">
    <?php include('menu_publico.php'); ?>
    <main class="container" >
        <!-- teste se a consulta retor vazia -->
        <?php if($linha == null){?>
            <h2 class="breadcrumb alert-danger" >
                <a href="javascript: window.history.go(-1)" class="btn btn-danger">
                    <span class="glyphicon glyphicon-chevron-left" ></span>
                </a>
                Em breve teremos produtos deste tipo
                <strong><i><?php echo $buscar_user;?></i></strong>
                <br>
                A busca não retornou nenhum produto. Em breve atualizaremos.
            </h2>
        <?php } else{?>
            <!-- Final do teste se a consult6a retornar vazia -->
        <div class="row" > <!-- linha de produto -->
            <!-- Inicio estrutura de repetição -->
            <?php do {?>
                <!-- Abre thumbnail/card -->
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a href="produtos_busca.php?id_produto=<?php echo $linha['id_produto'] ?>">
                            <img src="images/<?php echo $linha['imagem_produto'] ?>" 
                            alt="" class="img-responsive img-rounded">
                        </a>
                        <div class="caption text-right" >
                            <h3 class="text-danger" >
                                <strong><?php echo $linha['descri_produto'] ?></strong>
                            </h3>
                            <p class="text-warning">
                                <?php echo $linha['rotulo_tipo'] ?>
                            </p>
                            <p class="text-left">
                                <?php echo mb_strimwidth( $linha['resumo_produto'],0,42,'...'); ?>
                            </p>
                            <p>
                                <button class="btn btn-default disabled" role="button" style="cursor:default;" >
                                    <?php echo number_format($linha['valor_produto'],2,',','.'); ?>
                                </button>
                                <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto']; ?>"
                                class="btn btn-danger" role="button" >
                                    <span class="hidden-xs" > Saiba Mais...</span>
                                    <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true" ></span>
                                </a>
                            </p>
                        </div><!-- final caption -->
                    </div>
                </div> <!-- Fecha thumbnail/card -->
            <?php } while($linha=$lista->fetch_assoc());}?><!-- final estrutura de repetição -->
        </div> <!-- final linha de produto -->
        <!-- rodapé -->
        <?php include('rodape.php') ?>
        
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>