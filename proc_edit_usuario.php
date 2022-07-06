<?php
session_start();
include_once("./conexao.php");
if ($_SESSION['nome_logado'] == "") {
    $_SESSION['erro']="É necessário fazer login para assistir";
    header("Location: login.php");
}elseif ($_COOKIE['nome_logado'] == "") {
    $_SESSION['erro']="É necessário fazer login para assistir";
    header("Location: login.php");
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$auth = $_COOKIE['auth'];
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
$cor_aura = $_POST['cor-aura'];


    if ($nome == "") {
        $_SESSION['erro']="O campo nome não pode estar vazio";
        header("Location: editar.php");
    }


    $verificacao = "SELECT * FROM usuarios WHERE auth = '$auth'";
    $verificacao2 = mysqli_query($conn, $verificacao);
    $row_usuariov = mysqli_fetch_assoc($verificacao2);
    if ($row_usuariov['nome'] == $nome) {
        echo ($cor_aura);

        $_SESSION['erro']="Já existe um usuario com este nome.";
        $_SESSION['certo']="Apenas a descricao foi modificado";
        $result_usuario = "UPDATE usuarios SET descricao='$descricao', img='$img', cor_aura='$cor_aura', modified=NOW() WHERE auth='$auth'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        header("Location: editar.php"); 
    }else {
        
        $result_usuario = "UPDATE usuarios SET email='$email', nome='$nome', descricao='$descricao', img='$img', cor_aura='$cor_aura', modified=NOW() WHERE auth='$auth'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $_SESSION['certo']="Voce editou com sucesso.";
        header("Location: editar.php"); 
    }  
    





?>