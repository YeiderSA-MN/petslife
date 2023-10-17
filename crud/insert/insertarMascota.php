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
    }

    .container {
      width: 82%;
      /* El ancho restante para el contenido */
      padding-top: 2%;
      padding-left: 15%;
    }

    .main {
      background-color: #f7f7f7;
      /* Cambia esto al color deseado para el fondo del contenido */
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .testbutton {
      font-family: helvetica;
      color: #000000 !important;
      font-size: 14px;
      text-shadow: 1px 1px 0px #968F95;
      box-shadow: 1px 1px 1px #A8A8A8;
      padding: 10px 25px;
      border-radius: 7px;
      border: 1px solid #000000;
      background: #F27529;
      background: linear-gradient(to top, #F27529, #BFC2A3);
    }

    .testbutton:hover {
      color: #000000 !important;
      background: #BFC2A3;
      background: linear-gradient(to top, #BFC2A3, #F27529);
    }

    td {
      text-align: left;
      padding-left: 80%;
    }

    .main-skills td {
      width: auto;
    }
  </style>
</head>

<body>

  <?php
  session_start();
  include_once "../../components/sidebarCruds.php";
  ?>

  <div class="container">

    <section class="main">
      <div class="main-top">
        <h1>Insertar mascota</h1>
      </div>
      <div class="main-skills">
        <form action="insertarUpdateMascota.php" method="POST">
          <?php
          try {
            $conexion = new PDO('mysql:host=localhost;port=3306;dbname=petslife;', 'root', '');

          } catch (PDOException $e) {
            echo "Fallo la conexión " . $e->getMessage();
          }

          ?>

          <table style="text-align: left">
            <tr>
              <th>Nombre mascota:</th>
              <td>
                <?php echo "<input type='text' id='mascota' name='mascota' value=''>"; ?>
              </td>
            </tr>
            <tr>
              <th>Edad mascota:</th>
              <td>
                <?php echo "<input type='number' id='edad' name='edad' value=''>"; ?>
              </td>
            </tr>
            <tr>
              <th>Raza mascota:</th>
              <td>
                <?php
                try {
                  $consulta = $conexion->query("select cod_raza, descripcion from raza");
                  $consulta->setFetchMode(PDO::FETCH_ASSOC);
                  echo "<label for='raza'></label>";
                  echo "<select id=raza name=raza>";

                  while ($row = $consulta->fetch()) {
                    if ($vraza == $row['cod_raza']) {
                      echo "<option value=" . $row['cod_raza'] . " selected>" . $row['descripcion'] . "</option>";
                    } else {
                      echo "<option value=" . $row['cod_raza'] . ">" . $row['descripcion'] . "</option>";
                    }
                  }
                  echo "</select>";

                } catch (PDOException $e) {
                  echo 'Error' . $e->getMessage();
                }
                ?>

              </td>
            </tr>
            <tr>
              <th>Dueño mascota:</th>
              <td>
                <?php
                if ($_SESSION['tipo_persona'] == "1") {
                  try {
                    $consulta = $conexion->query("select cedula from persona");
                    $consulta->setFetchMode(PDO::FETCH_ASSOC);
                    echo "<label for='dueno'></label>";
                    echo "<select id=dueno name=dueno>";

                    while ($row = $consulta->fetch()) {
                      if ($vpersona == $row['cedula']) {
                        echo "<option value=" . $row['cedula'] . " selected>" . $row['cedula'] . "</option>";
                      } else {
                        echo "<option value=" . $row['cedula'] . ">" . $row['cedula'] . "</option>";
                      }
                    }
                    echo "</select>";

                  } catch (PDOException $e) {
                    echo 'Error' . $e->getMessage();
                  }
                } else {
                  try {
                    echo "<label for='dueno'></label>";
                    echo "<select id=dueno name=dueno>";
                    echo "<option value=" . $_SESSION['cedula'] . " selected>" . $_SESSION['cedula'] . "</option>";
                    echo "</select>";
                  } catch (PDOException $e) {
                    echo 'Error' . $e->getMessage();
                  }
                }
                ?>
              </td>
            </tr>
            <tr>
              <th>Enfermedad mascota:</th>
              <td>
                <?php
                try {
                  $consulta = $conexion->query("select cod_enfermedad, descripcion from enfermedad");
                  $consulta->setFetchMode(PDO::FETCH_ASSOC);
                  echo "<label for='enfermedad'></label>";
                  echo "<select id=enfermedad name=enfermedad>";

                  while ($row = $consulta->fetch()) {
                    if ($venfermedad == $row['cod_enfermedad']) {
                      echo "<option value=" . $row['cod_enfermedad'] . " selected>" . $row['descripcion'] . "</option>";
                    } else {
                      echo "<option value=" . $row['cod_enfermedad'] . ">" . $row['descripcion'] . "</option>";
                    }
                  }
                  echo "</select>";

                } catch (PDOException $e) {
                  echo 'Error' . $e->getMessage();
                }
                ?>

              </td>
            </tr>
            <tr>
              <th>Discapacidad mascota:</th>
              <td>
                <?php
                try {
                  $consulta = $conexion->query("select cod_discapacidad, descripcion from discapacidad");
                  $consulta->setFetchMode(PDO::FETCH_ASSOC);
                  echo "<label for='discapacidad'></label>";
                  echo "<select id=discapacidad name=discapacidad>";

                  while ($row = $consulta->fetch()) {
                    if ($vdiscapacidad == $row['cod_discapacidad']) {
                      echo "<option value=" . $row['cod_discapacidad'] . " selected>" . $row['descripcion'] . "</option>";
                    } else {
                      echo "<option value=" . $row['cod_discapacidad'] . ">" . $row['descripcion'] . "</option>";
                    }
                  }
                  echo "</select>";

                } catch (PDOException $e) {
                  echo 'Error' . $e->getMessage();
                }
                ?>

              </td>
            </tr>
            <tr>
              <td style="padding-top: 5%;border:0px;">
                <input class="testbutton" type="submit" value="Insertar Mascota">
              </td>
            </tr>
          </table>
        </form>
    </section>



  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/e6fae3c345.js" crossorigin="anonymous"></script>
</body>

</html>