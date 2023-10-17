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
<body class="body-cadastro">
  <div class="text-center">
    <div class="cadastro-container">
        <div class="cadastro">
            <div class="cadastro-logo">
                <a href="login.php">
                    <img src="img/imgSITE/nuvemLILAS.png" alt="logo">
                </a>
            </div>
            <div class="cadastro-heather">
                <h1>Cadastre-se</h1>
            </div>
            <form class="cadastro-form" method="post">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">badge</span>
                    <input type="text" name="titulo" class="form-control" placeholder="Seu nome" required autofocus>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="text" name="subtitulo" class="form-control" placeholder="Seu e-mail" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="text" name="sinopse" class="form-control"  placeholder="Cadastre sua senha" required>
                </div>

                <div class="form-item">

                    <span class="form-item-icon material-symbols-rounded">calendar_today</span>
                    <input type="text" id="dataNascimento" name="valor" autocomplete="off" maxlength="10" class="form-control" placeholder="Sua data de Nascimento" onkeyup="mascara_DataNascimento()">

                </div>
                
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">location_city</span>
                    <input type="text" name="capa" class="form-control" placeholder="Sua cidade">
                </div>

                <div class="form-item-outro">
                    <input class="btn btn-primary btn-lg btn-block active" style="left: -30px;" type="submit" value="Cadastrar" name="cadastrar">
                </div>
            </form>
            <div class="cadastro-footer"></div>
        </div>
    </div>
        <div class="cadastro-social">
            <div>cadastre-se por outras plataformas</div>
            <div class="cadastro-social-btn">
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