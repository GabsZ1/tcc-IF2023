<?php

require_once("conexao.php"); 

$sql = "SELECT * FROM livros"; //pega a tabela inteira para rodar

$result = mysqli_query($conexao, $sql); 

$sql2 = "SELECT * FROM heartstopper"; //pega a tabela pra abrir o heatstopper para rodar

$result2 = mysqli_query($conexao, $sql2); 

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <!-- Links de referência aos modelos do bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">

    <link rel="stylesheet" type="text/css" href="main.css" />

    <title>DREAMSTORE</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para o template do carousel -->
    <link href="css/carousel.css" rel="stylesheet">

    <!-- Link para os icones -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42c6fc9b70.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <header id="cabecalho">

      <?php require_once("testeNavbar.php"); ?>
      
      <div class="banner">
        <img src="img/imgSITE/DREAMSTORE-BANNER" alt="">
      </div>
   </header>

    <!-- SLIDER DAS IMAGENS DE LIVROS -->

    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="texto">
            <p class="col-12 mb-5 mt-5" style="padding-left: 3em;">
              <a><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#9d93cf}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                RECOMENDADO PARA SE APAIXONAR
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="body-slider">
            <div class="wrapper">
              <i id="left" class="fa-solid fa-angle-left"></i>
              <div class="caroussel">
                <?php while ($row = $result->fetch_assoc()) { ?>
                <a href="paginaproduto.php?id=<?php echo $row['id']; ?>" class="img-fluid mr-2" alt="img" >
                <img src="img/LIVRO/<?php echo $row['capa']; ?>" /></a><?php } ?> 
              </div>
              <i id="right" class="fa-solid fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CONTAINER BOX FINAL -->
      
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="texto">
            <p class="col-lg-12 mb-5 mt-5" style="padding-left: 3em;">
              <a><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#9d93cf}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                RECOMENDADO PARA SE APAIXONAR
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="row" style="width: 95%; padding-left: 53px">
        <div class="col-lg-6">
          <?php while ($row2 = $result2->fetch_assoc()) { ?>
          <a href="paginaprodutoH.php?id=<?php echo $row2['id']; ?>">
            <img src="img/LIVRO/<?php echo $row2['capa']; ?>" style="width: 100%" alt="">
          </a><?php } ?>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <a style="text-align: right">
                <img src="img/imgSITE/img1CONTAINERZÃO.webp" style="width: 100%; height: 135%" alt="">
              </a>
            </div>
          </div>
          <div class="row" style="margin-top: 175px">
            <div class="col-lg-6">
              <div class="img">
                <img src="img/imgSITE/img2CONTAINERZÃO.webp" style="width: 100%" alt="">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="img">
                <img src="img/imgSITE/img3CONTAINERZÃO.webp" style="width: 100%" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- FOOTER -->

    <footer class="mt-5">
      <div class="footer text-center">
       <img class="" src="img/imgSITE/logoCOMPLETA.png" alt="">
      </div>

        <footer class="my-5 pt-5 text-body-secondary text-center text-small">
                  <p class="mb-1">&copy; 2022–2023 DREAMSTORE</p>
                  <ul class="list-inline">
                  <li class="list-inline-item"><a href="#">Privacy</a></li>
                  <li class="list-inline-item"><a href="#">Terms</a></li>
                  <li class="list-inline-item"><a href="#">Support</a></li>
                  </ul>
        </footer>


      <div>
        <!-- <p class="float-right"><a href="#">Voltar ao topo</a></p>
        <p>&copy; Companhia D.S 2022-2023</p>
      </div> -->
    </footer>
  </body>
  <!-- Principal JavaScript do Bootstrap
  ================================================== -->
  <!-- Foi colocado no final para a página carregar mais rápido -->
  <script src="js/pesquisa.js"></script>
  <script src="js/slider.js" defer></script>
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Só faz o nossos placeholders de imagens funcionarem. Não precisar copiar a próxima linha! -->
  <script src="js/holder.min.js"></script>
</html>
