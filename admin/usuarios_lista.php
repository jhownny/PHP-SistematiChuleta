<?php 
// incluindo o sistema de autenticação
include('acesso_conn.php');

//incluindo o arquivo de conexão
include('../connections/conn.php');

// selecionando os dados
$consulta = " select*from tbusuarios";

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
    <title>Usuarios (<?php echo $total_linhas;?>) - Lista  </title>
</head>
<body class="fundofixo" >
<?php include('menu_adm.php')?>
    <main class="container" >
        <h1 class="breadcrumb alert-info" > Lista de Usuarios </h1>
        <table class="table table table-condensed table-hover tbopacidade">

            <!-- thead>th*5 -->
            <thead>
                <th class="hidden text-primary" >Id</th>
                <th class="bg-info text-white" >Nome</th>
                <th class="hidden" >Senha</th>
                <th class="bg-info text-white" >Nivel</th>
                <th class="bg-info text-white" >
                    <a href="usuarios_inserir.php" class="btn btn-block btn-primary btn-xs">
                        <span class="hidden-xs" >Adicionar<br></span>
                        <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>
                    </a>
                </th>   
            </thead><!--Fecha linha de cabeçalho da tabela-->

            <!-- tbody>tr>td*4 -->
            <tbody> <!-- Corpo da tabela -->
                <!-- Abre a estrutura de repetição -->
                <?php do {?>
                <tr class="bg-info text-white" > <!-- linha da tabela -->
                    <td class="hidden" ><?php echo$linha['id_usuario'];?></td>
                    <td>
                        <span class="" ><?php echo$linha['login_usuario'];?></span>
                    </td>
                    <td>

                        <?php echo $linha['nivel_usuario'];?>
                    </td>
                    <td>
                        <a href="usuario_atualiza.php?id_usuario=<?php echo $linha['id_usuario']?>" class="btn btn-warning btn-block btn-xs">
                            <span class="hidden-xs" > Alterar <br></span>
                            <span class="glyphicon glyphicon-refresh" aria-hidden="true" ></span>
                        </a>
                        <button class="btn btn-danger btn-block btn-xs delete" 
                                role="button" 
                                data-nome="<?php echo $linha['login_usuario'];?>"
                                data-id="<?php echo $linha['id_usuario'];?>"> 
                        <span class="hidden-xs" > Excluir <br> </span>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true" ></span>     
                        </button>
                    </td>
                </tr> <!-- fecha linha da tabela -->

                <?php }while ($linha = $lista->fetch_assoc()); ?> <!-- fechamento da estrutura de repetição -->
            </tbody> <!-- fecha corpo da tabela --> 
        </table>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role=" dialog " >

        <!-- Area interna modal -->
        <div class="modal-dialog" >
            <div class="modal-content">        
                <div class="modal-header">

                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-danger" > Atenção! </h3>

                </div>
                <div class="modal-body" >

                    Deseja realmente  <strong>excluir</strong> o ususario?
                    <h3><span class="text-danger nome" ></span></h3>

                </div>
                <div class="modal-footer" >

                    <a href="#" type="button" class=" btn btn-danger dalete-yes " > 
                        Confirmar
                    </a>

                    <button class="btn btn-success" data-dismiss="modal"  >
                        Cancelar
                    </button>

                </div>

            </div>
        </div>
    </div>
    
</body>
</html>