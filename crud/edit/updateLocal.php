<?php

try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', ''); 
 
} catch (PDOException $e) {

   echo "Fallo la conexión ".$e->getMessage();
}

try {

$vcodigo = filter_var($_POST['codigo']);
$vservicio = filter_var($_POST['servicio']);
$vnombre = filter_var($_POST['nombre']);
$vubicacion = filter_var($_POST['ubicacion']);
$vciudad = filter_var($_POST['ciudad']);
$vabierto = filter_var($_POST['abierto']);
$vcerrado = filter_var($_POST['cerrado']);




$update = $conexion->prepare("UPDATE `local` SET id_servicio = :servicio, nombre= :nombre, ubicacion = :ubicacion, ciudad = :ciudad, hora_cerrado = :cerrado , hora_abierto = :abierto WHERE id_local = :codigo"); 

$update->bindParam(':servicio', $vservicio);
$update->bindParam(':nombre', $vnombre);
$update->bindParam(':ubicacion', $vubicacion);
$update->bindParam(':ciudad', $vciudad);
$update->bindParam(':abierto', $vabierto);
$update->bindParam(':cerrado', $vcerrado);
$update->bindParam(':codigo', $vcodigo); 

$update->execute();

header("location: ../read/readLocal.php");


} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>




