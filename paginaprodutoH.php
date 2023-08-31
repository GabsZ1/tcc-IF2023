<?php

require_once("conexao.php");

$idheart = $_GET["id"];  

echo $idheart;

$sql = "SELECT * FROM heartstopper WHERE id LIKE '$idheart'";

$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <!-- Principal CSS do Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Estilos customizados para esse template -->
        <link href="css/carousel.css" rel="stylesheet">

        <!-- CSS para os icones usados -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <?php require_once("navbar.php"); ?>
        </header>
        <main>
            <div class="content">
                <div class="left-side">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <h1 class="featurette-heading mb-4"><?php echo $row['titulo']; ?></h1>
                    <h1 class="lead mb-5"><?php echo $row['subtitulo']; ?></h1>
                    <h2 class="sinopse mb-3">Sinopse:</h2>
                    <h1 class="lead mb-4"><?php echo $row['sinopse']; ?></h1>
                    <span class="mb-4"><?php echo $row['valor']; ?></span>
                    <a href="" class="btn btn-lg btn-primary mb-5">ADICIONAR AO CARRINHO</a>
                </div>
                <div class="right-side">  
                    <img src="img/LIVRO/<?php echo $row['capa']; ?>">
                </div>
                <?php } ?>
            </div>
            <hr>
        </main>
    </body>
</html>