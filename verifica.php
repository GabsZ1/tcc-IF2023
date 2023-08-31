<?php
session_start();

//Verifica se existe os dados da sessão de login
if(!isset($_SESSION["nome"]) || !isset($_SESSION["email"]))
{
    //usuário não logado, redireciona para página de login
    header("Location: login.html");
}
?>