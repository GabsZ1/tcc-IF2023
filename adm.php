<?php

//SE FOI CLICADO NO BOTAO ENVIAR
 
if(isset($_POST['logar'])) {
    $diretorio = "uploads/";
    $arquivoDestino = $diretorio . $_FILES ['arquivo']['name'];

    //envia o arquivo para o $arqivoDestino
    if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivoDestino)) {
        echo "arquivo enviado com sucesso.";
    } else {
        echo "ERRO: arquivo não enviado.";
    }
}

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

    <!-- Icone da aba -->
    <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">

    <!-- Estilizações -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>login do Administrador</title>
</head>
<body class="body-login">
   <div class="text-center"> 
    <div class="login-container">
        <div class="login">
            <div class="login-logo">
                <img src="img/imgSITE/nuvemLILAS.png" alt="logo">
            </div>
            <div class="login-header">
                <h1>Logar Administrador</h1>
            </div>
            <form class="login-form" action="autenticacaoAdm.php" method="POST" enctype="multipart/form-data">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="email" name="email" class="form-control" placeholder="Insira o Email" required autofocus>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" name="senha" class="form-control" placeholder="Insira a senha" required>
                </div>
                <!-- <div class="form-item">
                <span class="material-symbols-outlined">upload_file</span>
                    <input type="file" name="arquivo" class="form-control" placeholder="Escolher arquivo" required>
                </div> -->
                <div class="form-item-outro">
                    <a href="#">Esqueci minha senha</a>
                </div>
                <input class="btn btn-primary btn-lg btn-block active" style="left: -30px;" type="submit" value="Entre" name="logar">
            </form>
        </div>
        <div class="login-social">
            <div>Acesse por outras plataformas</div>
            <div class="login-social-btn">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                        <path d="M16.5 7.5l0 .01"></path>
                     </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                     </svg>
                </a>
            </div>
        </div>
    </div>
   </div>

    
</body>
</html>