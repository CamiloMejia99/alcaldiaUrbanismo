<?php 
include 'conexion_be.php';

// Función para validar la contraseña
function validar_contrasena($contrasena) {
    // Requisitos: al menos 8 caracteres, una letra minúscula, un número y un carácter especial
    $pattern = '/^(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
    return preg_match($pattern, $contrasena);
}

// Capturar y sanitizar entradas
$nombre_s = mysqli_real_escape_string($conexion, $_POST['nombre_s']);
$apellido_s = mysqli_real_escape_string($conexion, $_POST['apellido_s']);
$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
$contrasena = $_POST['contrasena'];
$rep_contrasena = $_POST['rep_contrasena'];

// Verificar que las contraseñas cumplan con los requisitos
if (!validar_contrasena($contrasena)) {
    echo '
        <script>
            alert("La contraseña debe tener al menos 8 caracteres, incluir una letra minúscula, un número y un carácter especial.");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

// Verificar que las contraseñas coincidan
if ($contrasena === $rep_contrasena) {
    // Encriptar contraseña
    $contrasena_hashed = hash('sha512', $contrasena);

    // Verificar si el correo ya está registrado
    $verificar_correo = mysqli_prepare($conexion, "SELECT 1 FROM usuarios WHERE correo = ?");
    mysqli_stmt_bind_param($verificar_correo, "s", $correo);
    mysqli_stmt_execute($verificar_correo);
    mysqli_stmt_store_result($verificar_correo);

    if (mysqli_stmt_num_rows($verificar_correo) > 0) {
        echo '
            <script>
                alert("El correo ya está registrado. Usa otro.");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    // Verificar si el usuario ya está registrado
    $verificar_usuario = mysqli_prepare($conexion, "SELECT 1 FROM usuarios WHERE usuario = ?");
    mysqli_stmt_bind_param($verificar_usuario, "s", $usuario);
    mysqli_stmt_execute($verificar_usuario);
    mysqli_stmt_store_result($verificar_usuario);

    if (mysqli_stmt_num_rows($verificar_usuario) > 0) {
        echo '
            <script>
                alert("El nombre de usuario ya está en uso. Elige otro.");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    // Insertar el nuevo usuario en la base de datos
    $insertar_usuario = mysqli_prepare($conexion, "INSERT INTO usuarios (nombre_s, apellido_s, correo, usuario, contrasena) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($insertar_usuario, "sssss", $nombre_s, $apellido_s, $correo, $usuario, $contrasena_hashed);
    
    if (mysqli_stmt_execute($insertar_usuario)) {
        echo '
            <script>
                alert("Usuario registrado con éxito.");
                window.location = "../index.php";
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Ocurrió un error al registrar el usuario. Inténtalo nuevamente.");
                window.location = "../index.php";
            </script>
        ';
    }

    // Cerrar conexiones
    mysqli_stmt_close($verificar_correo);
    mysqli_stmt_close($verificar_usuario);
    mysqli_stmt_close($insertar_usuario);
    mysqli_close($conexion);

} else {
    // Contraseñas no coinciden
    echo '
        <script>
            alert("Las contraseñas no coinciden. Inténtalo de nuevo.");
            window.location = "../index.php";
        </script>
    ';
    exit();
}
?>
