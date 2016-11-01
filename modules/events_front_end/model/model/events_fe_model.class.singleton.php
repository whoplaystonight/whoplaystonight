<?php

require(SITE_ROOT."modules/events_front_end/model/BLL/events_fe_BLL.class.singleton.php");

class events_fe_model {
  private $bll;
  static $_instance;

  private function __construct(){

    $this->bll = events_fe_BLL::getInstance();

  }//end of constructor


  /* To create an unic instance of this class*/
  public static function getInstance(){

    if(!(self::$_instance instanceof self))
      self::$_instance=new self();
      return self::$_instance;

  }//End of getInstance

   public function list_events(){
     return $this->bll->list_events_BLL();
   }//end of list_events

   public function details_event($id){
     return $this->bll->details_event_BLL($id);
   }//end of detail_events

   public function page_events($arrArgument){
    return $this->bll->page_events_BLL($arrArgument);
   }//end of page_products

   public function total_events(){
     return $this->bll->total_events_BLL();
   }//end of total products

}//end of event_model class
