<?php
session_start();
unset($_SESSION["nome_logado"]);
unset($_SESSION["auth"]);
unset($_COOKIE["nome_logado"]);
unset($_COOKIE["auth"]);
$_SESSION['erro']="Voce deslogou com sucesso";
header("Location: login.php")


?>