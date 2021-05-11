<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    
</head>

<body>
    <?php include("header.php") ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top: 100px">
                <?php
                include_once('conexao.php');

                //RECUPERANDO
                $codigo = $_POST['txtid'];
                $nome = $_POST['txtnome'];
                $email = $_POST['txtemail'];
                $senha = md5($_POST['txtsenha']);
                $perfil = $_POST['txtperfil'];

                //CRIANDO A LINHA DO UPDATE
                $sqlupdate = "update usuario set nome='$nome', email='$email', senha='$senha', perfil='$perfil' where id=$codigo";

                //EXECUTANDO INSTRUÇÃO
                $resultado = @mysqli_query($conexao, $sqlupdate);
                if (!$resultado) {
                    echo '<input type="button" onclick="window.location' . "'index.php'" . ';" value="voltar"<br><br>';
                    die('<b>Query Inválida: </b>' . @mysqli_error($conexao));
                } else {
                    echo '<div class="alert alert-success" role="alert">
                            <div class="p-5">
                                <i class="fas fa-grin-hearts h1"> </i> 
                                <p> Parabéns! Registro alterado com Sucesso.</p>
                            </div>
                            </div>
                <a href="lista_usuario.php" class="btn mt-3" style="background-color: #6495ED; color:white; border-radius: 25px;">Consultar alteração </a>';
                }
                mysqli_close($conexao);
                ?>
            </div>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>