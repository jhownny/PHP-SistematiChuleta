<?php 
// incluindo variaveis de ambiente, acesso e banco de dados
include('../config.php');
include('acesso_conn.php'); // importante
include('../connections/conn.php');

if($_POST){
    // Guardando o nome da imagem no banco de dados e arquivo na pasta imagens   
   
    // receber os dados do formulario
    // organizar nos campos na mesma ordem
    $sigla_tipo     =   $_POST['sigla_tipo'];
    $rotulo_tipo    =   $_POST['rotulo_tipo'];

    // Campo do form para filtrar o registro 
    $id_filtro = $_POST['id_tipo'];

    // Consulta (query) SQL para inserção de dados
    $query = "update tbtipos set
        sigla_tipo      =   '".$sigla_tipo."', 
        rotulo_tipo     =   '".$rotulo_tipo."', 
        where id_tipo   =   '".$id_filtro."';";
    $resultado = $conn->query($query);	

    // apos a ação a página será direcionada
    if (mysqli_insert_id($conn)){
        header('location:tipos_lista.php');
        // Adicionar tratamento
    }else{
        header('location:tipos_lista.php');

    }

}

// Consulta para recuperar os dados do filtro da chamada da pagina
$id_alterar     = $_GET['id_tipo'];
$query_busca    = "select * from tbtipos where id_tipo = ".$id_alterar;
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
                    Atualizando Tipos
                </h4>
                <div class="thumbnail" >

                    <div class=" alert alert-danger " role="alert" >

                        <form action="tipo_atualiza.php" method="post" id="form_tipo_atualiza" name="form_tipo_atualiza" enctype="multipart/form-data" >
                            <input type="hidden" name="id_tipo" id="id_tipo" value="<?php echo $linha['id_tipo']; ?>" >
                            <label for="id_tipo"></label>

                            <!-- Text descri_produto -->
                            <label for="sigla_tipo">Sigla:</label>
                            <div class="input-group">
                                <span class="input-group-addon" >
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span>
                                </span>
                                <input type="text" class="form-control" id="sigla_tipo" name="sigla_tipo"
                                        maxlength="100" required value="<?php echo $linha['sigla_tipo'];?>"
                                        placeholder="Digite a Sigla do Tipo">
                            </div>
                            <br>
                            <!-- Textearea de resumo_produto -->
                            <label for="rotulo_tipo">Rotulo:</label>
                            <div class="input-group">
                                <span class="input-group-addon" >
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span>
                                </span>
                                <input type="text" class="form-control" id="rotulo_tipo" name="rotulo_tipo"
                                        maxlength="100" required value="<?php echo $linha['rotulo_tipo'];?>"
                                        placeholder="Digite a Rotulo do Tipo">
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