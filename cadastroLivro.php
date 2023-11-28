<?php
//1. Conectar no BD (IP, Usuário, ...)

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');

if (isset($_POST['cadastrar'])){
    $titulo = $_POST['titulo'];
    $subt = $_POST['subtitulo'];
    $sinopse = $_POST['sinopse'];
    $val = $_POST['valor'];
    $capa = $_POST['capa'];
    $classe = $_POST['class'];
    $Aid = $_POST['livrosAutor_id'];
    $Eid = $_POST['livrosEditora_id'];

//     $sql2 = "SELECT * FROM livros WHERE (titulo='$titulo')";

//     $resultado = mysqli_query($conexao, $sql2);

//     $mensagemErro2 = "Titulo já cadastrado!";
// } 
// else { 
//     $titulo = $_POST['titulo'];
//     $subt = $_POST['subtitulo'];
//     $sinopse = $_POST['sinopse'];
//     $val = $_POST['valor'];
//     $capa = $_POST['capa'];
//     $classe = $_POST['class'];
//     $Aid = $_POST['livrosAutor_id'];
//     $Eid = $_POST['livrosEditora_id'];

//     if(mysqli_num_rows($resultado)>0){
//         ?>
//             <div class="alert alert-danger" style="color: black; margin-top: 50px; padding-right: 280px;padding-left: 280px; margin-bottom: 0;" role="alert">
//                 <i class="fa-solid fa-square-check"></i>
//                 <?= $mensagemErro2 ?>
//             </div>
//         <?php 
//     }
//     else {
        //3. Preparar a SQL

        $sql = "insert into livros (titulo, subtitulo, sinopse, valor, capa, class, livrosAutor_id, livrosEditora_id) values ('$titulo', '$subt', '$sinopse', '$val', '$capa', '$classe', '$Aid', '$Eid')";
            
        //4. executar a sql no banco de dados

        mysqli_query($conexao, $sql);

        //5. variável da mensagem
            
        $mensagem = "Cadastrado com sucesso.";
//     }
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

<body class="body-cadastro" style="flex-direction: column;">
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

                <?php
                $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
                $subtitulo = isset($_POST['subtitulo']) ? $_POST['subtitulo'] : "";
                $sinopse = isset($_POST['sinopse']) ? $_POST['sinopse'] : "";
                $valor = isset($_POST['valor']) ? $_POST['valor'] : "";
                ?>

                <form class="cadastro-form" method="post">
                    <div class="form-item">
                        <input type="text" name="titulo" placeholder="Título" required autofocus value="<?= $titulo ?>">
                    </div>
                    <div class="form-item">
                        <input type="text" name="subtitulo" placeholder="Subtitulo" required value="<?= $subtitulo ?>">
                    </div>
                    <div class="form-item">
                        <input type="text" name="sinopse" placeholder="Sinopse" required value="<?= $sinopse ?>">
                    </div>
                    <div class="form-item">
                        <input type="text" name="valor" placeholder="Valor" required value="<?= $valor ?>">
                    </div>

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

                    <div class="form-item">
                        <center>
                            <label class="picture">
                                <input type="file" accept="image/*" class="picture__input" name="capa" id="inputGroupFile02" required>
                                <span class="picture__image"></span>
                            </label>
                        </center>
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
<script>
    const inputFile = document.querySelector('#inputGroupFile02');

    const pictureImage = document.querySelector('.picture__image');

    const pictureImageTXT = 'Selecione uma capa';

    pictureImage.innerHTML = pictureImageTXT;

    inputFile.addEventListener('change', function(e) {
        const inputTarget = e.target;
        const file = inputTarget.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function(e) {
                const readerTarget = e.target;

                const img = document.createElement('img');
                img.src = readerTarget.result;
                img.classList.add('picture__img');
                pictureImage.innerHTML = '';

                pictureImage.appendChild(img);
            });

            reader.readAsDataURL(file);
        } else {
            pictureImage.innerHTML = pictureImageTXT;
        }
    });
</script>
</html>