<?php
try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', '');
 
} catch (PDOException $e) {

  echo "Fallo la conexión ".$e->getMessage();

}

try {
$vservicio = filter_var($_POST['codigo']);
$vdescripcion = filter_var($_POST['descripcion']);


$update = $conexion->prepare("UPDATE servicio SET descripcion= :descrip WHERE id_servicio= :servicio");


$update->bindParam(':servicio', $vservicio);
$update->bindParam(':descrip', $vdescripcion);


$update->execute();

header("location: ../read/readServicio.php");

} catch (PDOException $e) {
  echo 'Error' . $e->getMessage();
}
?>