<?php 

require("conexion.php");

$consultaNueva = $conexion->prepare('SELECT * FROM num_facturas ORDER BY num_factura DESC LIMIT 1');
$consultaNueva->execute();
$resultado = $consultaNueva->fetch(PDO::FETCH_ASSOC);
echo json_encode($resultado['num_factura']);
 ?>