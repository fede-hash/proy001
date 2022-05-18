
<?php
$cliente = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = $_POST['nombre_cliente'];
	$apellido = $_POST['apellido_cliente'];
	$direccion = $_POST['domicilio_cliente'];
	$localidad = $_POST['localidad_cliente'];
	$telefono = $_POST['telefono_cliente'];
	$email = $_POST['email_cliente']; 
	/* verificar que todos los campos esten completos */
	if (empty($nombre) or empty($apellido) or empty($direccion) or empty($localidad) or empty($telefono) or empty($email)){
		$error = true;
	}else{
		if (!isset($_POST['input'])) {
			$error = true;
			}else{
				$iva = $_POST['input'];
				if ($iva === "DNI") {
					// si es dni se ejecuta esa secuencia //
					if ($_POST['iva'] === "consumidor_final") {
				// se define DNI + CONSUMIDOR FINAL//
						$cond_iva = $_POST['iva'];
						$num_dni = $_POST['input_dni'];
						try{
							$conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
 							}catch (PDOException $e) {
								echo "Error:" . $e->getMessage();
							}
							$consulta = $conex->prepare('SELECT * FROM clientes WHERE dni = :dni LIMIT 1');
							$consulta->execute(array(':dni' => $num_dni));
							$resultado = $consulta->fetch();
							if ($resultado) {
										$existe = true;
						                     }else{
							$insertar = $conex->prepare('INSERT INTO clientes (nombre, apellido, dni, direccion, localidad, iva, telefono, email) VALUES (:nombre, :apellido, :dni, :direccion, :localidad, :iva, :telefono, :email)');
								$insertar->execute(array(
									':nombre' => $nombre,
									':apellido' => $apellido,
									':dni' => $num_dni,
									':direccion' => $direccion,
									':localidad' => $localidad,
									':iva' => $cond_iva,
									':email' => $email,
									':telefono' => $telefono
								));
									$insertar_fin = $insertar->fetch();	
									$correcto = true;
								}
					/* ----------------------------------------------*/
						}					
			}elseif ($iva === "CUIT"){
				// se define CUIT //
				if ($_POST['iva'] === "monotributista") {
					// se define CUIT + MONOTRIBUTISTA //
					$cond_iva = $_POST['iva'];
					$num_cuit = $_POST['input_cuit'];
					try{
							$conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
 							}catch (PDOException $e) {
								echo "Error:" . $e->getMessage();
							}
							$consulta = $conex->prepare('SELECT * FROM clientes WHERE cuit = :cuit LIMIT 1');
							$consulta->execute(array(':cuit' => $num_cuit));
							$resultado = $consulta->fetch();
							if ($resultado) {
										$existe = true;
						 }else{
							$insertar = $conex->prepare('INSERT INTO clientes (nombre, apellido, cuit, direccion, localidad, iva, telefono, email) VALUES (:nombre, :apellido, :cuit, :direccion, :localidad, :iva, :telefono, :email)');
								$insertar->execute(array(
									':nombre' => $nombre,
									':apellido' => $apellido,
									':cuit' => $num_cuit,
									':direccion' => $direccion,
									':localidad' => $localidad,
									':iva' => $cond_iva,
									':email' => $email,
									':telefono' => $telefono
								));
									$insertar_fin = $insertar->fetch();	
									$correcto = true;
								}
				}elseif ($_POST['iva'] === "responsable_inscripto") {
					if ($_POST['razon_social_cliente']) {
							$cond_iva = $_POST['iva'];
							$num_cuit = $_POST['input_cuit'];
							$razon_social = $_POST['razon_social_cliente'];
							try{
								$conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
 								}catch (PDOException $e) {
									echo "Error:" . $e->getMessage();
								}
						$consulta = $conex->prepare('SELECT * FROM clientes WHERE cuit = :cuit LIMIT 1');
						$consulta->execute(array(':cuit' => $num_cuit));
						$resultado = $consulta->fetch();
						if ($resultado) {
								$existe = true;
					                     }else{
								$insertar = $conex->prepare('INSERT INTO clientes (nombre, apellido, cuit, razon_social, direccion, localidad, iva, telefono, email) VALUES (:nombre, :apellido, :cuit, :razon_social, :direccion, :localidad, :iva, :telefono, :email)');
								$insertar->execute(array(':nombre' => $nombre,':apellido' => $apellido,
									':cuit' => $num_cuit,
									':razon_social' => $razon_social,
									':direccion' => $direccion,
									':localidad' => $localidad,
									':iva' => $cond_iva,
									':email' => $email,
									':telefono' => $telefono));
									$insertar_fin = $insertar->fetch();	
									$correcto = true;
								}
					}else{
							$cond_iva = $_POST['iva'];
						$num_cuit = $_POST['input_cuit'];
						try{
						$conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
 						}catch (PDOException $e) {
							echo "Error:" . $e->getMessage();
						}
						$consulta = $conex->prepare('SELECT * FROM clientes WHERE cuit = :cuit LIMIT 1');
						$consulta->execute(array(':cuit' => $num_cuit));
						$resultado = $consulta->fetch();
				if ($resultado) {
								$existe = true;
					                     }else{
					$insertar = $conex->prepare('INSERT INTO clientes (nombre, apellido, cuit, direccion, localidad, iva, telefono, email) VALUES (:nombre, :apellido, :cuit, :direccion, :localidad, :iva, :telefono, :email)');
					$insertar->execute(array(':nombre' => $nombre,':apellido' => $apellido,
									':cuit' => $num_cuit,
									':direccion' => $direccion,
									':localidad' => $localidad,
									':iva' => $cond_iva,
									':email' => $email,
									':telefono' => $telefono));
									$insertar_fin = $insertar->fetch();	
									$correcto = true;
					}
				}
			}elseif ($_POST['iva'] === "exento") {
					if ($_POST['razon_social_cliente']) {
						$cond_iva = $_POST['iva'];
						$num_cuit = $_POST['input_cuit'];
						$razon_social = $_POST['razon_social_cliente'];
							try{
						$conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
 						}catch (PDOException $e) {
							echo "Error:" . $e->getMessage();
						}
						$consulta = $conex->prepare('SELECT * FROM clientes WHERE cuit = :cuit LIMIT 1');
						$consulta->execute(array(':cuit' => $num_cuit));
						$resultado = $consulta->fetch();
						if ($resultado) {
								$existe = true;
					                     }else{
								$insertar = $conex->prepare('INSERT INTO clientes (nombre, apellido, cuit, razon_social, direccion, localidad, iva, telefono, email) VALUES (:nombre, :apellido, :cuit, :razon_social, :direccion, :localidad, :iva, :telefono, :email)');
								$insertar->execute(array(':nombre' => $nombre,':apellido' => $apellido,
									':cuit' => $num_cuit,
									':razon_social' => $razon_social,
									':direccion' => $direccion,
									':localidad' => $localidad,
									':iva' => $cond_iva,
									':email' => $email,
									':telefono' => $telefono));
									$insertar_fin = $insertar->fetch();	
									$correcto = true;
								}
							
			
						}else{
								$cond_iva = $_POST['iva'];
						$num_cuit = $_POST['input_cuit'];
						try{
						$conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
 						}catch (PDOException $e) {
							echo "Error:" . $e->getMessage();
						}
						$consulta = $conex->prepare('SELECT * FROM clientes WHERE cuit = :cuit LIMIT 1');
						$consulta->execute(array(':cuit' => $num_cuit));
						$resultado = $consulta->fetch();
				if ($resultado) {
								$existe = true;
					                     }else{
					$insertar = $conex->prepare('INSERT INTO clientes (nombre, apellido, cuit, direccion, localidad, iva, telefono, email) VALUES (:nombre, :apellido, :cuit, :direccion, :localidad, :iva, :telefono, :email)');
					$insertar->execute(array(':nombre' => $nombre,':apellido' => $apellido,
									':cuit' => $num_cuit,
									':direccion' => $direccion,
									':localidad' => $localidad,
									':iva' => $cond_iva,
									':email' => $email,
									':telefono' => $telefono));
									$insertar_fin = $insertar->fetch();	
									$correcto = true;
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
