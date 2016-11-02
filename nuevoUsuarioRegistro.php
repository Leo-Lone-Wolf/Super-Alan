<?php session_start();
include "usuarios.php";
include "direcciones.php";

if(isset($_POST['nuser']))//Codigo para envio de datos al servidor
{
  $iuser['0']=$_POST["nombre"];
  $iuser['1']=$_POST["apellidos"];
  $iuser['2']=$_POST["usuario"];
  $iuser['3']=$_POST["contrasena"];
  $iuser['4']=$_POST["fecha_nacimiento"];
  $iuser['5']=$_POST["nombreCalle"];
  $iuser['6']=$_POST["numExt"];
  $iuser['7']=$_POST["numInt"];
  $iuser['8']=$_POST["entreCalle1"];
  $iuser['9']=$_POST["entreCalle2"];
  $iuser['10']=$_POST["descripcionVivienda"];
  $iuser['11']=$_POST["ciudad"];
  //$iuser['12']=3;

  //Creacion de objeto que permita hacer la insercion de usuarios
  $objin=new Usuarios;
  $ins=$objin->insertU($iuser);
  echo '<script languaje=javascript>';
  echo "alert('Ingresado al sistema con exito <br> Inicia sesion para comenzar');";
  echo 'window.location="/Super_alan/index.php";';
  echo '</script>';

}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../lib/jquery/jquery-2.1.4.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        <script src="../lib/jquery/jquery.js"></script>



        <script languaje=javascript>
         function validacion_datos()
         {
           var verificar =true;
         //var verificar=true;
         /*if(!document.valida_datos.nombre.value)
         {
           alert ("El campo nombre es requerido");
           document.valida_datos.nombre.focus();
           verificar=false;
         }else if(!document.valida_datos.nombre.value.match(/^([A-Z])*$/))
         {
           alert ("Ingresa correctamente tu nombre");
           document.valida_datos.nombre.focus();
           verificar=false;
         }else if (!document.valida_datos.apellidos.value)
         {
           alert ("El campo apellidos es requerido");
           document.valida_datos.apellidos.focus();
           verificar=false;
         }else if(!document.valida_datos.apellidos.value.match(/^([A-Z])*$/))
         {
           alert ("Ingresa correctamente tus apellidos");
           document.valida_datos.apellidos.focus();
           verificar=false;
         }*/
         
         if(verificar)
         {
           document.valida_datos.submit();

         }
         }
         window.onload=function()
         {
           document.getElementById("enviar_validar").onclick=validacion_datos;
         }

       </script>
        <title>Registro de nuevo usuario</title>
        <link href="../lib/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
       	<link rel="stylesheet" type="text/css" href="css/hoja_estilos.css">
    </head>
    <body>
    <br>
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
            <li><a href="<?php echo $inicio; ?>">Inicio</a></li>
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
                                    
                                  
                                    <li class="dropdown"><a class="" href="#">Mi perfil</a></li>
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


        <form class="form-horizontal" action="nuevoUsuarioRegistro.php" name="valida_datos" method="post">


          <fieldset>
          <!-- Form Name -->
            <legend>Por favor complete los campos</legend>

            <br>

          <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label class="col-md-12" for="nombre">Nombre</label>  
              <div class="col-md-12">
                <input id="nombre" name="nombre" type="text" placeholder="Ingresa tu nombre" class="form-control input-md">
              </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label class="col-md-12" for="apellidos">Apellidos</label>  
              <div class="col-md-12">
                <input id="apellidos" name="apellidos" type="text" placeholder="Ingresa tus apellidos" class="form-control input-md">
              </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label class="col-md-12" for="usuario">Nombre de usuario</label>  
              <div class="col-md-12">
                <input id="usuario" name="usuario" type="text" placeholder="Ingresa tu usuario" class="form-control input-md">
              </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label class="col-md-12" for="fecha_nacimiento">Fecha de nacimiento</label>  
              <div class="col-md-12">
                <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control input-md">
              </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label class="col-md-12" for="contrasena">Contraseña</label>  
              <div class="col-md-12">
                <input id="contrasena" name="contrasena" type="password" placeholder="Ingresa tu contraseña" class="form-control input-md">
              </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label class="col-md-12" for="contrasena2">Confirma tu contraseña</label>  
              <div class="col-md-12">
                <input id="contrasena2" name="contrasena2" type="password" placeholder="Ingresa nuevamente tu contraseña" class="form-control input-md">
              </div>
          </div>
        </div>
<br>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label for="input" class="col-sm-2 control-label">Estado</label>
              <div class="col-sm-4">
                <select name="ciudad" id="ciudad"  class="form-control" required="required">
                  <?php // Consultar la base de datos
                    $objCiud=new Usuarios();
                    $ciu=$objCiud->selCiudad();
                    echo "<option selected='selected' disabled='disabled'>Eliga su ciudad</option>'";
                    while($ciudades=mysql_fetch_array($ciu))
                    {
                        echo "<option value='".$ciudades['id_ciudad']."'>".$ciudades['nombre']."</option>";
                    }
                    echo "</select>";
                  ?>
                  </select>
              </div>
           <label for="input" class="col-sm-2 control-label">Colonia</label>
              <div class="col-sm-4">
                 <select name="colonias" id="colonias" class="form-control">
                </select>
             </div>
          </div>
        </div>

<br>
         <legend>Datos sobre su domicilio</legend>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label class="col-md-12" for="nombreCalle">Calle</label>  
              <div class="col-md-12">
                <input id="nombreCalle" name="nombreCalle" type="text" placeholder="Ingresa tus apellidos" class="form-control input-md">
              </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
        <br>
          <div class="form-group">
            <label class="col-md-3" for="numExt">Numero Exterior</label>  
              <div class="col-md-3">
                <input id="numExt" name="numExt" type="number" placeholder="Numero exterior" class="form-control input-md">
              </div>
            <label class="col-md-2" for="numInt">Numero Interior</label>  
              <div class="col-md-3">
                <input id="numInt" name="numInt" type="number" placeholder="Numero interior" class="form-control input-md">
              </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label class="col-md-12" for="entreCalle1">Entre Calle</label>  
              <div class="col-md-12">
                <input id="entreCalle1" name="entreCalle1" type="text" placeholder="Entre calle" class="form-control input-md">
              </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label class="col-md-12" for="entreCalle2">Y Calle</label>  
              <div class="col-md-12">
                <input id="entreCalle2" name="entreCalle2" type="text" placeholder="Y calle" class="form-control input-md">
              </div>
          </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="form-group">
            <label class="col-md-12" for="apellidos">Descripcion de la vivienda</label>  
              <div class="col-md-12">
                <!--<input id="apellidos" name="apellidos" type="text" placeholder="Y calle" class="form-control input-md">-->
                <textarea name="descripcionVivienda" id="descripcionVivienda" class="form-control" rows="3" placeholder="Escriba una descripcion de la vivienda" required="required"></textarea>
              </div>
          </div>
        </div>
        </div>





        







        <input type="hidden" name="nuser" value="post"/>
        <button type="button" class="btn btn-default" name="button" id="enviar_validar" value="Enviar">Registrarme</button>
        </fieldset>
      </form>
    <!--Termina el div contenedor...NO BORARR!!!-->





    </body>
    
</html>