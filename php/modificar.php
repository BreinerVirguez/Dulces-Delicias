<?php
include("conexion_be.php");

$Codigop = $_GET['id_postre'];

$query = "SELECT * FROM postres WHERE postres.id_postre = '$Codigop'";
$result = mysqli_query($link, $query) or die ("Error en la consulta de postres. Error: " . mysqli_error($link));

if (mysqli_num_rows($result) > 0) {
    $Rs = mysqli_fetch_array($result);
    ?>
  <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Actualización</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Reemplaza esto con la ruta correcta de tu archivo CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        center {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        form {
            width: 400px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
            padding: 20px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        h3 {
            margin-bottom: 15px;
            text-align: center;
            color: #333;
        }

        select, input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
        }

        .volver-btn {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 10px;
            text-align: center;
        }

        .volver-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <center>
        <form method="POST" name="frm" onsubmit="return validar(this)" action="grabaractualiza.php">
            <table>
                <tr>
                    <td width="50%">ID_POSTRE</td>
                    <td>
                        <input name="txtid_postre" type="text" id="txtid_postre" size="25" readonly="readonly" value="<?php echo $Rs['id_postre']; ?>"/>
                    </td>
                </tr>

                <tr>
                    <td>NOMBRE</td>
                    <td>
                        <input name="txtnombre" type="text" id="txtnombre" size="25" value="<?php echo $Rs['nombre']; ?>"/>
                    </td>
                </tr>
                
                <tr>
                    <td>DESCRIPCION</td>
                    <td>
                        <input name="txtdescripcion" type="text" id="txtdescripcion" size="25" value="<?php echo $Rs['descripcion']; ?>"/>
                    </td>
                </tr>
                
                <tr>
                    <td>CANTIDAD</td>
                    <td>
                        <input name="txtcantidad" type="text" id="txtcantidad" size="25" value="<?php echo $Rs['cantidad']; ?>"/>
                    </td>
                </tr>
                
                <tr>
                    <td>PRECIO</td>
                    <td>
                        <input name="txtprecio" type="text" id="txtprecio" size="25" value="<?php echo $Rs['precio']; ?>"/>
                    </td>
                </tr>

                <tr>
                    <td>CATEGORIA</td>
                    <td>
                        <?php
                        $query = "SELECT id_categoria, categoria FROM categoria";
                        $result = mysqli_query($link, $query) or die("error en la consulta de programa");

                        echo "<select name='categoria'>";
                        echo "<option value='0'> --Seleccione una opción-- </option>";

                        while ($row = mysqli_fetch_array($result)) {
                            if ($Rs['id_categoria'] == $row[0]) {
                                echo "<option selected value='$row[0]'>$row[1]</option>";
                            } else {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                        }

                        echo "</select>";
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <center>
                            <input type="submit" name="Submit" value="Actualizar" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="reset" name="Submit2" value="Restablecer" />
                        </center>
                    </td>
                </tr>
            </table>

            <input type="hidden" name="Accion" value="Update" />
        </form>
        <a href="lista_modificar.php" class="volver-btn">Volver</a>
    </center>
</body>
</html>

    <?php
}

mysqli_close($link);
?>
