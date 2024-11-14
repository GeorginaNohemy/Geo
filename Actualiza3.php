<?php
$con = mysqli_connect("localhost", "root", "", "enterprise3_2165543"); // se crea la conexión al servidor

if (!$con) {
    die("Fallo en la conexión: " . mysqli_connect_error()); // Muestra el error de conexión
}

$ID_Cliente = $_POST['ID_Cliente']; // recibe los nuevos datos del registro
$Nom_Cliente = $_POST['Nom_Cliente'];
$Ape = $_POST['Ape'];
$Municipio = $_POST['Municipio'];

// Usar prepared statements para evitar inyecciones SQL
$stmt = $con->prepare("UPDATE clientes SET Nom_Cliente=?, Ape=?, Municipio=? WHERE ID_Cliente=?");
$stmt->bind_param("sssi", $Nom_Cliente, $Ape, $Municipio, $ID_Cliente);

if ($stmt->execute()) {
    header("Location: ConsultaClientes.php"); // redirecciona a la primera página de Actualizar artículos
} else {
    echo "Error al actualizar: " . $stmt->error; // Muestra el error de actualización
}

$stmt->close(); // cierra la declaración
mysqli_close($con); // cerramos la conexión a la BD

echo "Realizado por: Georgina Nohemy Cruz Bolaños</center>";
echo "<a href='MenuPrincipal.html'>Menu Principal</a></center>";
?>
