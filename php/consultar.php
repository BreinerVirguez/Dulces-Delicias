<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Consulta de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-top: 30px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <h1>CONSULTA PRODUCTOS</h1>
    <center>
        <table>
            <tr>
                <th>ID_POSTRE</th>
                <th>NOMBRES</th>
                <th>DESCRIPCION</th>
                <th>CANTIDAD</th>
                <th>PRECIO</th>
                <th>CATEGORIA</th>
            </tr>

            <?php
            include("conexion_be.php");
            $query = "SELECT postres.id_postre, nombre, descripcion, cantidad, precio, categoria.categoria as categoria
                      FROM postres
                      INNER JOIN categoria ON postres.id_categoria = categoria.id_categoria
                      ORDER BY 1";

            $result = mysqli_query($link, $query) or die("error en la consulta de productos");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[categoria]</td>";
                    echo "</tr>";
                }
            } else {
                echo "La consulta no encontró registros asociados";
            }

            echo "<script>
                    function redireccionar()
                    {
                        var pagina='../pro.php';
                        location.href=pagina
                    }
                    setTimeout('redireccionar()', 10000);
                  </script>";
            ?>

        </table>
    </center>
</body>

</html>
