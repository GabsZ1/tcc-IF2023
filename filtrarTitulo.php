<?php

require_once("conexao.php"); 
     

$where = "";
if (isset($_POST['pesquisar'])){ //Se clicou no botão de pesquisar
  $where = " and titulo like '%" . $_POST['pesquisar'] ."%'";
}

$sql = "SELECT * FROM livros where heartstopper = 0 " . $where; //pega a tabela inteira para rodar

$result = mysqli_query($conexao, $sql); 

$sql2 = "SELECT * FROM livros where heartstopper = 1 " . $where; //pega a tabela pra abrir o heatstopper para rodar

$result2 = mysqli_query($conexao, $sql2);  

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Produtos-Pesquisados</title>
  </head>
  <body class="filtro" style="margin-top: 150px;">
    <header>
      <?php require_once("navbar.php"); ?>
    </header>
    <!-- colocar aqui aquilo que tem no da pamela algo como Títulos com a pesquisa > amor(perguntar para ver como faz para parecer oq a pessoa pesquisou) -->
    <div>
      <?php while ($row = $result->fetch_assoc()) { ?>
        <a href="paginaproduto.php?id=<?php echo $row['id']; ?>" class="img-fluid mr-2" alt="img">
        <img src="img/LIVRO/<?php echo $row['capa']; ?>" style="width: 400px; height: 540px;"/></a>
      <?php } ?> 
    </div>
  </body>
</html>