<?php
session_start();
include_once("./conexao.php");
$id_temporada = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$temporada = "SELECT * FROM temporadas WHERE id = '$id_temporada'";
$temporada2 = mysqli_query($conn, $temporada);
$row_temporada = mysqli_fetch_assoc($temporada2);


$auth = $_SESSION['auth'];
$verificacao = "SELECT * FROM usuarios WHERE auth = '$auth'";
$verificacao2 = mysqli_query($conn, $verificacao);
$row_usuariov = mysqli_fetch_assoc($verificacao2);

if ($_SESSION['nome_logado'] == "") {
    $_SESSION['erro']="É necessário fazer login para assistir";
    header("Location: login.php");
}elseif ($_COOKIE['nome_logado'] == "") {
    $_SESSION['erro']="É necessário fazer login para assistir";
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="Pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">
    <title><?php echo ($nome_site); ?> | Bem-vindo</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/catalogo.css">
    <link rel="stylesheet" href="css/anime.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" defer integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid fundo-nav-catalogo">
        <div class="row">
            <div class="col-xl-2 col-md-2 col-sm-12 catalogo-icon-col d-flex justify-content-center">
                <a href="catalogo.php"><img src="imgs/icon.png" alt="" class="catalogo-icon"></a>
            </div>
            <div class="col-xl-10 col-md-10 col-sm-12">
                <div class="nav-catalogo">
                    <a href="lancamentos.php">Lançamentos</a>
                    <a href="perfil.php">Perfil</a>
                    <a href="categorias.php">Categorias</a>
                    <a href="pedido.php">Pedir Animes</a>
                    <a href="contato.php">Contato</a>
                    <a href="logout.php">logout</a>
                    <?php
                    if ($row_usuariov['staff'] == "1") {
                        echo "
                        <a href='painel-adm.php'>Painel adm</a>
                        ";
                    }else {
                    }
                    ?>
                    <?php
                    if ($discord == "1") {
                        echo "
                        <a href='" . $link_discord . "'><img src='./imgs/discord-icon.png' class='discord-icon'></a>";
                        
                    }else {
                        
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
 
<!--                 <h1><?php echo($row_temporada['titulo']); ?></h1>
                <h1>Temporada: <?php echo($row_temporada['temporada']); ?></h1>
                <div class="d-flex justify-content-center">
                <p class="descricao-postagem center"><?php echo ($row_temporada['descricao']) ?></p>
                </div> -->
    <div class="container anime-post">
        <div class="row">
            <div class="col-xl-6 col-md-12 col-sm-12 foto-anime" style="background-image: url(<?php echo($row_temporada['link']); ?>); background-position: center; background-size: cover;">
            </div>
            <div class="col-xl-6 col-md-6 col-sm-6 descricao-anime">
                Título: <?php echo($row_temporada['titulo']); ?><br>
                Descrição: <?php echo($row_temporada['descricao']); ?><br>
                Temporada: <?php echo($row_temporada['temporada']); ?><br>
                Ano lançamento: <?php echo($row_temporada['ano']); ?><br>
                <Br>
                Episodios:
                <div class="episodios">
                    <?php
                        $result_episodios = "SELECT * FROM episodios WHERE id_anime = '$id_temporada'";
                        $resultado_episodios = mysqli_query($conn, $result_episodios);
                        while ($row_episodio = mysqli_fetch_assoc($resultado_episodios)) {
                        echo "<br><a href='assistir.php?id_temp=" . $row_episodio['id_anime'] . "&id_ep=" . $row_episodio['episodio'] . "'>Episodio " . $row_episodio['episodio'] . "</a>";
                        }
                     ?>                    
                </div>
            </div>
        </div>
    </div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>