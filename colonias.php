<?php include "usuarios.php";

$id = $_POST['id'];

	$objCiud=new Usuarios();
    $prov=$objCiud->selCol($id);
	if(mysql_num_rows($prov)>0)
	{
?>
		<!--echo "<option selected='selected' disabled='disabled'>Elija su Provincia</option>";-->
		<option selected="selected" disabled="disabled">Elija su colonia</option>
	<?php 
		while($prov2 = mysql_fetch_array($prov))
		{
	?>
			<!--echo "<option value='".$prov2['id_colonia']."'>'".$prov2['nombre']."'</option>";-->
			<option value="<?php echo $prov2['id_colonia'];?>"><?php echo $prov2['nombre'];?></option>
<?php  
		}
	}
?>
