<?php
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$temporada = filter_input(INPUT_POST, 'temporada', FILTER_SANITIZE_NUMBER_INT);
$link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_NUMBER_INT);
session_start();
include_once("./conexao.php");
$auth = $_SESSION['auth'];
$verificacao = "SELECT * FROM usuarios WHERE auth = '$auth'";
$verificacao2 = mysqli_query($conn, $verificacao);
$row_usuariov = mysqli_fetch_assoc($verificacao2);

if ($row_usuariov['staff'] == "1") {

}else {
    echo "<script>
    alert('Voce nao e adm');
    </script>";
    header("Location: catalogo.php");
}

if ($_SESSION['nome_logado'] == "") {
    $_SESSION['erro']="É necessário fazer login para assistir";
    header("Location: login.php");
}elseif ($_COOKIE['nome_logado'] == "") {
    $_SESSION['erro']="É necessário fazer login para assistir";
    header("Location: login.php");
}
?>
<?php
         $result_usuario = "INSERT INTO temporadas (titulo, descricao, temporada, link, ano) VALUE('$titulo', '$descricao', '$temporada', '$link', '$data')";
         $resultado_usuario = mysqli_query($conn, $result_usuario);
         $_SESSION['certo']="Temporada postada com sucesso";
?>
