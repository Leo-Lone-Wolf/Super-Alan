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
	<title>Panel de Adminisrador</title>
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
					<a class="navbar-brand" href="<?php echo $inicioAdmin; ?>"><img src="images/LOGO_SA.png" id="imagen"/></a>
				</div>
	
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?php echo $inicioAdmin; ?>">Inicio</a></li>
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
		                              	
		                              
		                              	<li class="dropdown"><a class="" href="perfilUsuarioSistema.php">Mi perfil</a></li>
		                              	<!--<li class="dropdown"><a class="" href="carrito.php">Carrito de compras</a></li>-->
		                        		<li class="dropdown"><a class="" href="#">Otros</a></li>
		                              </div>
		                              </ul>
										<form class="form" role="form" method="post" action="salir.php" accept-charset="UTF-8" name="login" id="login" >
											<div class="form-group">
												<button type="submit" id="salir"name="salir" class="btn btn-warning btn-block">Salir</button>
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

				</div><!-- /.navbar-collapse -->
			</div>
		</nav> <!--Termina el menu de inicio-->


    <div class="container-fluid main-container">
  		<div class="col-md-2 sidebar">
  			<div class="row">
	<!-- uncomment code for absolute positioning tweek see top comment in css -->
	<div class="absolute-wrapper"> </div>
	<!-- Menu -->
	<div class="side-menu">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">
					<li class="active"><a href="admin.php"><span class="glyphicon glyphicon-dashboard"></span> Administrador</a></li>
					<!--<li><a href="#"><span class="glyphicon glyphicon-plane"></span> Productos</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Usuarios</a></li>-->

					<!-- Dropdown-->
					<li class="panel panel-default" id="dropdown">
						<a data-toggle="collapse" href="#dropdown-lvl1">
							<span class="glyphicon glyphicon-shopping-cart"></span> Productos <span class="caret"></span>
						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl1" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">									
									<!--<li><a href="#">Insertar productos</a></li>-->
									<li><a href="verProductos.php">Ver Productos</a></li>
									<li><a href="verCategorias.php">Categorias</a></li>
									<li><a href="verMarcas.php">Marcas</a></li>
									<li><a href="verPresentaciones.php">Presentaciones</a></li>
								</ul>
							</div>
						</div>
						<a data-toggle="collapse" href="#dropdown-lvl2">
							<span class="glyphicon glyphicon-user"></span> Clientes <span class="caret"></span>
						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl2" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
									<!--<li><a href="#">Insertar productos</a></li>-->
									<li><a href="verClientes.php">Consultar Usuarios</a></li>

								</ul>
							</div>
						</div>
						<a data-toggle="collapse" href="#dropdown-lvl3">
							<span class="glyphicon glyphicon-hdd"></span> Usuar. del sistema <span class="caret"></span>
						</a>

						<!-- Dropdown level 1 -->
						<div id="dropdown-lvl3" class="panel-collapse collapse">
							<div class="panel-body">
								<ul class="nav navbar-nav">
									<li><a href="#">Alta de usuarios del sistema</a></li>
									<li><a href="verUsuariosSist.php">Consultar Usuarios del sistema</a></li>
									<!--<li><a href="#">Eliminar productos</a></li>-->

									<!-- Dropdown level 2 -->
									<!--<li class="panel panel-default" id="dropdown">
										<a data-toggle="collapse" href="#dropdown-lvl2">
											<span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>
										</a>
										<div id="dropdown-lvl2" class="panel-collapse collapse">
											<div class="panel-body">
												<ul class="nav navbar-nav">
													<li><a href="#">Link</a></li>
													<li><a href="#">Link</a></li>
													<li><a href="#">Link</a></li>
												</ul>
											</div>
										</div>
									</li>-->
								</ul>
							</div>
						</div>


					</li>


				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div> 
</div>
  		<div class="col-md-10 content">
  			  <div class="panel panel-default">
	<div class="panel-heading">
		Panel de Administracion
	</div>
	<div class="panel-body">
		Bienvenido al panel de administracion de Super Alan, actualmente estamos en construccion, por lo que algunos modulos pueden que presenten anormalidades.
	</div>
</div>
  		</div>

  	</div>
</body>


	<script type="text/javascript">
$(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').toggleClass('slide-in');
        
    });
   
   // Remove menu for searching
   $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').removeClass('slide-in');

    });
});
</script>
<script src="../lib/jquery/jquery-2.1.4.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>