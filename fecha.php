<?php
//$fechaInicial = strftime( "%Y-%m-%d %H-%M-%S", time() );
		$fecha = strftime( "%Y-%m-%d %H:%M:%S", time() );
		$fechaSinSeg = strftime( "%Y-%m-%d %H:%M", time() );
		//$guion="-";
		$segundoinicial=strftime( ":%S", time() );
		echo $fecha;
		echo $segundoinicial;
		echo "<br>";
		$prueba=2+$segundoinicial;
		echo $prueba;
		echo "<br>";
		echo $segundoinicial-2;

		/*$segundoAtras=$segundoinicial-1;
		$segundoAdel=$segundoinicial+1;
		$fechaini=$fechaSinSeg.+"-"+.$segundoinicial;
		$fechaFin=$fechaSinSeg."-".$segundoAtras;


echo "<br>";
echo "<br>";
$fechaini=$fechaSinSeg."-".$segundoinicial;
echo $fechaini;
echo "<br>";
$fechaFin=$fechaSinSeg."-".$segundoAtras;
echo $fechaFin;
echo "<br>";
echo $fechaSinSeg."-".$segundoAdel;
echo "<br>";*/
?>