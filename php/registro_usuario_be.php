<?php

    include 'conexion_be.php';

    $nombre_s = $_POST['nombre_s'];
    $apellido_s = $_POST['apellido_s'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $rep_contrasena = $_POST['rep_contrasena'];


    if ($contrasena == $rep_contrasena){
        //encriptar contraseñas
        $contrasena = hash('sha512', $contrasena);
        $rep_contrasena = hash('sha512', $rep_contrasena);

        $query = "INSERT INTO usuarios(nombre_s, apellido_s, correo, usuario, contrasena, rep_contrasena) 
                VALUES('$nombre_s', '$apellido_s', '$correo', '$usuario', '$contrasena', '$rep_contrasena')"; 

        // verificar correo en la BD

        $verificar_correo = mysqli_query($conexion, "SELECT * FROM USUARIOS WHERE correo = '$correo' ");
        if(mysqli_num_rows($verificar_correo) > 0){
            echo '
                <script>
                    alert("Correo ya está en uso por otro usuario");
                    window.location = "../index.php";
                </script>
            ';
            exit ();
        }


        // verificar usuario en la BD
        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' ");
        if(mysqli_num_rows($verificar_usuario) > 0){
            echo '
                <script>
                    alert("Usuario ya está registrado, intenta con uno diferente");
                    window.location = "../index.php";
                </script>
            ';
            exit ();
        }

        $ejecutar = mysqli_query($conexion,$query);

        if($ejecutar){
            echo '
                <script>
                    alert("Usuario Registrado con Exito");
                    window.location = "../index.php";
                </script>
            ';
        }else {
            echo '
                <script>
                    alert("Ups... Algo salio mal");
                    window.location = "../index.php";
                </script>
            ';
        }
        mysqli_close($conexion);

    }else {
        echo '
            <script language="javascript">
                alert("Contraseñas no coinciden");window.location.href="../index.php"
            </script>
        ';
    }
?>