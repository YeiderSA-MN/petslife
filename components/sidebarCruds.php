<nav>
        <ul>
            <li><a href="#" class="logo">
                <img src="../../img/logo2.png" alt="">
                <span class="nav-item">Tienda</span>
            </a></li>
            <li><a href="../../screens/index.php">
                <i class="fas fa-home"></i>
                <span class="nav-item">Inicio</span>
            </a></li>
<?php

if($_SESSION['tipo_persona']=="1"){ ?>
    <li><a href="../../screens/dashboard.php">
    <i class="fas fa-solid fa-bars"></i>
    <span class="nav-item">Tablas principales</span>
</a></li>

<?php } ?>
           

            <li><a href="../../screens/perfil.php">
                <i class="fas fa-user"></i>
                <span class="nav-item">Perfil</span>
            </a></li>
            <?php if(isset($_SESSION['loggedin'])){?>
            <li><a href="../../functions/cerrarSesion.php" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Cerrar Sesión</span>
            </a></li>
            <?php }else{?>
                        <li><a href="../../screens/loginRegistro.php" class="logout">
                        <i class="fas fa-sign-in-alt"></i>
                        <span class="nav-item">Iniciar Sesion</span>
                        </a></li>
            <?php } ?>
        </ul>
        </nav>