<?php

header('Content-type => application/json; charset=utf-8');

$payload = file_get_contents('php://input');
$usuario = json_decode($payload,true);

$conexion = new mysqli('localhost', 'root', '', 'proyecto');
if ($conexion->connect_errno) {
    $respuesta = [
        'error' => true
    ];
}

$gerente = "gerente";
$subGerente = "sub_gerente";

$consulta = $conexion->prepare("SELECT * FROM usuario WHERE usuario = '$usuario[0]' AND password = '$usuario[1]' AND tarea = '$gerente'");
$consulta->execute();
$resultado = $consulta->fetch();
if ($resultado) {
	$data = true;
	echo json_encode($data);
}else{
	$consulta = $conexion->prepare("SELECT * FROM usuario WHERE usuario = '$usuario[0]' AND password = '$usuario[1]' AND tarea = '$subGerente'");
$consulta->execute();
$resultado = $consulta->fetch();
	if ($resultado) {
		$data = true;
		 echo json_encode($data);
		 }else{
	$data = false;
	 echo json_encode($data);
		}
}
