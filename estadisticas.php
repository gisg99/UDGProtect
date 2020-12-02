<?php
	session_start();
	error_reporting(0);
	$codigo= $_SESSION['usuario'];
	$enero=0;$febrero=0;$marzo=0;$abril=0;$mayo=0;$junio=0;$julio=0;$agosto=0;$septiembre=0;$octubre=0;$noviembre=0;$diciembre=0;$activos=0;$reportados=0;
	
	//Conexion 1 para obtener los datos del usuario
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
//Se cierra la conexion 1

//Conexion 2 para obtener los datos de la grafica 1
$mysqli = new mysqli("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$","id15553091_udgp");

/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}
if ($result = $mysqli->query("SELECT `fecha` FROM Reporte WHERE 1")){
    while ($fila = $result->fetch_row()){
        $mes = $fila[0];
        if($mes[3]=='0'&&$mes[4]=='1')$enero++;
        if($mes[3]=='0'&&$mes[4]=='2')$febrero++;
        if($mes[3]=='0'&&$mes[4]=='3')$marzo++;
        if($mes[3]=='0'&&$mes[4]=='4')$abril++;
        if($mes[3]=='0'&&$mes[4]=='5')$mayo++;
        if($mes[3]=='0'&&$mes[4]=='6')$junio++;
        if($mes[3]=='0'&&$mes[4]=='7')$julio++;
        if($mes[3]=='0'&&$mes[4]=='8')$agosto++;
        if($mes[3]=='0'&&$mes[4]=='9')$septiembre++;
        if($mes[3]=='1'&&$mes[4]=='0')$octubre++;
        if($mes[3]=='1'&&$mes[4]=='1')$noviembre++;
        if($mes[3]=='1'&&$mes[4]=='2')$diciembre++;
    }
    $result->close();
}
/* cerrar la conexión */
$mysqli->close();
//Se cierra la conexion 2

//Conexion 3 para obtener los datos de la grafica 2
$mysqli = new mysqli("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$","id15553091_udgp");
/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}
if ($result = $mysqli->query("SELECT `estatusc` FROM Datos WHERE 1")){
    while ($fila = $result->fetch_row()){
        $estatus = $fila[0];
        if($estatus=='0')$activos++;
        if($estatus=='1')$reportados++;
    }
    $result->close();
}
/* cerrar la conexión */
$mysqli->close();
//Se cierra la conexion 3

if($codigo == null || $codigo == "0"){
    header("Location:noauto.html");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Estadísticas | UDG Protect</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://i.imgur.com/w8JIloP.png">
		<link rel="stylesheet" type="text/css" href="estilos.css"/>
		<script src="Chart.js"></script>
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
			<h1>Estadísticas</h1>
			<div>
		        <h2>Gráfica de Reportes</h2>
				<p class="texto">En esta grafica está representado el numero de reportes que hacen los usuarios cada mes</p>
				<canvas id="Grafica" width="200" height="100"></canvas>
			</div>
			<div>
		        <h2>Gráfica de Credenciales Activas / Reportadas</h2>
				<p class="texto">En esta grafica podemos ver el total de credenciales que estan activas y por el contrario las que estan reportadas por extravio o robo</p>
				<canvas id="Grafica2" width="200" height="100"></canvas>
			</div>
		</section>
		<footer>
			<p>Contacto:udgprotect@gmail.com</p>
			<p>Universidad de Guadalajara</p>
			<p>Gabriel Sanchez | 2020</p>
		</footer>
	</body>
	<script>
	var Enero = <?php echo $enero ?>;
	var Febrero = <?php echo $febrero ?>;
	var Marzo = <?php echo $marzo ?>;
	var Abril = <?php echo $abril ?>;
	var Mayo = <?php echo $mayo ?>;
	var Junio = <?php echo $junio ?>;
	var Julio = <?php echo $julio ?>;
	var Agosto = <?php echo $agosto ?>;
	var Septiembre = <?php echo $septiembre ?>;
	var Octubre = <?php echo $octubre ?>;
	var Noviembre = <?php echo $noviembre ?>;
	var Diciembre = <?php echo $diciembre ?>;
	var Activos = <?php echo $activos ?>;
	var Reportados = <?php echo $reportados ?>;
		let miCanvas=document.getElementById("Grafica").getContext("2d");

		var chart = new Chart(miCanvas,{
			type:"bar",
			data:{
				labels:["Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre","Enero","Febrero","Marzo","Abril","Mayo"],
				datasets:[
					{	
						label:"Reportes en los ultimos meses",
						backgroundColor:[
						'#ac0000',
						'#ffcb01',
						'#060606',
						'#0b16ae',
						'#ac0000',
						'#ffcb01',
						'#060606',
						'#0b16ae',
						'#ac0000',
						'#ffcb01',
						'#060606',
						'#0b16ae',
						],
						borderColor:"rgba(255,255,255,1)",
						borderWidth:2,
						data:[Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre,Enero,Febrero,Marzo,Abril,Mayo],
					}
				]
			}
		})
		
		let miCanvas2=document.getElementById("Grafica2").getContext("2d");
		var chart = new Chart(miCanvas2,{
			type:"doughnut",
			data:{
				labels:["Activas","Reportadas"],
				datasets:[
					{	
						label:"Reportes en los ultimos meses",
						backgroundColor:[
						'#0b16ae',
						'#ac0000',
						],borderWidth:0,
						data:[Activos,Reportados],
					}
				]
			}
		})
 	</script>
</html>