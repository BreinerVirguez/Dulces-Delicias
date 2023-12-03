<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Consulta de Productos</title>
</head>
<body>
<h1 ALIGN=CENTER>CONSULTA PRODUCTOS</h1>
<center>
<table width="900" border="1">
	<tr>
    <td>ID_POSTRE</td>
		<td>NOMBRES</td>
        <td>DESCRIPCION</td>
        <td>CANTIDAD</td>	
		<td>PRECIO</td>   
		<td>CATEGORIA</td>
		</tr>

	<?php
		include("conexion_be.php");
		$query = "SELECT postres.id_postre, nombre, descripcion, cantidad, precio, categoria.categoria as categoria
			FROM postre
			INNER JOIN categoria ON postres.id_categoria = categoria.id_categoria
			order by 1";			
			
		$result=mysql_query($query,$link) or die("error en la consulta de productos");
		if(mysql_num_rows($result)>0)
		{
			while($row=mysql_fetch_array($result))
			{
			echo "<tr>";
			echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td>
				  <td>$row[4]</td>";
			echo "</tr>";
			}
		}
		else
		{
			echo"La consulta no encontro registros asociados";
		}

		echo " <script>
			function redireccionar()
			{
				var pagina='../pro.php';
				location.href=pagina
			}
			setTimeout ('redireccionar()', 10000);
		       </script>
		";
	?>
</table>
</body>
</html>