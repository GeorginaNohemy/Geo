<?php
$con = mysqli_connect("localhost", "root", "", "enterprise3_2165543"); // se crea la conexión al servidor

if (!$con) {
    die("Fallo en la conexión: " . mysqli_connect_error()); // Muestra el error de conexión
}

$ID_Facturas = $_POST['ID_Facturas']; // recibe los nuevos datos del registro
$Total = $_POST['Total'];
$Fecha = $_POST['Fecha'];
$Num_Pedido = $_POST['Num_Pedido'];

// Usar prepared statements para evitar inyecciones SQL
$stmt = $con->prepare("UPDATE facturas SET Total=?, Fecha=?, Num_Pedido=? WHERE ID_Facturas=?");
$stmt->bind_param("sssi", $Total, $Fecha, $Num_Pedido, $ID_Facturas);

if ($stmt->execute()) {
    header("Location: ConsultaFacturas.php"); // redirecciona a la primera página de Actualizar artículos
} else {
    echo "Error al actualizar: " . $stmt->error; // Muestra el error de actualización
}

$stmt->close(); // cierra la declaración
mysqli_close($con); // cerramos la conexión a la BD

echo "Realizado por: Georgina Nohemy Cruz Bolaños</center>";
echo "<a href='MenuPrincipal.html'>Menu Principal</a></center>";
?>
