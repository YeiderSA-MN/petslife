<?php

error_reporting(0);
session_start();

$total = 0;
$subtotal = 0;

include_once "../functions/conexion_petslife.php";
$action = isset($_GET['action']) ? $_GET['action'] : "";

if ($action == 'addcart' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = "SELECT * FROM producto WHERE id_producto=:codigo";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam('codigo', $_POST['codigo']);
    $stmt->execute();
    $product = $stmt->fetch();

    $cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 1;
    if ($cantidad < 1) {
        $cantidad = 1;
    }

    if (isset($_SESSION['products'][$_POST['codigo']])) {
        $_SESSION['products'][$_POST['codigo']]['cantidad'] += $cantidad;
    } else {
        $_SESSION['products'][$_POST['codigo']] = array(
            'cantidad' => $cantidad,
            'name' => $product['nombre'],
            'image' => $product['foto'],
            'price' => $product['precio'],
            'descripcion' => $product['descripcion']
        );
    }

    $product = null;
    header("Location:tienda.php");
}

if ($action == 'emptyall') {
    $_SESSION['products'] = array();
    unset($_SESSION['products']);
    header("Location:tienda.php");
}

if ($action == 'remove' && isset($_GET['codigo']) && isset($_GET['cantidad'])) {
    $codigo = $_GET['codigo'];
    $cantidadToRemove = intval($_GET['cantidad']);

    if (isset($_SESSION['products'][$codigo]) && $_SESSION['products'][$codigo]['cantidad'] >= $cantidadToRemove) {
        $_SESSION['products'][$codigo]['cantidad'] -= $cantidadToRemove;

        if ($_SESSION['products'][$codigo]['cantidad'] <= 0) {
            unset($_SESSION['products'][$codigo]);
        }
    }

    header("Location:tienda.php");
    exit;
}

$query = "SELECT * FROM producto";
$stmt = $conexion->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Productos</title>
    <link rel="stylesheet" href="../styles/style.css" />
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
            text-align: center;
        }

        th {
            border: 1px solid;
            padding: 0.5rem;

        }

        /* ... otros estilos ... */
    </style>
</head>

<body>
    <div class="container">

        <?php include_once "../components/sidebarDashboard.php"; ?>

        <section class="main">
            <div>
                <h1>Productos</h1>
            </div>
            <div class="main-skills"></div>
            <div>
                <?php if (!empty($_SESSION['products'])): ?>
                    <div class="container-fluid pull-left" style="width:300px;">
                        <div class="navbar-header">
                            <h3 class="navbar-brand" style="color:#000000;">Carrito de Compras</h3>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-top:7px;margin-right:7px;"><a href="tienda.php?action=emptyall"
                            style="background-color: #FAD2AA;" class="btn btn-info">Vaciar carrito</a></div>
                    <div class="pull-right" style="margin-top:7px;margin-right:7px;"><a href="carrito2_petslife.php"
                            style="background-color: #DEFAAA;" class="btn btn-info">Ir a pagar</a></div>

                    <br><br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Articulo</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <?php foreach ($_SESSION['products'] as $key => $product): ?>
                            <? $subtotal = 0; ?>
                            <tr>
                                <td>
                                    <img src="<?php print $product['image'] ?>" width="50">
                                </td>
                                <td>
                                    <?php print $product['name'] ?>
                                </td>
                                <td>
                                    <?php print $product['descripcion'] ?>
                                </td>
                                <?php $subtotal = $subtotal + $product['price'] * $product['cantidad']; ?>
                                <td style="text-align:center;  font-weight: bold; font-size: 16px">
                                    $
                                    <?php print number_format($product['price'], 0, ',', '.') ?>
                                </td>
                                <td style="text-align:center;  font-weight: bold; color:green; font-size: 18px">
                                    <?php print $product['cantidad'] ?>
                                </td>
                                <td style="text-align:center;  font-weight: bold; font-size: 16px">
                                    $
                                    <?php print number_format($subtotal, 0, ',', '.') ?>
                                </td>

                                <?php $subtotal = 0; ?>

                                <td>
                                    <form method="get" action="tienda.php">
                                        <input type="hidden" name="action" value="remove">
                                        <input type="hidden" name="codigo" value="<?php echo $key ?>">
                                        <input type="number"
                                            style="text-align:center;  font-weight: bold; color:red; font-size: 18px"
                                            name="cantidad" value="1" min="1" max="<?php echo $product['cantidad'] ?>">
                                        <button type="submit" class="btn btn-info">Eliminar</button>
                                    </form>
                                </td>
                            </tr>

                            <?php $total = $total + $product['price'] * $product['cantidad']; ?>
                        <?php endforeach; ?>
                        <tr>

                            <td colspan="5" align="right">
                                <br><br>
                                <h4 style="text-align:right;color:green;font-size:22px">
                                    Total a pagar : $
                                    <?php print number_format($total, 0, ',', '.') ?>
                                </h4>
                            </td>
                        </tr>
                    </table>
                <?php endif; ?>
                <br>
                <div>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Artículo</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Añadir cantidad</th>
                                </tr>
                            </thead>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td>
                                        <img src="<?php print $product['foto'] ?>" width="70">
                                    </td>
                                    <td>
                                        <?php print $product['nombre'] ?>
                                    </td>
                                    <td>
                                        <?php print $product['descripcion'] ?>
                                    </td>
                                    <td style="text-align:center;  font-weight: bold; font-size: 16px">
                                        $
                                        <?php print number_format($product['precio'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <form method="post" action="tienda.php?action=addcart">
                                            <div class="input-group">
                                                <input type="number"
                                                    style="text-align:center;  font-weight: bold; color:red; font-size: 18px"
                                                    name="cantidad" class="form-control" value="1" min="1">
                                                <input type="hidden" name="codigo"
                                                    value="<?php print $product['id_producto'] ?>">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-warning">Añadir al carrito</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
</body>
<script src="https://kit.fontawesome.com/e6fae3c345.js" crossorigin="anonymous"></script>

</html>