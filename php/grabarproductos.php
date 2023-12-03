<?php
$id_postre = $_POST['txtid_postre'];
$nombre = $_POST["txtnombre"];
$descripcion = $_POST["txtdescripcion"];
$cantidad = $_POST["txtcantidad"];
$precio = $_POST["txtprecio"];  
$categoria = $_POST["categoria"];

echo "La categoria es " , var_dump($categoria);

include("conexion_be.php");
$query = "INSERT INTO postres (id_postre, nombre, descripcion, cantidad, precio, id_categoria)
VALUES ('$id_postre','$nombre','$descripcion', '$cantidad' , '$precio','$categoria')";

$cadena=mysqli_query($link,$query) or die ("Error en la insercion de datos: " . mysqli_error($link));

echo "<script>
alert('Los datos se grabaron correctamente');
location.href='../pro.php';
</script>";
?>
