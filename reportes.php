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
				<a href="index.php">
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
		<h1>Reportes</h1>
		<div>
		<img src="https://i.imgur.com/EJk4tge.jpg" height="400px">
		<p class="texto">¿Perdiste o te robaron tu credencial?</p>
		<br>
		<p class="texto">
			En esta seccion podrás reportarla y nadie tendra acceso con tu codigo al plantel hasta que salga tu reposición.
		</p>
		<form action="rcredencial.php">
			<input type="submit" value="Reportar Credencial" name="rcredencial">
		</form>
		<p class="texto">¿Recuperaste tu credencial?</p>
		<br>
		<p class="texto">
			Si ya obtuviste tu reposición pulsa el siguiente botón.
		</p>
		<form action="enviarcredencialr.php">
			<input type="submit" value="Recuperé mi Credencial" name="credencialr">
		</form>
		</div>
		<div>
		<img src="https://i.imgur.com/4DuCK1q.jpg" height="400px">
		<p class="texto">¿Has sufrido algun robo o problema de seguridad dentro del Centro Universitario??</p>
		<br>
		<p class="texto">
			En esta seccion podrás hacer un Reporte al administrador para que le den atención a tu problema.
		</p>
		<form action="rincidencia.php">
			<input type="submit" value="Reportar Incidencia" name="rincidencia">
		</form>
		</div>
		<footer>
			<p>Contacto:udgprotect@gmail.com</p>
			<p>Universidad de Guadalajara</p>
			<p>Gabriel Sanchez | 2020</p>
		</footer>
	</body>
</html>