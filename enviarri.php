<?php
	session_start();
	error_reporting(0);
	$codigo= $_SESSION['usuario'];
	
	$mes = "0";
	$dia = "0";
	$date = getdate();
	$month = $date['mon'];
	$day = $date['mday'];
	if($month<10){
	    $mes = $mes.$month;
	}else{
	    $mes = $month;
	}
	if($day<10){
	    $dia = $dia.$day;
	}else{
	    $dia = $day;
	}
    $fecha = $dia."/".$mes."/".$date['year'];
	$mysqli = new mysqli("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$");
    mysqli_select_db($mysqli, "id15553091_udgp");
    $consulta = "SELECT * FROM Datos WHERE `codigo` = '$codigo'";
    
    if ($resultado = $mysqli->query($consulta)){
        /* obtener el array de objetos */
        while ($fila = $resultado->fetch_row()){
            $nombre = $fila[3];
        }
    $resultado->close();
}
$mysqli->close();
$tipo = $_POST['tipo'];
$incidencia = $_POST['incidencia'];
$conexion=mysqli_connect("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$");
mysqli_select_db($conexion, "id15553091_udgp");

$consulta="SELECT `id_reporte` FROM Reporte ORDER by id_reporte DESC LIMIT 1";
$resultado=mysqli_query($conexion, $consulta);
    while ($fila = $resultado->fetch_row()){
        $id = $fila[0];
        $id = $id + 1;
    }

$consulta2="INSERT INTO `Reporte`(`codigo`,`descripcion`, `id_reporte`, `nombre`,`tipo`, `fecha`)Values('$codigo','$incidencia','$id','$nombre','$tipo','$fecha')";
$resultado=mysqli_query($conexion, $consulta2);
$filas=mysqli_affected_rows($conexion);
if($filas>0){
    echo "<script>
                alert('Problema reportado con éxito | ID de Reporte: $id');
                window.location= 'index.php'
    </script>";
}
	echo "holi";
mysqli_close($conexion);