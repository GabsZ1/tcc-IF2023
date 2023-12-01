<?php
require_once("conexao.php");

$where = "";
if (isset($_POST['pesquisa'])){ //Se clicou no botão de pesquisar
  $where = " where genero.id = " . $_POST['pesquisa'] ." ";
}

//Bloco de exclusão
if (isset($_GET['id'])) {

  $sql = "delete from livros where id = " . $_GET['id'];
  mysqli_query($conexao, $sql);
  $mensagem = "Exclusão realizada com sucesso";
}
///////////////////////

//2. preparar a sql
$sql = "select livros.* 
        from livros 
        left join genero on genero.id = livros.genero_id " . $where;

//3.executar a sql
$resultado = mysqli_query($conexao, $sql);

?>
<!DOCTYPE html>
<html lang="en">
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
  <title>Listagem de Livros</title>
</head>
<body>

  <?php // arrumar essa parte para não cpbrir a parte de adicionar um novo livro
    // require_once("testeNavbar.php"); ?>
  
  <div class="container-md">

    <div class="card mt-3 mb-3">
      <div class="card-body">
        <h1 class="card-title" style="color: #5a5a5a; font-family: '-apple-system'; font-weight: 300;">Listagem de Livros</h1>
        
        <form class="d-flex" role="search" method="POST" action="listarLivros.php">
          <select class="form-select" name="pesquisa" style="margin-left: 550px; width: 500px" aria-label="Default select example">
            <option selected disabled>Busque pelo genero</option>
            <option value="1">Romance</option>
            <option value="3">Suspense</option>
            <option value="4">Ficção</option>
            <option value="5">Fantasia</option>
            <option value="6">Crime real</option>
            <option value="8">Drama</option>
            <option value="9">Mistério</option>
            <option value="10">Aventura</option>
          </select>
          <button class="btn btn-outline-success" type="submit">Procurar</button>
        </form>
        <a href="MenuAdm.php" class="btn" style="background-color: #9c93cf;"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
      </div>
    </div>
    <table class="table table-hover">
      <thead> <!-- cabeçalho -->
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Título</th>
          <th scope="col">Subtitulo</th>
          <th scope="col">Sinopse</th>
          <th scope="col">Valor</th>
          <th scope="col">Status</th>
          <th scope="col">Alterar</th>
          <th scope="col">Deletar</th>
        </tr>
      </thead>

      <tbody>
        <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
          <tr>
            <td><?= $linha['id'] ?></th>
            <td><?= $linha['titulo'] ?></th>
            <td><?= $linha['subtitulo'] ?></th>
            <td><?= $linha['sinopse'] ?></th>
            <td><?= $linha['valor'] ?></th>
            <td><?= ($linha['status']) == 1 ? 'Ativo' : 'Inativo'; ?></th>
            <td>
              <a href="alterarLivros.php?id=<?= $linha['id'] ?>" class="btn btn" style="background-color:#D4D6FA;"><i class="fa-solid fa-pen-to-square"></i></a>
            </th>
            <td>
              <a href="listarLivros.php?id=<?= $linha['id'] ?>" class="btn btn-l" style="background-color:#9c93cf;" onclick="return confirm('Confirmar exclusão?')"><i class="fa-solid fa-trash-can"></i></a>
            </th>
          </tr>
        <?php } ?>

      </tbody>
    </table>
</body>
</html>

  