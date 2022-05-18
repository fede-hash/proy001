<?php
require("conexion.php");
header('Content-type => application/json; charset=utf-8');
$payload = file_get_contents('php://input');
$numFactura = json_decode($payload);
$consulta = $conexion->prepare("SELECT * FROM num_facturas WHERE num_factura = :numFactura");
$consulta->execute(array(':numFactura' => $numFactura));
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);
if ($resultado) {
 	echo json_encode($resultado);	
}else{
	echo json_encode("no hay resultados");
}
?>