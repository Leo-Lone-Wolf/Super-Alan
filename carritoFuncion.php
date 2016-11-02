<?php
class carrito
{
	//atributos de la clase
   	var $num_productos;
   	var $array_id_prod;
   	var $array_cantidad_prod;
   	var $array_nombre_prod;
   	var $array_precio_prod;
   	var $total;

	//constructor. Realiza las tareas de inicializar los objetos cuando se instancian
	//inicializa el numero de productos a 0
	function carrito() 
	{
   		$this->num_productos=0;
	}
	
	//Introduce un producto en el carrito. Recibe los datos del producto
	//Se encarga de introducir los datos en los arrays del objeto carrito
	//luego aumenta en 1 el numero de productos
	function introduce_producto($id_prod,$cantidad_prod,$precio_prod)//,$precio_prod)
	{
		$this->array_id_prod[$this->num_productos]=$id_prod;
		//$this->array_nombre_prod[$this->num_productos]=$nombre_prod;
		$this->array_cantidad_prod[$this->num_productos]=$cantidad_prod;
		$this->array_precio_prod[$this->num_productos]=$precio_prod*$cantidad_prod;
		$this->num_productos++;
	}

	//Muestra el contenido del carrito de la compra
	//ademas pone los enlaces para eliminar un producto del carrito
	function imprime_carrito()
	{

		//$suma = 0;
?>


	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content">
  		<div class="panel panel-default">
			<div class="panel-heading tituloCarrito fondoCarritoTitulo">
			Tu carrito de compras
			<ul class="nav navbar-nav navbar-right">
				<?php
				for ($i=0;$i<$this->num_productos;$i++)
				{ 

					//$cantidad=$this->array_cantidad_prod[$i];
					//$totalDeProducto=$a['precio']*$cantidad

					$total+=$this->array_precio_prod[$i];
					//$total2=$this->$total;

					
				}

				
				?>
				<li>Total $<?php echo $total;?></li>
				
			</ul>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre del producto</th>
						<th>Cantidad</th>
						<th>Precio por unidad</th>
						<th>Acciones a realizar</th>
				  	</tr>
				</thead>

<?php
	//echo $this->array_id_prod[0];
	//echo $this->array_id_prod[$i];
	//$this->array_id_prod[$linea]=0;

					/*if (is_null($this->array_id_prod[0]))
					{
						//echo "Carrito vacio";
					}
					else
					{
						echo "olo";
					}*/
						for ($i=0;$i<$this->num_productos;$i++)
						{
?>
								<?php
								$idArticulo=$this->array_id_prod[$i];
								$cantidad=$this->array_cantidad_prod[$i];
								$o=new Usuarios;
								$art = $o->producto($idArticulo);
								$totalProductos=mysql_num_rows($art);
								if ($totalProductos)
								{
									while ($a = mysql_fetch_array($art))
									{
										//$this->array_precio_prod[$i]=$a['precio'];
										
								?>
									<tbody>
										<tr>
										<td><?php echo $a['nombre_producto']; ?></td>
										<td><?php echo $cantidad ?></td>
										<td><?php echo $a['precio'];  ?></td>						
										<td><a href="eliminar_producto.php?linea=<?php echo $i; ?>">Eliminar producto </a></td>
										</tr>
										<?php
										?>

										<?php
									}	
														
								}
										?>
<?php 

						}
						

?>
										</tbody>
					</table>
					<!--<button type="button" class="btn btn-success">Comprar</button>-->
					<!--<a class="btn btn-success" href="#" role="button">button</a>-->
					<a class="btn btn-success" role="button" href="compraProducto.php">Comprar </a>
					<ul class="nav navbar-nav navbar-right">
						<li><a class="btn btn-warning" role="button" href="categorias.php">Seguir comprando </a>
						</li>
					</ul>

			</div>
		</div>
  	</div>
<?php 
?>
<?php 
	}
	function compraProductos()
	{
		$idUsuario=$_SESSION['id_usuario'];
		$fecha = strftime( "%Y-%m-%d %H:%M:%S", time() );
		$fechaSinSeg = strftime( "%Y-%m-%d %H:%M", time() );
		$segundoinicial=strftime( "%S", time() );

		for ($i=0;$i<$this->num_productos;$i++)
		{
			$total+=$this->array_precio_prod[$i];
		}
		$o=new Usuarios;
		$com = $o->factura($idUsuario,$fecha,$total);//Insercion de factura

		$o=new Usuarios;
		$fac = $o->idFactura();//Consulta del ID de factura
		while ($a = mysql_fetch_array($fac))
		{
			$idFacturaCliente=$a['id_factura'];
		}	


		?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content">
  		<div class="panel panel-default">
			<div class="panel-heading tituloCarrito fondoCarritoTitulo">
			Gracias por su compra!
			</div>
			<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre del producto</th>
						<th>Cantidad</th>
						<th>Imagen</th>
				  	</tr>
				</thead>
							<?php
							for ($i=0;$i<$this->num_productos;$i++)
							{
								$idArticulo=$this->array_id_prod[$i];
								$cantidad=$this->array_cantidad_prod[$i];

								$o=new Usuarios;
								$compra = $o->compraCliente($idFacturaCliente,$idArticulo,$cantidad);
								
								$o=new Usuarios;
								$art = $o->producto($idArticulo);
								$totalProductos=mysql_num_rows($art);
								if ($totalProductos)
								{
									while ($a = mysql_fetch_array($art))
									{
										//$this->array_precio_prod[$i]=$a['precio'];
										
										
								?>
									<tbody>
										<tr>
										<td><?php echo $a['nombre_producto']; ?></td>
										<td><?php echo $a['descripcion']; ?></td>
										<td><img class="imagenProductoCompra" src="data:image/jpg;base64,<?php echo base64_encode($a['imagen_producto']);?>"/></td>						
										</tr>
										<?php
										?>

										<?php
									}							
								}
										?>
<?php
							}
							//echo "fafw".$total;
?>
									</tbody>

			</table>
			</div>
			</div>

			<?php

	}

	//elimina un producto del carrito. recibe la linea del carrito que debe eliminar
	//no lo elimina realmente, simplemente pone a cero el id, para saber que esta en estado retirado
	function elimina_producto($linea)
	{
		//$this->array_id_prod[$linea]=0;
		unset($this->array_id_prod[$linea]);
		unset($this->array_precio_prod[$linea]);
	}
} 
//inicio la sesión
session_start();
//si no esta creado el objeto carrito en la sesion, lo creo
if (!isset($_SESSION['ocarrito']))
{	
	
	$_SESSION['ocarrito'] = new carrito();
}
?>

						<?php //echo $this->array_id_prod[$i]; ?>
						<!-- Ponerles <td> a los 2 y listo-->
						<?php //echo $this->array_cantidad_prod[$i]; ?>

