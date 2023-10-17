<?php
try {

  $conexion = new PDO('mysql:host=localhost;dbname=petslife;', 'root', ''); 
 
} catch (PDOException $e) {

   echo "Fallo la conexión ".$e->getMessage();
}

try {
$vcodigo = filter_var($_POST['codigo']);
$vnombre = filter_var($_POST['nombre']);
$vubi= filter_var($_POST['ubicacion']);
$vciudad = filter_var($_POST['ciudad']);





$insertar = $conexion->prepare("insert into proveedor (id_proveedor,nombre, ubicacion, ciudad)
values(:code,:nombre,:ubi,:ciudad)");


$insertar->bindParam(':code', $vcodigo);
$insertar->bindParam(':nombre', $vnombre);
$insertar->bindParam(':ubi', $vubi);
$insertar->bindParam(':ciudad', $vciudad);


$insertar->execute();

header("location: ../read/readProveedor.php");

} catch (PDOException $e) {
  // Error;
  $error = $e->getCode();

  if ($error == 23000) { ?>
    <script>
      alert("Ese codigo ya existe");
      window.location.href = "insertarProveedor.php";
    </script>
  <?php } else {
    echo 'Error' . $e->getMessage();
    echo 'Error' . $e->getCode();
    echo "<a href=insertarProveedor.php>Volver</a>";
  }
}
?>