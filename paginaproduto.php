<?php
session_start();
require_once("conexao.php");

$idlivro = $_GET["id"];  

$sql = "SELECT livros.*, autor.nome, editora.nome as editora_nome  
FROM livros
LEFT JOIN autor ON autor.id = livros.livrosAutor_id
LEFT JOIN editora ON editora.id = livros.livrosEditora_id
WHERE livros.id LIKE '$idlivro'";

$result = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produtos</title>
        
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
            <!-- Product section-->
            <?php
                if (isset($_POST['adicionar'])) {
                    $sessao_id = session_id();
                    $valor_unitario = str_replace(',', '.', $_POST['valor_unitario']);
                    $livros_id = $_POST['livros_id'];
                    $quantidade = $_POST['quantidade'];

                    $sql_carrinho = "insert into carrinho (livros_id, valor_unitario, quantidade, sessao_id)
                    values ($livros_id', '$valor_unitario',' '$quantidade', '$sessao_id')";
                    mysqli_query($conexão, $sql_carrinho);

                    $mensagem = "Adicionado ao carrinho com sucesso!";
                }
            ?>
            <form method="post">
                <input type="hidden" name="livros_id" value="<?= $linha['id'] ?>" >
                <input type="hidden" name="valor_unitario" value="<?= $linha['valor'] ?>">
                <div class="content">
                    <div class="left-side">
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <h1 class="featurette-heading mb-2"><?= $row['titulo']; ?></h1><h1 class="lead" style="text-transform: uppercase;"><?= $row['nome']; ?> - <?= $row['editora_nome']; ?></h1>
                        <img src="img/imgSITE/<?= $row['class']; ?>" style="width: 20px">
                        <h1 class="lead mt-1 mb-5"><?= $row['subtitulo']; ?></h1>
                        <h2 class="sinopse mb-3">Sinopse:</h2>
                        <h1 class="lead mb-4"><?= $row['sinopse']; ?></h1>
                        <span class="mb-4">R$<?= $row['valor']; ?></span>
                        <input class="form-control text-center me-3" id="quantidade" name="quantidade" type="number" value="1" style="max-width: 5rem">
                        <a href="#" class="btn btn-primary btn-lg btn-block active" role="button" aria-pressed="true" style="margin-left: 0px;">Adicionar ao carrinho</a>


                    </div>
                    <div class="right-side">  
                        <img src="img/LIVRO/<?= $row['capa']; ?>" style="margin-top: 14px;">
                    </div>
                    <?php } ?>
                </div>
            </form>
        </main>
        <script src="js/pesquisa.js"></script>
    </body>
</html>