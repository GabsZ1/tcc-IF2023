<?php
require_once("conexao.php");

//Esse "isset" serve para verificar se foi clicado no botão, caso não tenha sido clicado, não aparecerá o "warning" que aparece
if (isset($_POST['salvar'])) {

    //2º passo - Receber os dados para inserir no BD
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //3º passo - Preparar a SQL
    $sql = "insert into usuario (nome, email, senha) values ('$nome', '$email', '$senha')"; //Esses dados são uma query
    //Para valores numéricos não precisa das ''.

    //4º passo - Executar a sql no banco de dados
    mysqli_query($conexao, $sql);

    //5º passo
    $mensagem = "Registo Salvo com Sucesso";
}
?>

<?php require_once("cabecalho.php") ?>
<?php require_once("menu.php") ?>
<?php require_once("mensagem.php") ?>

<form method="POST">
    <h2>Alterar Uusário</h2>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nome">
        <label for="floatingInput">Nome</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="senha">
        <label for="floatingPassword">Senha</label>
    </div>



    <button type="submit" class="btn btn-primary mt-3" name="salvar" value="salvar">
        <i class="fa-solid fa-check"></i> Salvar</button>

    <a href="usuarioListar.php" class="btn btn-warning mt-3"><i class="fa-solid fa-rotate-left"> Voltar</i></a>

</form>

<?php require_once("rodape.php") ?>