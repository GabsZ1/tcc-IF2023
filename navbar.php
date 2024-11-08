<?php
$sessao_id = "";

if (isset($_SESSION['email'])) {
    $sessao_id = $_SESSION['email'];
}

require_once("conexao.php");

?>

<link rel="stylesheet" href="css/navbar.css" >
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


<nav class="navbar fixed-top navbar-expand-lg bg-body-tert bg-dream" style="justify-content: left">
  <!-- div principal -->
 
  <div style="width: 15%; display: flex; justify-content: left;">
    <a class="mt-1" href="index.php" style="padding-left: 4.3em; align-items: left; justify-content: left; text-align: left;">
        <img src="img/imgSITE/nuvemLILAS.png"  width="120" height="105" class="img-responsive">
    </a>
  </div>

  <!-- div 1 (está funcionando como um gap que completa os 100% da tela DEVE CONTINUAR VAZIA) -->

<div style="width: 10%; display: flex"></div> 
    
  <!-- div 2 -->

  <div style="width: 70%; display: flex">
    <div class="collapse navbar-collapse" style="width: 100%; justify-content: right;" id="navbarCollapse">
      <!-- Lupa -->
      <ul style=" justify-content: right; display: flex; gap: 2em; list-style:none;">
        <li class="nav-item">
          <div class="box-busca" type="submit" >
            <div class="lupa">
              <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 6px" height="2.3em" viewBox="0 0 512 512"> <!-- ! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --> <style>svg{fill:#9c93cf}</style><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
            </div>
        

            <div class="input-busca">
              <form method="POST" action="filtrarTitulo.php">
                <input type="text" name="pesquisar"  placeholder="Pesquisar" style="height: 40px">
              </form>
            </div>

            <div class="btn-fecha">
              <svg xmlns="http://www.w3.org/2000/svg" height="1.7em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#9c93cf}</style><path d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z"/></svg>
            </div>      
          </div>
        </li>

        <!-- Sacola de compras -->

        <li class="nav-item">
          <a class="nav-link mr-1 mt-4" href="testeCarrinho.php"><svg xmlns="http://www.w3.org/2000/svg" height="2.3em" align-items="center" viewBox="0 0 448 512" ><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#9c93cf}</style><path d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64v48H160V112zm-48 48H48c-26.5 0-48 21.5-48 48V416c0 53 43 96 96 96H352c53 0 96-43 96-96V208c0-26.5-21.5-48-48-48H336V112C336 50.1 285.9 0 224 0S112 50.1 112 112v48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z"/></svg></a>
        </li>

        <!-- Pessoa login -->

        <li class="nav-item">
          <?php
            if (!isset($_SESSION['email'])) {
          ?>
          <a class="nav-link mt-4" href="login.php"><svg xmlns="http://www.w3.org/2000/svg" height="2.3em" align-items="center" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#9c93cf}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></a>
          <?php
            } else { 
          ?>
          <a class="nav-link mt-4" href="login.php"><svg xmlns="http://www.w3.org/2000/svg" height="2.2em" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#9c93cf" d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg></a>
          <?php
            } 
          ?>
        </li>
      </ul>

    </div>

  </div>
  
  <button style="border: none; padding: 0 0 0 0;" class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="margin-top: -90px;"></span>
  </button>
</nav>

