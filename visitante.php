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

if($codigo == null || $codigo == "0" || $tipo == "Alumno"){
    header("Location:noauto.html");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Visitantes | UDG Protect</title>
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
			<a href="logout.php">Cerrar sesión</a>
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
				<h1>Registro de Visitante</h1>
				<img src="https://i.imgur.com/vIbOFKL.png" height="200px">
			</div>
			<form method="POST" action="enviarv.php">
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" placeholder="Nombre">
				<label for="identificacion">No. Identificacion:</label>
				<input type="text" name="identificacion" placeholder="Identificacion">
				<label for="motivo">Motivo de visita:</label>
				<textarea type="text" name="motivo" placeholder="Motivo"></textarea>
				<input type="submit" name="Enviar" value="Entrada">
			</form>
			<p class="texto">Checar Salida</p>
			<form method="POST" action="salidav.php">
				<label for="identificacion">No. Identificacion:</label>
				<input type="text" name="identificacion" placeholder="Identificacion">
				<input type="submit" name="Enviar" value="Salida">
			</form>
		</section>

		<footer>
			<p>Contacto:udgprotect@gmail.com</p>
			<p>Universidad de Guadalajara 2020</p>
			<p>Gabriel Sanchez | Ainoa Urquidi</p>
		</footer>
	</body>
</html>