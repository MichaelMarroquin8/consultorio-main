<?php
require_once("config/conexion.php");
if (isset($_POST["enviar"]) and $_POST["enviar"] == "si") {
    require_once("models/Usuario.php");
    $usuario = new Usuario();
    $usuario->login();
}
?>
<html>

<head>
    <meta charset="utf-8">
    <title>CRL-SENA</>::Iniciar Sesion</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/bootstrap.css">

    <link rel="stylesheet" href="public/vendors/iconly/bold.css">

    <link rel="stylesheet" href="public/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="public/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/app.rtl.css">
    <link rel="shortcut icon" href="public/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="public/css/login.css">
</head>

<body>
    <div class="login-root">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
            <div class="loginbackground box-background--white padding-top--64">
                <div class="loginbackground-gridContainer">
                    <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                        <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                        <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                        <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                        <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                        <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                        <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                        <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                        <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                        <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
                    </div>
                </div>
            </div>
            <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
                <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                    <h1><a href="#" rel="dofollow">Consultorio Login</a></h1>
                </div>
                <div class="formbg-outer">
                    <div class="formbg">
                        <div class="formbg-inner padding-horizontal--48">

                            <form action="" method="post" id="login_form">

                                <span class="padding-bottom--15"><strong><a  id="lbltitulo" href="#">ACCESO EMPRESA</a></strong></span>

                                <input type="hidden" id="rol_id" name="rol_id" value="1">

                                <?php
                                if (isset($_GET["m"])) {
                                    switch ($_GET["m"]) {
                                        case "1";
                                ?>
                                            <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i>
                                                El Usuario, Contraseña o Rol son incorrectos.
                                            </div>
                                        <?php
                                            break;

                                        case "2";
                                        ?>
                                            <div class="alert alert-light-warning color-warning"><i class="bi bi-exclamation-triangle"></i>
                                                Los campos estan vacios.
                                            </div>
                                <?php
                                            break;
                                    }
                                }
                                ?>

                                <div class="field padding-bottom--24">
                                    <label for="email"><strong>Correo electrónico</strong></label>
                                    <input type="email" id="usu_correo" name="usu_correo" class="form-control" placeholder="E-Mail" />
                                </div>

                                <div class="field padding-bottom--24">
                                    <div class="grid--50-50">
                                        <label for="password"><strong>Contraseña</strong></label>
                                    </div>
                                    <input type="password" id="usu_pass" name="usu_pass" class="form-control" placeholder="Password" />
                                </div>

                                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                                    <div class="reset-pass">
                                        <a href="#" id="btnsoporte">Acceso Soporte</a>
                                    </div>
                                </div>
                                <div class="field padding-bottom--24">
                                    <input type="hidden" name="enviar" class="form-control" value="si">
                                    <input type="submit" value="Continue">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="public/js/lib/jquery/jquery.min.js"></script>
    <script src="public/js/lib/tether/tether.min.js"></script>
    <script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script type="text/javascript" src="datos.js"></script>
</body>

</html>