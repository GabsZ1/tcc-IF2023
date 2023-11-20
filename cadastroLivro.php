<?php
//1. Conectar no BD (IP, Usuário, ...)

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');

if (isset($_POST['cadastrar'])){
    $titulo = $_POST['titulo'];
    $subt = $_POST['subtitulo'];
    $sinopse = $_POST['sinopse'];
    $val = $_POST['valor'];
    $capa = $_POST['capa'];

    //3. Preparar a SQL

    $sql = "insert into livros (titulo, subtitulo, sinopse, valor, capa) values ('$titulo', '$subt', '$sinopse', '$val', '$capa')";
    
    //4. executar a sql no banco de dados

    mysqli_query($conexao, $sql);

    //5. variável da mensagem
    
    $mensagem = "Inserido com sucesso.";

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />

    <title>Cadastro livro</title>
</head>

<?php if (isset($mensagem)) { ?>
        <div class="alert" style="background-color: #9c93cf; border-radiu: 20px; color: black; margin-top: 50px; padding-right: 230px;padding-left: 230px; margin-bottom: 0;" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagem ?>
        </div>
    <?php } ?>

<body class="body-cadastro">
    <div class="text-center">
        <div class="cadastro-container">
            <div class="cadastro" style="width: 650px; margin-top: 20px; margin-bottom: 40px;">
                <div class="cadastro-logo" style="margin-bottom: 0px;">
                    <a href="MenuAdm.php">
                        <img src="img/imgSITE/nuvemLILAS.png" alt="logo">
                    </a>
                </div>
                <div class="cadastro-heather">
                    <h1 style="margin-bottom: 40px;">Cadastro de Livros</h1>
                </div>
                <form class="cadastro-form" method="post">
                    <div class="form-item">
                        <input type="text" name="titulo" placeholder="Título" required autofocus>
                    </div>
                    <div class="form-item">
                        <input type="text" name="subtitulo" placeholder="Subtitulo" required>
                    </div>
                    <div class="form-item">
                        <input type="text" name="sinopse" placeholder="Sinopse" required>
                    </div>
                    <div class="form-item">
                        <input type="text" name="valor" placeholder="Valor" required>
                    </div>

                    
                        
                    <div class="form-item">
                        <input type="file" name="capa" id="inputGroupFile02">
                    </div>

                    <!-- <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        
                    <div class="form-item input-group mb-3">
                        <form name="form" method="post" enctype="multipart/form-data">
                            <input type="file" class="form-control" id="inputGroupFile02" name="arquivo" id="arquivo">
                        </form>
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div> -->

                    <div class="form-item">
                        <select name="class" id="estado" value="<?= $linha['class'] ?>" required>
                            <option selected disabled value="">Classificação indicativa</option>
                            <option value="classL.png">Classificação Livre</option>
                            <option value="class12.png">Classificação +12</option>
                            <option value="class16.png">Classificação +16</option>
                            <option value="class18.png">Classificação +18</option>
                        </select>
                    </div>

                    <div class="form-item">
                        <select name="livrosAutor_id" id="estado" required>
                            <option selected disabled value="">Autor(a)</option>
                            <?php
                                $sql = "select * from autor order by nome";
                                $resultado = mysqli_query($conexao, $sql);
                                
                                while ($linha = mysqli_fetch_array($resultado)) :
                                    $id = $linha['id'];
                                    $nome = $linha['nome'];

                                    echo "<option value='{$id}'>{$nome}</option>";
                                endwhile;
                                ?>
                        </select>
                    </div>


                    <div class="form-item">
                        <select name="livrosEditora_id" id="estado" required>
                            <option selected disabled value="">Editora</option>
                            <?php
                                $sql = "select * from editora order by nome";
                                $resultado = mysqli_query($conexao, $sql);
                                
                                while ($linha = mysqli_fetch_array($resultado)) :
                                    $id = $linha['id'];
                                    $nome = $linha['nome'];

                                    echo "<option value='{$id}'>{$nome}</option>";
                                endwhile;
                                ?>
                        </select>
                    </div>
                    
                    <div class="form-item-outro">
                        <input class="btn btn-primary btn-lg btn-block active" type="submit" value="Cadastrar" name="cadastrar">
                    </div>

                    <div class="login-footer">
                        <h6>Autor não encontrado? <a href="cadastroAutor.php">Cadastre-o</a>!<br>
                        Editora não encontrada? <a href="cadastroEditora.php">Cadastre-a</a>!<br></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</body>
</html>