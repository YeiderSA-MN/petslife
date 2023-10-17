<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../../styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <style>
    /* Agrega estilos CSS para lograr el efecto deseado */
    body {
      margin: 0;
      padding: 0;
      display: flex;
    }

    nav {
      width: 18%; /* Cambia esto al ancho deseado para el nav */
      background-color: #fff; /* Cambia esto al color deseado */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      z-index: 1;
    }

    .container {
      width: 82%; /* El ancho restante para el contenido */

    }

    .main {
      background-color: #f7f7f7; /* Cambia esto al color deseado para el fondo del contenido */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    table {
      border-spacing: 5px;
    }

    td{
      border: 1px solid #DADBDB;
    }

    th{
      border: 1px solid ;
      padding: 0.5rem;
    }

    /* ... otros estilos ... */
  </style>
</head>
<body>

<?php
  session_start();
  include_once "../../components/sidebarCruds.php";
?>

<?php
 if($_SESSION['tipo_persona']=="1"){ ?>
  <div class="container">
  <form id="forma" name="forma" action="readMascota.php">
    <section class="main">
      <div class="main-top">
        <h1>Mascota</h1>
        </div>
        <div class="main-skills">

        <div class="main">
        <input type='text' id='buscar' name='buscar' placeholder='Buscar por dueño...'>
        </div>
      
        <div class="main">
        <input type="button" onclick="location.href='../insert/insertarMascota.php'" value="Insertar mascota">
        </div>

      
        </div>
        <div class="main-skills">
        <?php

          $mysql_host = 'localhost';
          $mysql_user = 'root';
          $password = '';

          $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexion con BD');

          $selected = mysqli_select_db($dbhandle, 'petslife') or die('No se encontró el esquema');

          if (empty($_GET['buscar'])){       
            //si es vacia la opcion trae todo.
              $result = mysqli_query($dbhandle,"select a.id_mascota a, a.nombre b, b.nombre c, a.edad d, c.descripcion e, d.descripcion f, e.descripcion g from mascota a, persona b, raza c, enfermedad d, discapacidad e where b.cedula=a.cod_dueño and a.raza=c.cod_raza and a.enfermedad=d.cod_enfermedad and a.discapacidad=e.cod_discapacidad ORDER BY a.nombre ASC;") or die( mysqli_error($dbhandle));
              
            }
            else{
              //sino, trae la opcion elegida
              $result = mysqli_query($dbhandle,"select a.id_mascota a, a.nombre b, b.nombre c, a.edad d, c.descripcion e, d.descripcion f, e.descripcion g from mascota a, persona b, raza c, enfermedad d, discapacidad e where b.cedula=a.cod_dueño and a.raza=c.cod_raza and a.enfermedad=d.cod_enfermedad and a.discapacidad=e.cod_discapacidad and b.nombre like '%".$_GET['buscar']."%' ORDER BY a.nombre ASC;") or die( mysqli_error($dbhandle));

              $vregistros=mysqli_num_rows($result);
              if ($vregistros==0){
                echo "no se encontraron registros";
            }
          }  

          ?>

          <table>
          <tr>
          <th>Nombre</th>
          <th>Dueño</th>
          <th>Edad</th>
          <th>Raza</th>
          <th>Enfermedad</th>
          <th>Discapacidad</th>
          <th>Editar</th>
          <th>Borrar</th>


          <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
              {
                  echo "<tr>";
                  echo "<td>".$row['b']."</td>";
                  echo "<td>".$row['c']."</td>";
                  echo "<td>".$row['d']."</td>";
                  echo "<td>".$row['e']."</td>";
                  echo "<td>".$row['f']."</td>";
                  echo "<td>".$row['g']."</td>";
                  echo "<td><a href='../edit/editarMascota.php?code=".$row['a']."'>Editar</a></td>";
                  echo "<td><a href='#' onclick='preguntar(\"".$row['a']."\")'>Borrar</a></td>";
                  echo "</tr>\n";


              };
          echo "</table>
          <br>
          <br>";


        }else{
          ?>

<div class="container">
  <form id="forma" name="forma" action="readMascota.php">
    <section class="main">
      <div class="main-top">
        <h1>Mascota</h1>
        </div>
        <div class="main-skills">

        <div class="main">
        <input type='text' id='buscar' name='buscar' placeholder='Buscar por nombre...'>
        </div>
        
        <div class="main">
        <input type="button" onclick="location.href='../insert/insertarMascota.php'" value="Insertar mascota">
        </div>

      
        </div>
        <div class="main-skills">
        <?php

          $mysql_host = 'localhost';
          $mysql_user = 'root';
          $password = '';

          $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexion con BD');

          $selected = mysqli_select_db($dbhandle, 'petslife') or die('No se encontró el esquema');

          if (empty($_GET['buscar'])){       
            //si es vacia la opcion trae todo.
              $result = mysqli_query($dbhandle,"select a.id_mascota a, a.nombre b, b.nombre c, a.edad d, c.descripcion e, d.descripcion f, e.descripcion g from mascota a, persona b, raza c, enfermedad d, discapacidad e where b.cedula=a.cod_dueño and a.raza=c.cod_raza and a.enfermedad=d.cod_enfermedad and a.discapacidad=e.cod_discapacidad and a.cod_dueño='".$_SESSION['cedula']."' ORDER BY a.nombre ASC;") or die( mysqli_error($dbhandle));
              $vregistros=mysqli_num_rows($result);
              if ($vregistros==0){
                echo "no se encontraron registros";
              } 
            }
            else{
              //sino, trae la opcion elegida
              $result = mysqli_query($dbhandle,"select a.id_mascota a, a.nombre b, b.nombre c, a.edad d, c.descripcion e, d.descripcion f, e.descripcion g from mascota a, persona b, raza c, enfermedad d, discapacidad e where b.cedula=a.cod_dueño and a.raza=c.cod_raza and a.enfermedad=d.cod_enfermedad and a.discapacidad=e.cod_discapacidad and a.cod_dueño='".$_SESSION['cedula']."' and a.nombre like '%".$_GET['buscar']."%' ORDER BY a.nombre ASC;") or die( mysqli_error($dbhandle));

              $vregistros=mysqli_num_rows($result);
              if ($vregistros==0){
                echo "no se encontraron registros";
            }
          }  

          ?>

          <table>
          <tr>
          <th>Nombre</th>
          <th>Dueño</th>
          <th>Edad</th>
          <th>Raza</th>
          <th>Enfermedad</th>
          <th>Discapacidad</th>
          <th>Editar</th>
          <th>Borrar</th>


          <?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
              {
                  echo "<tr>";
                  echo "<td>".$row['b']."</td>";
                  echo "<td>".$row['c']."</td>";
                  echo "<td>".$row['d']."</td>";
                  echo "<td>".$row['e']."</td>";
                  echo "<td>".$row['f']."</td>";
                  echo "<td>".$row['g']."</td>";
                  echo "<td><a href='../edit/editarMascota.php?code=".$row['a']."'>Editar</a></td>";
                  echo "<td><a href='#' onclick='preguntar(\"".$row['a']."\")'>Borrar</a></td>";
                  echo "</tr>\n";


              };
          echo "</table>
          <br>
          <br>";
?>

<?php } ?>

        </div>
      </div>
    </section>
    </form>
  </div>

  <script>
    function preguntar(valor){
      eliminar = confirm("¿Deseas eliminar este registro?");
      if (eliminar)
        window.location.href = "../delete/borrarMascota.php?code=" + valor;
    }
  </script>

    <!-- Contenido del formulario ... -->
  

  <!-- ... otros scripts ... -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/e6fae3c345.js" crossorigin="anonymous"></script>
</body>
</html>