<?php
include("conexion_be.php");

$accion = isset($_POST["Accion"]) ? $_POST["Accion"] : "";

if (isset($accion)) {
    $id_postre = isset($_POST['txtid_postre']) ? mysqli_real_escape_string($link, $_POST['txtid_postre']) : "";

    if ($accion == "Update") {
        $query = "UPDATE postres
                  SET nombre = '".$_POST['txtnombre']."',
                          descripcion = '".$_POST['txtdescripcion']."',
						  cantidad = '".$_POST['txtcantidad']."',
						  precio = '".$_POST['txtprecio']."',
						  id_categoria = '".$_POST['categoria']."'
                          WHERE postres.id_postre = '$id_postre'";

        $result = mysqli_query($link, $query) or die ("Error en la actualizacion de los datos. Error: ".mysqli_error($link));
        echo "<script>
                alert('Los datos fueron actualizados correctamente');
                location.href='../pro.php';
                </script>";
    } elseif ($accion == "Delete" && $id_postre !== "") {
        $query = "DELETE FROM postres WHERE id_postre = '$id_postre'";
        $result = mysqli_query($link, $query) or die ("Error en el borrado de los datos. Error: ".mysqli_error($link));
        echo "<script>
                alert('Los datos fueron borrados correctamente');
                location.href='../pro.php';
                </script>";
    } else {
        echo "<script>
                alert('ID de postre no proporcionado o acción no válida');
                location.href='../pro.php';
                </script>";
    }
}
?>
