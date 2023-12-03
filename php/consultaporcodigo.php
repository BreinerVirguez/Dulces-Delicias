<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Consulta de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <center>
        <form id="form1" name="form1" method="post" onsubmit="return validar(this)" action="consultarpro.php">
            <table>
                <tr>
                    <td width="50%">INGRESE EL ID A CONSULTAR</td>
                    <td>
                        <input name="txtid_postre" type="text" id="txtid_postre" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <input type="submit" name="Submit" value="Consultar" />
                        </center>
                    </td>
                    <td>
                        <center>
                            <input type="reset" name="Submit2" value="Limpiar" />
                        </center>
                    </td>
                </tr>
            </table>
        </form>
    </center>

</body>

</html>
