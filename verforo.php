<?php
session_start();
// Incluímos el archivo de configuración y funciones
require 'inc/mysql.php';
require 'func/functions.php';

if(logueo($_SESSION['logueado'], $conexion) == TRUE){
    // Nada, todo bien
}else{
    header("Location:conexion.php");
}
?>

<html>
    <head>
        <title><?php echo mysql_result(mysql_query("SELECT titulo FROM sistema", $conexion), 0); ?></title>
        <link href="styles/<?php echo mysql_result(mysql_query("SELECT tema FROM sistema", $conexion), 0); ?>/basic.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div id="barra_principal">
            <font face="arial" color="white">Bienvenido <b><?php if($_SESSION['logueado'] == 0){ echo 'Visitante'; }else{ echo $_SESSION['nick']; } ?></b>, esta visualizando el foro <?php echo mysql_result(mysql_query("SELECT nombre FROM foros WHERE id_foro='".$_GET['id']."' ", $conexion), 0); ?></font>
        </div>
        <br />
    </body>
</html>


<?php

// Cojiendo todos los temas donde la categoria padre es la que nos llega por _GET
$temas2 =mysql_query("SELECT * FROM temas WHERE categoria_padre='".$_GET['id']."' ", $conexion);

// Llamando la consulta anterior para recojer todos los temas
while($temas =mysql_fetch_assoc($temas2)){
    $mensajes =  mysql_num_rows(mysql_query("SELECT id FROM mensajes WHERE tema_padre='".$temas['id']."' ", $conexion));
    ?>
    <div id="foros">
    <?php
    include('source/verforos.php');
    ?>
    </div>
    <br />
    <?php
    }
?>












