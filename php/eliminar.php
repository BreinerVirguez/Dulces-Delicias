<?php
include("conexion_be.php");

$Numerop = $_GET['id_postre'];
$query = "SELECT * FROM postres WHERE id_postre = '".$Numerop."'";
$result = mysqli_query($link, $query) or die("Error en la consulta de productos. Error: ".mysqli_error());

if(mysqli_num_rows($result) > 0) {
    while($Rs = mysqli_fetch_array($result)) {
?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulario de Eliminación</title>
            <style>
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }

                center {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    height: 100vh;
                }

                table {
                    width: 400px;
                    border: 1px solid #ddd;
                    border-collapse: collapse;
                    background-color: #fff;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                    margin-top: 20px;
                }

                td {
                    padding: 10px;
                }

                h3 {
                    margin-bottom: 15px;
                    text-align: center;
                    color: #333;
                }

                select,
                input {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 10px;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                    box-sizing: border-box;
                }

                input[type="submit"],
                input[type="reset"],
                a.volver-btn {
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
                    margin-right: 10px;
                    display: inline-block;
                }

                input[type="submit"]:hover,
                input[type="reset"]:hover,
                a.volver-btn:hover {
                    background-color: #45a049;
                }
            </style>
        </head>
        <body>
            <center>
                <form method="POST" name="frm" action="grabaractualiza.php">
                    <table>
                        <tr>
                            <td colspan="2">
                                <h3>FORMULARIO DE ELIMINACIÓN</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>ID_POSTRE</td>
                            <td>
                                <input name="txtid_postre" type="text" readonly="readonly" value="<?php echo $Rs['id_postre']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>NOMBRE</td>
                            <td>
                                <input name="txtnombre" type="text" readonly="readonly" value="<?php echo $Rs['nombre']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>DESCRIPCION</td>
                            <td>
                                <input name="txtdescripcion" type="text" readonly="readonly" value="<?php echo $Rs['descripcion']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>CANTIDAD</td>
                            <td>
                                <input name="txtcantidad" type="text" readonly="readonly" value="<?php echo $Rs['cantidad']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>PRECIO</td>
                            <td>
                                <input name="txtprecio" type="text" readonly="readonly" value="<?php echo $Rs['precio']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td>CATEGORIA</td>
                            <td>
                                <?php
                                include("conexion_be.php");
                                $query = "SELECT id_categoria, categoria FROM categoria";
                                $result = mysqli_query($link, $query) or die("Error en la consulta de programa");
                                
                                echo "<select name='categoria'>";
                                echo "<option selected value='0'>--Seleccione una opción--</option>";
                                
                                while($row = mysqli_fetch_array($result)) {
                                    if($Rs['id_postre'] == $row[0]) {
                                        echo "<option selected value='".$row[0]."'>".$row[1]."</option>";
                                    } else {
                                        echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                    }
                                }
                                
                                echo "</select>";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="Submit" value="Eliminar" />
                                <input type="reset" name="Submit2" value="Restablecer" />
                                <a href="lista_modificar.php" class="volver-btn">Volver</a>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="Accion" value="Delete" />
                </form>
            </center>
        </body>
        </html>
<?php
    }
}

mysqli_close($link);
?>
