<?php
error_reporting(0);
header('Content-type => application/json; charset=utf-8');
$conexion = new mysqli('localhost', 'root', '', 'proyecto');

 		$respuesta1 = [];
if ($conexion->connect_errno) {
    $respuesta = [
        'error' => true
    ];
}else {
	$payload = file_get_contents('php://input');
	$numFactura = json_decode($payload);
	$numeroFactura = $numFactura[0];
	$articulo = $numFactura[1];
	$state = $conexion->prepare("SELECT * FROM producto WHERE codigo = '$articulo'");
    $state->execute();
    $resultado = $state->get_result();
    if ($resultado->num_rows >0) {
       	$state1 = $conexion->prepare("SELECT * FROM factura WHERE num_factura = '$numeroFactura' AND codigo = '$articulo'");
    	$state1->execute();
    	$resultado1 = $state1->get_result();
    	if ($resultado1->num_rows>0) {
   		    while ($fila = $resultado1->fetch_assoc()) {
		        $producto1 = [
		            'id' => $fila['id'],
		            'codigo' => $fila['codigo'],
		            'descripcion' => $fila['descripcion'],
		            'cantidad' => $fila['cantidad'],
		            'precio' => $fila['precio'],
		            'iva' => $fila['iva'],
		            'total' => $fila['total'],
		            'tot_factura' => $fila['tot_factura']
		        ];
		        array_push($respuesta1, $producto1);
		    }
		   echo json_encode($respuesta1);
    	}else{
    		$mensaje = "El articulo no pertenece a la factura original";
    		echo json_encode($mensaje);
    	}
    }else{
    	$mensaje = "el articulo no existe";
    	echo json_encode($mensaje);
    }
}
?>