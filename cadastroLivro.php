<?php
//1. Conectar no BD (IP, Usuário, ...)

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');

if (isset($_POST['cadastrar'])){
    $titulo = $_POST['titulo'];
    $subt = $_POST['subtitulo'];
    $sinopse = $_POST['sinopse'];
    $val = $_POST['valor'];
    $capa = $_POST['capa'];

    //3. Preparar a SQL

    $sql = "insert into livros (titulo, subtitulo, sinopse, valor, capa) values ('$titulo', '$subt', '$sinopse', '$val', '$capa')";
    
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
    <link rel="website icon" type="png" href="img/nuvemLILAS.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
    <title>Cadastro</title>
</head>
<!-- ADICIONAR AUTOR E EDITORA E LÁ EM BAIXO CAMINHO PARA CADASTRAR ELES -->
<body class="body-cadastro">
    <div class="text-center">
        <div class="cadastro-container">
            <div class="cadastro" style="height: 895px; width: 650px;">
                <div class="cadastro-logo">
                    <a href="login.php">
                        <img src="img/imgSITE/nuvemLILAS.png" alt="logo">
                    </a>
                </div>
                <div class="cadastro-heather">
                    <h1>Cadastro de Livros</h1>
                </div>
                <form class="cadastro-form" method="post">
                    <div class="form-item">
                        <input type="text" name="titulo" placeholder="Título" required autofocus>
                    </div>
                    <div class="form-item">
                        
                        <input type="text" name="subtitulo" placeholder="Subtitulo" required>
                    </div>
                    <div class="form-item">
                        
                        <input type="text" name="sinopse" placeholder="Sinopse" required>
                    </div>

                    <div class="form-item">
                        <input type="text" name="valor" placeholder="Valor">

                    </div>

                    <div class="input-group mb-3">
                        <form name="form" method="post" enctype="multipart/form-data">
                            <input type="file" class="form-control" id="inputGroupFile02" name="arquivo" id="arquivo">
                        </form>
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    
                    <div class="form-item">
                        <form name="form" method="post" enctype="multipart/form-data">
                            <input type="file" name="arquivo" id="arquivo">
                        </form>
                    </div>

                    <div class="form-item-outro">
                        <input class="btn btn-primary btn-lg btn-block active" style="left: -30px;" type="submit" value="Cadastrar" name="cadastrar">
                    </div>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>