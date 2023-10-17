<?php

try {
    
$conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', ''); 

} catch (PDOException $e) {

 echo "Fallo la conexión ".$e->getMessage();
}

?>