<?php

include_once "../../functions/conexion_petslife.php";

try {

$vcodigo=filter_var($_GET['code']);

$delete = $conexion->prepare("DELETE FROM local WHERE id_local= :codigo");

$delete->bindParam(':codigo', $vcodigo);

$delete->execute();

header("location: ../read/readLocal.php");

} catch (PDOException $e) {
    echo 'Error' . $e->getMessage();
}
?>