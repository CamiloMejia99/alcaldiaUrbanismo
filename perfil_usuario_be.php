<?php 
    session_start();
    if(!isset($_SESSION['usuario'])) {
        echo '
            <script language="javascript">
                alert("Inicie sesión correctamente");
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <h2>hola mundo</h2>
    <a href="php/cerrar_sesion.php">cerrar sesiòn</a>
</body>
</html>
