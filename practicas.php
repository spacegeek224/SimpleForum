    <?php

    /*Totalmente creado por Jordi H. Castro, prohibido la reproduccion parcial i.o completa sin permiso previo*/

    /*Classe de parametros del servidor y informacion*/
    class sql
    {

        /**Creando las variables privadas del enlace para la classe*/
        private $server;
        private $user;
        private $pass;
        private $data;

        /*Variables del enlace*/
        var $link;

        /*Seleccion SQL*/
        private $data_link;

        /*Cargando los Objetos*/
        function __construct($serv, $us, $pass, $dat){

            /*Asignando un valor de por defecto a las variables de la classe*/
            $this->server=$serv;
            $this->user=$us;
            $this->pass=$pass;
            $this->data=$dat;

            /*Estableciendo enlace y seleccion de base de datos con datos proporcionados*/
            $this->link=mysql_connect($this->server, $this->user, $this->pass);
            $this->data_link=  mysql_select_db($this->data, $this->link);

        }

        /*Mostrar la configuracion Actual del enlace*/
        public function mostrar_config_actual(){
            echo '<b>Servidor:</b> '.$this->server.'<br />';
            echo '<b>Usuario:</b> '.$this->user.'<br />';
            echo '<b>Contrasenya:</b> '.$this->pass.'<br />';
            echo '<b>Base de Datos (Origen):</b> '.$this->data.'<br />';
        }   

        /*El estado del enlace devuelto en formato leible*/
        public function estado_enlace(){
            $stat =explode('  ', mysql_stat($this->link));
            foreach($stat as $campo => $valor){
                echo '<b>'.$campo.'</b> '.$valor.'<br />';
            }
        }

    }
    
    
    /*Trabajar con el servidor SQL*/
    class sql_operaciones extends sql
    {
        function __construct(){
            parent::__construct();
        }
        //////SELECCIONES/////////
        public function seleccionar_valor_exacto($columna, $fila){

            $consulta =mysql_result(mysql_query("SELECT $columna FROM $fila", $this->link), 0);
            echo $consulta;
            mysql_free_result($consulta);
            mysql_close($this->link);

        }
        public function seleccionar_valor_condicion($columna, $fila, $condicion, $c_valor){
            $consulta =mysql_result(mysql_query("SELECT $columna FROM $fila WHERE $condicion='".$c_valor."' ", $this->link), 0);
            echo $consulta;
            mysql_free_result($consulta);
            mysql_close($this->link);
        } 
        //////FIN DE SELECCIONES//////

        //// INSERCIONES ////////
        public function insertar_valor($columna, $tablas, $valores){
            $consulta = "INSERT INTO $columna $tablas VALUES $valores";
            mysql_query($consulta, $this->link);
            mysql_free_result($consulta);
            mysql_close($this->link);
        }
        ///// FIN DE INSERCIONES /////

        //// Converitr Matriz ////////
        public function convertir_matriz($columna, $condicion, $c_condicion, $matriz2){
            $consulta = "SELECT * FROM $columna WHERE $condicion='".$c_condicion."' ";
            $matriz =mysql_fetch_assoc(mysql_query($consulta, $this->link));
            return $matriz["$matriz2"];
            mysql_free_result($matriz);
            mysql_close($this->link);
        }
        ///// FIN DE Matriz /////
        
        ///// ACTUALIZACIONES ///////
        public function actualizar_tablas($columna, $fila, $valor){
            $consulta ="UPDATE $columna SET $fila='".$valor."' ";
            mysql_query($consulta, $this->link);
            mysql_free_result($consulta);
            mysql_close($this->link);

        }

        public function actualizar_tablas_condicion($columna, $fila, $valor, $condicion, $c_valor){
            $consulta ="UPDATE $columna SET $fila='".$valor."' WHERE $condicion='".$c_valor."' ";
            mysql_query($consulta, $this->link);
            mysql_free_result($consulta);
            mysql_close($this->link);

        }
        ///// FIN DE ACTUALIZACIONES /////
        
        /////BORRAR REGISTROS////////////
 
        public function borrar_registro($columna, $condicion, $c_condicion){
            $consulta ="DELETE FROM $columna WHERE $condicion='".$c_condicion."' ";
            mysql_query($consulta, $this->link);
            mysql_free_result($consula);
            mysql_clos($this->link);
            
        }
        
        ///// FIN /////////////////////
    }

    //////////////////Construccion SQL y estado////////////////
    $sql =new sql('localhost', 'root', 'jordis99', 'simpleforum');
   
    //Muestra Configuracion actual del servidor
    /*$sql->mostrar_config_actual();*/
   
    //Estado del enlace
    $sql->estado_enlace();

    /////////////////////Operaciones SQL///////////////////////
    /*$dato =new sql_operaciones();*/
    
    /*$var =$_GET['id'];
    echo $dato->convertir_matriz('user', 'id', "$var", 'correo');*/
    
    //Seleccionar Dato Exacto
    /*$dato->seleccionar_valor_exacto('nombre', 'sistema');*/
    
    //Seleccionar Dato Condicion
    /*$dato->seleccionar_valor_condicion('nick', 'user', 'id', '1');*/

    //Insertar Datos
    /*$dato->insertar_valor('test', '(testit, testit2)', "('".$test."', '".$test2."')");*/

    //Actualizar tablas masivamente
    /*$dato->actualizar_tablas('sistema', 'nombre', 'SimpleForum');*/
    
    //Actualizar valor concreto
    /*$dato->actualizar_tablas_condicion('user', 'nick', 'blue', 'id', '1');*/
    
    //Borrar Registro
    /*$dato->borrar_registro('test', 'testit2', '0');*/
    
    

?>
                                   
