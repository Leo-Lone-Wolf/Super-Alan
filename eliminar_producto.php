<?
include("carritoFuncion.php");
$_SESSION["ocarrito"]->elimina_producto($_GET["linea"]);
header("Location: carrito.php");
?>