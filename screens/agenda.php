<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <style>
    /* Agrega estilos CSS para lograr el efecto deseado */
    body {
      margin: 0;
      padding: 0;
      display: flex;
    }

    .container {
      width: 82%; /* El ancho restante para el contenido */
      padding-top: 2%;
      padding-left: 10%;
      padding-right: 10%;
    }

    .main {
      background-color: #f7f7f7; /* Cambia esto al color deseado para el fondo del contenido */
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-left: 30%;
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

    td{
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
  include_once "../components/sidebarDashboard.php";
?>

  <div class="container">

    <section class="main">
      <div class="main-top">
        <h1 >Agendar una cita</h1>
        </div>
        <div class="main-skills">
        <form action="../crud/insert/insertarAgenda.php" method="POST">
          <?php
          try {
            $conexion = new PDO('mysql:host=localhost;port=3306;dbname=petslife;', 'root', ''); 
            $vcedula = $_SESSION['cedula'];

            $query = $conexion->query("select cod_local from persona where cedula=".$vcedula."");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $row = $query->fetch();
            $vlocal= $row['cod_local'];

          } catch (PDOException $e) {
             echo "Fallo la conexión ".$e->getMessage();
          }
          ?>

            <table style="text-align: left">
              <tr>
                <th>Dueño:</th>
                <td>
                  <label for="dueño"><?php print $vcedula ?></label>
                </td>
              </tr>
              <tr>
                <th>Servicio:</th>
                  <td>
                    <?php 
                      try {
                        $consulta = $conexion->query("select id_servicio, descripcion from servicio where (id_servicio <> 0000 and id_servicio <> 0001)");
                        $consulta->setFetchMode(PDO::FETCH_ASSOC);
                        echo "<label for='servicio'></label>";
                        echo "<select id=servicio name=servicio>";
                        
                        while ($row = $consulta->fetch()) {
                          if ($vlocal == $row['id_servicio']){       
                            echo "<option value=".$row['id_servicio']." selected>".$row['descripcion']."</option>";
                          }
                          else{
                            echo "<option value=".$row['id_servicio'].">".$row['descripcion']."</option>";
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
                <th>Local:</th>
                  <td>
                    <?php 
                      try {
                        $consulta = $conexion->query("select id_local, nombre from local");
                        $consulta->setFetchMode(PDO::FETCH_ASSOC);
                        echo "<label for='local'></label>";
                        echo "<select id=local name=local>";
                        
                        while ($row = $consulta->fetch()) {
                          if ($vlocal == $row['id_local']){       
                            echo "<option value=".$row['id_local']." selected>".$row['nombre']."</option>";
                          }
                          else{
                            echo "<option value=".$row['id_local'].">".$row['nombre']."</option>";
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
                <th>Mascota:</th>
                <td>
                  <?php 
                    try {
                      $consulta = $conexion->query("select id_mascota, nombre from mascota where cod_dueño=".$vcedula."");
                      $consulta->setFetchMode(PDO::FETCH_ASSOC);
                      echo "<label for='mascota'></label>";
                      echo "<select id=mascota name=mascota>";
                      
                      while ($row = $consulta->fetch()) {
                        if ($vlocal == $row['id_mascota']){       
                          echo "<option value=".$row['id_mascota']." selected>".$row['nombre']."</option>";
                        }
                        else{
                          echo "<option value=".$row['id_mascota'].">".$row['nombre']."</option>";
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
                      <?php echo "<input type='hidden' id='cedula' name='cedula' value=".$vcedula.">"; ?>
                  </td>
              </tr>
              <tr>
                <th>Fecha:</th>
                <td>
                  <input type='date' id='fecha' name='fecha'>
                </td>
              </tr>
              <tr>
                <th>Hora:</th>
                <td>
                  <input type='time' id='hora' name='hora'>
                </td>
              </tr>
              <tr>
                <td style="padding-top: 5%;border:0px;">
                  <input class="testbutton" type="submit" value="Agendar cita">
                </td>
              </tr>
            </table>
        </form>
    </section>
  


  </div>
  <script>
    // Obtener los elementos select
    var servicioElement = document.getElementById('servicio');
    var localElement = document.getElementById('local');

    // Escuchar el evento change del primer select
    servicioElement.addEventListener('change', function() {
        // Obtener el valor seleccionado
        var selectedValue = servicioElement.value;

        // Realizar una solicitud AJAX para obtener la lista de locales
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'get_locales.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Parsear la respuesta JSON
                var locales = JSON.parse(xhr.responseText);

                // Limpiar el segundo select
                localElement.innerHTML = '';

                // Agregar las opciones basadas en la respuesta AJAX
                locales.forEach(function(local) {
                    var option = document.createElement('option');
                    option.value = local.id_local;
                    option.text = local.nombre;
                    localElement.add(option);
                });
            }
        };

        // Enviar la solicitud con el valor seleccionado
        xhr.send('servicio=' + selectedValue);
    });
</script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/e6fae3c345.js" crossorigin="anonymous"></script>
</body>
</html>