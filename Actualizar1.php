<!DOCTYPE html>
<html>
<head>
a<!--especificamos el archivo CSS a ocupar-->
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
$con = mysqli_connect("localhost","root","","enterprise3_2165543");// se crea la conexión al servidor
$resultado = mysqli_query($con,"select * from clientes"); //consultamos el contenido de la tabla articulos
if($resultado === FALSE) { 
	echo "fallo ";
    die(mysqli_error()); // Muestra el error que ocurrió
}
echo "<center>";
echo "<h1>Actualiza clientes</h1>";
echo "<table border='1'>  
<tr>
<th>ID_Cliente</th> 
<th>Nom_Cliente</th> 
<th>Ape</th>
<th>Municipio</th>
</tr>" ;
while($row=mysqli_fetch_array($resultado))   //Muestra el contenido de la articulos    
	{
	   echo "<tr>";
       echo "<td>" . $row['ID_Cliente'] ."</td>";  
	   echo "<td>" . $row['Nom_Cliente'] ."</td>"; 
	   echo "<td>" . $row['Ape'] ."</td>";
	   echo "<td>" . $row['Municipio'] ."</td>";
	   echo "</tr>" ;
	}
	echo "</table>";
	$registros=mysqli_num_rows($resultado);
	echo "<br>El numero de registros son:" .$registros;
mysqli_close($con); //cerramos la conexión a la BD
?>
<h3>Escribe ID</h3>
<form action="Actualiza2.php" method="post">
ID_Cliente: <input type="text" name="ID_Cliente" />
<input type="submit" value="Editar" />
</form>
<br>
<br>
<br><br><br>
<h3> Realizado por: Georgina Nohemy Cruz Bolaños</h3>
<h3> <a href=MenudeActualizar.html>Menu</a></h3>
</body>
</html>