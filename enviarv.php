<?php
$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$motivo = $_POST['motivo'];
$date = getdate();
$hora= $date['hours'];
$hora= $hora - 6;
if($hora < 0){
    $hora += 20;
    $date['mday'] -= 1;
}
$fecha = $date['mday']."/".$date['mon']."/".$date['year']." ".$hora.":".$date['minutes'].":".$date['seconds'];

$conexion=mysqli_connect("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$");
mysqli_select_db($conexion, "id15553091_udgp");
$consulta="INSERT INTO `Visitantes`(`nombre`, `identificacion`, `motivo`, `entrada`, `salida`,`sefue`) Values('$nombre','$identificacion','$motivo','$fecha','',0)";
$resultado=mysqli_query($conexion, $consulta);
echo mysqli_affected_rows($conexion);
$filas=mysqli_affected_rows($conexion);
if($filas>0){
    echo "<script>
                alert('Visitante ingresado con éxito');
                window.location= 'index.php'
    </script>";
}
mysqli_close($conexion);