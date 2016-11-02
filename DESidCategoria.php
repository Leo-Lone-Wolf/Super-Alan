<?php session_start();
include "usuarios.php";
include "direcciones.php";
$idCat=$_GET['ID'];
$_SESSION['idCategoria']=$idCat;
echo $_SESSION['idCategoria'];
header("Location: listado.php");
?>