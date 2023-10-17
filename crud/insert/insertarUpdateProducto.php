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
    $vprecio = filter_var($_POST['precio']);
    $vproducto = filter_var($_POST['producto']);
    $vmarca = filter_var($_POST['marca']);
    $vfoto = filter_var($_POST['imagen']);

    $insertar = $conexion->prepare("INSERT INTO producto (id_producto, nombre, precio, descripcion, tipo_producto, marca, foto) VALUES (:code, :nombre, :precio, :descripcion, :producto, :marca, :foto)");
    
    $insertar->bindParam(':code', $vcodigo);
    $insertar->bindParam(':nombre', $vnombre);
    $insertar->bindParam(':precio', $vprecio);
    $insertar->bindParam(':producto', $vproducto);
    $insertar->bindParam(':descripcion', $vdescripcion);
    $insertar->bindParam(':marca', $vmarca);
    $insertar->bindParam(':foto', $vfoto);
    
    $insertar->execute();
    

    header("location: ../read/readProducto.php");

}catch (PDOException $e) {
    // Error;
    $error = $e->getCode();
  
    if ($error == 23000) { ?>
      <script>
        alert("Ese codigo ya existe");
        window.location.href = "insertarProducto.php";
      </script>
    <?php } else {
      echo 'Error' . $e->getMessage();
      echo 'Error' . $e->getCode();
      echo "<a href=insertarProducto.php>Volver</a>";
    }
}
?>
