<?php

    include 'conexion_be.php';

  $usuario= $_POST['usuario'];  
  $nombre= $_POST['nombre'];  
  $correo= $_POST['correo'];
  $contraseña=$_POST['contraseña'];
  //encritado de contraseña//
  $contraseña= hash('sha512', $contraseña);
  
  $query="INSERT INTO administradores(usuario,nombre,correo,contraseña) 
  VALUES('$usuario','$nombre','$correo','$contraseña') ";

//verificar que el correo no se repita en la base de datos//
    $verificar_correo = mysqli_query($link,"SELECT * FROM administradores WHERE correo='$correo'");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo'
        <script>
        alert("Este correo ya esta registrado, intente con otro diferente");
        window.location = "";
        </script>
    ';
    exit();
    }
    //verificar que el usuario no se repita en la base de datos//
    $verificar_usuario = mysqli_query($link,"SELECT * FROM administradores WHERE usuario='$usuario'");
    if(mysqli_num_rows($verificar_usuario) > 0){
        echo'
        <script>
        alert("Este usuario ya esta registrado, intente con otro diferente");
        window.location = "index.php";
        </script>
    ';
    exit();
    }
    $ejecutar = mysqli_query($link, $query);

    if($ejecutar){
        echo'
            <script>
            alert("Usuario almacenado exitosamente");
            window.location = "index.php";
            </script>
        ';
    }else{
        echo'
        <script>
        alert("Intentelo de nuevo, usuario no almacenado");
        window.location = "index.php";
        </script>
    ';
    }
    mysqli_close($link);
?>