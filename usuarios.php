<?php
include "conexion.php";
class Usuarios //Crecion de una clase que hara la consulta del usuario en la base de datos
	{ 
	  	var $con;//Esta variable contendra guardara la conexion a la base de datos
	 	function Usuarios()
	 	{//Creacion de la funcion clientes
	 		$this->con=new DBManager;//Construccion y referencia a "con"
 		}
		
		function consulta()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM productos");	 		
			}	
		}

		function insertU($iuser)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("INSERT INTO clientes (nombre, apellidos, usuario, contrasena, fecha_nacimiento, nombre_calle, numero_exterior, numero_interior, entre_calle1, entre_calle2, descripcion_vivienda, ciudad) VALUES ('".$iuser['0']."','".$iuser['1']."','".$iuser['2']."','".$iuser['3']."','".$iuser['4']."','".$iuser['5']."','".$iuser['6']."','".$iuser['7']."','".$iuser['8']."','".$iuser['9']."','".$iuser['10']."','".$iuser['11']."')");
			}	
		}

		function selCiudad()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM ciudades ORDER BY nombre");	 		
			}	
		}
		

		function selCol($id)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM colonias WHERE id_ciudad = '$id' ORDER BY nombre");	 		
			}	
		}


		function insertArt($d)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("INSERT INTO productos (usuario_personal, nombre_producto, descripcion, imagen_producto, caducidad, cantidad, tipo_presentacion, categoria_producto, marca, precio) VALUES ('".$d['1']."', '".$d['2']."', '".$d['3']."', '".$d['5']."', '".$d['6']."', '".$d['7']."', '".$d['8']."', '".$d['9']."', '".$d['10']."', '".$d['11']."')");	 		
			}
		}
		function login($usuario,$contrasena)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM clientes WHERE usuario = '$usuario' and contrasena ='$contrasena'");
				 		
			}
				
		}

		function loginP($usuario,$contrasena)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM usuarios_personal WHERE usuario = '$usuario' and contrasena ='$contrasena'");
				 		
			}
				
		}

		function editP($idUsuario)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM clientes WHERE id_usuario='$idUsuario'");
			}
		}

		function editUP($idUsuario)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM usuarios_personal WHERE id_usuario_personal='$idUsuario'");
			}
		}
		
		function catProductos()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM categorias_productos LIMIT 0,5");
			}
		}
		function catProductosId($idCat)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM productos WHERE categoria_producto='$idCat'");
			}
		}

		function producto($idArticulo)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM productos WHERE id_producto='$idArticulo'");
			}
		}
		function categorias()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM categorias_productos");
			}
		}

		function verProductos()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM productos");
			}
		}

		function selpresentacion()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM tipos_presentaciones");
			}
		}

		function selcategoria()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM categorias_productos");
			}
		}

		function selMarca()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM marcas_productos");
			}
		}

		function verPresent($idPres)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM tipos_presentaciones WHERE id_tipo_presentacion='$idPres'");
			}vermarca($idMarca);
		}

		function vercat($idCat)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM categorias_productos WHERE id_categoria_producto='$idCat'");
			}
		}

		function vermarca($idMarca)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM marcas_productos WHERE id_marca='$idMarca'");
			}
		}

		function selClientes()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM clientes");
			}
		}

		function selUsuSis()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM usuarios_personal");
			}
		}

		function insertCat($d)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("INSERT INTO categorias_productos (nombre) VALUES ('".$d['0']."')");	 		
			}
		}

		function insertMar($d)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("INSERT INTO marcas_productos (nombre) VALUES ('".$d['0']."')");	 		
			}
		}

		function insertPre($d)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("INSERT INTO tipos_presentaciones (nombre) VALUES ('".$d['0']."')");	 		
			}
		}

		function selTipUsua()
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM tipos_usuarios");	 		
			}
		}

		function insertUsuarioSistema($d)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("INSERT INTO usuarios_personal (nombre, apellido_paterno, apellido_materno, usuario, contrasena, tipo_usuario) VALUES ('".$d['0']."', '".$d['1']."', '".$d['2']."', '".$d['3']."', '".$d['4']."', '".$d['5']."')");	 		
			}
		}

		function editPerCliente($idCliente)
		{
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM clientes WHERE id_usuario='$idCliente'");
			}
		}

		function modifPerfil($iuser, $idCliente)
		{
			if($this->con->conectar()==true)
			{
				return mysql_query("UPDATE clientes SET nombre ='".$iuser['0']."', apellidos='".$iuser['1']."', usuario='".$iuser['2']."', contrasena= '".$iuser['3']."', fecha_nacimiento='".$iuser['4']."', nombre_calle='".$iuser['5']."', numero_exterior='".$iuser['6']."', numero_interior='".$iuser['7']."', entre_calle1='".$iuser['8']."', entre_calle2='".$iuser['9']."', descripcion_vivienda='".$iuser['10']."', ciudad='".$iuser['11']."' WHERE id_usuario='$idCliente'");
			}
		}
		function modifPerfilSistema($iuser, $idUsuarioSist)
		{
			if($this->con->conectar()==true)
			{
				return mysql_query("UPDATE usuarios_personal SET nombre ='".$iuser['0']."', apellido_paterno='".$iuser['1']."', apellido_materno='".$iuser['2']."', usuario= '".$iuser['3']."', contrasena='".$iuser['4']."' WHERE id_usuario_personal='$idUsuarioSist'");
			}
		}

		function selUsuSisbyId($idUsuarioSist)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM usuarios_personal WHERE id_usuario_personal='$idUsuarioSist'");
			}
		}

		function selProdBy($idProducto)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM productos WHERE id_producto='$idProducto'");
			}
		}

		function factura($idUsuario,$fecha,$total)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("INSERT INTO facturas (id_usuario, fecha_compra, total) VALUES ('$idUsuario','$fecha', '$total')");
			}
		}

		function idFactura()//Consulta del ID de factura
		{//Crecion de la funcion
			$fecha = strftime( "%Y-%m-%d %H:%M:%S", time() );
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM facturas WHERE fecha_compra BETWEEN '$fecha' AND '$fecha' ");
			}
		}

		function compraCliente($idFacturaCliente,$idArticulo,$cantidad)
		{//Crecion de la funcion
			if($this->con->conectar()==true)
			{
				return mysql_query("INSERT INTO compras (id_factura, id_producto, cantidad) VALUES ('$idFacturaCliente','$idArticulo', '$cantidad')");
			}
		}

		function selFacturasCliente($idCliente)
		{//Crecion de la funcion
			
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM facturas WHERE id_usuario='$idCliente' ");
			}
		}

		function selCompras($id_factura)
		{//Crecion de la funcion
			
			if($this->con->conectar()==true)
			{
				return mysql_query("SELECT * FROM compras WHERE id_factura='$id_factura' ");
			}
		}


	}

?>