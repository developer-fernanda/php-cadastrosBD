<!-- CADASTRO DE VENDA DE PRODUTOS -->

<?php

include("logica-usuario.php");
verificaUsuario();

include("conexao.php");

$id_venda = $_GET['id_venda'];
$prod = $_GET['codigo'];
$qtd = $_GET['qtd'];
$preco = $_GET['preco'];

$sqlinsert="insert into itens_venda values (0, '$id_venda', '$prod', '$qtd', '$preco')";

$resultado = @mysqli_query($conexao, $sqlinsert);

    if (!$resultado) {

        die('Query Inválida: ' . @mysqli_error($conexao));  

    } else {

        header('Location:venda_prod.php');

    } 

    mysqli_close($conexao);

?>