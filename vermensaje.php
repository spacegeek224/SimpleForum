<?php
session_start();
// Incluímos el archivo de configuración, y el de las funciones.
require 'inc/mysql.php';
require 'func/functions.php';

if(logueo($_SESSION['logueado'], $conexion)){
    // Todo correcto
}else{
    header("Location:conexion.php");
}
//Variables de uso Global
$categoria_padre_id=mysql_result(mysql_query("SELECT categoria_padre FROM temas WHERE id='".$_GET['id']."' ", $conexion), 0);


?>

<html>
    <head>
        <title><?php echo mysql_result(mysql_query("SELECT titulo FROM sistema", $conexion), 0); ?></title>
        <link href="styles/<?php echo mysql_result(mysql_query("SELECT tema FROM sistema", $conexion), 0); ?>/basic.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div id="barra_principal">
            <font face="arial" color="white"><b><?php if($_SESSION['logueado'] == 0){ echo 'Visitante'; }else{ echo $_SESSION['nick']; } ?></b>, Estas visualizando el tema <b><?php echo mysql_result(mysql_query("SELECT nombre FROM temas WHERE id='".$_GET['id']."' ", $conexion), 0); ?></b></font>
        </div>
        <br />
    </body>
</html>
<center><b>Tu ubicacion: </b><a href=index.php><?php echo mysql_result(mysql_query("SELECT nombre FROM sistema", $conexion), 0); ?></a> / <a href="verforo.php?id=<?php echo mysql_result(mysql_query("SELECT id_foro FROM foros WHERE id_foro=$categoria_padre_id", $conexion), 0); ?>"><?php echo mysql_result(mysql_query("SELECT nombre FROM foros WHERE id_foro=$categoria_padre_id", $conexion), 0); ?></a> / <?php echo mysql_result(mysql_query("SELECT nombre FROM temas WHERE id='".$_GET['id']."' ", $conexion), 0); ?></center><br />
    
    <?php

    
if(empty($_GET['pag'])){
    $page= 1;
}else{
    $page =$_GET['pag'];
}


if(is_numeric($page)){
    //Todo bien
}else{
    $page= 1;
}
   
$porpagina = 10;
$mul = ceil($page * $porpagina - $porpagina);

$mensajes2 =mysql_query("SELECT * FROM mensajes WHERE tema_padre='".$_GET['id']."' ORDER BY id ASC LIMIT $mul, $porpagina", $conexion);

while($mensajes =mysql_fetch_assoc($mensajes2)){
    $usuario =  mysql_fetch_assoc(mysql_query("SELECT * FROM user WHERE nick='".$mensajes['autor']."' ", $conexion));
    ?>

    <div id="mensajes">
       
    <?php
        include('source/vermensajes.php');
    ?> 
        
    </div>
    <br />
    <?php
    
}


if($page > 1){?>
<br /><center><a href ="vermensaje.php?id=<?php echo $_GET['id']?>&pag=<?php echo $page-1;?>">Anterior</a>  

<?php 
 }
 echo 'Estás en la página '.$page;
 if($page < mysql_num_rows($mensajes2)){?>
    <a href ="vermensaje.php?id=<?php echo $_GET['id']?>&pag=<?php echo $page+1;?>">Siguiente</a></center> 

 <?php
}
?>

<br />
<center><h3>Enviar Mensaje</h3></center>
        
<form method="post" action="vermensaje.php?id=<?php echo $_GET['id']; ?>&pag=<?php echo $page; ?>">
<center><textarea rows="7" cols="60" name="coment"></textarea><br />
<input type="submit" name="send" Value="Enviar Comentario">
</center>
</form>
    

<?php

$suma=mysql_result(mysql_query("SELECT posts FROM foros WHERE id_foro=$categoria_padre_id", $conexion), 0);
$suma2 =$suma+1;

if(isset($_POST['send'])){
    if(!empty($_POST['coment'])){
        $id =mysql_result(mysql_query("SELECT id FROM mensajes WHERE tema_padre='".$_GET['id']."' ORDER BY id DESC", $conexion), 0)+1;
        mysql_query("INSERT INTO mensajes (tema_padre, id, mensaje, autor, fecha) VALUES ('".$_GET['id']."', '".$id."', '".htmlspecialchars(mysql_real_escape_string($_POST['coment']))."', '".$_SESSION['nick']."', '".date("d".'/'."m")."')", $conexion);
        mysql_query("UPDATE foros SET posts=$suma2 WHERE id_foro=$categoria_padre_id", $conexion);
     }
}


?>
