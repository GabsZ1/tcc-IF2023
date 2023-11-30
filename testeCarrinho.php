<?php
session_start();
$sessao_id = $_SESSION['email'];
require_once("conexao.php");
require_once("verificaAutenticacao.php"); 

// . " and sessao_id = " . $sessao_id; (deu erro D: )

//Bloco de exclusão
if (isset($_GET['id'])) {

    $sql = "delete from carrinho where livros_id = " . $_GET['id'] ;
    mysqli_query($conexao, $sql);
    $mensagem = "Exclusão realizada com sucesso!";
}
///////////////////////

$sql ="SELECT livros.id, livros.titulo, 
              carrinho.quantidade, livros.valor,
              carrinho.quantidade * livros.valor as valor_total
        from carrinho
        inner join livros on livros.id = carrinho.livros_id
        where sessao_id LIKE '$sessao_id'";


// agora listar todos os dados dessa consulta , nome produto, qntd, valor unitario, valor total unitario, e no final o valor total da compra

$resultado = mysqli_query($conexao, $sql);

$totalGeral = 0.0;
while ($linha = mysqli_fetch_array($resultado)) {
    $totalGeral += $linha['valor_total'];
}

$resultado = mysqli_query($conexao, $sql);


/*
-venda-
id
cliente_id
status
datacadastro    datetime default current_timestamp

-itensvenda-
id
venda_id
produto_id
quantidade  int
valorunitario double(11,2)

*/

if (isset($_POST['finalizar'])) {

    $sessao_id = $_SESSION['email'];

    //--> insere na tabela 'venda'

    $usuario_id = $_POST['usuario_id'];
    $datacadastro = $_POST['datacadastro'];

    $sql_venda = "insert into venda (usuario_id, datacadastro)
    values ($usuario_id, '$datacadastro')";

    mysqli_query($conexao, $sql_venda);
    
    //-->insere os produtos

    $sql ="SELECT livros.id, livros.titulo, 
                carrinho.quantidade, livros.valor,
                carrinho.quantidade * livros.valor as valor_total
            from carrinho
            inner join livros on livros.id = carrinho.livros_id
            where sessao_id LIKE '$sessao_id'";



    while ($linha = mysqli_fetch_array($resultado)) {
        $totalGeral += $linha['valor_total'];
            

    }
    
    mysqli_query($conexao, $sql_carrinho);

    $mensagem = "Venda finalizada com sucesso!";
}


?>


<!doctype html>
<html lang="pt-br">
    <head>
        <script src="/docs/5.3/assets/js/color-modes.js"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
    
        <title>Carrinho</title>
        <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">
        <?php require_once("navbar.php"); ?>

        <script src="https://kit.fontawesome.com/42c6fc9b70.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Poppins:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
       
    
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <!-- Favicons -->
        
        <!-- Custom styles for this template -->
        <link href="checkout.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="img/imgSITE/nuvemLILAS.png" alt="" width="200px">
                <h2>Carrinho de compras</h2>
                <p class="lead">Onde estará seus livros mais desejados!</p>
                </div>
                <hr style="padding-bottom: 0px; padding-top: 48px;">
                <form action="testeCarrinho.php" method="post">
                    <div class="row">
                        <!-- div resumo compra -->
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Resumo</span>
                            </h4>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <h6 class="my-0">Total (R$)</h6>
                                    <strong><div id="resumoValorTotal"> R$ <?= $totalGeral ?>,00</div></strong>
                                </li>
                            </ul>


                            <div class="input-group">
                                <button type="submit" name="finalizar" value="finalizar" class="btn btn-primary btn-lg btn-block active">Finalizar</button>
                            </div>


                        </div>
                        <!-- dados -->
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Lista de Produtos</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="tabela" class="table table-striped table-bordered table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Produto</th>
                                                <th scope="col" class="text-right">Qtd.</th>
                                                <th scope="col" class="text-right">Preço Un.</th>
                                                <th scope="col" class="text-right">Preço Total</th>
                                                <th scope="col" class="text-center">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                                                <tr>
                                                    <td><?= $linha['titulo'] ?></th>
                                                    <td><?= $linha['quantidade'] ?></th>
                                                    <td><?= $linha['valor'] ?></th>
                                                    <td><?= $linha['valor_total'] ?></th> 
                                                    <td>
                                                        <a href="testeCarrinho.php?id=<?= $linha['id'] ?>" class="btn btn-danger" style="background-color:#9c93cf; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px;" onclick="return confirm('Confirmar retirada do carrinho?')"><i class="fa-solid fa-trash-can"></i></a>
                                                    </th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="mb-4">
                        </div>
                    </div>
                </form>
            </main>

        </div>
        <script src="js/pesquisa.js"></script>
        <script src="js/carrinho.js"></script>
        <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="checkout.js"></script>
    </body>
</html>