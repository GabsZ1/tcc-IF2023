<?php 
session_start();
require_once("conexao.php"); 
// require_once("verificaAutenticacaoAdm.php"); 
?>
<!doctype html>
<html lang="pt-br" class="h-100" data-bs-theme="auto">
    <head>
        <script src="/docs/5.3/assets/js/color-modes.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

        <title>ADMINISTRADOR</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

        <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Favicons -->

        <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">

        <!-- Custom styles for this template -->
        <link href="css/cover.css" rel="stylesheet">

    </head>
    
    <body class="d-flex h-100 text-center text-bg-tert">
         
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="mb-auto">
                <div>
                    <img src="img/imgSITE/nuvemBRANCO.png" style="width: 100px; margin-right: 150px;" alt="">
                    <nav class="nav nav-masthead justify-content-center float-md-end" style="margin-top: 35px;">

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                            
                                <a class="nav-link fw-bold py-1 px-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page" href="#" style="margin-right:15px;">Adm</a>
                            
                                <ul class="dropdown-menu dropdown-menu">
                                    <li><a class="dropdown-item" href="cadastrarAdm.php">Cadastre um administrador</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="sair.php">Desconecte-se</a></li>
                                </ul>
                            </li>
                        </ul>
                        
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                            
                                <a class="nav-link fw-bold py-1 px-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page" href="#" style="margin-right:15px;">Listagens</a>
                            
                                <ul class="dropdown-menu dropdown-menu">
                                    <li><a class="dropdown-item" href="listarLivros.php">Livros</a></li>
                                    <li><a class="dropdown-item" href="listarEditoras.php">Editoras</a></li>
                                    <li><a class="dropdown-item" href="listarAutores.php">Autores</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                            
                                <a class="nav-link fw-bold py-1 px-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" aria-current="page" href="#">Cadastros</a>
                            
                                <ul class="dropdown-menu dropdown-menu">
                                    <li><a class="dropdown-item" href="cadastroLivro.php">Livros</a></li>
                                    <li><a class="dropdown-item" href="cadastroEditora.php">Editoras</a></li>
                                    <li><a class="dropdown-item" href="cadastroAutor.php">Autores</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="navbar-nav">
                            <a class="nav-link fw-bold py-1 px-0" aria-expanded="false" aria-current="page" href="pagamentos.php" style="margin-left:15px;">Vendas</a>
                        </ul>
                        
                    </nav>
                </div>
            </header>

            <main class="px-3" style="color:#5a5a5a;">

            <?php
                if (isset($_SESSION['nome'])) {
            ?>

                <h1>Bem vinda <?php echo $_SESSION['nome']; ?> </h1>  

            <?php
                }
            ?>
                <p class="lead">Bem vinda novamente, acesse o nessário para realizar as mudanças que preferir.</p>

            </main>

            <footer class="mt-auto text-white-50">
                <p>Adm, by <a class="text-white">@Ana Laura</a> & <a class="text-white">@Gabrille</a>.</p>
            </footer>
        </div>

        <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </body>
</html>
