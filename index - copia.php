<?php session_start();
error_reporting(0);
include "usuarios.php";
include "direcciones.php";

if(isset($_POST['ingreso']))//Codigo para envio de datos al servidor
{
	$usuario=$_POST["usuario"];
	$contrasena=$_POST["contrasena"];

	$objseU=new Usuarios;//Objeto para hacer la consulta de usuario y contraseña
	$uyp = $objseU->login($usuario,$contrasena);
	$usuarios=mysql_fetch_array($uyp);

	if($usuario==$usuarios['usuario'] && $contrasena==$usuarios['contrasena'])
	{
		setcookie("usuarioNombre", $usuarios["usuario"], time()+60,"/");
		$_SESSION['idUsuario']=$usuarios['id_usuario'];
		$_SESSION['nombre']=$usuarios['nombre'];
		$_SESSION['nombreUsuario']=$usuarios['usuario'];//Se utilizara???
		$tipo_usuario=$_SESSION['tipo_usuario']=$usuarios['tipo_usuario'];		
	}
	else
	{
		echo '<script languaje=javascript>';
		echo "alert('usuario o contraseña incorrecta');";
		echo 'window.location="index.php";';
		echo '</script>';
	}
}

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
						<li class="active"><a href="#">Inicio</a></li>
						<li><a href="<?php echo $registro; ?>">Nosotros</a></li>
						<li><a href="#">Promociones</a></li>
						<li><a href="#">Sucursales</a></li>
						<li><a href="#">Contacto</a></li>
						<li><a href="#"><?$_COOKIE["usuarioNombre"];?></a></li>
					</ul>
					<?php
					if($tipo_usuario==0)
					{
				echo"<ul class='nav navbar-nav navbar-right'>
						<li><a href='$registro'>Registrarse</a></li>
						<li class='dropdown'>
	                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Ingresar<b class='caret'></b></a>
		                    <ul class='dropdown-menu login'>
		                        <li>
		                           <div class='row'>
		                              <div class='col-md-12'>
		                                 <form class='form' role='form' method='post' action='index.php' accept-charset='UTF-8' name='datosIngreso' >
		                                    <div class='form-group'>
		                                       <label class='sr-only' for='usuario'></label>
		                                       <input type='text' class='form-control' name='usuario' id='usuario' placeholder='Nombre de usuario' required>
		                                    </div>
		                                    <div class='form-group'>
		                                       <label class='sr-only' for='contrasena'></label>
		                                       <input type='password' class='form-control' name='contrasena' id='contrasena' placeholder='Contraseña' required>
		                                    </div>
		                                    <div class='form-group'>
		                                       <button type='submit' id='ingreso'name='ingreso' class='btn btn-success btn-block'>Ingresar</button>
		                                    </div>
		                                 </form>
		                              </div>
		                           </div>
		                        </li>
		                	</ul>
	                  	</li>
					</ul>";
					}
					if($tipo_usuario>0)
					{
						echo "Usuario ADMIN";
						echo"<ul class='nav navbar-nav navbar-right'>
								<li><a href='#'>Bienvenido ".$_SESSION['usuario']."</a></li>
							</ul>";
					
					}
					
					?>
					
					<form class="navbar-form navbar-right" role="search">
						<div class="form-group">

							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav> <!--Termina el menu de inicio-->


		<div class="col-lg-3">
			<h3>Categorias</h3>
			<div class="list-group">
				<a href="#" class="list-group-item">
					Linea Blanca
				</a>
				<a href="#" class="list-group-item">
					Cocina
				</a>
				<a href="#" class="list-group-item">
					Electrodomesticos
				</a>
				<a href="#" class="list-group-item">
					Ropa
				</a>
				<a href="#" class="list-group-item">
					Calzado
				</a>
				<a href="#" class="list-group-item">
					Zapatos
				</a>

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
	<!-- End WOWSlider.com BODY section --></div>

	</div>


	<script src="../lib/jquery/jquery-2.1.4.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>