<?php
session_start();
// Incluímos el archivo de configuración, y el de las funciones.
require 'inc/mysql.php';
require 'func/functions.php';

if(logueo($_SESSION['logueado'], $conexion) == TRUE){
    header("Location:index.php");
}else{
    //Regístro 
}
?>

<html>
    <head>
        <title><?php echo mysql_result(mysql_query("SELECT titulo FROM sistema", $conexion), 0); ?></title>
        <link href="styles/<?php echo mysql_result(mysql_query("SELECT tema FROM sistema", $conexion), 0); ?>/basic.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div id="barra_principal">
            <font face="arial" color="white">Estas creando una nueva cuenta</font>
        </div>
        <br />
    </body>
</html>

<div id="registro">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <b>Nombre: </b><input type="text" name="nick"><br />
        <b>Correo: </b><input type="text" name="mail"><br />
        <b>Contraseña: </b><input type="password" name="pass"><br />
        <input type="submit" Value="Registrar" name="registro"><br />
    
    
    </form>
    
</div>

<?php
$user=mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE nick='".$_POST['nick']."' ", $conexion), 0);
$correo=mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE correo='".$_POST['mail']."' ", $conexion), 0);
if($user['nick'] != $_POST['nick']){
    if($correo['correo'] != $_POST['mail']){
        echo 'Bien';
    }else{
        echo 'el correo ya existe';
    }
}else{
    echo 'el usuario ya existe';
}

?>