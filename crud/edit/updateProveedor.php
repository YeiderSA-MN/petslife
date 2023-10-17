<?php
try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', ''); 
 
} catch (PDOException $e) {

   echo "Fallo la conexión ".$e->getMessage();
}

try {
$vproveedor = filter_var($_POST['codigo']);
$vnombre = filter_var($_POST['nombre']);
$vubicacion = filter_var($_POST['ubicacion']);
$vciudad = filter_var($_POST['ciudad']);


$update = $conexion->prepare("UPDATE proveedor SET nombre= :proveedor,
ubicacion= :ubi, ciudad= :city WHERE id_proveedor= :codigo");


$update->bindParam(':codigo', $vproveedor);
$update->bindParam(':proveedor', $vnombre);
$update->bindParam(':ubi', $vubicacion);
$update->bindParam(':city', $vciudad);


$update->execute();

header("location: ../read/readProveedor.php");

} catch (PDOException $e) {
    //Error;
    echo 'Error' . $e->getMessage();
}
?>