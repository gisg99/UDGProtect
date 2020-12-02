<?php
	session_start();
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
            $tipo= $fila[2];
            $nombre = $fila[3];
            $estatusc = $fila[4];
        }
    $resultado->close();
}
$mysqli->close();
?>