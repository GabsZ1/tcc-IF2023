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
    <link rel="website icon" type="png" href="img/nuvemLILAS.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
    <title>Cadastro</title>

    <script>
        function mascara_cpf() {
        var cpf = document.getElementById('cpf')
        if(cpf.value.length == 3 || cpf.value.length == 7) {
            cpf.value = cpf.value += "."
        } else if (cpf.value.length == 11) {
            cpf.value += "-"
        }
        }
    </script>

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
        function mascara_DataNascimento() {
        var DataNascimento = document.getElementById('dataNascimento');
        if (DataNascimento.value.length == 2) {
            DataNascimento.value = DataNascimento.value + '/';
        }
        if (DataNascimento.value.length == 5) {
            DataNascimento.value = DataNascimento.value + '/';
        }
        }
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
            <form onsubmit="return validaCPF(this.cpf.value)" class="cadastro-form" method="post">
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
                    <input type="password" name="senha" placeholder="Cadastre sua senha" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" name="senha" placeholder="Confirme sua senha" required>
                </div>

                <div class="form-item">

                    <span class="form-item-icon material-symbols-rounded">calendar_today</span>
                    <input type="date" id="dataNascimento" name="dataNascimento" autocomplete="off" maxlength="10"  placeholder="Sua data de Nascimento" onkeyup="mascara_DataNascimento()" required>

                </div>

                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">terminal</span>
                    <input type="text" name="cpf" id="cpf" placeholder="Seu CPF" autocomplete="off" maxlength="14" onkeyup="document.getElementById('validation').innerHTML = validaCPF(this.value)" required>
                    <div><b></b> <span id="validation"></span></div>
                </div>
                

                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person_pin_circle</span>
                    <select name="uf" id="estado" required>
                        <option></option>
                    </select>
                </div>

                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">location_city</span>
                    <select name="cidade" id="cidade" required></select>
                </div>

                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">call</span>
                    <input type="tel" id="telefone" name="telefone" autocomplete="off" maxlength="14" placeholder="insira o DDD" onkeyup="mascara_telefone()" required>
                </div>
                <div class="form-item-outro">
                    
                <input class="btn btn-primary btn-lg btn-block active" data-bs-toggle="modal" type="submit" value="Cadastrar" name="cadastrar">
            </form>
            <div class="cadastro-footer"></div>
        </div>
    </div>
        <div class="cadastro-social">
            <div>Nos encontre em outras plataformas</div>
            <div class="cadastro-social-btn">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                        <path d="M16.5 7.5l0 .01"></path>
                     </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                     </svg>
                </a>
            </div>
        </div>
    </div>
  </div>  
</body>

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
      options.setAttribute('label', 'Seu estado')
      response.forEach(function(uf) {
        options.innerHTML += '<option>' + uf.sigla + '</option>'
      })
      uf.append(options)
    })
  </script>

</html>

