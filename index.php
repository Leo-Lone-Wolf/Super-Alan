<?php session_start();
error_reporting(0);
include "usuarios.php";
include "direcciones.php";


$idUsuario=$_SESSION['id_usuario'];
$tipo_usuario=$_SESSION['tipo_usuario'];
$usuarios['nombre']=$_SESSION['nombre'];
$usuarios['usuario']=$_SESSION['usuario'];
$objseU=new Usuarios;
$selU = $objseU->editP($idUsuario);
$seleU = mysql_fetch_array($selU);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inicio Super Alan</title>
	<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/hoja_estilos.css">

	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="engine0/style.css" />
	<script type="text/javascript" src="engine0/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section --></head>
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
					if(!isset($usuarios['nombre']))
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
					?>
					
					<?php
					//if($tipo_usuario>0)
					if(isset($usuarios['nombre']))
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

		<?php 
		/*$objseUP=new Usuarios;
		$selUP = $objseUP->editUP($idUsuario);
		$seleUPer = mysql_fetch_array($selUP);*/
		if($tipo_usuario==1)
		{
		?>
		<div class="col-lg-3">
			<h3>Gerente</h3>
			<div class="list-group">
				<a href="#" class="list-group-item">
					Usuarios
				</a>
				<a href="#" class="list-group-item">
					Compras
				</a>
				<a href="#" class="list-group-item">
					Ventas
				</a>
				<a href="#" class="list-group-item">
					Proveedores
				</a>
				<a href="#" class="list-group-item">
					Reportes
				</a>
				<a href="#" class="list-group-item">
					Otros
				</a>
			</div>
		</div>
		<?php 
		}
		
		?>
	
		<div class="col-lg-3">
			<h3>Categorias</h3>
			<div class="list-group">

			<?php 
			$o=new Usuarios;
			$art = $o->catProductos();
			while ($a = mysql_fetch_array($art))
			{	
				$idCat=$a['id_categoria_producto'];
			?>
				<a href="listado.php?ID=<?php echo $idCat; ?>" class="list-group-item"><?php echo $a['nombre'];?></a>
			<?php 
			}
			?>
				<a href="categorias.php" class="list-group-item">Ver mas...</a>
			</div>

		</div>
	
	<div class="col-lg-9"><!--En prueba-->

	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container0">
	<div class="ws_images"><ul>
		<li><a href="<?php echo $productos; ?>"><img src="data0/images/0.jpg" alt="wowslider" title="0" id="wows0_0"/></a></li>
		<li><a href="<?php echo $productos; ?>"><img src="data0/images/1.jpg" alt="1" title="1" id="wows0_1"/></a></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="0"><span><img src="data0/tooltips/0.jpg" alt="0"/>1</span></a>
		<a href="#" title="1"><span><img src="data0/tooltips/1.jpg" alt="1"/>2</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">wowslider.com</a> by WOWSlider.com v8.7</div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="engine0/wowslider.js"></script>
	<script type="text/javascript" src="engine0/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
	</div>
 </form>
	<script src="../lib/jquery/jquery-2.1.4.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>