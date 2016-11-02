<?php session_start();
error_reporting(0);
include "usuarios.php";
include "direcciones.php";
$idUsuario=$_SESSION['id_usuario'];
$tipo_usuario=$_SESSION['tipo_usuario'];
$usuarios['nombre']=$_SESSION['nombre'];
$usuarios['usuario']=$_SESSION['usuario'];
$idCat=$_GET['ID'];
//$_SESSION['idCategoria']=$idCat;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categorias Super Alan</title>
	<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/hoja_estilos.css">
<body>
	<div class="container">
	<br>
		<nav class="navbar navbar-default" role="navigation"><!--Inicio de la barra de menu-->
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo $inicio; ?>"><img src="images/LOGO_SA.png" id="imagen"/></a>
				</div>
	
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?php echo $inicio; ?>">Inicio</a></li>
						<li><a href="#">Nosotros</a></li>
						<li><a href="#">Promociones</a></li>
						<li><a href="#">Sucursales</a></li>
						<li><a href="#">Contacto</a></li>

						<form class="navbar-form navbar-right" role="search">
							<div class="form-group">

								<input type="text" class="form-control" placeholder="Busque un producto">
							</div>
							<button type="submit" class="btn btn-default">Buscar</button>
						</form>

					</ul>
					<?php
					if($tipo_usuario==0)
					{
					?>
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo $registro ?>">Registrarse</a></li>
						<li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingresar<b class="caret"></b></a>
		                    <ul class="dropdown-menu login">
		                        <li>
		                           <div class="row">
		                              <div class="col-md-12">
		                                 <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" name="login" id="login" >
		                                    <div class="form-group">
		                                       <label class="sr-only" for="usuario"></label>
		                                       <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario" required>
		                                    </div>
		                                    <div class="form-group">
		                                       <label class="sr-only" for="contrasena"></label>
		                                       <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña" required>
		                                    </div>
		                                    <div class="form-group">
		                                       <button type="submit" id="ingreso"name="ingreso" class="btn btn-success btn-block">Ingresar</button>
		                                    </div>
		                                 </form>
		                              </div>
		                           </div>
		                        </li>
		                	</ul>
	                  	</li>
					</ul>
					<?php
					}
					if($tipo_usuario>0)
					{
					?>
						<!--<ul class="nav navbar-nav navbar-right"> 
							<li class="dropdown">
		                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <?php echo $usuarios['nombre'];?><b class="caret"></b></a
		                  	</li>
						</ul>-->
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $usuarios['nombre'];?> <b class="caret"></b></a>
		                    <ul class="dropdown-menu login">
		                        <li>
		                           <div class="row">
		                              <div class="col-md-12">

		                              <ul class="nav navbar-nav">
		                              <div class="col-md-12">
		                              	
		                              
		                              	<li class="dropdown"><a class="" href="perfilCliente.php">Mi perfil</a></li>
		                              	<li class="dropdown"><a class="" href="carrito.php">Carrito de compras</a></li>
		                        		<li class="dropdown"><a class="" href="#">Otros</a></li>
		                              </div>
		                              </ul>
										<form class="form" role="form" method="post" action="salir.php" accept-charset="UTF-8" name="login" id="login" >
											<div class="form-group">
												<button type="submit" id="salir"name="salir" class="btn btn-warning btn-block">Salir</button>
											</div>
		                              </div>
		                           </div>
		                        </li>
		                	</ul>
	                  	</li>
					</ul>

					<?php
					}
					?>

				</div><!-- /.navbar-collapse -->
			</div>
		</nav> <!--Termina el menu de inicio-->


	        <div class="col-lg-12 col-md-12 col-sm-9 col-xs-12">
	        	<div class="form-group">
<h1>Categorias</h1>

	<?php   
		$o=new Usuarios;
		$art = $o->categorias();

		$totalProductos=mysql_num_rows($art);
		if ($totalProductos)
		{
			while ($a = mysql_fetch_array($art))
			{

				$idCat=$a['id_categoria_producto'];
	?>
		        		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
		        			
			       				
			       				<div class="caption">
			       					<h3 class="titulo"><?php echo $a['nombre']; ?></h3>
			       					
			       					<p>
			       						<a class="btn btn-info botonProducto" href="listado.php?ID=<?php echo $idCat;?>">Ver mas</a>
			       					</p>
			       				
			       				</div>
		        		
		        		</div>
				<?php 
			}
		}
		else
		{
			echo "No hay productos";
		}
		?>
	          </div>
	        </div>
    	</div>
	<script src="../lib/jquery/jquery-2.1.4.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>