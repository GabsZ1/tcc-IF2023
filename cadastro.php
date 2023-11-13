<?php
//1. Conectar no BD (IP, Usuário, ...)

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');

if (isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $dataNasc = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];

    //3. Preparar a SQL

    $sql = "insert into usuario (nome, email, senha, dataNascimento, cpf, cidade, UF, telefone) values ('$nome', '$email', '$senha', '$dataNasc', '$cpf', '$cidade', '$estado', '$telefone')";
    
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
    <link rel="website icon" type="png" href="img/imgSITE/nuvemLILAS.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
    <title>Cadastro</title>

</head>
<body class="body-cadastro">
    <div class="text-center">
        <div class="cadastro-container">
            <div class="cadastro" style="width: 650px;">
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
                <form class="cadastro-form" method="post">
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">badge</span>
                        <input type="text" name="nome" placeholder="Seu nome" required autofocus>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">mail</span>
                        <input type="email" name="email" placeholder="Seu e-mail" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="password" id="senha" name="senha" placeholder="Cadastre sua senha" required>
                    </div>
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">lock</span>
                        <input type="password" id="confsenha" name="confsenha" placeholder="Confirme sua senha" required>
                    </div>

                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">calendar_today</span>
                        <input type="date" id="dataNascimento" name="dataNascimento" autocomplete="off" maxlength="10"  placeholder="Sua data de Nascimento" required>
                    </div>

                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">terminal</span>
                        <input type="text" name="cpf" id="cpf" placeholder="Insira seu CPF sem os . e -" autocomplete="off" maxlength="11" onkeyup="document.getElementById('validation').innerHTML = validaCPF(this.value)" required>
                        <div><b></b> <span id="validation"></span></div>
                    </div>
                    
                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">person_pin_circle</span>
                        <select name="estado" id="estado" required>
                            <option selected disabled value="">Seu estado</option>
                        </select>
                    </div>

                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">location_city</span>
                        <select name="cidade" id="cidade" required>
                            <option selected disabled value="">Sua cidade</option>
                        </select>
                    </div>

                    <div class="form-item">
                        <span class="form-item-icon material-symbols-rounded">call</span>
                        <input type="tel" id="telefone" name="telefone" autocomplete="off" maxlength="14" placeholder="insira o DDD" onkeyup="mascara_telefone()" required>
                    </div>

                    <input class="btn btn-primary btn-lg btn-block active" data-bs-toggle="modal" type="submit" value="Cadastrar" name="cadastrar" style="width: 414px; margin-left: 50px;">
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    function mascara_telefone() {
    var celular = document.getElementById('telefone');

        if (celular.value.length == 2) {
            celular.value = '(' + celular.value + ')';
        }
        if (celular.value.length == 9) {
            celular.value = celular.value + '-';
        }
        }
</script>

<script>
    const ulrUF = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/'
    const cidade = document.getElementById("cidade")
    const uf = document.getElementById("estado")

    uf.addEventListener('change', async function() {
      const urlCidades = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + uf.value + '/municipios'
      const request = await fetch(urlCidades)
      const response = await request.json()

      let options = ''
      response.forEach(function(cidades) {
        options += '<option>' + cidades.nome + '</option>'
      })
      cidade.innerHTML = options
    })


    window.addEventListener('load', async () => {
      const request = await fetch(ulrUF)
      const response = await request.json()

      //  console.log(response[0]).sigla)
      const options = document.createElement("optgroup")
      response.forEach(function(uf) {
        options.innerHTML += '<option>' + uf.sigla + '</option>'
      })
      uf.append(options)
    })
</script>

<script>
    function validaCPF(cpf) {
    var Soma = 0
    var Resto

    var strCPF = String(cpf).replace(/[^\d]/g, '')
        
    if (strCPF.length !== 11)
        return false
        
    if ([
        '00000000000',
        '11111111111',
        '22222222222',
        '33333333333',
        '44444444444',
        '55555555555',
        '66666666666',
        '77777777777',
        '88888888888',
        '99999999999',
        ].indexOf(strCPF) !== -1)
        return false

    for (i=1; i<=9; i++)
        Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);

    Resto = (Soma * 10) % 11

    if ((Resto == 10) || (Resto == 11)) 
        Resto = 0

    if (Resto != parseInt(strCPF.substring(9, 10)) )
        return false

    Soma = 0

    for (i = 1; i <= 10; i++)
        Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i)

    Resto = (Soma * 10) % 11

    if ((Resto == 10) || (Resto == 11)) 
        Resto = 0

    if (Resto != parseInt(strCPF.substring(10, 11) ) )
        return false

    return true
    }   
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

</html>