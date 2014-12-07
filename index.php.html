<?php
session_start();
// Incluímos el archivo de configuración, y el de las funciones.
require 'inc/mysql.php';
require 'func/functions.php';

?>

<html>
    <head>
        <title><?php echo mysql_result(mysql_query("SELECT titulo FROM sistema", $conexion), 0); ?></title>
        <link href="styles/<?php echo mysql_result(mysql_query("SELECT tema FROM sistema", $conexion), 0); ?>/basic.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div id="barra_principal">
            <font face="arial" color="white"><?php echo mysql_result(mysql_query("SELECT nombre FROM sistema", $conexion), 0); ?> - Bienvenido <b><?php if($_SESSION['logueado'] == 0){ echo 'Visitante'; }else{ echo $_SESSION['nick']; } ?></b></font>
        </div>
        <br />
    </body>
</html>

<?php

// Llamamos la función para redireccionarlo o no.
if(logueo($_SESSION['logueado'], $conexion) == TRUE){
       //Todo Correcto, no pasa nada.
}else{
    header("Location:conexion.php");
}
    
// Consulta para los foros
$sql =mysql_query("SELECT * FROM foros" ,$conexion);

// Bucle para recojer los foros, con la consulta anterior.
while($foros =  mysql_fetch_assoc($sql)){
    $temas_num =mysql_num_rows(mysql_query("SELECT id FROM temas WHERE categoria_padre='".$foros['id_foro']."' ", $conexion));
    ?>
    <div id="foros">
    <?php
    include('source/index_foros.php');
    ?>
    </div>
    <br />
    <?php
}

?>
