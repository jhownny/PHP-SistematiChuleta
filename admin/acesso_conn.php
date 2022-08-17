<?php 
    // A sessão sera iniciada em cada pagina diferente
    //determinar nivel de acesso, se necessario
    session_name('chulettaaa');
    if(!isset($_SESSION)){
        session_start();

    }

    // verifica se há usuario logado na sessão
    //identificar usuário
    if(!isset($_SESSION['login_usuario'])){
        // se não existir, destruimos a sessão por segurança
        header("location: login.php");
        exit;
    }

    $nome_da_sessao = session_name();
    // verificar o nome da sessão
    if(!isset($_SESSION['nome_da_sessao']) or ($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
        // se não esxixtir, destruímos a sessão por segurança
        session_destroy();
        header("location: login.php");
        exit;
    }

    // verificar se o login é valido
    if(!isset($_SESSION['login_ususario'])){
        // se não esxixtir, destruímos a sessão por segurança
        session_destroy();
        header("location: login.php");
        exit;
    }

?>