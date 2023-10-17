<?php
try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', '');

} catch (PDOException $e) {

  echo "Fallo la conexión " . $e->getMessage();
}

try {
  $vproducto = filter_var($_POST['producto']);
  $vcantidad = filter_var($_POST['cantidad']);
  $vpu = filter_var($_POST['pu']);
  $vproveedor = filter_var($_POST['proveedor']);


  $update = $conexion->prepare("UPDATE proveedor_producto SET id_producto= :producto, cantidad= :canti, precio_unitario= :pu WHERE id_proveedor= :codigo");


  $update->bindParam(':codigo', $vproveedor);
  $update->bindParam(':producto', $vproducto);
  $update->bindParam(':canti', $vcantidad);
  $update->bindParam(':pu', $vpu);


  $update->execute();

  header("location: tablas.php");

} catch (PDOException $e) {
  //Error;
  echo 'Error' . $e->getMessage();
}
?>