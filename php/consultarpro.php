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
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 900px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #333;
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
            $id_postre = $_POST["txtid_postre"];
            $query = "SELECT postres.id_postre, nombre, descripcion, cantidad, precio, categoria.categoria as categoria
                    FROM postres
                    INNER JOIN categoria ON postres.id_categoria=categoria.id_categoria
                    WHERE postres.id_postre=$id_postre
                    ORDER BY 1";

            $result = mysqli_query($link, $query) or die("error en la consulta de productos");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[categoria]</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='message'>La consulta no encontró registros asociados</td></tr>";
            }

            echo " <script>
                    function redireccionar() {
                        var pagina = '../pro.php';
                        location.href = pagina;
                    }
                    setTimeout ('redireccionar()', 10000);
                </script>";
            ?>
        </table>
    </center>
</body>

</html>
