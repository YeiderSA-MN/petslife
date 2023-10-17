<?php
try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', '');
} catch (PDOException $e) {

  echo "Fallo la conexión " . $e->getMessage();
}

try {
  $vcodigo = filter_var($_POST['codigo']);
  $vnombre = filter_var($_POST['nombre']);
  $vapellido = filter_var($_POST['apellido']);
  $vtipo_persona = filter_var($_POST['tipo_persona']);
  $vlocal = filter_var($_POST['local']);
  $vnumero = filter_var($_POST['numero']);



  $update = $conexion->prepare("UPDATE persona SET nombre= :nombre, numero= :numero, apellido= :apellido, cod_local= :local_, tipo_persona= :tipo_persona WHERE cedula= :codigo");


  $update->bindParam(':codigo', $vcodigo);
  $update->bindParam(':nombre', $vnombre);
  $update->bindParam(':tipo_persona', $vtipo_persona);
  $update->bindParam(':numero', $vnumero);
  $update->bindParam(':apellido', $vapellido);
  $update->bindParam(':local_', $vlocal);



  $update->execute();

  header("location: ../read/readPersona.php");

} catch (PDOException $e) {
  //Error;
  echo 'Error' . $e->getMessage();
}
?>