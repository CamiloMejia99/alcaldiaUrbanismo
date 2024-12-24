<?php
include 'conexion_be.php';
session_start();

// Capturar y sanitizar entradas
$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
$contrasena = $_POST['contrasena'];

// Hashear la contraseña ingresada
$contrasena_hashed = hash('sha512', $contrasena);

// Consulta para verificar el usuario y obtener la contraseña registrada
if ($stmt = $conexion->prepare("SELECT contrasena FROM usuarios WHERE correo = ?")) {
    // Bind del correo
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    
    // Obtener el resultado
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        // Usuario encontrado, verificar contraseña
        $fila = $resultado->fetch_assoc();
        if ($fila['contrasena'] === $contrasena_hashed) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['usuario'] = $correo;
            header("Location: ../perfil_usuario_be.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo '
                <script language="javascript">
                    alert("Contraseña incorrecta. Intenta de nuevo.");
                    window.location.href="../index.php";
                </script>
            ';
            exit();
        }
    } else {
        // Usuario no encontrado
        echo '
            <script language="javascript">
                alert("Usuario no encontrado. Verifica tus datos.");
                window.location.href="../index.php";
            </script>
        ';
        exit();
    }
} else {
    echo '
        <script language="javascript">
            alert("Ocurrió un error inesperado. Intenta más tarde.");
            window.location.href="../index.php";
        </script>
    ';
    exit();
}


?>
