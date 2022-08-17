<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Após 15 segundos a pagina será redirecionada para index.php -->
    <meta http-equiv="refresh" content="15;url=index.php" >
    <title>Verificação de Contato</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" >
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css" >
</head>
<body class="fundofixo" >
    <?php include('menu_publico.php')?>
    <main class="container" >
        <section>
            <div class="jumbotron alert-danger" >
                <h1 class="text-danger" > Agradecemos o Contato </h1>
                <?php 
                    $destino = "jho.bat00@gmail.com";
                    $nome_contato = $_POST['nome_contato'];
                    $email_contato = $_POST['email_contato'];
                    $msg_contato = "Mensagem de: " .$_POST['nome_contato']."\n".
                    $_POST['comentarios_contato'];

                    $mailsend = mail($destino, "formulário de contato do site", $msg_contato, "De: $email_contato");
                    echo "<p class='text-center'> Obrigado por enviar seus comentários, <b>$nome_contato</b> </p>";
                    echo "<p class='text-center'> Mensagem Enviada com Sucesso! </p>";

                ?>

            </div>
        </section>

        <footer>
            <?php include('rodape.php')?>
        </footer>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>