<?php session_start();
//error_reporting(0);
include "usuarios.php";
include "direcciones.php";

$idCliente=$_GET['ID'];
$idUsuario=$_SESSION['id_usuario'];
$tipo_usuario=$_SESSION['tipo_usuario'];
$usuarios['nombre']=$_SESSION['nombre'];
$usuarios['usuario']=$_SESSION['usuario'];
$objseU=new Usuarios;
$selU = $objseU->editP($idCliente);
$seleU = mysql_fetch_array($selU);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pedidos</title>
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
						<li><a href="<?php echo $inicioAdmin; ?>">Inicio</a></li>
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
					<li><a href="admin.php"><span class="glyphicon glyphicon-dashboard"></span> Administrador</a></li>
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
									<li class="active"><a href="verProductos.php">Ver Productos</a></li>
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
								</ul>
							</div>
						</div>


					</li>


				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

	</div>
</div>  		</div>

  	<div class="col-md-10 content">
  			  <div class="panel panel-default">
	<div class="panel-heading">
		Datos del cliente
	</div>
	<div class="panel-body">
	<!--<a class="btn btn-primary" href="insertarArticulo.php" role="button">Ingresar nueva marca</a>-->
	<div class="col-lg-6 col-md-6 col-sm-6">
              <div class="form-group">
                <label class="col-md-12" for="nomb">Cliente</label>  
                <div class="col-md-12">
                  <input id="nomb" name="nomb" type="text" placeholder="" value="<?php  echo $seleU['nombre']?>" class="form-control input-md" disabled>
                </div>
              </div>
            </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label class="col-md-12" for="descripcionProducto">Direccion</label>  
                <div class="col-md-12">
                  <input name="descripcionProducto" id="descripcionProducto" class="form-control" rows="3" placeholder="" value="<?php  echo $seleU['nombre_calle']." #".$seleU['numero_exterior'];?>" required="required" disabled></input>
                </div>
            </div>
          </div>
          </div>
	</div>


	<?php
	$o=new Usuarios;
	$art = $o->selFacturasCliente($idCliente);
	while ($a = mysql_fetch_array($art))
	{
		$id_factura=$a['id_factura'];
		$idClientes=$a['id_usuario'];
		echo $idClientes;
		//echo "Fecha".$a['fecha_compra'];
		//echo "total".$a['total'];
	?>
	<div class="col-md-13 content">
  			  <div class="panel panel-default">
	<div class="panel-heading">
		Pedido numero:
	</div>
	<div class="panel-body">
	<!--<a class="btn btn-primary" href="insertarArticulo.php" role="button">Ingresar nueva marca</a>-->
	<table class="table table-hover">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
					
				</tr>
			</thead>
			<tbody>
			<?php 

			$o=new Usuarios;
			$comp = $o->selCompras($id_factura);
			while ($d = mysql_fetch_array($comp))
			{
				$idProducto=$d['id_producto'];
				$idArticulo=$idProducto;

				$objnombreP = new Usuarios;
				$nombreProducto = $objnombreP->producto($idArticulo);
				$nombre=mysql_fetch_array($nombreProducto);
				//$nombre_producto=$a['nombre_producto'];*/
			?>
				<tr>

					
					<td><?php echo $nombre['nombre_producto']; ?></td>
					<td><?php echo $d['cantidad']; ?></td>
					<td></td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>

    </div>
	</div> 
	</div>



	<?php
	}
	

	
	
	?>
		
			<?php 

			/*$o=new Usuarios;
			$art = $o->selClientes();
			while ($a = mysql_fetch_array($art))
			{
				$idClientes=$a['id_usuario'];
				//$nombre_producto=$a['nombre_producto'];
			?>
				<tr>

					<td><?php echo $a['nombre'] ?></td>
					<td><?php echo $a['apellidos'] ?></td>
					<td><a href="pedidosCliente.php?ID=<?php echo $idClientes;?>">Consultar pedidos</a></td>
				</tr>
			<?php
			}*/
			?>
			</tbody>
		</table>
	</div>
</div>
  		</div>
  		<?php
  	
  		?>
  	</div>
</body>

	
<script src="../lib/jquery/jquery-2.1.4.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>