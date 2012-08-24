<?php
/*
 * Archivo de configuración del servidor SQL
 */

$sql =array("host"=>"localhost", "user"=>"root", "pass"=>"XXX", "origen"=>"simpleforum");
$conexion =mysql_connect($sql['host'], $sql['user'], $sql['pass']) or die(mysql_error('No se ha podido establecer el enlace al servidor MySQL con los datos proporcionados'));
mysql_select_db($sql['origen']);


?>
