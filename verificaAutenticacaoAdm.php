<?php

if(!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    $mensagem = "Por favor faça o login!";
header("location: adm.php?mensagem1=$mensagem");
}

?>