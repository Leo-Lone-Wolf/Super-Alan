<?php session_start();
include "usuarios.php";
include "direcciones.php";
if(isset($_POST['nuser']))//Codigo para envio de datos al servidor
{
  $idUsuarioSist=$_SESSION['id_usuario'];
  $iuser['0']=$_POST["nombUsuSist"];
  $iuser['1']=$_POST['apellPaterno'];
  $iuser['2']=$_POST['apellMaterno'];
  $iuser['3']=$_POST['usuarioSist'];
  $iuser['4']=$_POST['contrasena'];

  //Creacion de objeto que <permita></permita> hacer la insercion de usuarios
  $objin=new Usuarios;
  $ins=$objin->modifPerfilSistema($iuser,$idUsuarioSist);
  echo '<script languaje=javascript>';
  echo "alert('El perfil ".$iuser['0']." fue modificado');";
  echo 'window.location="/Super_alan/admin.php";';
  echo '</script>';

}
$idProducto=$_GET['ID'];
$idUsuarioSist=$idUsuario=$_SESSION['id_usuario'];
$tipo_usuario=$_SESSION['tipo_usuario'];
$usuarios['nombre']=$_SESSION['nombre'];
$usuarios['usuario']=$_SESSION['usuario'];
$objseU=new Usuarios;
$selU = $objseU->selProdBy($idProducto);
$seleU = mysql_fetch_array($selU);

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
        <title>Modificar productos</title>
        <link href="../lib/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/hoja_estilos.css">
    </head>
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
                  <!--<li><a href="#">Eliminar productos</a></li>-->

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

        <form class="form-horizontal" action="modifProducto.php" name="valida_datos" method="post" enctype="multipart/form-data">
        <div class="col-md-10 content">
          <div class="panel panel-default">
            <div class="panel-heading">Panel de Administracion - <b>Modificar productos.</b>
            </div>

          <div class="panel-body">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="form-group">
                <label class="col-md-12" for="nomb">Nombre del producto</label>  
                <div class="col-md-12">
                  <input id="nomb" name="nomb" type="text" placeholder="" value="<?php  echo $seleU['nombre_producto']?>" class="form-control input-md">
                </div>
              </div>
            </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label class="col-md-12" for="descripcionProducto">Descripcion</label>  
                <div class="col-md-12">
                  <input name="descripcionProducto" id="descripcionProducto" class="form-control" rows="3" placeholder="" value="<?php  echo $seleU['descripcion']?>" required="required"></input>
                </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6">          
            <div class="form-group">
              <label class="col-md-12" for="imagenArt">Imagen del articulo</label>  
                <div class="col-md-12">
                    <input id="imagenArt" name="imagenArt" type="file">
                </div>
            </div>
          </div>


          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label class="col-md-12" for="fechaCad">Fecha de caducidad</label>  
                <div class="col-md-12">
                  <input id="fechaCad" name="fechaCad" type="date" placeholder="" value="<?php  echo $seleU['caducidad']?>" class="form-control input-md">
                </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-6">         
            <div class="form-group">
              <label class="col-md-12" for="cantidad">Cantidad</label>  
                <div class="col-md-12">
                  <input id="cantidad" name="cantidad" type="number" placeholder="" value="<?php  echo $seleU['cantidad']?>" class="form-control input-md">
                  </div>
            </div>
          </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label for="input" class="col-md-5 control-label">Tipo de presentacion</label>
              <div class="col-md-12">
                <select name="presentacion" id="presentacion"  class="form-control" required="required">
                  <?php // Consultar la base de datos
                    $objPres=new Usuarios();
                    $pres=$objPres->selpresentacion();
                    echo "<option selected='selected' disabled='disabled'>Eliga su presentacion</option>'";
                    while($presentacion=mysql_fetch_array($pres))
                    {
                        echo "<option value='".$presentacion['id_tipo_presentacion']."'>".$presentacion['nombre']."</option>";
                    }
                    echo "</select>";
                  ?>
                  </select>
              </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label for="input" class="col-md-6 control-label">Categoria del producto</label>
              <div class="col-md-12">
                <select name="categoria" id="categoria"  class="form-control" required="required">
                  <?php // Consultar la base de datos
                    $objcat=new Usuarios();
                    $cat=$objcat->selcategoria();
                    echo "<option selected='selected' disabled='disabled'>Eliga su categoria</option>'";
                    while($categoria=mysql_fetch_array($cat))
                    {
                        echo "<option value='".$categoria['id_categoria_producto']."'>".$categoria['nombre']."</option>";
                    }
                    echo "</select>";
                  ?>
                  </select>
              </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="form-group">
            <label for="input" class="col-md-5 control-label">Marca del producto</label>
              <div class="col-md-12">
                <select name="marca" id="marca"  class="form-control" required="required">
                  <?php // Consultar la base de datos
                    $objcat=new Usuarios();
                    $cat=$objcat->selMarca();
                    echo "<option selected='selected' disabled='disabled'>Eliga su marca</option>'";
                    while($marca=mysql_fetch_array($cat))
                    {
                        echo "<option value='".$marca['id_marca']."'>".$marca['nombre']."</option>";
                    }
                    echo "</select>";
                  ?>
                  </select>
              </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group">
              <label class="col-md-12" for="precio">Precio del producto</label>  
                <div class="col-md-12">
                  <input id="precio" name="precio" type="number" placeholder="" value="<?php  echo $seleU['precio']?>" class="form-control input-md">
                </div>
            </div>
          </div>

          

            <div class="col-lg-12 col-md-12 col-sm-12">    
            <br>      
              <input type="hidden" name="nuser" value="post"/>
                <button type="button" class="btn btn-success col-lg-12" name="button" id="enviar_validar" value="Enviar">Modificar usuario</button>
            </div>
          </div>
        </div>
      </div>


    


      </form>
    <!--Termina el div contenedor...NO BORARR!!!-->

    </body>
    
</html>s