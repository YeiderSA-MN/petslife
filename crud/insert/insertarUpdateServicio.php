<?php
try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', '');
 
} catch (PDOException $e) {

   echo "Fallo la conexión ".$e->getMessage();
}

try {

$vservicio = filter_var($_POST['codigo']);
$vdescripcion = filter_var($_POST['descripcion']);

$insertar = $conexion->prepare("insert into servicio (id_servicio,descripcion) values(:servicio,:descrip)");

$insertar->bindParam(':servicio', $vservicio);
$insertar->bindParam(':descrip', $vdescripcion);


$insertar->execute();

header("location: ../read/readServicio.php");

} catch (PDOException $e) {

  $error = $e->getCode();

  if ($error == 23000) { ?>
    <script>
      alert("Ese codigo ya existe");
      window.location.href = "insertarServicio.php";
    </script>
  <?php } else {
    echo 'Error' . $e->getMessage();
    echo 'Error' . $e->getCode();
    echo "<a href=insertarServicio.php>Volver</a>";
  }
}
?>