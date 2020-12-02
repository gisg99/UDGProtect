<?php
$identificacion = $_POST['identificacion'];
$date = getdate();
$hora= $date['hours'];
$hora= $hora - 6;
$fecha = $date['mday']."/".$date['mon']."/".$date['year']." ".$hora.":".$date['minutes'].":".$date['seconds'];

$conexion=mysqli_connect("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$");
mysqli_select_db($conexion, "id15553091_udgp");

$consulta = "SELECT * FROM `Visitantes` WHERE `identificacion` = '$identificacion'";
if ($resultado = $conexion->query($consulta)){
    /* obtener el array de objetos */
    while ($fila = $resultado->fetch_row()){
        if($fila[1]==$identificacion && $fila[5]=='0'){
            $consulta2 = "UPDATE `Visitantes` SET `sefue`= '1', `salida`='$fecha' WHERE `sefue` = '0' AND `identificacion`= '$identificacion'";
            $resultado=mysqli_query($conexion, $consulta2);
            $filas=mysqli_affected_rows($conexion);
                echo "<script>
                    alert('Salida Marcada con éxito: $fecha');
                    window.location= 'index.php'
                </script>";
        }else{
            echo "<script>
                alert('El ID no tiene entrada registrada o ya salió');
                window.location= 'index.php'
            </script>";
        }
    }
    $resultado->close();
    
$conexion->close();
}
?>