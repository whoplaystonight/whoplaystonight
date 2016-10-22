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

   public function obtain_countries($url){
     return $this->bll->obtain_countries_BLL($url);
   }//end of obtain_countries

   public function obtain_provinces(){
     return $this->bll->obtain_provinces_BLL();
   }//end of obtain_provinces

   public function obtain_towns($arrArgument){
     return $this->bll->obtain_towns_BLL($arrArgument);
   }//end of obtain_towns

   public function list_events(){
     return $this->bll->list_events_BLL();
   }//end of list_events

   public function details_event($id){
     return $this->bll->details_event_BLL($id);
   }//end of detail_events

}//end of event_model class
