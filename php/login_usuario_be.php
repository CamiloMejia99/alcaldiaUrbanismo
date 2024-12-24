<?php 
    include 'conexion_be.php';
    session_start();
    //$_SESSION['login'] = false;

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena='$contrasena'"); 

    if (mysqli_num_rows($validar_login) > 0){

    //    $_SESSION['login'] = true;

        $_SESSION ['usuario'] = $correo;

        header("location: ../perfil_usuario_be.php");
        exit();

    }else{
        echo'
            <script language="javascript">
                alert("Usuario NO existe.");window.location.href="../index.php"
            </script>
        ';
        exit();
    }

    /*if (password_verify($contrasena, $validar_login)){

        header("location: ../perfil_usuario_be.php");
        exit ();
    }else{
        echo '
            <script language="javascript">
                alert("Contraseña incorrecta.");window.location.href="../index.php"
            </script>
        ';
        exit ();
    }*/

?>