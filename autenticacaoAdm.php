<?php
if (isset($_POST['logar'])):
    
    //Pegar os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //2º Preparar SQL
    $sql = "select *
                from adm
                where email = '{$email}'
                and senha = '{$senha}'";
        
    //3º Executar SQL
    require_once("conexao.php");
    $resultado= mysqli_query($conexao, $sql);
    $registros = mysqli_num_rows($resultado); //Retorna a quantidade de registros
    $linha = mysqli_fetch_array($resultado);
    //Verificar se o usuário existe no BD e concede PERMISSÃO ou VOLTA  AO LOGIN
    if ($registros > 0) {

       session_start();
       $_SESSION['nome'] = $linha['nome'];

        header("location:MenuAdm.php");
    }else{
        echo "Usuário/senha inválido!";
        header("location:adm.php");
    }

endif;
?>


