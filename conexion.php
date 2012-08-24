<?php
session_start();
// Incluímos el archivo de configuración, y el de las funciones.
require 'inc/mysql.php';
require 'func/functions.php';

if(logueo($_SESSION['logueado'], $conexion) == TRUE){
    header("Location:index.php");
}else{
    //loguearse
}
?>

<html>
    <head>
        <title><?php echo mysql_result(mysql_query("SELECT titulo FROM sistema", $conexion), 0); ?> - Conexión</title>
        <link href="styles/<?php echo mysql_result(mysql_query("SELECT tema FROM sistema", $conexion), 0); ?>/basic.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div id="barra_principal">
            <font face="arial" color="white"><?php echo mysql_result(mysql_query("SELECT nombre FROM sistema", $conexion), 0); ?> - Bienvenido <b><?php if($_SESSION['logueado'] == 0){ echo 'Visitante'; }else{ echo $_SESSION['nick']; } ?></b></font>
        </div>
        <br />
    </body>
</html>

<div class="clearfooter"></div>
<b style="margin-right: 30%; margin-left: 30%"><font size="5">Conexión</font></b >
<div id="login">
    
    <form method="post" action="<?php  echo $_SERVER['PHP_SELF']; ?>">
        <b>Nombre: </b><input style ="margin-right: 30%; margin-left: 6%" type="text" size="20" name="nombre" /><br />
        <b>Contraseña:  </b><input style="margin-right: 30%; margin-left: 0%" type="password" size="20" name="password" /><br />
    <input type="submit" value="Entrar" name="enviar">
    </form>   
   
</div>

<?php
if(isset($_POST['enviar'])){
    
    if(login_check($_POST['nombre'], $_POST['password'], $conexion) == TRUE){
        $_SESSION['nick'] = $_POST['nombre'];
        $_SESSION['logueado'] = 1;
        header("Location:index.php");
    }else{
        $_SESSION['logueado'] = 0;
    }
    
    
}


?>