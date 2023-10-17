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
        <h1>Insertar servicio</h1>
      </div>
      <div class="main-skills">
        <form action="insertarUpdateServicio.php" method="POST">
          <?php
          try {
            $conexion = new PDO('mysql:host=localhost;port=3306;dbname=petslife;', 'root', '');

          } catch (PDOException $e) {
            echo "Fallo la conexión " . $e->getMessage();
          }

          ?>

          <table style="text-align: left">
            <tr>
              <th>Codigo servicio:</th>
              <td>
                <?php echo "<input type='text' id='codigo' name='codigo' value=''>"; ?>
              </td>
            </tr>
            <tr>
              <th>Descripcion servicio:</th>
              <td>
                <?php echo "<input type='text' id='descripcion' name='descripcion' value=''>"; ?>
              </td>
            </tr>
            <tr>
              <td style="padding-top: 5%;border:0px;">
                <input class="testbutton" type="submit" value="Insertar Servicio">
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