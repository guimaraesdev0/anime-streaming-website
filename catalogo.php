<?php
session_start();
include_once("./conexao.php");
$auth = $_SESSION['auth'];
$verificacao = "SELECT * FROM usuarios WHERE auth = '$auth'";
$verificacao2 = mysqli_query($conn, $verificacao);
$row_usuariov = mysqli_fetch_assoc($verificacao2);

$config = "SELECT * FROM configuracoes";
$configuracao = mysqli_query($conn, $config);
$row_config = mysqli_fetch_assoc($configuracao);


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
    <div class="catalogo">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 catalogo-container">
                    <div class="title-catalogo">
                        <h1><?php echo ($nome_site); ?></h1><br>
                    </div>
                    <div class="ultimos-animes">
                        <section id="carousel-animes">
                            <section>
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <a href="<?php echo ($row_config['href_banner1']) ?>"><img src="<?php echo ($row_config['link_banner1']) ?>" alt="..." height="400" width="1100"></a>
                                      </div>
                                      <div class="carousel-item">
                                        <a href="<?php echo ($row_config['href_banner2']) ?>"><img src="<?php echo ($row_config['link_banner2']) ?>" alt="..." height="400" width="1100"></a>
                                      </div>
                                      <div class="carousel-item">
                                        <a href="<?php echo ($row_config['href_banner3']) ?>"><img src="<?php echo ($row_config['link_banner3']) ?>" alt="..." height="400" width="1100"></a>
                                      </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                  </div>
                            </section>

                            <section class="envio">
                                <div class="container-fluid envio envios">
                                    <?php echo($servico); ?>
                                    <div class="row">
                                        
                                    <?php
                                    $result_temporadas = "SELECT * FROM temporadas";
                                    $resultado_temporadas = mysqli_query($conn, $result_temporadas);
                                    while ($row_temporada = mysqli_fetch_assoc($resultado_temporadas)) {
                                        echo ("
                                        <div class='col-xl-2 col-md-2 col-sm-12 item-envios' style='background-image: url(" . $row_temporada['link'] . "); background-size: cover; background-position: center;'>
                                        <div class='descricao-item'>
                                         <a href='anime.php?id=" . $row_temporada['id'] . "'>" . $row_temporada['titulo'] . " temp:" . $row_temporada['temporada'] . "</a>" . "
                                        </div>
                                            </div>                                         
                                        ");
                                   
                                    }
                                    ?>





                                </div>
                            </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 footer">
                <p>Nome seu site | Foi criado de 💖 por <a href="https://github.com/GuimaSpace">Guimaraes</a> | 2022</p>
            </div>
        </div>
    </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
 
