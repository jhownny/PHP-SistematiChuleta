
<?php include('config.php') ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min.css" type=text/css>
    <title><?php echo SYS_NAME?></title>

</head>
<body class="fundofixo">
    
<!-- Area do menu -->
<?php include('menu_publico.php'); ?>
<a name="home">&nbsp;</a>
<main class="container">

    <!-- Area do Carousel -->
    <?php include('carousel.php');?>

    <!-- Area de destaques -->
    <a name="destaques">&nbsp;</a>
    <?php include('produtos_destaque.php')?>
    

    <!-- Area produtos em geral -->  
    <a name="produtos">&nbsp;</a>
    <?php include('produtos_geral.php');?>
    <hr>

    <!-- Area de Rodapé -->
    <footer>
        <?php include('rodape.php');?>
        <a name="contato">&nbsp;</a>
    </footer>
</main>
<!-- links dos arquivos bootstrap js -->
<script 
src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php 


?>