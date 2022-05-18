<?php session_start();

if (isset($_SESSION['usuario'])) {
    header('Locaction: index.php');
}
require "asset/head.php";
require "asset/body.php";
require "asset/footer.php";

 ?>