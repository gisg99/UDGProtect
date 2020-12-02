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
		<title>UDG Protect</title>
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
			<div>
			    <h1>Mi Perfil</h1>
				<p class="texto">
					<?php
					echo $nombre; echo "<br>";
					echo $codigo; echo "<br>";
					echo $tipo; echo "<br>";
					echo $carrera; echo "<br>";
					echo "Credencial perdida? : ";
					if($estatusc==0){
					    echo "No";
					}
					else{
					    echo "Si";
					}
					?>
				</p>
				<h2>Cambiar contraseña:</h2>
				<form method="POST" action="changep.php">
				<label for="codigo">Contraseña actual:</label>
				<input type="password" name="acontrasena" placeholder="Contraseña actual" maxlength="16">
				<label for="codigo">Contraseña nueva:</label>
				<input type="password" name="ncontrasena" placeholder="Contraseña nueva" maxlength="16">
				<label for="codigo">Confirmar Contraseña nueva:</label>
				<input type="password" name="ncontrasena2" placeholder="Contraseña nueva" maxlength="16">
				<input type="submit" value="Ingresar">
			</form>
			</div>
		</section>

		<footer>
			<p>Contacto:udgprotect@gmail.com</p>
			<p>Universidad de Guadalajara</p>
			<p>Gabriel Sanchez | 2020</p>
		</footer>
	</body>
</html>