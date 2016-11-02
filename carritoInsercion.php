<?php
include("carritoFuncion.php");
$ID=$_SESSION['idArticulo'];
$cantidad=$_POST["cantidad"];
$precio=$_SESSION['precio'];

$_SESSION['ocarrito']->introduce_producto($ID,$cantidad,$precio);
header("Location: carrito.php");

?>
<html>
<head>
	<title>Introduce Producto</title>
</head>

<body>
<?php
$_SESSION["ocarrito"]->imprime_carrito();
?>
Producto introducido.
<br>
<br>
<a href="index.php">- Volver</a>
<br>
<br>
<a href="ver_carrito.php">- Ver carrito</a>

</body>
</html>