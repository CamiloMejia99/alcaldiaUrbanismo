<?php 
    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: perfil_usuario_be.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesión - Registro</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="assets/images/icon.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
    <header>
		<nav id="navbar-example2" class="navbar px-3 mb-3" style="background-color: #00923F;" >
			<a class="navbar-brand text-white" href=""><b>CONSULTAS URBANISMO</b></a>
			<ul class="nav nav-pillss">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cuentas</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="https://www.ipiales-narino.gov.co/">Alcaldìa</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="https://www.facebook.com/@AlcaldiaDeIpiales/?locale=es_LA">Facebook</a></li>
						<li><hr class="dropdown-divider"></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>


    <div class="row h-100 justify-content-center align-items-center">
        <div class="card col-10 border-0" style="background-color: transparent" >

            <main>
                <div class="contenedor__todo">
                    <div class="caja__trasera">
                        <div class="caja__trasera-login">
                            <h3>¿Ya tienes una cuenta?</h3>
                            <p>Inicia sesión para entrar en la página</p>
                            <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                        </div>
                        <div class="caja__trasera-register">
                            <h3>¿Aún no tienes una cuenta?</h3>
                            <p>Regístrate para que puedas iniciar sesión</p>
                            <button id="btn__registrarse">Regístrarse</button>
                        </div>
                    </div>

                    <!--Formulario para iniciar sesion y registrarse-->
                    <div class="contenedor__login-register">
                        <!--iniciar sesion-->
                        <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                            <h2>Iniciar Sesión</h2>
                            <input type="text" placeholder="Correo Electronico" name="correo" id="validationDefault05" required spellcheck="false" data-ms-editor="true">
                            <input type="password" placeholder="Contraseña" name="contrasena" id="validationDefault05" required spellcheck="false" data-ms-editor="true">
                            <button class="btn btn-outline-success">Entrar</button>
                        </form>

                        <!--registrarse-->
                        <form action="php/registro_usuario_be.php" method="POST" class="formulario__register" >
                            <h2>Regístrarse</h2>
                            <input type="text" placeholder="Nombre (s)" name="nombre_s"  id="validationDefault05" required spellcheck="false" data-ms-editor="true">
                            <input type="text" placeholder="Apellidos" name="apellido_s"id="validationDefault05" required spellcheck="false" data-ms-editor="true">
                            <input type="email" placeholder="Correo Electronico" name="correo"id="validationDefault05" required spellcheck="false" data-ms-editor="true">
                            <input type="text" placeholder="Nombre de Usuario" name="usuario" id="validationDefault05" required spellcheck="false" data-ms-editor="true">
                            <input type="password" placeholder="Contraseña" name="contrasena" id="validationDefault05" required spellcheck="false" data-ms-editor="true">
                            <input type="password" placeholder="Repita Contraseña" name="rep_contrasena" id="validationDefault05" required spellcheck="false" data-ms-editor="true">
                            <button class="btn btn-outline-success">Regístrarse</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>   
    </div>
    <br><br><br><br><br><br><br>
    <div ng-style="main.footerStyles"  style="color: rgb(255, 255, 255); background-color: rgb(29, 89, 201);">
        <div class="container container--default"><br><br>
            <div class="footer">
                <a href="http://www.colombia.co" target="_blank" tabindex="1000">
                    <img src="assets/images/co-colombia.png" alt=""style="width:50px" >
                </a>
                <a href="https://www.gov.co/" target="_blank" tabindex="1001">
                    <img src="assets/images/logo-gov-w.png" alt="" style="width:200px">
                </a>
            </div>
        </div><br><br>
    </div>
        <script src="assets/js/script.js"></script>
</body>
</html>