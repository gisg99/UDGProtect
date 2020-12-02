<?php
	session_start();
	error_reporting(0);
	$codigo= $_SESSION['usuario'];
	
	$mysqli = new mysqli("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$");
    mysqli_select_db($mysqli, "id15553091_udgp");
    $consulta = "SELECT * FROM Datos WHERE `codigo` = '$codigo'";
    
    if ($resultado = $mysqli->query($consulta)){
        /* obtener el array de objetos */
        while ($fila = $resultado->fetch_row()){
            $tipo= $fila[2];
            $nombre = $fila[3];
            $estatusc = $fila[4];
            $carrera = $fila[5];
        }
    $resultado->close();
}
$mysqli->close();

if($codigo == null || $codigo == "0"){
    header("Location:noauto.html");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Reportes | UDG Protect</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/w8JIloP.png">
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
	    <section class="topbar">
			<p>
			    <?php
			    if($codigo != null && $codigo != ''){
			    echo $codigo; echo " - "; echo $nombre;
			    $logout = '<br><a href="logout.php">Cerrar sesión</a>';
			    echo $logout;
			    }
			    else{
			    echo "Usted no ha iniciado sesión";
			    $logout = '<br><a href="login.php">Iniciar sesión</a>';
			    echo $logout;
			    }
			    ?> 
			</p>
		</section>
		<header>
			<div class="banner">
				<a href="index.html">
					<img src="https://i.ibb.co/Fs2sm0x/Banner.jpg" width="100%">
				</a>
			</div>
			<nav>
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="login.php">Iniciar sesión</a></li>
					<li><a href="ingreso.php">Ingreso</a></li>
					<li><a href="reportes.php">Reportes</a></li>
					<li><a href="profile.php">Mis datos</a></li>
					<li><a href="estadisticas.php">Estadisticas</a></li>
					<li><a href="visitante.php">Acceso de Visitante</a></li>
				</ul>
			</nav>
		</header>
		<section class="main">
			<div>
				<h1>Reportar credencial</h1>
		        <img src="https://i.imgur.com/EJk4tge.jpg" height="400px">
				<h2>Paso 1</h2>
				<p class="texto">Lo primero es ir a solicitar la reposicion en la pagina de siiau, para ello entramos al siguiente link y iniciamos sesión con nuestro codigo y contraseña</p>
		        <a href="https://mw.siiau.udg.mx/Portal/login.xhtml" target="_blank">
					<img src="https://i.imgur.com/5YuSdLH.png" height="100px">
				</a>
				<p class="texto">Ponemos nuestro codigo y contraseña e iniciamos sesión</p>
				<img src="https://i.imgur.com/T7mmOri.png" width="90%">
				<h2>Paso 2</h2>
				<p class="texto">Una vez dentro hacemos click en "Ventanilla Única de Servicios para Escolares</p>
				<img src="https://i.imgur.com/AGo51EN.png" width=90%>
				<h2>Paso 3</h2>
				<p class="texto">Después damos click en "Registro Trámites Alumnos" de la Sección "Alumno"</p>
				<img src="https://i.imgur.com/DWnGVf1.png" width=90%>
				<h2>Paso 4</h2>
				<p class="texto">Y al final tendremos la opción "Duplicado de Credencial"</p>
				<img src="https://i.imgur.com/75i90VC.png" width=90%>
				<h2>Paso 5</h2>
				<p class="texto">Una vez que hemos solicitado nuestro Duplicado en SIIAU podemos reportar nuestra Credencial en el botón de aqui abajo, para que nadie tenga acceso al Centro mientras tu credencial llega.</p>
			</div>
			<a href="enviarrc.php">
			    <img src="https://i.imgur.com/NrRpEJ5.png" height="100px">
			</a>
		</section>

		<footer>
		</footer>
	</body>
</html>