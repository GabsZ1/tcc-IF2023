<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/Logo-D..png">

    <title>D.Cartoons</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="css/carousel.css" rel="stylesheet">
  </head>
  <body>

<div class="main" id="section1"></div>



    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

        
        <a class="navbar-brand" href="#">
          <img src="img/D.Cartoons.png" alt="icon" width="60rem">
        </a>
        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">


            <li class="nav-item active">
              <a class="nav-link" data-toggle="modal" data-target="#modalExemplo">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Desativado</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              <img src="img/lupa.png" alt="pesquisar" width="30rem">
            </button>
          </form>
        </div>
      </nav>
    </header>

    <main role="main">

        <h4>Pesquisa/Alteração de Usuários<h4>
        <form action="pesquuisarusuario.php" method="POST">
            <div class="form-group">
            <label>Usuário:</label>
            <input type="text" class="form-control" name="nome">
            </div>
            <button type="text" class="btn btn-primary">Pesquisar</button>
        </form>

      
      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#section1">Voltar ao topo</a></p>
        <p>&copy; Companhia S.A., 2017-2018 &middot; <a href="#">Privacidade</a> &middot; <a href="#">Termos</a></p>
      </footer>
    </main>

    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Só faz o nossos placeholders de imagens funcionarem. Não precisar copiar a próxima linha! -->
    <script src="js/holder.min.js"></script>
  </body>
</html>