<meta http-equiv="Content_Type" content="text/html; charset=utf-8">
<?php

//Para establecer la conexion con el servidor y la base de datos
$conn=mysql_connect("localhost","root","");
mysql_select_db("sistema_electoral",$conn);


?>
<?php
$year=$_POST['year'];


require_once('./clases/Coneccion.php');

/*$save=mysql_query("INSERT INTO cargo (identi, nombre) VALUES ('$id','$nombre')");*/

if ($_POST['checkbox'] != "") 
{
	if (is_array($_POST['checkbox'])) 
	{
		//realizamos el ciclo
		while (list($key,$value) = each($_POST['checkbox'])) 
		{
			$sql=mysql_query("INSERT INTO cargo (tipo_cargo, year_electoral) VALUES ('$value','$year')");
		}
	}
}

if (/*$save and*/ $sql) 

print 'Datos Insertados Filas Afectadas 1 <a href=\'manejadorOpciones.php?accion=con\'>Ver datos</a>';

 else{
           print 'No se ha enviado datos ';
       }

?>