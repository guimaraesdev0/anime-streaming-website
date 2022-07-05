<?php
session_start();
include_once("./conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$descricao = "Eu amo " . $nome_site;
$senhabase = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$senha = md5($senhabase);

$auth1 = rand(1,999);
$auth2 = rand(1,999);
$auth3 = rand(1,999);
$auth4 = rand(1,999);
$auth5 = rand(1,999);
$auth = $auth1.$auth2.$auth3.$auth4.$auth5;
echo ($auth);

 
if ($nome == "" || $senhabase == "") {
    $_SESSION['erro']="Os campos: Nome, Senha, Não podem estar vazios";
    header("Location: registro.php");
}
    $verificacao = "SELECT * FROM usuarios WHERE nome = '$nome'";
    $verificacao2 = mysqli_query($conn, $verificacao);
    $row_usuariov = mysqli_fetch_assoc($verificacao2);
    if ($row_usuariov['nome'] == "$nome") {
        $_SESSION['erro']="O nome cadastrado já existe";
        header("Location: registro.php");
    }else {
         $result_usuario = "INSERT INTO usuarios (nome, email, senha, descricao, auth, created) VALUE('$nome', '$email', '$senha', '$descricao', '$auth', NOW())";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        setcookie("auth", $auth);
        $_SESSION["auth"]=$auth;
        setcookie("nome_logado", $nome);
        $_SESSION["nome_logado"]=$nome;
        header('Location: catalogo.php'); 
    } 



?>