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
    <title><?php echo ($nome_site); ?> - Registro</title>
    <!-- Bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="./index.php"><?php echo ($nome_site); ?></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Op1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Op2</a>
              </li>
          </div>
        </div>
      </nav>

      <div class="conteudo">
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-xl-6 login-container">
                        <div class="logo"></div>
                        <form method="post" action="cadastrar.php" class="formulario">
                                <?php
                                if (isset($_SESSION['erro'])) {
                                    echo "
                                    <div class='erro-registro'>
                                    " . $_SESSION['erro'] . "
                                    </div>
                                    ";
                                    
                                    
                                    unset($_SESSION['erro']);
                                }
                            ?>
                            <input type="text" name="nome" placeholder="Seu nome *">
                            <input type="email" name="email" placeholder="Seu Email">
                            <input type="password" name="senha" placeholder="Sua senha *"><br>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                              Cadastrar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">DMCA ALERT</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>AVISO LEGAL: Este site não armazena nenhum dos arquivos em seu servidor. Todos os conteúdos são fornecidos por terceiros sem qualquer tipo de filiação.</p>
                                    <p>Sabendo de tudo, sinta-se livre para se cadastrar</p>
                                    <input type="submit" value="cadastrar"><br><br>
                                  </div>
                                  <div class="modal-footer">
                                  <a href="dmca.html">Ver mais sobre DMCA</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Desistir</button>
                                  </div>
                                </div>
                              </div>
                            </div>



        
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>





    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>    
</body>
</html>