<?php

include_once "../../functions/conexion_petslife.php";

try {

$vcodigo=filter_var($_GET['code']);


$delete = $conexion->prepare("DELETE FROM servicio WHERE id_servicio= :codigo");

$delete->bindParam(':codigo', $vcodigo);

$delete->execute();

header("location: ../read/readServicio.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>