<?php
    include_once('class/usuario.php');

    $p = new usuario;
    if($p->proteger()){

        header('Location: index.html');

    }
    if (isset($_GET['acao'])){

        $acao = $_GET['acao'];

         switch($acao) {

            case 'login':

                $u = new usuario;
                $u->setemail($_POST['email']);
                $u->setsenha($_POST['senha']);

                unset($_GET['acao']);
                
                if($u->login()){

                    header('Location: index.html');

                }else{

                    header("Location: ?acao=acessonegado");
                }

            break;

            case 'acessonegado':

                echo' 

                <div class="alert alert-dark-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    Falha ao tentar entrar! Usuario ou senha incorreta.
                </div>
                ';

            break;

            case 'usuariocadastrado':
            
                echo' 

                    <div class="alert alert-info alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Usuario criado com sucesso.
                    </div>
                ';
            break;

            default:
       
            break;
        }

    }

?>
<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">

<head>
    <title>REDTS3</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Teamspeak de qualidade. REDTS3" />
    <meta name="keywords" content="Teamspeak, Servidor, jogos, pro player, comunicação">
    <meta name="author" content="Srthemesvilla" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.css">
    <link rel="stylesheet" href="assets/fonts/linearicons.css">
    <link rel="stylesheet" href="assets/fonts/open-iconic.css">
    <link rel="stylesheet" href="assets/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/fonts/feather.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap-material.css">
    <link rel="stylesheet" href="assets/css/shreerang-material.css">
    <link rel="stylesheet" href="assets/css/uikit.css">

    <!-- Libs -->
    <link rel="stylesheet" href="assets/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="assets/css/pages/authentication.css">
</head>

<body>

    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>

    </div>
    <!-- [ Preloader ] End -->

    <!-- [ content ] Start -->
    <div class="authentication-wrapper authentication-1 px-4">
        <div class="authentication-inner py-5">

            <!-- [ Logo ] Start -->
            <div class="d-flex justify-content-center align-items-center">
                <div class="ui-w-200">
                    <div class="w-100 position-relative">
                        <img src="assets/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                    </div>
                </div>
            </div>
            <!-- [ Logo ] End -->

            <!-- [ Form ] Start -->
            <form  class="my-5" name="login" action="?acao=login" method="post">
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" required>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label d-flex justify-content-between align-items-end">
                        <span>Senha</span>
                        <a href="senha.php" class="d-block small">Esqueceu a senha?</a>
                    </label>
                    <input type="password" name="senha" class="form-control" required>
                    <div class="clearfix"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center m-0">
                    <label class="custom-control custom-checkbox m-0">
                        <input type="checkbox" class="custom-control-input">
                        <span class="custom-control-label">Lembra me</span>
                    </label>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
            <!-- [ Form ] End -->

            <div class="text-center text-muted">
                Não tem uma conta ainda?
                <a href="registrar.php">Inscrever-se</a>
            </div>

        </div>
    </div>
    <!-- [ content ] End -->

    <!-- Core scripts -->
    <script src="assets/js/pace.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/libs/popper/popper.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/sidenav.js"></script>
    <script src="assets/js/layout-helpers.js"></script>
    <script src="assets/js/material-ripple.js"></script>

    <!-- Libs -->
    <script src="assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

</body>

</html>
