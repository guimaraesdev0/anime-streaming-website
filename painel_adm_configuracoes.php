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
    <link rel="stylesheet" href="css/painel-adm.css">
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
 
    <div class="container painel-adm">
        <div class="row">
            <div class="col-12">
                <h1>PAINEL STAFF</h1><br>
                <div class="d-flex justify-content-center">
                <a href="painel-adm-postar.php"><button type="button" class="btn btn-primary">Postar <?php echo ($servico); ?></button></a>
                <a href="painel-adm-postar_ep.php"><button type="button" class="btn btn-primary">Postar Episodio</button></a>
                
                <button type="button" class="btn btn-warning">Gerenciar VIP</button>
                <button type="button" class="btn btn-success">Gerenciar Adm's</button>
                <button type="button" class="btn btn-danger">Pedidos <?php echo ($servico); ?></button>
                <a href="painel_adm_configuracoes.php"><button type="button" class="btn btn-light">Configuração</button></a>


                </div>

                <section class="envio">
                                <div class="container-fluid envio envios config">
                                   <h1>Configurações</h1>
                                    <div class="row">
                                            <?php
                                        if (isset($_SESSION['certo'])) {
                                            echo "
                                            <div class='certo'>
                                            " . $_SESSION['certo'] . "
                                            </div>
                                            ";
                                            
                                            
                                            unset($_SESSION['certo']);
                                        }
                                    ?>
                                    
                                    <hr>
                                    <h3>Banner do início</h3>
                                    <form action="atualizar_config.php" method="post">
                                    Link banner 1 400x1100: <input type="text" name="link1" value="<?php echo($row_config['link_banner1']); ?>"><br>
                                    Linkpara redirencionar 1: <input type="text" name="href1" value="<?php echo($row_config['href_banner1']); ?>"><br><Br>
                                    Link banner 2 400x1100: <input type="text" name="link2" value="<?php echo($row_config['link_banner2']); ?>"><br>
                                    Linkpara redirencionar 2: <input type="text" name="href2" value="<?php echo($row_config['href_banner2']); ?>"><br><Br>
                                    Link banner 3 400x1100: <input type="text" name="link3" value="<?php echo($row_config['link_banner3']); ?>"><br>
                                    Linkpara redirencionar 3: <input type="text" name="href3" value="<?php echo($row_config['href_banner3']); ?>"><br>
                                    <button type="submit" class="btn btn-success">Confirmar atualizações</button>
                                    </form>
                                    <hr>

                                </div>
                            </section>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 footer">
                <p><?php echo ($nome_site); ?>  | Foi criado de 💖 por <a href="https://github.com/GuimaSpace">Guimaraes</a> | 2022</p>
            </div>
        </div>
    </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
 
