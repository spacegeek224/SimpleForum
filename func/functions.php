<?php

function logueo($var, $link){
    
    $var1 =mysql_result(mysql_query("SELECT permitir_visitantes FROM sistema", $link), 0);
    
    if($var == 1 || $var1 == 1){
        return TRUE;
    }else{
        return FALSE;
    }
    
}    

function bbcodes($xdd) {
       $texto = htmlspecialchars($xdd);
       // BBCode 1 //
       $texto = eregi_replace("\\[i\\]([^\\[]*)\\[/i\\]","<i>\\1</i>", $texto);
       // BBCode 2 //
       $texto = eregi_replace("\\[b\\]([^\\[]*)\\[/b\\]","<b>\\1</b>", $texto);
       
       return $texto;
}


function login_check($name, $pass, $link){
    $sql =mysql_result(mysql_query("SELECT pass FROM user WHERE nick='".$name."' ", $link), 0);
   
    if(!empty($name) && !empty($pass)){
          if($sql == $pass){
                return TRUE;
            }else{
                return FALSE;
             }
       
      }
   
}

function perfil_comprobar($id, $link){
    
    $user_comprobar =mysql_result(mysql_query("SELECT nick FROM user WHERE id='".$id."' ", $link), 0);
    
    if(isset($user_comprobar)){
        return $user_comprobar;
    }else{
        return FALSE;
    }
}
?>
