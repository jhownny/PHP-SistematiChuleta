<?php 
// incluindo o sistema de autenticação
include('acesso_conn.php');

//incluindo o arquivo de conexão
include('../connections/conn.php');

// selecionando os dados
$consulta = " select*from vw_tbprodutos order by descri_produto asc; ";

// busacr a lista completa de produtos
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" >
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css" >
    <title>produtos(<?php echo $total_linhas;?>) - Lista </title>
</head>
<body class="fundofixo" >
    <?php include('menu_adm.php')?>
    <main>
        <h1 class="breadcrumb alert-danger" > Lista de Produtos </h1>
        <table class="table table table-condensed table-hover tbopacidade">

            <!-- thead>th*8 -->
            <thead>
                <th class="hidden" >Id</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Resumo</th>
                <th>Valor</th>
                <th>Imagem</th>
                <th>
                    <a href="produtos_insere.php" class="btn btn-block btn-primary btn-xs">
                        <span class="hidden-xs" >Adicionar<br></span>
                        <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>
                    </a>
                </th>   
            </thead><!--Fecha linha de cabeçalho da tabela-->

            <!-- tbody>tr>td*8 -->
            <tbody> <!-- Corpo da tabela -->
                <!-- Abre a estrutura de repetição -->
                <?php do {?>
                <tr> <!-- linha da tabela -->
                    
                    <td class="hidden" ><?php echo$linha['id_produto'];?></td>
                    <td>
                        <span class="visible-xs" ><?php echo$linha['sigla_tipo'];?></span>
                        <span class="hidden-xs" ><?php echo$linha['rotulo_tipo'];?></span>
                    </td>
                    <td>
                        <?php 
                            if($linha['destaque_produto']=='Sim'){
                                echo ("<span class='glyphicon glyphicon-heart text-danger' aria-hidden='true'></span>");

                            }else if($linha['destaque_produto']=='Não'){
                                echo ("<span class='glyphicon glyphicon-ok text-info' aria-hidden='true'></span>");
                            }
                        ?>
                        <?php echo $linha['descri_produto'];?>
                    </td>
                    <td> <?php echo $linha['resumo_produto'];?> </td>
                    <td> <?php echo number_format($linha['valor_produto'],2,',','.');?>  </td>
                    <td>
                    <img src="../images/<?php echo $linha['imagem_produto'] ?>" alt="" width="100px">
                    </td>
                    <td>
                        <a href="produto_atualiza.php?id_produto=<?php echo $linha['id_produto']?>" class="btn btn-warning btn-block btn-xs">
                            <span class="hidden-xs" > Alterar <br></span>
                            <span class="glyphicon glyphicon-refresh" aria-hidden="true" ></span>
                        </a>
                        <button class="btn btn-danger btn-block btn-xs delete" 
                                role="button" 
                                data-nome="<?php echo $linha['descri_produto'];?>"
                                data-id="<?php echo $linha['id_produto'];?>"> 
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
        <div class="modal-content">
            
            <div class="modal-header">

                <button class="close" type="button" data-dismiss="modal">&times; ></button>

                <h4 class="modal-tittle text-danger" > Atenção! </h4>
            </div>
            <div class="modal-body" >
                Deseja realmente  <strong>excluir</strong> o item?
                <h3><span class="text-danger none" ></span></h3>
            </div>
            <div class="modal-footer" >
                <a href="#" type="button" class=" btn bnt-danger dalete-yes " > Confirmar </a>
                <button class="btn btn-success" data-dismiss="modal"  >
                    Cancelar
                </button>
            </div>

        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
    <!-- Script para o modal -->
    <script type="text/javascript" >
        $('.delete').on('click',function(){

            // Busca o Valor do Atributo (data-nome)
            var nome = $(this).data('nome');

            //Busca o Valor do Atributo (data-id)
            var id = $(this).data('id');

            // INsere o Nome do Item na Configuração do Modal
            $('span.nome').text(nome);

            // Enviar o Id Através do link do Botão confirmar
            $('a.delete-yes').attr('href','produto_excluir.php?id_produto='+id);
            
            // Abre o Modal
            $('#mymodal').modal(show);
        })
    </script>


</body>
</html>