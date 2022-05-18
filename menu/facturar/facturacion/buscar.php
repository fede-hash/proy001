<?php
error_reporting(0);
header('Content-type => application/json; charset=utf-8');
$conexion = new mysqli('localhost', 'root', '', 'proyecto');
if ($conexion->connect_errno) {
    $respuesta = [
        'error' => true
    ];
}else {
    if (isset($_GET['descripcion'])) {
    $descripcion = $_GET['descripcion'];       
    $conexion->set_charset("utf8");
    $state = $conexion->prepare("SELECT * FROM producto WHERE descripcion LIKE '%$descripcion%'");
    $state->execute();
    $resultado = $state->get_result();
    $respuesta = [];
    while ($fila = $resultado->fetch_assoc()) {
        $producto = [
            'id' => $fila['id'],
            'codigo' => $fila['codigo'],
            'descripcion' => $fila['descripcion'],
            'ean' => $fila['ean'],
            'stock' => $fila['stock'],
            'factor' => $fila['factor'],
            'precio' => $fila['precio'],
            'margen' => $fila['margen'],
            'iva' => $fila['iva']
        ];
        array_push($respuesta, $producto);
    }
   echo json_encode($respuesta);
    }
}
?>