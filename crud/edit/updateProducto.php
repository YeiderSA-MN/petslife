<?php
try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', '');
 
} catch (PDOException $e) {

   echo "Fallo la conexión ".$e->getMessage();
}

try {
$vcodigo = filter_var($_POST['codigo']);
$vnombre = filter_var($_POST['nombre']);
$vdescripcion= filter_var($_POST['descripcion']);
$vprecio = filter_var($_POST['pu']);
$vmarca = filter_var($_POST['marca']);
$vproducto = filter_var($_POST['producto']);
$vfoto = filter_var($_POST['foto']);




$update = $conexion->prepare("UPDATE producto SET nombre= :nombre, precio=:precio,
descripcion= :descripcion, tipo_producto= :producto, marca= :marca, foto= :foto
WHERE id_producto= :codigo");


$update->bindParam(':codigo', $vcodigo);
$update->bindParam(':nombre', $vnombre);
$update->bindParam(':precio', $vprecio);
$update->bindParam(':producto', $vproducto);
$update->bindParam(':descripcion', $vdescripcion);
$update->bindParam(':foto', $vfoto);
$update->bindParam(':marca', $vmarca);




$update->execute();

header("location: ../read/readProducto.php");

} catch (PDOException $e) {
    echo 'Error' . $e->getMessage();
}
?>