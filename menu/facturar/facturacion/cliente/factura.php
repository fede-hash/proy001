<?php
$bus_dni = $_POST['buscar_dni'];
$bus_cuit = $_POST['buscar_cuit'];
$bus_razon_social = $_POST['buscar_razon_social'];

if ($resultado['iva'] === 'exento' && $bus_cuit) {
		if ($resultado['razon_social']) {
				$cliente = 'Exento';
				require('exento_razon_social.php');
		}elseif($resultado['nombre'] && $resultado['apellido']){
				$cliente = 'Exento';
				require('exento.php');
		}
}elseif ($resultado['iva'] === 'exento' && $bus_razon_social) {
	if ($resultado['razon_social']) {
				$cliente = 'Exento';
				require('exento_razon_social.php');
		}elseif($resultado['nombre'] && $resultado['apellido']){
				$cliente = 'Exento';
				require('exento.php');
		}
}elseif ($resultado['iva'] === 'responsable_inscripto' && $bus_cuit) {
		if ($resultado['razon_social']) {
				$cliente = 'Responsable Inscripto';
				require('responsable_inscripto_razon_social.php');
		}elseif($resultado['nombre'] && $resultado['apellido']){
				$cliente = 'Responsable Inscripto';
				require('responsable_inscripto.php');
		}
}elseif($resultado['iva'] === 'responsable_inscripto' && $bus_razon_social){
if ($resultado['razon_social']) {
				$cliente = 'Responsable Inscripto';
				require('responsable_inscripto_razon_social.php');
		}elseif($resultado['nombre'] && $resultado['apellido']){
				$cliente = 'Responsable Inscripto';
				require('responsable_inscripto.php');
		}
}elseif ($resultado['iva'] === 'monotributista' && $bus_cuit) {
	$cliente = 'Monotributista';
	require('monotributista.php');
}elseif ($resultado['iva'] === 'consumidor_final') {
	$cliente = 'Consumidor Final';
	require('consumidor_final.php');
}

?>





 



