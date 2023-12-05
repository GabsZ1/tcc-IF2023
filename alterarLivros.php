<?php
require_once("conexao.php");

//Esse "isset" serve para verificar se foi clicado no botão, caso não tenha sido clicado, não aparecerá o "warning" que aparece

$id = $_GET['id'];

if (isset($_POST['salvar'])) {

    //2º passo - Receber os dados para inserir no BD

    $sinopse = $_POST['sinopse'];
    $val = $_POST['valor'];
    $capa = $_POST['capa'];
    $status = $_POST['status'];


    //3º passo - Preparar a SQL
    $sql = "update livros set sinopse = '{$sinopse}', valor = '{$val}', capa = '{$capa}', status = '{$status}' where id = {$id} ";


    //4º passo - Executar a sql no banco de dados
    mysqli_query($conexao, $sql);

    //5º passo
    $mensagem = "Registo atualizado com sucesso";
}

$sql = "select * from livros where id = {$id}";
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
            
            <h2>Alterar Livros</h2>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="sinopse" value="<?= $linha['sinopse'] ?>">
                <label for="floatingInput">Sinopse</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="valor" value="<?= $linha['valor'] ?>">
                <label for="floatingInput">Valor</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="capa" value="<?= $linha['capa'] ?>">
                <label for="floatingPassword">Capa</label>
            </div>
            <div class="form-item">
                <select class="form-control" name="status" value="<?= $linha['status'] ?>">
                    <option disabled value="">-Status-</option>
                    <option value="1" <?= ($linha['status'] == 1) ? "selected" : "" ?>> Ativo </option>
                    <option value="0" <?= ($linha['status'] == 0) ? "selected" : "" ?>> Inativo </option>
                </select>
            </div>



            <button type="submit" class="btn mt-3" style="background-color:#D4D6FA;" name="salvar" value="salvar"><i class="fa-solid fa-check"></i> Salvar</button>
            <a href="listarLivros.php" class="btn btn-l mt-3" style="background-color:#9c93cf;"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
        </form>
    </div>
</body>
</html>


