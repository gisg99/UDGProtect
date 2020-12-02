<?php
session_start();
$codigo = $_POST['codigo'];
$contrasena = $_POST['contrasena'];

$conexion=mysqli_connect("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$");
mysqli_select_db($conexion, "id15553091_udgp");
$consulta="SELECT * FROM Datos WHERE codigo='$codigo' AND contrasena = MD5('$contrasena');";
$resultado=mysqli_query($conexion, $consulta);
$filas=mysqli_num_rows($resultado);
if($filas>0){
    $_SESSION['usuario'] = $codigo;
    echo "<script>
                alert('Ingreso con Éxito');
                window.location= 'bienvenida.php'
    </script>";
}else{
    echo "<script>
                alert('Error en la autentificación, Codigo o Contraseña incorrectos');
                window.location= 'login.php'
    </script>";
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>