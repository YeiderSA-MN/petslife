<?php

session_start();
$_SESSION['cedula']=$row['cedula'];
$_SESSION['password']=$row['password'];
$_SESSION['tipo_persona']=$row['tipo_persona'];
$_SESSION['nombre']=$row['nombre'];
$_SESSION['loggedin'] = true;

try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', ''); 
 
} catch (PDOException $e) {

   echo "Fallo la conexión ".$e->getMessage();
}

try {
$vnombre = filter_var($_POST['nombre']);
$vapellido= filter_var($_POST['apellido']);
$vpassword = filter_var($_POST['pass']);
$vcedula = filter_var($_POST['cedula']);
$vlocal = filter_var($_POST['local']);
$vnumero = filter_var($_POST['numero']);
$vtipo_persona = filter_var($_POST['tipo_persona']);



$update = $conexion->prepare("INSERT INTO persona
(nombre, cedula, password, numero, apellido, cod_local, tipo_persona)
VALUES (:nombre,:cedula,:password,:numero,:apellido,:local_, :tipo_persona)");

$update->bindParam(':nombre', $vnombre);
$update->bindParam(':cedula', $vcedula);
$update->bindParam(':password', $vpassword);
$update->bindParam(':numero', $vnumero);
$update->bindParam(':tipo_persona', $vtipo_persona);
$update->bindParam(':apellido', $vapellido);
$update->bindParam(':local_', $vlocal);



$update->execute();

header("location: ../../screens/index.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>