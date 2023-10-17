<nav class="navbar navbar-expand-lg" id="menu">
                <div class="container-fluid">
                    <a href="../petslife/index.php"><h1 class="logo nav"></h1></a>
                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                        <ul class="navbar-nav justify-content-end" id="menu_desplegable">

                        <?php
                           if (isset($_SESSION['tipo_persona'])&&$_SESSION['tipo_persona']=="1"){
                            ?>
                                <li class="nav-item">
                                <a class="nav-link fw-bold" aria-current="page"
                                href="../screens/dashboard.php">Dashboard</a>
                            </li>
                            <?php
                            }
                        ?>

                            <li class="nav-item">
                            <a class="nav-link fw-bold" aria-current="page" href="../screens/perfil.php">Perfil</a>
                            </li>

                            <li class="nav-item">
                            <a class="nav-link fw-bold" aria-current="page" href="../screens/tienda.php">Tienda</a>
                            </li>
                            
                            <li class="nav-item">
                            <a class="nav-link fw-bold" aria-current="page" href="../screens/servicios.php">Servicios</a>
                            </li>

                            <li class="nav-item">
                            <a class="nav-link fw-bold " href="../screens/sobreNosotros.php">Sobre nosotros</a>
                            </li>
                            <li class="nav-item">
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo '<a class="nav-link fw-bold" href="../functions/cerrarSesion.php">Cerrar Sesión</a>';
    } else {
        echo '<a class="nav-link fw-bold" href="../screens/loginRegistro.php">Login</a>';
    }
    ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>