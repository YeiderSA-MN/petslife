<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="../../styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <style>
    /* Agrega estilos CSS para lograr el efecto deseado */
    body {
      margin: 0;
      padding: 0;
      display: flex;
    }

    nav {
      width: 18%;
      /* Cambia esto al ancho deseado para el nav */
      background-color: #fff;
      /* Cambia esto al color deseado */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      z-index: 1;
    }

    .container {
      width: 82%;
      /* El ancho restante para el contenido */
      padding: 20px;
    }

    .main {
      background-color: #f7f7f7;
      /* Cambia esto al color deseado para el fondo del contenido */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    table {
      border-spacing: 5px;
    }

    td {
      border: 1px solid #DADBDB;
    }

    th {
      border: 1px solid;
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


  <div class="container">
    <form id="forma" name="forma" action="readServicio.php">
      <section class="main" style="margin-left: 40%;">
        <div class="main-top">
          <h1>Servicios</h1>
        </div>
        <div class="main-skills">

          <div class="main">
            <input type='text' id='buscar' name='buscar' placeholder='Buscar por id...'>
          </div>

          <div class="main">
            <input type="button" onclick="location.href='../insert/insertarServicio.php'" value="Insertar servicio">
          </div>


        </div>
        <div class="main-skills">
          <?php
          //Hay dos maneras para conectarse a la B de D:
          //1. MySQLi
          
          // Los datots se traen del srevidor local
          $mysql_host = 'localhost';
          // user name esr root
          $mysql_user = 'root';
          $password = '';

          // Esta es la funcion para conectarse usando el usuario y el password
          
          $dbhandle = mysqli_connect($mysql_host, $mysql_user, $password) or die('Problemas de conexion con BD');

          $selected = mysqli_select_db($dbhandle, 'petslife') or die('No se encontró el esquema');

          if (empty($_GET['buscar'])) {
            //si es vacia la opcion trae todo.
            $result = mysqli_query($dbhandle, "select id_servicio a, descripcion b from servicio ORDER BY id_servicio ASC;") or die(mysqli_error($dbhandle));

          } else {
            //sino, trae la opcion elegida
            $result = mysqli_query($dbhandle, "select id_servicio a, descripcion b from servicio where id_servicio like '%" . $_GET['buscar'] . "%' ORDER BY id_servicio ASC;") or die(mysqli_error($dbhandle));
            ;
            $vregistros = mysqli_num_rows($result);
            if ($vregistros == 0) {
              echo "no se encontraron registros";
            }
          }

          echo "<table>";
          echo "<tr><th>Id_servicio</th>
              <th>Servicio</th>
              <th>Editar</th>
              <th>Borrar</th>";


          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['a'] . "</td>";
            echo "<td>" . $row['b'] . "</td>";
            echo "<td><a href='../edit/editarServicio.php?code=" . $row['a'] . "'>Editar</a></td>";
            echo "<td><a href='#' onclick='preguntar(\"" . $row['a'] . "\")'>Borrar</a></td>";
            echo "</tr>\n";
          }
          ;
          echo "</table>
              <br>
              <br>";
          ?>
        </div>
  </div>
  </section>
  </form>
  </div>

  <script>
    function preguntar(valor) {
      eliminar = confirm("¿Deseas eliminar este registro?");
      if (eliminar)
        window.location.href = "../delete/borrarServicio.php?code=" + valor;
    }
  </script>

  <!-- Contenido del formulario ... -->


  <!-- ... otros scripts ... -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/e6fae3c345.js" crossorigin="anonymous"></script>
</body>

</html>