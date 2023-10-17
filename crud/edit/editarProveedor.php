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
      padding-left: 12%;
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
      background: #F1FFCC;
      background: linear-gradient(to top, #F1FFCC, #BFC2A3);
    }

    .testbutton:hover {
      color: #000000 !important;
      background: #BFC2A3;
      background: linear-gradient(to top, #BFC2A3, #F1FFCC);
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
        <h1>Editar Proveedor</h1>
      </div>
      <div class="main-skills">
        <form action="updateproveedor.php" method="POST">
          <?php
          try {
            $conexion = new PDO('mysql:host=localhost;port=3306;dbname=petslife;', 'root', '');

          } catch (PDOException $e) {
            echo "Fallo la conexión " . $e->getMessage();
          }

          $vcodigo = filter_var($_GET['code']);

          try {

            $bpais = $conexion->query("select id_proveedor, nombre, ubicacion, ciudad from proveedor where id_proveedor='" . $vcodigo . "'");
            $bpais->setFetchMode(PDO::FETCH_ASSOC);

            $row = $bpais->fetch();

            $vnombre = $row['nombre'];
            $vubicacion = $row['ubicacion'];
            $vciudad = $row['ciudad'];
            $vproveedor = $row['id_proveedor'];

          } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();
          }
          ?>

          <table style="text-align: left">
            <tr>
              <th>Codigo proveedor:</th>
              <td>
                <?php echo "<input type='text' name='codigo' id='codigo' value=" . $vcodigo . " disabled>"; ?>
              </td>
            </tr>
            <tr>
              <th>Nombre proveedor:</th>
              <td>
                <?php echo "<input type='text' id='nombre' name='nombre' value=" . $vnombre . ">"; ?>
              </td>
            </tr>
            <tr>
              <th>Ubicacion:</th>
              <td>
                <?php echo "<input type='text' id='ubicacion' name='ubicacion' value='" . htmlspecialchars($vubicacion, ENT_QUOTES) . "'>"; ?>
              </td>
            </tr>
            <tr>
              <th>Ciudad:</th>
              <td>
                <?php
                try {
                  $consulta = $conexion->query("select id_ciudad, nombre from ciudad");
                  $consulta->setFetchMode(PDO::FETCH_ASSOC);
                  echo "<label for='ciudad'></label>";
                  echo "<select id=ciudad name=ciudad>";

                  while ($row = $consulta->fetch()) {
                    if ($vciudad == $row['id_ciudad']) {
                      echo "<option value=" . $row['id_ciudad'] . " selected>" . $row['nombre'] . "</option>";
                    } else {
                      echo "<option value=" . $row['id_ciudad'] . ">" . $row['nombre'] . "</option>";
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
              <th></th>
              <td>
                <?php echo "<input type='hidden' name='codigo' id='codigo' value=" . $vcodigo . ">" ?>
              </td>
            </tr>
            <tr>
              <td style="padding-top: 5%;border:0px;">
                <input class="testbutton" type="submit" value="Actualizar Proveedor">
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