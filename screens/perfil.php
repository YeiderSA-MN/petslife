<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  
</head>
<body>
  <?php
    session_start();
  ?>
  <div class="container">

    <?php include_once "../components/sidebarDashboard.php"; ?>

    <section class="main">
        <center>
        <div>
          <?php
             include_once "../functions/conexion_petslife.php";
             
             $consulta = "SELECT a.nombre, a.apellido, a.cedula, a.password, a.tipo_persona, a.numero, b.descripcion , a.cod_local FROM persona a, tipo_persona b WHERE a.tipo_persona = b.tipo_persona AND a.cedula = :cedula";
             
             $result = $conexion->prepare($consulta);
             $result->bindParam(":cedula", $_SESSION['cedula'], PDO::PARAM_STR);
             $result->execute();
             $row = $result->fetchAll(PDO::FETCH_ASSOC);
             
             foreach ($row as $filas) {
                 echo "<h1>Bienvenido " . $_SESSION['nombre'] . ", usted es " . $filas['descripcion'] . "</h1>";
             }
             
            ?>
        </div>
        </center>
      <div class="main-top">
      <h1>Opciones</h1>
      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fa-solid fa-dog fa-bounce"></i>
          <h3>Mis mascotas</h3>
          <button onclick="location.href='../crud/read/readMascota.php'">Editar</button>
        </div>
        <div class="card">
          <i class="fa-solid fa-user fa-bounce"></i>
          <h3>Mis registros</h3>
          <button onclick="location.href='registros.php'">Editar</button>
        </div>
      </div>

      

    </section>
  </div>
</body>
<script src="https://kit.fontawesome.com/e6fae3c345.js" crossorigin="anonymous"></script>
</html>
