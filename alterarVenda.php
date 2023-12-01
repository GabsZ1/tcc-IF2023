<?php
require_once("conexao.php");

$id = $_GET['id'];

if (isset($_POST['salvar'])) {

    //2º passo - Receber os dados para alterar no BD

    $status = $_POST['status'];


    //3º passo - Preparar a SQL
    $sql = "update venda set status = '{$status}' where id = {$id} ";


    //4º passo - Executar a sql no banco de dados
    mysqli_query($conexao, $sql);

    //5º passo
    $mensagem = "Registo atualizado com sucesso";
}

$sql = "select * from venda where id = {$id}";
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/42c6fc9b70.js" crossorigin="anonymous"></script>

    <!-- Icone da aba -->
    <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <title>Alteração livros</title>
</head>
<?php if (isset($mensagem)) { ?>
    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-square-check"></i>
        <?= $mensagem ?>
    </div>
<?php } ?>
<body>
    <div class="container">
        <form method="POST">

            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            
            <h2>Alterar Venda</h2>

            <div class="form-item">
                <select class="form-control" name="status" value="<?= $linha['status'] ?>">
                    <option selected disabled value="">-Status-</option>
                    <option value="1">Finalizada</option>
                    <option value="0">Em andamento</option>
                </select>
            </div>

            <button type="submit" class="btn mt-3" style="background-color:#D4D6FA;" name="salvar" value="salvar"><i class="fa-solid fa-check"></i> Salvar</button>
            <a href="pagamentos.php" class="btn btn-l mt-3" style="background-color:#9c93cf;"><i class="fa-solid fa-rotate-left"></i> Voltar</a>

        </form>
    </div>
</body>
</html>


