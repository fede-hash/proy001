
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$fecha_reg = $_POST['fecha_ingreso'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$error = '';
		if (empty($nombre) or empty($apellido) or empty($fecha_reg) or empty($usuario) or empty($password)) {
			$error = "1";
			}
		if ($nombre) {
			if ($apellido) {
				if ($fecha_reg) {
					if ($usuario) {
							try{
 							$conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
 							}catch (PDOException $e) {
								echo "Error:" . $e->getMessage();
													}
		/* verificacion de que el usuario ya exista */
$consulta = $conex->prepare('SELECT * FROM usuario WHERE usuario = :usuario LIMIT 1');
$consulta->execute(array(':usuario' => $usuario));
	$resultado = $consulta->fetch();
		if ($resultado) {
		$error_1 = '1';
						}else{
							if (isset($_POST['radio1'])) {
							$tarea = $_POST['radio1'];

	$insertar = $conex->prepare('INSERT INTO usuario (
		nombre, apellido, usuario, password, tarea) VALUES (:nombre, :apellido, :usuario, :password, :tarea)');
	$insertar->execute(array(
		':nombre' => $nombre,
		':apellido' => $apellido,
		':usuario' => $usuario,
		':password' => $password,
		':tarea' => $tarea
	));

			$insertar_fin = $insertar->fetch();													
								}else{
									$permisos = true;
									}
				     }

					}
				}
			   }
			}
		}
				
require 'asset/head.php';
require 'asset/body.php';
require 'asset/footer.php';

?>
