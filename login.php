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
		<title>Login | UDG Protect</title>
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
		<section class="main">
		    <?php
            if($codigo != null && $codigo != ''){
			    echo "Usted ya tiene una sesión iniciada";
			    die();
			}
		    ?>
			<h1>Iniciar sesión</h1>
			<img src="https://i.imgur.com/vIbOFKL.png" height="200px">
			<form method="POST" action="validar.php">
				<label for="codigo">Codigo:</label>
				<input type="text" name="codigo" placeholder="Codigo" maxlength="15">
				<label for="contrasena">Contraseña:</label>
				<input type="password" name="contrasena" placeholder="Contraseña" maxlength="16">
				<input type="submit" value="Ingresar">
			</form>
		</section>

		<footer>
			<p>Contacto:udgprotect@gmail.com</p>
			<p>Universidad de Guadalajara</p>
			<p>Gabriel Sanchez | 2020</p>
		</footer>
	</body>
</html>