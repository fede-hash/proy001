<?php
require("conexion.php");

header('Content-type => application/json; charset=utf-8');
$payload = file_get_contents('php://input');
$devolucion = json_decode($payload, true);
$cliente = $devolucion[0]['datosFac'];
unset($devolucion[0]['datosFac']);

$consulta = $conexion->prepare("SELECT * FROM producto WHERE codigo = :codigo");
$producto = [];
for ($i=0; $i<count($devolucion);$i++) { 
	  $consulta->execute(array(':codigo' => $devolucion[$i]['articulo']));
	  $resultado1 = $consulta->fetch(PDO::FETCH_ASSOC);
	  array_push($producto, $resultado1);
}

// print_r($devolucion);
// print_r($producto);
// print_r($cliente);
// $consulta1 = $conexion->prepare("UPDATE factura SET cantidad = :cantidad WHERE num_factura = :numFactura AND WHERE codigo = :codigo");
?>