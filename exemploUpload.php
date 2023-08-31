<?php 
    //SE FOI CLICADO NO BOTAO ENVIAR
    if(isset($_POST['enviar'])) {
        $diretorio = "uploads/";
        $arquivoDestino = $diretorio . $_FILES ['arquivo']['name'];

        //envia o arquivo para o $arqivoDestino
        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivoDestino)) {
            echo "arquivo enviado com sucesso.";
        } else {
            echo "ERRO: arquivo não enviado.";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Upload de arquivo</h1>
    <form name="form" method="post" enctype="multipart/form-data">
        Arquivo: <input type="file" name="arquivo" id="arquivo">
        <br><br><br>
        <input type="submit" name="enviar" value="enviar"> 
    </form>
</body>
</html>