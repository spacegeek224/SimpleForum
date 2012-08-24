<?php
session_start();
require 'inc/mysql.php';
require 'func/functions.php';

if(perfil_comprobar($_GET['id'], $conexion) == FALSE){
    $text = 'El perfil que intenta visualizar no existe'; // Utilizada para mostrar el error
}

if(logueo($_SESSION['logueado'], $conexion) == TRUE){
    // Bien
}else{
    header("Location:conexion.php");
}

$perfil =mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE id='".$_GET['id']."' ", $conexion));
?>

<html>
    <head>
        <title><?php echo mysql_result(mysql_query("SELECT titulo FROM sistema", $conexion), 0); ?> - Perfil</title>
        <link href="styles/<?php echo mysql_result(mysql_query("SELECT tema FROM sistema", $conexion), 0); ?>/basic.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div id="barra_principal">
            <font face="arial" color="white"><b><?php if($_SESSION['logueado'] == 0){ $visi ='Visitante'; echo $visi; }else{ echo $_SESSION['nick']; } ?></b>, Estas visualizando el perfil de <b><?php echo $perfil['nick']; ?></b></b></font>
        </div>
        <br />
        <h1><center><?php echo $text; ?></center></h1>
        
        <?php if(empty($text)){?>
        <div id="perfil">
            
            <?php include('source/show_profile.php'); ?>
        
        </div>
        <br />
        <?php if(empty($visi)){?>
        <center><b>Acciones</b><br />
        <?php if($_SESSION['nick'] == $perfil['nick']){ echo '<a href="editp.php">editar perfil</a>';}; ?><br />
            <a href="sendmp.php">Enviar MP</a>    
        dd
        
        
        
        </center>
            <?php } ?>
    
        <?php }?>
    </body>
</html>
