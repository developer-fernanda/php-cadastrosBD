<!-- ENTRADA DE PRODUTOS -->
<?php

include("conexao.php");

$consulta1 = "SELECT max(id) as id FROM entrada";
$con1 = @mysqli_query($conexao, $consulta1) or die($mysql->error);
$dado = mysqli_fetch_array($con1);

// criando variável para selecionar os valores da tabela 
$id_cli = $dado['id'];
$select_entrada = "select entrada.id_fornecedor, fornecedor.razao_social from entrada, fornecedor where entrada.id =$id_cli and entrada.id_fornecedor = fornecedor.id";
$cliente = @mysqli_query($conexao, $select_entrada) or die($mysqli->error);
$dado_cli = mysqli_fetch_array($cliente);

$consulta = "SELECT * FROM produto";
$con = @mysqli_query($conexao, $consulta) or die($mysqli->error);

?>

<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>


<body>
    <?php include("header.php") ?>
    <div class="container-fluid">
        <div class="row m-5">
            <div class="col-md-12 mt-4">

                <!--Inicio Pesquisar-->
                <div class="d-flex justify-content-between mt-5 mb-2 mr-2">
                    <div>
                        <h2 class="ml-2" style="color: #32CD32;"> <i class="far fa-copy"></i> Entrada de Produtos </h2>
                    </div>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <input type="text" class="form-control" name="txtpesquisa" id="exampleInputPesquisar" aria-describedby="pesquisa" placeholder="Pesquisa" style="width: 350px; border-radius: 30px;">
                        </li>
                        <li class="list-inline-item">
                            <button type="submit" class="btn" style="background-color :#32CD32; color:white; border-radius: 30px;"><i class="fas fa-search"></i> Pesquisar</button>
                        </li>
                    </ul>
                </div>
                <!--Fim dos botões-->
                <div class="d-flex justify-content-between mt-5 mb-2 mr-2">
                    <div class="form-row col-md-6">
                        <div class="form-group col-md-2">
                            <label for="exampleInputId">Id</label>
                          <input type="text" class="form-control" name="txtid" value='<?php echo $dado['id']; ?>' readonly>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="exampleInputNome">Nome do Fornecedor</label>
                            <input type="text" class="form-control" name="txtrazao_social" value='<?php echo $dado_cli['razao_social']; ?>' readonly>
                        </div>
                    </div>

                    <div style="margin-top: 30px;">
                        <a href="venda_cab_entrada.php" class="btn " role="button" style="background-color :#32CD32; color:white; border-radius: 30px;">
                            <i class="fas fa-dollar-sign"></i> Finalizar Entrada</a>
                        <a href="consulta_entrada_prod.php?id_venda=<?php echo $id_cli; ?>" class="btn " role="button" style="background-color :#32CD32; color:white; border-radius: 30px;">
                            <i class="fas fa-funnel-dollar"></i> Consultar Entrada </a>
                        <a target="_blank" href="relatorio_entrada.php?id_venda=<?php echo $id_cli; ?>" class="btn " role="button" style="background-color :#32CD32; color:white; border-radius: 30px;">
                            <i class="fas fa-print"></i> Imprimir </a>
                    </div>

                </div>

                <!--Inicio da Tabela-->
                <table class="table table-borderless table-responsive-md table-hover">
                    <thead>
                        <tr style="border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; color: #4F4F4F">
                            <th>ID</th>
                            <th>DESCRIÇÃO DO PRODUTO</th>
                            <th>QUANTIDADE</th>
                            <th>PREÇO</th>
                            <th>FOTO</th>
                            <th>AÇÃO</th>
                        </tr>

                    </thead>
                    <!--Estrutura de repetição, que vai executar de acordo com a quantidade de registros armazenados no fetch_array-->
                    <?php while ($dado = $con->fetch_array()) { ?>
                        <!--Organiza os dados em formato de array-->
                        <tbody>
                            <tr style="border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; color: #4F4F4F">
                                <!--ele localiza pela nome da variavél-->
                                <td> <?php echo $dado['id']; ?> </td>
                                <td> <?php echo $dado['descricao_produto']; ?> </td>
                                <td> <?php echo $dado['quantidade']; ?> </td>
                                <td> <?php echo $dado['valor']; ?> </td>
                                <td> <a>
                                        <img src="assets/img/produto/<?php echo $dado['imagem']; ?>" width='50px' heigth='50px'>
                                    </a></td>

                                <td class="d-flex">
                                    <a href="cad_itens_entrada.php?codigo=<?php echo $dado['id']; ?>&id_venda=<?php echo $id_cli; ?>&preco=<?php echo $dado['valor']; ?>&qtd=1" class="btn btn-secondary m-1" style="border-radius:25px; font-size: 21px;" role="button">
                                        <i class="fas fa-cart-plus"></i> </a>

                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                    <!--Fim da Tabela-->
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</body>

</html>