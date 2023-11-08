<?php
require_once("conexao.php");

//Bloco de exclusão
if (isset($_GET['id'])) {

  $sql = "delete from autor where id = " . $_GET['id'];
  mysqli_query($conexao, $sql);
  $mensagem = "Exclusão realizada com sucesso";
}
///////////////////////


//2. preparar a sql
$sql = "select * from autor";

//3.executar a sql
$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Icone da aba -->
  <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">

  <script src="https://kit.fontawesome.com/42c6fc9b70.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Poppins:wght@100&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <title>Listagem de Autores</title>
</head>
<body>

  <?php // arrumar essa parte para não cpbrir a parte de adicionar um novo autor
    // require_once("testeNavbar.php"); ?>
  
  <div class="container-md">

    <div class="card mt-3 mb-3">
      <div class="card-body">
        <h1 class="card-title" style="color: #5a5a5a; font-family: '-apple-system'; font-weight: 300;">Listagem de Autores</h1>
      </div>
    </div>
    <table class="table table-hover">
      <thead> <!-- cabeçalho -->
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Status</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>

      <tbody>
        <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
          <tr>
            <td><?= $linha['id'] ?></th>
            <td><?= $linha['nome'] ?></th>
            <td><?= $linha['status'] ?></th>
            <td>

              <a href="alterarAutores.php?id=<?= $linha['id'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

              <a href="usuarioListar.php?id=<?= $linha['id'] ?>" class="btn btn-danger" onclick="return confirm('Confirmar exclusão?')"><i class="fa-solid fa-trash-can"></i></a>

              <!--  <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></td>
    </tr> -->
            <?php } ?>

      </tbody>
    </table>
</body>
</html>

  