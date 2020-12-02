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
?>

<!DOCTYPE html>
<html>
	<head>
		<title>UDG Protect</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/w8JIloP.png">
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
	</head>
	<body>
		<header>
			<div class="banner">
				<a href="index.php">
					<img src="https://i.ibb.co/Fs2sm0x/Banner.jpg" width="100%">
				</a>
			</div>
			<script>
			    function red(){
			        location.href="index.php"
			    }
			    setTimeout("red()",5000);
			</script>
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
		    <h1>Bienvenido(a) <?php echo $nombre; ?></h1>
		    <img src="https://www.ntrguadalajara.com/evidimg/2018-05-10_09-05-27___4157.jpg">
		</section>

		<footer>
			<p>Contacto:udgprotect@gmail.com</p>
			<p>Universidad de Guadalajara</p>
			<p>Gabriel Sanchez | 2020</p>
		</footer>
	</body>
</html>