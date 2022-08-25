<?php 
// incluindo variaveis de ambiente, acesso e banco de dados
include('../config.php');
include('acesso_conn.php'); // importante
include('../connections/conn.php');

if($_POST){
    // Guardando o nome da imagem no banco de dados e arquivo na pasta imagens   
   
    // receber os dados do formulario
    // organizar nos campos na mesma ordem
    $login_usuario     =   $_POST['login_usuario'];
    $nivel_usuario    =   $_POST['nivel_usuario'];

    // Campo do form para filtrar o registro 
    $id_filtro = $_POST['id_usuario'];

    // Consulta (query) SQL para inserção de dados
    $query = "update tbusuarios set
        login_usuario       =   '".$login_usuario."', 
        nivel_usuario       =   '".$nivel_usuario."', 
        where id_usuario    =   '".$id_filtro."';";
    $resultado = $conn->query($query);	

    // apos a ação a página será direcionada
    if (mysqli_insert_id($conn)){
        header('location:usuarios_lista.php');
        // Adicionar tratamento
    }else{
        header('location:usuarios_lista.php');

    }

}

// Consulta para recuperar os dados do filtro da chamada da pagina
$id_alterar     = $_GET['id_usuario'];
$query_busca    = "select * from tbusuarios where id_usuario = ".$id_alterar;
$lista          = $conn->query($query_busca);
$linha          = $lista->fetch_assoc();
$total_linhas   = $lista->num_rows;


$consulta_fk        = "select * from tbusuarios order by login_usuario asc";
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
    <main class="container" >
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-6">
                <h4 class="breadcrumb text-danger">
                    <a href="tipos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left">
                            </span>
                        </button>
                    </a>
                    Atualizando Usuarios
                </h4>
                <div class="thumbnail" >

                    <div class=" alert alert-danger " role="alert" >

                        <form action="usuario_atualiza.php" method="post" id="form_usuario_atualiza" name="form_usuario_atualiza" enctype="multipart/form-data" >
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $linha['id_usuario']; ?>" >
                            <label for="id_usuario"></label>

                            <!-- Text descri_produto -->
                            <label for="login_usuario">Nome de Usuario:</label>
                            <div class="input-group">
                                <span class="input-group-addon" >
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span>
                                </span>
                                <input type="text" class="form-control" id="login_usuario" name="login_usuario"
                                        maxlength="100" required value="<?php echo $linha['login_usuario'];?>"
                                        placeholder="Digite a nome de login do usuario">
                            </div>
                            <br>
                            <!-- Textearea de resumo_produto -->
                            <label for="nivel_usuario">Rotulo:</label>
                            <div class="input-group">
                                <span class="input-group-addon" >
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span>
                                </span>
                                <input type="text" class="form-control" id="nivel_usuario" name="nivel_usuario"
                                        maxlength="100" required value="<?php echo $linha['nivel_usuario'];?>"
                                        placeholder="Digite o nivel do usuario">
                            </div>
                            <br>

                            <!-- btn Enviar -->
                            <input type="submit" value="atualizar" name="enviar" id="enviar" class="btn btn-danger btn-block">
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
<?php 
    mysqli_free_result($lista);
    mysqli_free_result($lista_fk);
?>