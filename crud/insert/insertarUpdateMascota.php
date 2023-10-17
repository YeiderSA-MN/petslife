<?php
try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', ''); 
 
} catch (PDOException $e) {

   echo "Fallo la conexión".$e->getMessage();
}

try {

$vnombre = filter_var($_POST['mascota']);
$vdueno = filter_var($_POST['dueno']);
$vedad = filter_var($_POST['edad']);
$vraza = filter_var($_POST['raza']);
$venfermedad = filter_var($_POST['enfermedad']);
$vdiscapacidad = filter_var($_POST['discapacidad']);


$insert = $conexion->prepare("INSERT INTO mascota (nombre, cod_dueño, edad, raza, enfermedad, discapacidad) VALUES(:nombre,:dueno,:edad,:raza,:enfermedad,:discapacidad)");


$insert->bindParam(':nombre', $vnombre);
$insert->bindParam(':dueno', $vdueno);
$insert->bindParam(':edad', $vedad);
$insert->bindParam(':raza', $vraza);
$insert->bindParam(':enfermedad', $venfermedad);
$insert->bindParam(':discapacidad', $vdiscapacidad);


$insert->execute();

header("location: ../read/readMascota.php");

}catch (PDOException $e) {
  // Error;
  $error = $e->getCode();

  if ($error == 23000) { ?>
    <script>
      alert("Ese codigo ya existe");
      window.location.href = "insertarMascota.php";
    </script>
  <?php } else {
    echo 'Error' . $e->getMessage();
    echo 'Error' . $e->getCode();
    echo "<a href=insertarMascota.php>Volver</a>";
  }
}
?>