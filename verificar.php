<?php
$codigo = $_POST['codigo'];
$date = getdate();
$hour = $date['hours'] - 5;
$hora = $hour.":".$date['minutes'].":".$date['seconds'];
if($hour < 0){
    $hour = $hour + 24;
}

$conexion=mysqli_connect("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$");
mysqli_select_db($conexion, "id15553091_udgp");
$consulta="SELECT * FROM Datos WHERE codigo='$codigo'";
if ($resultado = $conexion->query($consulta)){
        /* obtener el array de objetos */
        while ($fila = $resultado->fetch_row()){
                $estatus= $fila[4];
        }
    $resultado->close();
}
$conexion->close();
if($estatus == 1){
    echo "<script>
        alert('Atencion! La credencial con la que se quiere ingresar se encuentra reportada');
        window.location= 'ingreso.php'
    </script>";
}

$conexion=mysqli_connect("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$");
mysqli_select_db($conexion, "id15553091_udgp");
$consulta="SELECT * FROM Datos WHERE codigo='$codigo'";
$resultado=mysqli_query($conexion, $consulta);
$filas=mysqli_num_rows($resultado);
if($filas>0){
    echo "<script>
                alert('Bienvenido $codigo: $hora');
                window.location= 'ingreso.php'
    </script>";
}else{
    echo "<script>
                alert('ERROR! Codigo no encontrado');
                window.location= 'ingreso.php'
    </script>";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>