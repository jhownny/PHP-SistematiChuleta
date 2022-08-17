<?php 
include ('connections/conn.php');

$id = $_GET['id_produto'];
//echo "<h1>Resultados para: $buscar_user</h1>";
$consulta = "select * from vw_tbprodutos where id_produto = $id";
$produtoConsulta = $conn->query($consulta);
$linha = $produtoConsulta->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <title>Detalhe de Produtos - <?php $linha['descri_produto']?></title>
</head>
<body class="fundofixo" >
    <?php include('menu_publico.php');?>
    <main class="container" >
                <h2 class="breadcrumb alert-danger" >
                    <a href="javascript: window.history.go(-1)" class="btn btn-danger">
                        <span class="glyphicon glyphicon-chevron-left" ></span>
                    </a>
                    <strong><i><?php echo $linha['descri_produto'];?></i></strong>
                </h2>
            <div class="row"><!-- Manter os elementos na linha -->
                <!-- Abre estrutura de repetição -->
                <!-- Abre thumbnail/card -->
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" >
                    <div class="thumbnail">
                        <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto'] ?>">
                            <img src="images/<?php echo $linha['imagem_produto']; ?>" alt="" class="img-responsive img-rounded" >
                        </a>
                        <div class="caption text-right" >
                            <h3 class="text-danger" >
                                <strong><?php echo ($linha['descri_produto']); ?></strong>
                            </h3>
                            <p class="text-warning">
                                <strong>
                                    <?php echo ($linha['rotulo_tipo']);?>
                                </strong>
                            </p>
                            <p class="text-warning">
                                <strong>
                                    <?php echo ($linha['resumo_tipo']);?>
                                </strong>
                            </p>
                            <p class="text-left">
                                <?php echo $linha['resumo_produto'];?>
                            </p>
                            <p>
                                <button class="btn btn-default disabled" style="cursor: default;" role="button" >
                                    <?php echo number_format($linha['valor_produto'],2,',',',');?>
                                </button>
                                <a href="produto_detalhe.php?id_produto=<?php echo $linha['id_produto'] ?>">
                                    <span class="hidden-xs">Saiba mais... </span>
                                    <span class="visible-xs glyphicon glyphicon-eye-open " aria-hidden="true" ></span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div><!-- Fecha thumbnail -->

            </div><!-- Fechar os elementos na linha -->
                    

        <footer>
            <?php include('rodape.php');?>
        </footer>
    </main>


    <script 
    src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
<!-- links dos arquivos bootstrap js -->
</html>