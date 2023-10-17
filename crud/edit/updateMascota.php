<?php

include_once "../../functions/conexion_petslife.php";

try {
$vcodigo = filter_var($_POST['codigo']);
$vnombre = filter_var($_POST['nombre']);
$vdueno = filter_var($_POST['dueno']);
$vedad = filter_var($_POST['edad']);
$vraza = filter_var($_POST['raza']);
$venfermedad = filter_var($_POST['enfermedad']);
$vdiscapacidad = filter_var($_POST['discapacidad']);


$update = $conexion->prepare("UPDATE mascota SET nombre= :nombre, cod_dueño=:dueno, edad= :edad, raza= :raza, enfermedad= :enfermedad, discapacidad= :discapacidad WHERE id_mascota= :codigo");


$update->bindParam(':codigo', $vcodigo);
$update->bindParam(':nombre', $vnombre);
$update->bindParam(':dueno', $vdueno);
$update->bindParam(':edad', $vedad);
$update->bindParam(':raza', $vraza);
$update->bindParam(':enfermedad', $venfermedad);
$update->bindParam(':discapacidad', $vdiscapacidad);


$update->execute();

header("location: ../read/readMascota.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>