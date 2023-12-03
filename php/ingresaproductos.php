<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Registro de Productos</title>
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

        form {
            width: 60%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"], input[type="reset"] {
            width: 49%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
        }

        center {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <h1>ENTRA DATOS DE PRODUCTOS</h1>
    <center>
        <form id="form1" name="form1" method="post" onsubmit="return validar(this)" action="grabarproductos.php">
            <table>
                <tr>
                    <th>ID_POSTRE</th>
                    <td>
                        <input name="txtid_postre" type="text" id="txtid_postre" size="5" />
                    </td>
                </tr>
                <tr>
                    <th>NOMBRE</th>
                    <td>
                        <input name="txtnombre" type="text" id="txtnombre" size="30" />
                    </td>
                </tr>
                <tr>
                    <th>DESCRIPCION</th>
                    <td>
                        <input name="txtdescripcion" type="text" id="txtdescripcion" size="30" />
                    </td>
                </tr>
                <tr>
                    <th>PRECIO</th>
                    <td>
                        <input name="txtprecio" type="text" id="txtprecio" size="12" />
                    </td>
                </tr>
                <tr>
                    <th>CANTIDAD</th>
                    <td>
                        <input name="txtcantidad" type="text" id="txtcantidad" size="5" />
                    </td>
                </tr>
                <tr>
                    <th>CATEGORIA</th>
                    <td>
                        <?php
                        include("conexion_be.php");
                        $query = "select id_categoria, categoria from categoria";
                        $result = mysqli_query($link, $query) or die("error en la consulta de programa");

                        echo "<select name='categoria'>";
                        echo "<option selected value='0'> --Seleccione una opcion-- </option>";

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='$row[0]'> $row[1] </option>";
                        }

                        echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <input type="submit" name="Submit" value="Enviar" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="reset" name="Submit2" value="Restablecer" />
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
    <script src="assets/js/script.js"></script>
</body>

</html>
