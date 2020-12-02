<?php
	session_start();
	error_reporting(0);
	$codigo= $_SESSION['usuario'];
	$acontrasena = $_POST['acontrasena'];
	$ncontrasena = $_POST['ncontrasena'];
	$ncontrasena2 = $_POST['ncontrasena2'];
	
    if($ncontrasena == $ncontrasena2){
        $conexion=mysqli_connect("localhost","id15553091_gisg99","i%4K@(Ss1T%1Y8T$");
        mysqli_select_db($conexion, "id15553091_udgp");
        $sql="UPDATE `Datos` SET `contrasena`= MD5('$ncontrasena') WHERE `codigo` = '$codigo' AND `contrasena` = MD5('$acontrasena')";
    
        if(mysqli_query($conexion,$sql)){
            if(mysqli_affected_rows($conexion)>0){
                echo "<script>
                    alert('Se cambió la contraseña con éxito');
                    window.location= 'index.php'
                </script>";
            }else{
                echo "<script>
                    alert('La contraseña actual es incorrecta');
                    window.location= 'profile.php'
                </script>";
            }
        }
        $conexion->close();
    }else{
    echo "<script>
        alert('Las contraseñas nuevas no coinciden');
        window.location= 'profile.php'
    </script>";
    }
?>