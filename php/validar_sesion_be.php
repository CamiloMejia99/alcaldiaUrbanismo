<?php
	session_start();

	if(!isset($_SESSION['usuario'])) {
		echo '
			<script language="javascript">
				alert("Inicie sesión correctamente");
			</script>
		';
		session_destroy();
		die();
	} 

	
?> 