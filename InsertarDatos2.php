<?php
$con=mysqli_connect("localhost", "root", "", "enterprise3_2165543");//asignamos una variable el resultado de la conexion
if (!$con) //cjeca el resultado de la conexion: TRUE o FALSE
{
	die('No se establecio la conexion con el servidor:' .mysqli_erro()); //FALSE en caso de falla
}
$sql="INSERT INTO proveedores
VALUES ('$_POST[ID_Provedor]','$_POST[Nom_Empresa]','$_POST[Ciudad]','$_POST[Dirección]')";
	if (!mysqli_query($con, $sql, MYSQLI_USE_RESULT))
	{
		die('Error;' .mysqli_error($con));
	}
	echo "<center>";
	echo "1 registro agrgado<br>";
	echo "<a href='ConsultaProveedores.php'>Ver registro</a>";
	mysqli_close($con);
?>