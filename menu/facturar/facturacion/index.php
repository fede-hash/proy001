<?php
require "asset/head.php";
require "asset/body.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$buscar_dni = $_POST['buscar_dni'];
$buscar_cuit = $_POST['buscar_cuit'];
$buscar_razon = $_POST['buscar_razon_social'];

if (empty($buscar_dni) && empty($buscar_cuit) && empty($buscar_razon)) {
   echo "<div class='mt-4 w-50 mx-auto text-center alert alert-danger' role='alert'><h5 class='text-center text-dark my-auto mx-auto'>COMPLETA TODOS LOS CAMPOS<i class='fas fa-times mx-3'></i></h5></div>";
                         }elseif($buscar_dni){    
        try{
             $conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
        }catch (PDOException $e) {
             echo "Error:" . $e->getMessage();
                                 }
        /* verificacion de que el cliente  exista */
         $consulta = $conex->prepare('SELECT * FROM clientes WHERE dni = :dni LIMIT 1');
         $consulta->execute(array(':dni' => $buscar_dni));   /* cargar consulta busqueda por dni*/
         $resultado = $consulta->fetch();
         if ($resultado) {
                      require('cliente/factura.php');
                        }else{
                echo "<div class='mt-4 w-50 mx-auto text-center alert alert-danger' role='alert'><h5 class='text-center text-dark my-auto mx-auto'>NO EXISTEN RESULTADOS<i class='fas fa-times mx-3'></i></h5></div>";
            }
        }elseif($buscar_cuit){            
            try{
            $conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
            }catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
                                 }
        /* verificacion de que el cliente  exista */
            $consulta = $conex->prepare('SELECT * FROM clientes WHERE cuit = :cuit LIMIT 1');
            $consulta->execute(array(':cuit' => $buscar_cuit));   /* cargar consulta busqueda por dni*/
            $resultado = $consulta->fetch();
            if ($resultado) {
                require('cliente/factura.php');
            }else{
                echo "<div class='mt-4 w-50 mx-auto text-center alert alert-danger' role='alert'><h5 class='text-center text-dark my-auto mx-auto'>NO EXISTEN RESULTADOS<i class='fas fa-times mx-3'></i></h5></div>";
            }
        }elseif($buscar_razon){
            try{
            $conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
            }catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
                                 }
        /* verificacion de que el cliente  exista */
            $consulta = $conex->prepare('SELECT * FROM clientes WHERE razon_social = :razon_social LIMIT 1');
            $consulta->execute(array(':razon_social' => $buscar_razon));   /* cargar consulta busqueda por dni*/
            $resultado = $consulta->fetch();
            if ($resultado) {
                require('cliente/factura.php');
            }else{
                echo "<div class='mt-4 w-50 mx-auto text-center alert alert-danger' role='alert'><h5 class='text-center text-dark my-auto mx-auto'>NO EXISTEN RESULTADOS<i class='fas fa-times mx-3'></i></h5></div>";
            }
        }
}
?>