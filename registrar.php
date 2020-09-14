<?php

 include_once('class/usuario.php');

if (isset($_GET['acao'])) {

    $acao = $_GET['acao'];

    switch ($acao) {
        
        case 'cadastro':

        $c = new usuario();
        $c->setnome($_POST['nome']);
        $c->setsobre($_POST['sobre']);
        $pais = "+55";
        $telefone = $pais."".$_POST['ddd']."".$_POST['numero'];
        $c->settelefone($telefone);
        $c->setemail($_POST['email']);
        $c->settipo('1');
        $c->setsenha($_POST['senha']);

        if($c->cadastro()){

            header('Location: index.php?acao=usuariocadastrado');

        }else{

            header("Location: ?acao=emailcadastrado");

        }

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
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- [ Logo ] End -->

            <!-- [ Form ] Start -->
            <form class="my-5" name="cadastro" action="?acao=cadastro" method="post">

                <div class="form-group">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" required>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Sobre Nome</label>
                    <input type="text" name="sobre" class="form-control" required>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Telefone</label>

                    <div class="input-group mb-3">

                        <div class="input-group-prepend">
                        <div class="input-group-text">+55</div>
                            <select name="ddd" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                                
                                <option selected>DDD</option>

                                <?php

                                    $count = 11;

                                    while ($count <= '99') {

                                        echo'<option value="'.$count.'">0'.$count.'</option>';

                                        $count ++;

                                    }


                                ?>

        
                            </select>
                        </div>
                        <input type="tel" name="numero" class="form-control" id="inlineFormInputGroup" pattern="[0-9]{5}-[0-9]{4}" placeholder="00000-0000" required>

                    </div>

                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                    <div class="clearfix"></div>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">Inscrever-se</button>
                <div class="bg-lightest text-muted small p-2 mt-4">
                    Ao clicar em "Inscrever-se", você concorda com nossos
                    <a href="javascript:void(0)">termos de serviço e política de privacidade</a>. Ocasionalmente, enviaremos e-mails relacionados à sua conta.
                </div>
            </form>
            <!-- [ Form ] End -->

            <div class="text-center text-muted">
                Já tem uma conta?
                <a href="index.php">Entrar</a>
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
