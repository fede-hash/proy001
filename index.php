<?php session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: menu/index.php');
	die();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	if ($usuario && $password) {
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}
	$consulta = $conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario AND password = :password');
	$consulta->execute(array(':usuario' => $usuario, ':password' => $password));
	$resultado = $consulta->fetch();
	if ($resultado !== false) {
		$usuario = $_SESSION['usuario'];
		header('Location: menu/index.php');
	}else{
		$error = true;
	}
	}else{
		$incompleto = true;
	}
}
require 'asset/head.php';
require 'asset/body.php';
require 'asset/footer.php';
?>