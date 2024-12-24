<?php
	$servidor    = "localhost";
	$usuario     = "root";
	$contrasenha = "";
	$BD          = "login_register_db";
    $port        = 3307;
	
	$conexion = mysqli_connect($servidor, $usuario, $contrasenha, $BD, $port);

    if(!$conexion) {
		echo '<script language="javascript">alert("Fallo la conexion.");window.location.href="../index.php"</script>';
		die("connection failed: " . mysqli_connect_error());
	}

?>