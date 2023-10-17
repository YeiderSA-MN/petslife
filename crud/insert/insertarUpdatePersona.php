<?php
try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', '');

} catch (PDOException $e) {

  echo "Fallo la conexión " . $e->getMessage();
}

try {
  $vnombre = filter_var($_POST['nombre']);
  $vapellido = filter_var($_POST['apellido']);
  $vpassword = filter_var($_POST['pass']);
  $vcedula = filter_var($_POST['cedula']);
  $vlocal = filter_var($_POST['local']);
  $vnumero = filter_var($_POST['numero']);
  $vtipo_persona = filter_var($_POST['tipo_persona']);


  $update = $conexion->prepare("INSERT INTO persona (nombre, cedula, password, numero, apellido, cod_local, tipo_persona) VALUES (:nombre,:cedula,:password,:numero,:apellido,:local_, :tipo_persona)");



  $update->bindParam(':nombre', $vnombre);
  $update->bindParam(':cedula', $vcedula);
  $update->bindParam(':password', $vpassword);
  $update->bindParam(':numero', $vnumero);
  $update->bindParam(':tipo_persona', $vtipo_persona);
  $update->bindParam(':apellido', $vapellido);
  $update->bindParam(':local_', $vlocal);



  $update->execute();

  header("location: ../read/readPersona.php");

} catch (PDOException $e) {
  // Error;
  $error = $e->getCode();

  if ($error == 23000) { ?>
    <script>
      alert("Esa cédula ya existe");
      window.location.href = "insertarPersona.php";
    </script>
  <?php } else {
    echo 'Error' . $e->getMessage();
    echo 'Error' . $e->getCode();
    echo "<a href=insertarPersona.php>Volver</a>";
  }

}
?>