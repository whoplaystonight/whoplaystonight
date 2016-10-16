<?php

  $path=$_SERVER['DOCUMENT_ROOT'].'/Exercise_3/';
  define('SITE_ROOT', $path);
  require(SITE_ROOT. "modules/products/model/BLL/event_bll.class.singleton.php");

  class event_model{

    private $bll;
    static $_instance;


    private function __construct(){

      $this->bll = event_bll::getInstance();

    }//end of constructor


    /* To create an unic instance of this class*/
    public static function getInstance(){

      if(!(self::$_instance instanceof self))
        self::$_instance=new self();
        return self::$_instance;

    }//End of getInstance


   public function create_event ($arrArgument){
    //  echo json_encode("estic al create_event del event model");
    //  exit;

     return $this->bll->create_event_BLL($arrArgument);

   }//end of create_event function


}//end of event_model class
