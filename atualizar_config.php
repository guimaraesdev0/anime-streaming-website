<?php
session_start();
include_once("./conexao.php");
$auth = $_SESSION['auth'];
$verificacao = "SELECT * FROM usuarios WHERE auth = '$auth'";
$verificacao2 = mysqli_query($conn, $verificacao);
$row_usuariov = mysqli_fetch_assoc($verificacao2);

$link_banner1 = filter_input(INPUT_POST, 'link1', FILTER_SANITIZE_STRING);
$link_banner2 = filter_input(INPUT_POST, 'link2', FILTER_SANITIZE_STRING);
$link_banner3 = filter_input(INPUT_POST, 'link3', FILTER_SANITIZE_STRING);
$link_href1 = filter_input(INPUT_POST, 'href1', FILTER_SANITIZE_STRING);
$link_href2 = filter_input(INPUT_POST, 'href2', FILTER_SANITIZE_STRING);
$link_href3 = filter_input(INPUT_POST, 'href3', FILTER_SANITIZE_STRING);

$config = "SELECT * FROM configuracoes";
$configuracao = mysqli_query($conn, $config);
$row_config = mysqli_fetch_assoc($configuracao);

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
        $result_usuario = "UPDATE configuracoes SET link_banner1='$link_banner1', link_banner2='$link_banner2', link_banner3='$link_banner3', href_banner1='$link_href1', href_banner2='$link_href2', href_banner3='$link_href3'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $_SESSION['certo']="Configurações editadas com sucesso.";
        header("Location: painel_adm_configuracoes.php");

?>
