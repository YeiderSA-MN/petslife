<?php
// Conexión a la base de datos (debes ajustar esto según tu configuración)
$pdo = new PDO("mysql:host=localhost;dbname=petslife", "root", "");

// Obtener el valor del servicio seleccionado
$servicioSeleccionado = $_POST['servicio'];

// Consulta para obtener los locales basados en el servicio seleccionado
$sql = "SELECT id_local, nombre FROM local WHERE id_servicio = :servicio";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':servicio', $servicioSeleccionado);
$stmt->execute();

// Crear un array con las opciones
$locales = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $locales[] = $row;
}

// Devolver la lista de locales como JSON
echo json_encode($locales);
?>