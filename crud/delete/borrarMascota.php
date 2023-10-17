<?php

include_once "../../functions/conexion_petslife.php";

try {

$vcodigo=filter_var($_GET['code']);


$delete = $conexion->prepare("DELETE FROM mascota WHERE id_mascota= :codigo");

$delete->bindParam(':codigo', $vcodigo);

$delete->execute();

header("location: ../read/readMascota.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>