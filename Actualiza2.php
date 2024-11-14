<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css"><!--especificamos el archivo CSS a ocupar-->
<meta charset="utf-8"/>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f6ddcc; /* Fondo claro y neutro */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            color: #17202a; /* Color oscuro */
            margin-top: 20px;
            font-size: 2.5em;
            text-align: center;
        }
        table {
            margin: 40px auto;
            border-collapse: collapse;
            width: 70%;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }
        th, td {
            padding: 15px;
            background-color: #d5f5e3; /* Fondo blanco */
            text-align: center;
            border: 1px solid #d7bde2; /* Borde claro */
            transition: background-color 0.3s;
        }
        td:hover {
            background-color: #f5eef8; /* Color gris claro al pasar el mouse */
        }
        th {
            background-color: #a9dfbf; /* Fondo diferente para encabezados */
            color: #17202a; /* Color de texto oscuro */
        }
        a {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 20px;
            text-decoration: none;
            color: white; /* Color del texto del botón */
            background-color: #48c9b0; /* Color de fondo del botón */
            border-radius: 5px;
            font-weight: bold;
            font-size: 1.2em; /* Tamaño de fuente moderado */
            transition: background-color 0.3s, transform 0.2s;
        }
        a:hover {
            background-color: #2980b9; /* Color más oscuro al pasar el mouse */
            transform: scale(1.05); /* Efecto de escalado */
        }
    </style>
</head>
<body>
<?php
$con = mysqli_connect("localhost", "root", "", "enterprise3_2165543"); // se crea la conexión al servidor

if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error()); // Muestra el error de conexión
}

$ID_Cliente = mysqli_real_escape_string($con, $_POST['ID_Cliente']); // Escapamos el ID del cliente
$resultado = mysqli_query($con, "SELECT * FROM clientes WHERE ID_Cliente = '$ID_Cliente'"); // Consultamos el contenido de la tabla clientes

if ($resultado === FALSE) {
    echo "Fallo en la consulta: ";
    die(mysqli_error($con)); // Muestra el error que ocurrió
}

echo "<center>";
echo "<form action='Actualiza3.php' method='POST'>";
echo "<h1>Editar Clientes</h1>";
echo "<table border='0'>";

while ($row = mysqli_fetch_array($resultado)) { // Muestra el contenido del registro a editar
    echo "<tr>";
    echo "<td>Id_cliente:</td>";
    echo "<td><input type='text' name='ID_Cliente' value='" . htmlspecialchars($row['ID_Cliente']) . "' readonly></td></tr>";
    echo "<tr>";
    echo "<td>Nombre:</td>";
    echo "<td><input type='text' name='Nom_Cliente' value='" . htmlspecialchars($row['Nom_Cliente']) . "'></td></tr>";
    echo "<tr>";
    echo "<td>Apellido:</td>";
    echo "<td><input type='text' name='Ape' value='" . htmlspecialchars($row['Ape']) . "'></td></tr>";
    echo "<tr>";
    echo "<td>Municipio:</td>";
    echo "<td><input type='text' name='Municipio' value='" . htmlspecialchars($row['Municipio']) . "'></td></tr>";
}

echo "</table>";
mysqli_close($con); // Cerramos la conexión a la BD
echo "<input type='submit' value='Actualizar clientes' />"; // Se va al archivo Actualizar3
echo "</form>";
?>

</body>
</html>