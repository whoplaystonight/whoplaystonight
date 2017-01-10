<?php

class events_fe_model {
  private $bll;
  static $_instance;

  private function __construct(){

    $this->bll = events_fe_bll::getInstance();

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

   //list_limit_products
   public function page_events($arrArgument){
    return $this->bll->page_events_BLL($arrArgument);
   }//end of page_products

   //count_products
   public function total_events(){
     return $this->bll->total_events_BLL();
   }//end of total products

   public function select_column_events($arrArgument){
     return $this->bll->select_column_events_BLL($arrArgument);

   }

   public function select_like_events($arrArgument){
     return $this->bll->select_like_events_BLL($arrArgument);
  }

   public function count_like_events($arrArgument){
     return $this->bll->count_like_events_BLL($arrArgument);

   }

   public function select_like_limit_events($arrArgument){
     return $this->bll->select_like_limit_events_BLL($arrArgument);
   }
}//end of event_model class
