<html>
<center><b>Post N#:</b> <?php echo $mensajes['id']; ?> | <b>Fecha: </b><?php echo $mensajes['fecha']; ?>
 <div id="perfil_info">
     <b>Autor: </b><a href="perfil.php?id=<?php echo $usuario['id']; ?>"><?php echo $mensajes['autor']; ?></a> | <b>Posts: </b><?php echo $usuario['mensajes']; ?> | <b>Temas: </b><?php echo $usuario['temas']; ?> | <b><?php echo mysql_result(mysql_query("SELECT puntos_mensajes FROM sistema", $conexion), 0);?>: </b><?php echo $usuario['puntos']; ?>
        </div><br />
</center>
<hr style="color: white"/>
<br />
<b>Mensaje: </b><?php echo $mensajes['mensaje']; ?><br />
<br />
<hr style="color: white"/> 
<center><b>Firma: </b> <br /><?php echo $usuario['firma']; ?></center>
</html>
