<?php
//1. Conectar no BD (IP, Usuário, ...)

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');

if (isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //3. Preparar a SQL

    $sql = "insert into adm (nome, email, senha) values ('$nome', '$email', '$senha')";
    
    //4. executar a sql no banco de dados

    mysqli_query($conexao, $sql);

    //5. variável da mensagem

    $mensagem = "Inserido com sucesso.";

}

?>

<!-- coloquei no banco a coluna de status, quero fazer como fiz o heartstopper, em que 0 seria ativo e 1 inativo, como fazer exatamente (já fiz no banco igual o outro) -->

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
<body class="body-cadastro">
    <div class="text-center">
        <div class="cadastro-container">
            <div class="cadastro" style="width: 650px;">
                <div class="cadastro-logo">
                    <a href="login.php">
                        <img src="img/imgSITE/nuvemLILAS.png" alt="logo">
                    </a>
                </div>
                <div class="cadastro-heather">
                    <h1>Cadastre outro Administrador</h1>
                    <br>
                    <br>
                    <br>
                </div>
            
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">badge</span>
                    <input type="text" name="nome" placeholder="Seu nome" required autofocus>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="email" name="email" placeholder="Seu e-mail" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" name="senha" placeholder="Cadastre sua senha" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" name="senha" placeholder="Confirme sua senha" required>
                </div>
                <div class="form-item-outro">
                    <input class="btn btn-primary btn-lg btn-block active" data-bs-toggle="modal" type="submit" value="Cadastrar" name="cadastrar">
                </div>
            </div>
        </div>
    </div> 
</body>

</html>

