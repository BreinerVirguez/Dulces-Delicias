<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Postres</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        td a {
            text-decoration: none;
            padding: 8px 12px;
            display: inline-block;
            border: 1px solid #4caf50;
            background-color: #4caf50;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        td a:hover {
            background-color: #45a049;
        }

        .volver-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .volver-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <center>
        <?php
        include("conexion_be.php");

        $query = "SELECT * FROM postres ORDER BY id_postre";
        $result = mysqli_query($link, $query) or die("Error en la consulta de postres. Error: " . mysqli_error($link));

        if (mysqli_num_rows($result) > 0) {
            ?>
            <table>
                <thead>
                    <tr>
                        <th>ID_POSTRE</th>
                        <th>NOMBRES</th>
                        <th>DESCRIPCION</th>
                        <th>CANTIDAD</th>	
                        <th>PRECIO</th>   
                        <th>CATEGORIA</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php	
                    while ($Rs = mysqli_fetch_array($result)) {
                        echo "<tr>".
                            "<td>".$Rs['id_postre']."</td>".
                            "<td>".$Rs['nombre']."</td>".
                            "<td>".$Rs['descripcion']."</td>".
                            "<td>".$Rs['cantidad']."</td>".
                            "<td>".$Rs['precio']."</td>".
                            "<td>".$Rs['id_categoria']."</td>".
                            "<td><a href='modificar.php?id_postre=".$Rs['id_postre']."'>Actualizar</a> / 
                            <a href='eliminar.php?id_postre=".$Rs['id_postre']."'>Eliminar</a></td>".
                            "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="../pro.php" class="volver-btn">Volver</a>
            <?php	
        } else {
            echo "<p>No hay postres registrados para listar</p>";
        }

        mysqli_close($link);
        ?>
    </center>
</body>
</html>
