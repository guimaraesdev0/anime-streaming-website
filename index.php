<?php
session_start();
include_once("./conexao.php");

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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="bg-video-wrap">
        <video src="videos/bg.mp4" loop muted autoplay>
        </video>
        <div class="overlay background">
            <!-- START Bootstrap-Cookie-Alert -->
            <div class="alert text-center cookiealert" role="alert">
                <font color="white">
                <b>Você gosta de cookies?</b> &#x1F36A; Usamos cookies para garantir que você tenha a melhor experiência em nosso site. <a href="https://cookiesandyou.com/" target="_blank">Ler Mais</a>
            </font>

                <button type="button" class="btn btn-primary btn-sm acceptcookies">
                    Eu Aceito
                </button>
            </div>
<!-- END Bootstrap-Cookie-Alert -->
            <ul class="background">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
             </ul>
            <div class="d-flex justify-content-center">
                <img src="imgs/icon.png" alt="logo" class="logo-index">
            </div>

        </div>
        
        <div class="index">
        <h1>Assista seus animes favoritos de forma 100% gratuita
            <div class="escolhas">
                <a href="catalogo.php"><button type="button" class="btn btn-primary">Assistir</button></a>
                <a href="login.php"><button type="button" class="btn btn-primary">Login</button></a>
                <a href="registro.php"><button type="button" class="btn btn-primary">Registro</button></a>
            </div>
        </h1>
        </div>


      </div>
      <script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
</body>
</html>