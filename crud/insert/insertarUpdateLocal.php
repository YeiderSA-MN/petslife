<?php

try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', ''); 
 
} catch (PDOException $e) {

   echo "Fallo la conexión ".$e->getMessage();
}

try {

$vcodigo = filter_var($_POST['codigo']);
$vservicio = filter_var($_POST['servicio']);
$vnombre = filter_var($_POST['nombre']);
$vubicacion = filter_var($_POST['ubicacion']);
$vciudad = filter_var($_POST['ciudad']);
$vabierto = filter_var($_POST['abierto']);
$vcerrado = filter_var($_POST['cerrado']);




$update = $conexion->prepare("INSERT INTO local (id_servicio, nombre , ubicacion, ciudad , hora_cerrado, hora_abierto, id_local)
VALUES( :servicio,:nombre,:ubicacion,:ciudad,:cerrado,:abierto,:Codigo )");


$update->bindParam(':servicio', $vservicio);
$update->bindParam(':nombre', $vnombre);
$update->bindParam(':ubicacion', $vubicacion);
$update->bindParam(':ciudad', $vciudad);
$update->bindParam(':abierto', $vabierto);
$update->bindParam(':cerrado', $vcerrado);
$update->bindParam(':Codigo', $vcodigo);



$update->execute();

header("location: ../read/readLocal.php");

} catch (PDOException $e) {
  // Error;
  $error = $e->getCode();

  if ($error == 23000) { ?>
    <script>
      alert("Ese codigo ya existe");
      window.location.href = "insertarLocal.php";
    </script>
  <?php } else {
    echo 'Error' . $e->getMessage();
    echo 'Error' . $e->getCode();
    echo "<a href=insertarLocal.php>Volver</a>";
  }
}
