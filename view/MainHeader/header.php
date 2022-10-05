<div class="header-top">
    <div class="container">
        <div class="logo">
            <a href="#"><img src="../../public/images/logo/logo.png" alt="Logo" srcset=""></a>
        </div>
        <div class="header-top-right">

            <div class="dropdown">
                <a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-md2">
                    <img src="../../public/images/<?php echo $_SESSION["rols_id"] ?>.jpg" alt="">
                    </div>
                    <div class="text">
                        <h6 class="user-dropdown-name"><?php echo $_SESSION["usu_nom"] ?> <?php echo $_SESSION["usu_ape"] ?></h6>
                        <input type="hidden" id="user_idx" value="<?php echo $_SESSION["usu_id"] ?>"><!-- ID del Usuario-->
                        <input type="hidden" id="rol_idx" value="<?php echo $_SESSION["rol_id"] ?>"><!-- Rol del Usuario-->
                        <input type="hidden" id="rols_idx" value="<?php echo $_SESSION["rols_id"] ?>"><!-- Rol del Usuario-->
                        <?php
                        if ($_SESSION["rols_id"] == 3) {
                        ?>
                            <p class="user-dropdown-status text-sm text-muted">Empresa</p>
                        <?php
                        } elseif ($_SESSION["rols_id"] == 2) {
                        ?>
                            <p class="user-dropdown-status text-sm text-muted">Aprendiz</p>
                        <?php
                        } elseif ($_SESSION["rols_id"] == 1) {
                        ?>
                            <p class="user-dropdown-status text-sm text-muted">Instructor</p>
                        <?php
                        }
                        ?>


                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="../MntPerfil/">Perfil</a></li>
                    <li><a class="dropdown-item" href="#">Ayuda</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="../Logout/logout.php">Cerrar Sesion</a></li>
                </ul>
            </div>

            <!-- Burger button responsive -->
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </div>
    </div>
</div>