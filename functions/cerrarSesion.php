<<<<<<< HEAD
<?php

session_start();

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión u otra página
header('Location: ../index.php');
exit();

=======
<?php

session_start();

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión u otra página
header('Location: ../index.php');
exit();

>>>>>>> 7c735c6 (Version 2.2 - Version web)
?>