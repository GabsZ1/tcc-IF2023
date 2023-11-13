<?php
//1. Conectar no BD (IP, Usuário, ...)

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');

if (isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];

    //3. Preparar a SQL

    $sql = "insert into editora (nome) values ('$nome')";
    
    //4. executar a sql no banco de dados

    mysqli_query($conexao, $sql);

    //5. variável da mensagem

    $mensagem = "Inserido com sucesso.";

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
    <title>Cadastro</title>
</head>
<!-- ADICIONAR AUTOR E EDITORA E LÁ EM BAIXO CAMINHO PARA CADASTRAR ELES -->
<body class="body-cadastro">
    <div class="text-center">
        <div class="cadastro-container">
            <div class="cadastro" >
                <div class="cadastro-logo" style="margin-bottom: 0px;">
                    <img src="img/imgSITE/nuvemLILAS.png" alt="logo">
                </div>
                <div class="cadastro-heather">
                    <h1 style="margin-bottom: 30px">Cadastro de Editora</h1>
                </div>
                <form class="cadastro-form" method="post">

                    <div class="form-item">
                        <input type="text" name="nome" placeholder="Nome da Editora" required autofocus>
                    </div>

                    <div class="form-item-outro">
                        <input class="btn btn-primary btn-lg btn-block active" type="submit" value="Cadastrar" name="cadastrar">
                    </div>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>