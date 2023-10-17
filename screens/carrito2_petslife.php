<?php
error_reporting(0);
//Setting session start
session_start();


$total = 0;
$subtotal = 0;

include_once "../functions/conexion_petslife.php";

$products = $_SESSION['products'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>A pagar!</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
  <center>
    <h1> Resumen de Compra </h1>
  </center>
  <br>

  <div class="container" style="width:600px;">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Articulo</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <?php foreach ($_SESSION['products'] as $key => $product): ?>
        <tr>
          <td><img src="<?php print $product['image'] ?>" width="50"></td>
          <td>
            <?php print $product['name'] ?>
          </td>
          <td>$
            <?php print number_format($product['price'], 0, ',', '.') ?>
          </td>
          <td style="text-align:center;  font-weight: bold; color:green; font-size: 18px">
            <?php print $product['cantidad'] ?>
          </td>
          <?php $subtotal = $subtotal + $product['price'] * $product['cantidad']; ?>
          <td style="text-align:center;  font-weight: bold; font-size: 16px">$
            <?php print number_format($subtotal, 0, ',', '.') ?>
          </td>
          <?php $subtotal = 0; ?>
        </tr>
        <?php $total = $total + $product['price'] * $product['cantidad']; ?>
      <?php endforeach; ?>
      <tr>
        <td colspan="5" align="right">
          <h4 style="text-align:right;color:green;font-size:22px">Total a Pagar: $
            <?php print number_format($total, 0, ',', '.') ?>
          </h4>
        </td>
      </tr>
    </table>




    <?php


    try {
      $bpais = $conexion->query("select nombre a, apellido b, numero c, cedula d from persona WHERE cedula='" . $_SESSION['cedula'] . "'");
      $bpais->setFetchMode(PDO::FETCH_ASSOC);

      $row = $bpais->fetch();

      $vnombre = $row['a'];
      $vapellido = $row['b'];
      $vnumero = $row['c'];
      $vcedula = $row['d'];

    } catch (PDOException $e) {
      echo 'Error' . $e->getMessage();
    }
    ?>

    <?php
    if (isset($_SESSION['loggedin'])) { ?>
      <center>
        <table style="text-align: left">
          <h2>INFORMACIÓN DEL COMPRADOR</h2>
          <tr>
            <th style="padding-right: 10px;">Cedula de la persona: </th>
            <td>
              <?php echo $vcedula ?>
            </td>
          </tr>
          <tr>
            <th style="padding-right: 70px;">Nombre persona: </th>
            <td>
              <?php echo $vnombre ?>
            </td>
          </tr>
          <tr>
            <th style="padding-right: 10px;">Apellido persona: </th>
            <td>
              <?php echo $vapellido ?>
            </td>
          </tr>
          <tr>
            <th style="padding-right: 10px;">Numero persona: </th>
            <td>
              <?php echo $vnumero ?>
            </td>
          </tr>
          </tr>
        </table>

        <?php
    }
    ?>
      <br><br>
      <input type="button" onclick="location.href='../index.php'" value="Volver al inicio">

      <input type="button" onclick="location.href='tienda.php'" value="Volver al carrito">
      <?php
      if (isset($_SESSION['loggedin'])) { ?>
        <input type="button" onclick="location.href='../index.php'" value="Confirmar compra">
        <?php
      } else { ?>
        <input type="button" onclick="location.href='loginRegistro.php'" value="Iniciar sesion">
        <?php
      }

      ?>

      <br><br>
    </center>
  </div>
</body>

</html>