<?php

require_once("conexao.php"); 



$where = "";
if (isset($_POST['pesquisar'])){ //Se clicou no botão de pesquisar
  $where = " and titulo like '%" . $_POST['pesquisar'] ."%'";
}

$sql = "SELECT * FROM livros where 1 = 1 " . $where; //pega a tabela inteira para rodar
//die($sql);
$result = mysqli_query($conexao, $sql); 

$sql2 = "SELECT * FROM heartstopper where 1 = 1 " . $where; //pega a tabela pra abrir o heatstopper para rodar

$result2 = mysqli_query($conexao, $sql2); 

// vou tentar fazer aqui a parte de quando for o adm a navbar dele aparecer

?>

<?php while ($row = $result->fetch_assoc()) { ?>
                <a href="paginaproduto.php?id=<?php echo $row['id']; ?>" class="img-fluid mr-2" alt="img" >
                <img src="img/LIVRO/<?php echo $row['capa']; ?>" /></a><?php } ?> 