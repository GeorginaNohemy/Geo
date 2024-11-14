<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enterprise3_2165543";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
// sql to delete a record
$sql = "DELETE FROM facturas WHERE ID_Facturas='$_POST[ID_Facturas]'";
 
if ($conn->query($sql) === TRUE) {
    echo "<center><h1>Registro Borrado exitosamente</h1><br><br>";
} else {
    echo "Error al borrar el registro: " . $conn->error;
}
echo "<a href='ConsultaFacturas.php'>Ver registro</a><br><br>";
echo "<a href=MenudeEliminar.html>Menu</a></center>";
$conn->close();
?>