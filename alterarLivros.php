<?php
require_once("conexao.php");

//Esse "isset" serve para verificar se foi clicado no botão, caso não tenha sido clicado, não aparecerá o "warning" que aparece
if (isset($_POST['salvar'])) {

    //2º passo - Receber os dados para inserir no BD
    
    $sinopse = $_POST['sinopse'];
    $val = $_POST['valor'];
    $capa = $_POST['capa'];

    //3º passo - Preparar a SQL
    $sql = "insert into livros (sinopse, valor, capa) values ('$sinopse', '$val', '$capa')"; //Esses dados são uma query
    //Para valores numéricos não precisa das ''.

    //4º passo - Executar a sql no banco de dados
    mysqli_query($conexao, $sql);

    //5º passo
    $mensagem = "Registo Salvo com Sucesso";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/42c6fc9b70.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form method="POST">
            <h2>Alterar Livros</h2>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nome">
                <label for="floatingInput">Sinopse</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput">Valor</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="senha">
                <label for="floatingPassword">Capa</label>
            </div>



            <button type="submit" class="btn btn-primary mt-3" name="salvar" value="salvar">
                <i class="fa-solid fa-check"></i> Salvar</button>
                
            <a href="listarLivros.php" class="btn btn-warning mt-3"><i class="fa-solid fa-rotate-left"> Voltar</i></a>
        </form>
    </div>
</body>
</html>


