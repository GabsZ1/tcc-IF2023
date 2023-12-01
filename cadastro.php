<?php
//1. Conectar no BD (IP, Usuário, ...)

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');

if (isset($_POST['cadastrar'])) {
    
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $dataNasc = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];

    $sql2 = "SELECT * FROM usuario WHERE (email='$email')";

    $resultado = mysqli_query($conexao, $sql2);

    $mensagemErro2 = "Email já cadastrado!";

    if (!validarCPF($cpf)) {
        $mensagemErro = "CPF inválido.";
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $dataNasc = $_POST['dataNascimento'];
        $cpf = $_POST['cpf'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];
    } 
    else { //prossegue com o cadastro pq o CPF está válido
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $dataNasc = $_POST['dataNascimento'];
        $cpf = $_POST['cpf'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];
        $endereco = $_POST['endereco'];

        if(mysqli_num_rows($resultado)>0){
            ?>
               <div class="alert alert-danger" style="color: black; margin-top: 50px; padding-right: 280px;padding-left: 280px; margin-bottom: 0;" role="alert">
                   <i class="fa-solid fa-square-check"></i>
                   <?= $mensagemErro2 ?>
               </div>
           <?php 
       }
       else {
            //3. Preparar a SQL

            $sql = "insert into usuario (nome, email, senha, dataNascimento, cpf, cidade, UF, cep, endereco) values ('$nome', '$email', '$senha', '$dataNasc', '$cpf', '$cidade', '$estado', '$cep', '$endereco')";
            
            //4. executar a sql no banco de dados

            mysqli_query($conexao, $sql);

            //5. variável da mensagem

            $mensagem = "Cadastrado com sucesso.";
        }
    }

}

