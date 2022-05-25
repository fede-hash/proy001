<?php

require("conexion.php");

 $payload = file_get_contents('php://input');
 $cliente = json_decode($payload,true);
 $hoy = date("m-d-y");

$contadoCliente = count($cliente[0]);
if ($contadoCliente == 4) {
   if ($cliente[0][3] === "Consumidor Final") {
    $nombreCompleto = $cliente[0][0]." ".$cliente[0][1];
    $stmt = $conexion->prepare('INSERT INTO num_facturas(documento,cliente,iva,num_dni,total,fecha)
    VALUES(:documento,:cliente,:iva,:num_dni,:total,:fecha)');
  $stmt->execute(array(
    ':documento' => 'FC',
    ':cliente' => $nombreCompleto,
    ':iva' => $cliente[0][3],
    ':num_dni' => $cliente[0][2],
    ':total' => $cliente[2],
    ':fecha' => $hoy
  ));
  }elseif ($cliente[0][3] === 'Monotributista' OR $cliente[0][3] === 'Responsable Inscripto' OR $cliente[0][3] === 'Exento') {
   $nombreCompleto = $cliente[0][0]." ".$cliente[0][1];
    $stmt = $conexion->prepare('INSERT INTO num_facturas(documento,cliente,iva,num_cuit,total,fecha)
  VALUES(:documento,:cliente,:iva,:num_cuit,:total,:fecha)');
  $stmt->execute(array(
    ':documento' => 'FC',
    ':cliente' => $nombreCompleto,
    ':iva' => $cliente[0][3],
    ':num_cuit' => $cliente[0][2],
    ':total' => $cliente[2],
    ':fecha' => $hoy
  ));
}
}elseif ($contadoCliente == 3) {
if ($cliente[0][2] == 'Monotributista' OR $cliente[0][2] == 'Responsable Inscripto' OR $cliente[0][2] == 'Exento') {
  $stmt = $conexion->prepare('INSERT INTO num_facturas(documento,cliente,iva,num_cuit,total,fecha)
  VALUES(:documento,:cliente,:iva,:num_cuit,:total,:fecha)');
  $stmt->execute(array(
    ':documento' => 'FC',
    ':cliente' => $cliente[0][0],
    ':iva' => $cliente[0][2],
    ':num_cuit' => $cliente[0][1],
    ':total' => $cliente[2],
    ':fecha' => $hoy
  ));
}
}

$consultaNueva = $conexion->prepare('SELECT * FROM num_facturas ORDER BY num_factura DESC LIMIT 1');
$consultaNueva->execute();
$resultado = $consultaNueva->fetch(PDO::FETCH_ASSOC);

$consultado2 = $conexion->prepare('INSERT INTO factura(codigo,descripcion,cantidad,precio,iva,total,tot_factura,num_factura)
   VALUES(:codigo, :descripcion, :cantidad, :precio, :iva, :total, :tot_factura, :num_factura)');

 foreach ($cliente[1] as &$key) {
   $consultado2->execute(array(
     ':codigo' => $key['codigo'],
     ':descripcion' => $key['descripcion'],
     ':cantidad' => $key['cantidad'],
     ':precio' => $key['precio'],
     ':iva' => $key['iva'],
     ':total' => $key['cantidad']*$key['precio'],
     ':tot_factura' => $resultado['total'],
      ':num_factura' => $resultado['num_factura']
   ));
 }

?>