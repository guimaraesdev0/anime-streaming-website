<?php
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
$anime = $_POST['anime'];
$episodio = filter_input(INPUT_POST, 'episodio', FILTER_SANITIZE_NUMBER_INT);
$link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);
$nome = $_SESSION['nome_logado'];


 if ($episodio <= 0) {
    $_SESSION['erro']="O episodio não pode ser menor que: 1";
    header("Location: painel-adm-postar_ep.php");
}else {
    echo ($anime);
    echo "<br>";
    echo ($nome);
    echo "<br>";
    echo ($episodio);
    echo "<br>";
    echo ($link);
    echo "<br>";
    $result_usuario = "INSERT INTO episodios (id_anime, episodio, link_embed, postado) VALUE('$anime', '$episodio', '$link', '$nome')";
    $resultado_usuario = mysqli_query($conn, $result_usuario);


     $_SESSION['certo']="O episodio foi postado com sucesso";
    header("Location: painel-adm-postar_ep.php");
} 

?>