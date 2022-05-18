<?php session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $codigo = $_POST['codigo_articulo'];
    $descripcion = $_POST['descripcion_articulo'];
    $ean = $_POST['codigo_ean'];
    $bultos_articulo = $_POST['bultos_articulo'];
    $unidades_articulo = $_POST['unidades_articulo'];
    $precio_articulo = $_POST['precio_articulo'];
    $margen_articulo = $_POST['margen_articulo'];
 /*$correcto = true; verifica si todos en todos los campos se ingresaron datos*/ 
    if (empty($codigo) or empty($descripcion) or empty($ean) or empty($bultos_articulo) or empty($unidades_articulo) or empty($precio_articulo) or empty($margen_articulo)) {
        $error = true;
        }else{
           /* realizar conexion */
           try{
             $conex = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
                }catch (PDOException $e) {
                                echo "Error:" . $e->getMessage();
                                        }
            /*    if ($conex) {
                    $conexion = true;
                } verifica conexion */
// verificar ese input para que ingrese el campo checked 
                if (isset($_POST['radio1'])) {
                    $iva = $_POST['radio1'];
            $consulta = $conex->prepare("INSERT INTO producto (codigo, descripcion, ean, stock, factor, precio, margen, iva) VALUES (:codigo, :descripcion, :ean, :stock, :factor, :precio, :margen, :iva)");
                $consulta->execute(array(
                    ':codigo' => $codigo,
                    ':descripcion' => $descripcion,
                    ':ean' => $ean,
                    ':stock' => $bultos_articulo,
                    ':factor' => $unidades_articulo,
                    ':precio' => $precio_articulo,
                    ':margen' => $margen_articulo,
                    ':iva' => $iva
                ));
                $insertar = $consulta->fetch();
             
                }
             }
        }

require "asset/head.php";
require "asset/body.php";
require "asset/footer.php"; 

?>