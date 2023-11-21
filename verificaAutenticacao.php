<?php

if(!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['email'])) {
    $mensagem = "Por favor faça o login!";
header("location: login.php?mensagem1=$mensagem");
}

?>