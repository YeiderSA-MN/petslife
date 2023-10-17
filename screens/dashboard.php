<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  
</head>
<?php
  session_start();
  include_once "../functions/conexion_petslife.php";
?>
<body>
  <div class="container">
    <?php include_once "../components/sidebarDashboard.php"; ?>

    <section class="main">
        <center>
        <div>
          <?php
              $consulta = "SELECT a.nombre nomb, a.apellido, a.cedula, a.password, a.tipo_persona,
              a.numero, b.descripcion , a.cod_local
              FROM persona a, tipo_persona b
              WHERE a.tipo_persona=b.tipo_persona and a.cedula=".$_SESSION['cedula']."";

              $result=$conexion->prepare($consulta);
              $result->execute();
              $row=$result->fetchAll(PDO::FETCH_ASSOC);

              foreach($row as $filas){
                echo "<h1>Bienvenido ".$_SESSION['nombre'].", usted es ".$filas['descripcion']."</h1>";
              }
            ?>
        </div>
        </center>
      <div class="main-top">
      <h1>Tablas</h1>
      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fa-solid fa-dog fa-bounce"></i>
          <h3>Mascota</h3>
          <button onclick="location.href='../crud/read/readMascota.php'">Editar</button>
        </div>
        <div class="card">
          <i class="fa-solid fa-user fa-bounce"></i>
          <h3>Persona</h3>
          <button onclick="location.href='../crud/read/readPersona.php'">Editar</button>
        </div>
        <div class="card">
          <i class="fa-solid fa-shop fa-bounce"></i>
          <h3>Local</h3>
          <button onclick="location.href='../crud/read/readLocal.php'">Editar</button>
        </div>
      </div>

      
      <div class="main-skills">
        <div class="card">
          <i class="fa-solid fa-spa fa-bounce"></i>
          <h3>Servicio</h3>
          <button onclick="location.href='../crud/read/readServicio.php'">Editar</button>
        </div>
        <div class="card">
          <i class="fa-solid fa-money-bill fa-bounce"></i>
          <h3>Producto</h3>
          <button onclick="location.href='../crud/read/readProducto.php'">Editar</button>
        </div>
        <div class="card">
          <i class="fa-solid fa-truck fa-bounce"></i>
          <h3>Proveedor</h3>
          <button onclick="location.href='../crud/read/readProveedor.php'">Editar</button>
        </div>
      </div>

    </section>
  </div>
</body>
<script src="https://kit.fontawesome.com/e6fae3c345.js" crossorigin="anonymous"></script>
</html>
