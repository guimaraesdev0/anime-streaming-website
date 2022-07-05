<?php
session_start();
include_once('./conexao.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$senhabase = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senha = md5($senhabase);


$result_usuario = "SELECT * FROM usuarios WHERE nome = '$nome'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
if ($row_usuario['nome'] == "$nome") {
    $auth = $row_usuario['auth'];
    if ($row_usuario['senha'] == "$senha") {    
        $_SESSION['nome_logado']="$nome";
        setcookie("nome_logado", $nome);
        setcookie("auth", $auth);
        $_SESSION['auth']="$auth";
        header("Location: catalogo.php"); 
        echo "Logado";
    }else {
        $_SESSION['erro']="Nome ou senha não conferem";
        header("Location: login.php");
    }
}else {
    $_SESSION['erro']="Nome ou senha não conferem";
    header("Location: login.php");
}
?>