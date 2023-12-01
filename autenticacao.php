<?php
require('conexao.php');
if (isset($_POST['logar'])):
    
    //Pegar os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //2º Preparar SQL
    $sql = "SELECT * FROM usuario WHERE (email = '$email' AND senha = '$senha')";
        
    //3º Executar SQL

    $resultado= mysqli_query($conexao, $sql);
    $registros = mysqli_num_rows($resultado); //Retorna a quantidade de registros
    $mensagemErro = "Usuário/senha inválido!";
    
    //Verificar se o usuário existe no BD e concede PERMISSÃO ou VOLTA  AO LOGIN
    if ($registros > 0) {
        $linha = mysqli_fetch_array($resultado);
       
       session_start();
       $_SESSION['id']    = $linha['id'];
       $_SESSION['email'] = $linha['email'];

        header("location:index.php");
        
    }else{
        echo $mensagemErro;
        header("location:login.php");
    }

endif;
?>