<?php

require_once("conexao.php"); 
     

$where = "";
if (isset($_POST['pesquisar'])){ //Se clicou no botão de pesquisar
  $where = " and titulo like '%" . $_POST['pesquisar'] ."%'";
}

$where2 = "";
if (isset($_POST['pesquisar'])){ //Se clicou no botão de pesquisar
  $where2 = " and genero like '%" . $_POST['pesquisar'] ."%'";
}

$sql = "SELECT * FROM livros where heartstopper = 0 " . $where; //pega a tabela inteira para rodar

$result = mysqli_query($conexao, $sql); 

$sql2 = "SELECT * FROM livros where heartstopper = 1 " . $where; //pega a tabela pra abrir o heatstopper para rodar

$result2 = mysqli_query($conexao, $sql2); 

$sql3 = "SELECT * FROM genero where heartstopper = 1 " . $where2;

$result3 = mysqli_query($conexao, $sql3); 

$sql4 = "SELECT * FROM genero where heartstopper = 0 " . $where2; //pega a tabela inteira para rodar

$result4 = mysqli_query($conexao, $sql4); 







// vou tentar fazer aqui a parte de quando for o adm a navbar dele aparecer

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>Document</title>
</head>
<body class="filtro">
  <div >
  <?php while ($row = $result->fetch_assoc()) { ?>
  <a href="paginaproduto.php?id=<?php echo $row['id']; ?>" class="img-fluid mr-2" alt="img" >
  <img src="img/LIVRO/<?php echo $row['capa']; ?>" /></a><?php } ?> 
</div>
</body>
</html>

