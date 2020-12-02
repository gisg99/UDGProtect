<?php
session_start();
$codigo = $_SESSION['usuario'];

$conexion=mysqli_connect("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$");
mysqli_select_db($conexion, "id15553091_udgp");
$consulta="UPDATE `Datos` SET estatusc='1' WHERE `codigo` = '$codigo'";
$resultado=mysqli_query($conexion, $consulta);
$filas=mysqli_affected_rows($conexion);
if($filas>0){
    echo "<script>
                alert('Credencial reportada con éxito');
                window.location= 'index.php'
    </script>";
}else{
    echo "<script>
                alert('Codigo null');
                window.location= 'index.php'
    </script>";
}
mysqli_close($conexion);