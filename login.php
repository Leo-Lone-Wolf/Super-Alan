<?php  session_start();
$usuario=$_POST["usuario"];
$contrasena=$_POST["contrasena"];
include "usuarios.php";

if (true)//Condicion para logueo de clientes
{
	//creamos el objeto
	$objUsuarios= new Usuarios;
	$consulta=$objUsuarios->login($usuario,$contrasena);
	$usuarios=mysql_fetch_array($consulta);

	if($usuario==$usuarios['usuario'] && $contrasena==$usuarios['contrasena'])
	{

		$_SESSION['id_usuario']=$usuarios['id_usuario'];
		$_SESSION['nombre']=$usuarios['nombre'];
		$_SESSION['usuario']=$usuarios['usuario'];
		$_SESSION['tipo_usuario']=$usuarios['tipo_usuario'];
		header("Location: index.php");
	}
}
if(true)//Condicion de logue para usuarios del negocio
{
	//creamos el objeto
	$objUsuariosN= new Usuarios;
	$consultaPer=$objUsuariosN->loginP($usuario,$contrasena);
	$usuariosNeg=mysql_fetch_array($consultaPer);
	if($usuario==$usuariosNeg['usuario'] && $contrasena==$usuariosNeg['contrasena'])
	{

		$_SESSION['id_usuario']=$usuariosNeg['id_usuario_personal'];
		$_SESSION['nombre']=$usuariosNeg['nombre'];
		$_SESSION['usuario']=$usuariosNeg['usuario'];
		$_SESSION['tipo_usuario']=$usuariosNeg['tipo_usuario'];
		header("Location: admin.php");
	}
	else
	{
	
	echo '<script languaje=javascript>';
	echo "alert('Usuario o contraseña incorrecta');";
	echo 'window.location="../Super_alan/index.php";';
	echo '</script>';
	}
}



?>
