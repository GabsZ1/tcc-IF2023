<?php
require_once("conexao.php");

//Bloco de exclusão
if (isset($_GET['id'])) {

  $sql = "delete from livros where id = " . $_GET['id'];
  mysqli_query($conexao, $sql);
  $mensagem = "Exclusão realizada com sucesso";
}
///////////////////////


//2. preparar a sql
$sql = "select * from livros";

//3.executar a sql
$resultado = mysqli_query($conexao, $sql);

?>

  <div class="container-md">

    <div class="card mt-3 mb-3">
      <div class="card-body">
        <h1 class="card-title" style="color: #409dc4; font-family: 'Poppins'; font-weight: 600;">Listagem de Livros
          <a href="cad_usuario.php" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i>
          </a>
        </h1>
      </div>
    </div>
    <table class="table table-dark table-hover">
      <thead> <!-- cabeçalho -->
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Título</th>
          <th scope="col">Subtitulo</th>
          <th scope="col">Sinopse</th>
          <th scope="col">Valor</th>
          <th scope="col">Ação</th>
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
            <td>

              <a href="usuarioAlterar.php?id=<?= $linha['id'] ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>

              <a href="usuarioListar.php?id=<?= $linha['id'] ?>" class="btn btn-danger" onclick="return confirm('Confirmar exclusão?')"><i class="fa-solid fa-trash-can"></i></a>

              <!--  <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></td>
    </tr> -->
            <?php } ?>

      </tbody>
    </table>
</body>

</html>