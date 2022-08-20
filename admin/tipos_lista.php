<?php 
// incluindo o sistema de autenticação
include('acesso_conn.php');

//incluindo o arquivo de conexão
include('../connections/conn.php');

// selecionando os dados
$consulta = " select*from tbtipos";

// busacr a lista completa de usuarios
$lista = $conn->query($consulta);

// separar produtos por linha
$linha = $lista->fetch_assoc();

//conatr número de linhas da lista
$total_linhas = $lista->num_rows;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" >
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css" >
    <title>Tipos (<?php echo $total_linhas;?>) - Lista  </title>
</head>
<body class="fundofixo" >
<?php include('menu_adm.php')?>
    <main>
        <h1 class="breadcrumb alert-danger" > Lista de Usuarios </h1>
        <table class="table table table-condensed table-hover tbopacidade">

            <!-- thead>th*5 -->
            <thead>
                <th class="hidden " >Id</th>
                <th >Sigla</th>
                <th >Rotulo</th>
                <th>
                    <a href="tipo_inserir.php" class="btn btn-block btn-primary btn-xs">
                        <span class="hidden-xs" >Adicionar<br></span>
                        <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>
                    </a>
                </th>   
            </thead><!--Fecha linha de cabeçalho da tabela-->

            <!-- tbody>tr>td*4 -->
            <tbody> <!-- Corpo da tabela -->
                <!-- Abre a estrutura de repetição -->
                <?php do {?>
                <tr> <!-- linha da tabela -->
                    <td class="hidden" ><?php echo$linha['id_tipos'];?></td>
                    <td>
                        <span class="" ><?php echo$linha['sigla_tipo'];?></span>
                    </td>
                    <td>

                        <?php echo $linha['rotulo_tipo'];?>
                    </td>
                    <td>
                        <a href="tipo_atualiza.php?id_tipo=<?php echo $linha['id_tipo']?>" class="btn btn-warning btn-block btn-xs">
                            <span class="hidden-xs" > Alterar <br></span>
                            <span class="glyphicon glyphicon-refresh" aria-hidden="true" ></span>
                        </a>
                        <button class="btn btn-danger btn-block btn-xs delete" 
                                role="button" 
                                data-nome="<?php echo $linha['sigla_tipo'];?>"
                                data-id="<?php echo $linha['id_tipo'];?>"> 
                        <span class="hidden-xs" > Excluir <br> </span>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true" ></span>     
                        </button>
                    </td>
                </tr> <!-- fecha linha da tabela -->

                <?php }while ($linha = $lista->fetch_assoc()); ?> <!-- fechamento da estrutura de repetição -->
            </tbody> <!-- fecha corpo da tabela --> 
        </table>
    </main>

    
</body>
</html>