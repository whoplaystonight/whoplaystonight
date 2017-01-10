<?php

class log{

  private $path;
  static $_instance;

  public function __construct(){
    $this->path = GENERAL_LOG_DIR;
  }

  public static function getInstance(){
    if(!(self::$_instance instanceof self))
    self::$_instance =new self();
    return self::$_instance;
  }//end of get instance

  /*Introduce la linea de error en el archivo de log general en modo append
  $file=fopen($this->path, 'a')*/
  public function add_log_general($text, $controller, $function){
    $file=fopen($this->path, 'a');
    fwrite($file, date('d/m/y h:i:s A')."|".$text."|".$controller."|". $function ."\n");
    fclose($file);
  }//end of add_log_general

  /*Introduce la linea de error en el archivo de log de usuario mediante
  la funcion de PHP error_log("mensaje", modo(abre, escribe y cierra), ruta ( indicada en paths.php))*/
  public function add_log_user($msg, $username='', $controller, $function){
    $date=date('d.m.Y h:i:s');
    $log= $msg."|".$date."| User: " .$username. "|" .$controller . "|" .$function ."\n";
    error_log($log, 3, USER_LOG_DIR);
  }

}//end of class log
