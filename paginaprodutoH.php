<?php

require_once("conexao.php");

$idheart = $_GET["id"];  

$sql = "SELECT heartstopper.*, autor.nome, editora.nome as editora_nome
FROM heartstopper
LEFT JOIN autor ON autor.id = heartstopper.heartAutor_id
LEFT JOIN editora ON editora.id = heartstopper.heartEditora_id
WHERE heartstopper.id LIKE '$idheart'";

$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Heartstopper</title>
 
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>




        <!-- Principal CSS do Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Estilos customizados para esse template -->
        <link href="css/carousel.css" rel="stylesheet">
        
        <!-- Icone da aba -->
        <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">

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
                    <h1 class="featurette-heading mb-2"><?php echo $row['titulo']; ?></h1><h1 class="lead"><?php echo $row['nome']; ?> - <?php echo $row['editora_nome']; ?></h1>
                    <img src="img/imgSITE/<?php echo $row['class']; ?>" style="width: 20px">
                    <h1 class="lead mb-5"><?php echo $row['subtitulo']; ?></h1>
                    <h2 class="sinopse mb-3">Sinopse:</h2>
                    <h1 class="lead mb-4"><?php echo $row['sinopse']; ?></h1>
                    <span class="mb-4">R$<?php echo $row['valor']; ?>,00</span>
                    <a href="#" class="btn btn-primary btn-lg btn-block active" role="button" aria-pressed="true" style="margin-left: 0px;">Adicionar ao carrinho</a>
                </div>
                <div class="right-side">  
                    <img src="img/LIVRO/<?php echo $row['capa']; ?>">
                </div>
                <?php } ?>
            </div>
            <hr>
            
            <?php require_once("cardH.php"); ?>
        </main>
        <script src="js/pesquisa.js"></script>
    </body>
</html>