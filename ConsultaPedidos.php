<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f6ddcc; /* Fondo claro y neutro */
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #17202a; /* Color oscuro */
            margin-top: 20px;
            font-size: 2.5em;
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
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "enterprise3_2165543") or die("Falla al conectar");
    $query = $con->query("SELECT * FROM pedidos");

    echo "<h1>Consulta a la tabla de Pedidos</h1>";
    echo "<center><table>
            <tr>
                <th>ID_Pedido</th> 
                <th>ID_Ciente</th> 
                <th>ID_Provedor</th>
                <th>ID_Facturas</th>
            </tr>";
    
    $cont = 0;
    while ($row = mysqli_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" . $row['ID_Pedido'] . "</td>"; 
        echo "<td>" . $row['ID_Ciente'] . "</td>"; 
        echo "<td>" . $row['ID_Provedor'] . "</td>";
        echo "<td>" . $row['ID_Facturas'] . "</td>";
        echo "</tr>";
        $cont++;
    }
    echo "</table><br>";
    echo "El número de registros son: " . $cont . "<br>";
    mysqli_close($con);
    echo "<div class='footer'>Realizado por: Georgina Nohemy Cruz Bolaños<br>";
    echo "<a href='MenudeConsultas.html'>Menú Principal</a></div></center>";
    ?>
</body>
</html>