function validarCPF($cpf)
{
  // Remove caracteres não numéricos
  $cpf = preg_replace('/[^0-9]/', '', $cpf);

  // Verifica se o CPF possui 11 dígitos
  if (strlen($cpf) != 11) {
    return false;
  }

  // Verifica se todos os dígitos são iguais
  if (preg_match('/(\d)\1{10}/', $cpf)) {
    return false;
  }

  // Calcula o primeiro dígito verificador
  $soma = 0;
  for ($i = 0; $i < 9; $i++) {
    $soma += $cpf[$i] * (10 - $i);
  }
  $resto = $soma % 11;
  $digito1 = ($resto < 2) ? 0 : 11 - $resto;

  // Calcula o segundo dígito verificador
  $soma = 0;
  for ($i = 0; $i < 10; $i++) {
    $soma += $cpf[$i] * (11 - $i);
  }
  $resto = $soma % 11;
  $digito2 = ($resto < 2) ? 0 : 11 - $resto;

  // Verifica se os dígitos verificadores estão corretos
  if ($cpf[9] == $digito1 && $cpf[10] == $digito2) {
    return true;
  } else {
    return false;
  }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Cadastro</title>
</head>
<body class="body-cadastro" style="flex-direction: column;">
    <?php if (isset($mensagemErro)) { ?>
        <div class="alert alert-danger" style="color: black; margin-top: 50px; padding-right: 280px;padding-left: 280px; margin-bottom: 0;" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagemErro ?>
        </div>
    <?php } ?>
    <?php if (isset($mensagem)) { ?>
        <div class="alert" style="background-color: #9c93cf; color: black; margin-top: 50px; padding-right: 230px;padding-left: 230px; margin-bottom: 0;" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagem ?>
        </div>
    <?php } ?>
    <div class="text-center">
        <div class="cadastro-container">
            <div class="cadastro" style="width: 650px; width: 650px; margin-top: 10px; margin-bottom: 30px; height: 1300px">
                <div class="cadastro-logo">
                    <a href="login.php">
                        <img src="img/imgSITE/nuvemLILAS.png" alt="logo">
                    </a>
                </div>
                <div class="cadastro-heather">
                    <h1>Cadastre-se</h1>
                    <br>
                    <br>
                    <br>
                </div>

                <?php

                $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
                $email = isset($_POST['email']) ? $_POST['email'] : "";
                $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
                $confsenha = isset($_POST['confsenha']) ? $_POST['confsenha'] : "";
                $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
                $dataNascimento = isset($_POST['dataNascimento']) ? $_POST['dataNascimento'] : "";
                $estado = isset($_POST['estado']) ? $_POST['estado'] : "";
                $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : "";
                $cep = isset($_POST['cep']) ? $_POST['cep'] : "";
                $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : "";

                ?>

                <form class="cadastro-form" method="post">
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">badge</span>
                        <input type="text" name="nome" placeholder="Seu nome" required autofocus value="<?= $nome ?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">mail</span>
                        <input type="email" name="email" placeholder="Seu e-mail" required value="<?= $email ?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="password" id="senha" name="senha" placeholder="Cadastre sua senha" required value="<?= $senha ?>">
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="password" id="confsenha" name="confsenha" placeholder="Confirme sua senha" required value="<?= $confsenha ?>">
                    </div>

                    <div class="form-item">
                        <div class="input-box">
                        <span class="form-item-icon material-symbols-rounded">terminal</span>
                        <input type="text" id="cpf" autocomplete="off" maxlength="14" name="cpf" placeholder="Digite seu CPF" 
                        required onkeyup="mascara_cpf()" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="<?= $cpf ?>"/>
                        </div>
                    </div>

                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">calendar_today</span>
                        <input type="date" id="date" name="dataNascimento" autocomplete="off" placeholder="Sua data de Nascimento" required value="<?= $dataNascimento ?>">
                        <span class="error-message" id="date-error"></span>
                    </div>

                    <form method="get" action=".">
                        <label>
                        <div  class="form-item" style=" margin-top: 50px; padding-right: 140px; padding-left: 140px; margin-bottom: 10; right: 140px; height: -50px;  top: -40px; ">
                            <input  id="cep" type="text" name="cep" placeholder="CEP"  value=""  size="10" maxlength="9"  onblur="pesquisacep(this.value);" required autofocus value="<?= $cep ?>">
                        </label>
                        </div>

                        <label>
                        <div class="form-item" style=" margin-top: 50px; padding-right: 140px; padding-left: 140px; margin-bottom: 10;  right: -140px; height: 50px; top: -150px; ">
                            <input  id="endereco" type="text" name="endereco" placeholder="Seu endereço" size="60" required autofocus value="<?= $endereco ?>"></label>
                        </div>

                        <label>
                        <div class="form-item" style="top: -120px;">
                            <span class="form-item-icon material-symbols-rounded">person_pin_circle</span>
                            <input  id="estado" type="text" name="estado" placeholder="Estado" size="2"  required autofocus value="<?= $estado ?>"></label>
                        </div>

                        <label>
                        <div class="form-item" style="top: -100px;">
                            <span class="form-item-icon material-symbols-rounded">location_city</span>
                            <input  id="cidade" type="text" name="cidade" placeholder="Cidade" size="40" required autofocus value="<?= $cidade ?>"></label>
                        </div>
                    </form> 
                
            
                   
                    <input class="btn btn-primary btn-lg btn-block active"
                     data-bs-toggle="modal" type="submit" value="Cadastrar" name="cadastrar" style="width: 414px; margin-left: 50px; top: -100px">
                </form>
            </div>
        </div>
    </div>
</body>










<script>
    function mascara_cpf() {
        var cpf = document.getElementById('cpf')
        if (cpf.value.length == 3 || cpf.value.length == 7) {
            cpf.value = cpf.value += "."
        } else if (cpf.value.length == 11) {
            cpf.value += "-"
            }
        }
</script>

<script>
    document.getElementById('date').addEventListener('change', function () {
        var selectedDate = new Date(this.value);
        var currentDate = new Date();

        if (selectedDate > currentDate) {
            document.getElementById('date-error').innerHTML = 'A data de nascimento não pode ser no futuro.';
            this.setCustomValidity('A data de nascimento não pode ser no futuro.');
        } else {
            document.getElementById('date-error').innerHTML = '';
            this.setCustomValidity('');
        }
    });
    
</script>

<script>
    let senha = document.getElementById('senha');
    let confsenha = document.getElementById('confsenha');

    function validarSenha() {
      if (senha.value != confsenha.value) {
        confsenha.setCustomValidity("Senhas diferentes!");
        confsehha.reportValidity();
        return false;
      } else {
        confsenha.setCustomValidity("");
        return true;
      }
    }
    confsenha.addEventListener('input', validarSenha)
</script>

<script type="text/javascript" src="js/cep.js"></script>
</html>
