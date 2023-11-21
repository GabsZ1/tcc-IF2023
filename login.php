<?php
session_start();

//1. Conectar no BD (IP, Usuário, ...)

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');

if (isset($_POST['logar'])){

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //3. Preparar a SQL

    $sql = "select from usuario (email, senha) values ('$email', '$senha')";

    //4. executar a sql no banco de dados

    mysqli_query($conexao, $sql);

    //5. variável da mensagem
    
    $mensagem = "Usuario logado com sucesso.";

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
    <title>login</title>
</head>
<body class="body-login">
   <div class="text-center"> 
    <div class="login-container">
        <div class="login">
            <div class="login-logo">
                <img src="img/imgSITE/nuvemLILAS.png" alt="logo">
            </div>
            <div class="login-header">
                <h1>Login</h1>
            </div>
            <form class="login-form" action="autenticacao.php" method="POST">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="email" name="email" class="form-control" placeholder="Insira o Email" required autofocus>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" name="senha" class="form-control" placeholder="Insira a senha" required>
                </div>
               
                    <input class="btn btn-primary btn-lg btn-block active" style="left: -30px;" type="submit" value="Entre" name="logar">
            </form>
            <div class="login-footer">
                
                <?php
                  if (!isset($_SESSION['email'])) {
                ?>
                    Não possui uma conta? <a href="cadastro.php">Crie uma conta</a>.<br>
                    <a href="adm.php">Logar como Administrador!</a>
                <?php
                  } else {
                ?>
                    <a href="sair.php">Sair</a>
                <?php
                  }
                ?>
                
            </div>
        </div>
        </div>
    </div>
   </div>

    
</body>
</html>