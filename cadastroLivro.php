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

</head>
<body class="body-cadastro">
  <div class="text-center">
    <div class="cadastro-container">
        <div class="cadastro">
            <div class="cadastro-logo">
                <a href="login.php">
                    <img src="img/imgSITE/nuvemLILAS.png" alt="logo">
                </a>
            </div>
            <div class="cadastro-heather">
                <h1>Cadastre-se</h1>
            </div>
            <form class="cadastro-form" method="post">
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">badge</span>
                    <input type="text" name="nome" class="form-control" placeholder="Seu nome" required autofocus>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">mail</span>
                    <input type="email" name="email" class="form-control" placeholder="Seu e-mail" required>
                </div>
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">lock</span>
                    <input type="password" name="senha" class="form-control"  placeholder="Cadastre sua senha" required>
                </div>

                <div class="form-item">

                    <span class="form-item-icon material-symbols-rounded">calendar_today</span>
                    <input type="text" id="dataNascimento" name="dataNascimento" autocomplete="off" maxlength="10" class="form-control" placeholder="Sua data de Nascimento" onkeyup="mascara_DataNascimento()">

                </div>

                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">terminal</span>
                    <input type="text" id="cpf" autocomplete="off" maxlength="14" name="cpf" class="form-control" placeholder="Seu CPF" onkeyup="mascara_cpf()">
                </div>
                

                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">person_pin_circle</span>
                    <select id="estado" name="estado">
                        <option>Seu Estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
                    </select>
                </div>

                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">location_city</span>
                    <input type="text" name="cidade" class="form-control" placeholder="Sua cidade">
                </div>
                
                

                
                <div class="form-item">
                    <span class="form-item-icon material-symbols-rounded">call</span>
                    <input type="tel" id="telefone" name="telefone" autocomplete="off" maxlength="14" class="form-control" placeholder="insira o DDD" onkeyup="mascara_telefone()">
                </div>
                <div class="form-item-outro">
                    <div class="checkbox">
                        <input type="checkbox" id="rememberMeCheck">
                        <label for="rememberMeCheck">Lembre-se de mim</label>
                    </div>
                <input class="btn btn-lg btn-primary" type="submit" value="Cadastrar" name="cadastrar">
            </form>
            <div class="cadastro-footer"></div>
        </div>
    </div>
        <div class="cadastro-social">
            <div>cadastre-se por outras plataformas</div>
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
</html>