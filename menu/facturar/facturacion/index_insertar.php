<?php
require("conexion.php");

$codigo = $_GET['codigo'];
if(!$codigo==""){
  $consulta = $conexion->prepare("SELECT * FROM producto WHERE codigo = :codigo LIMIT 1");
  $consulta->execute(array(':codigo' => $codigo));
  $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
}
 echo json_encode($resultado);