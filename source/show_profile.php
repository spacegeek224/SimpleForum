            <b>ID:</b> <?php echo $_GET['id']; ?><br />
            <b>Nick:</b> <?php echo $perfil['nick'];?><br />
            <b>Grupo:</b> <?php echo $perfil['grupo']; ?><br />
            <?php if($perfil['mostrar_correo'] == 1){ echo '<b>Correo:</b> '.$perfil['correo']; }?>
            <hr />
            <b>Mensajes: </b><?php echo $perfil['mensajes']; ?><br />
            <b>Temas: </b><?php echo $perfil['temas']; ?><br />
            <b>Puntuación: </b><?php echo $perfil['puntos']; ?>
            <hr />
            <br /><center><?php echo $perfil['firma']; ?></center>
            <br />
            