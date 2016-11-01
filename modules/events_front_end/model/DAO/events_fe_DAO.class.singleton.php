<?php

class events_fe_DAO{


  static $_instance;


  private function __construct(){

    //Constructor is void

  }//end of constructor


  /* To create an unic instance of this class*/
  public static function getInstance(){

    if(!(self::$_instance instanceof self))
    self::$_instance=new self();
    return self::$_instance;

  }//End of getInstance

 function list_events_DAO($db){
   $sql="SELECT * FROM event";
   $stmt =$db->execute($sql);
   return $db->listing($stmt);
 }//end of list_events_DAO

 function details_event_DAO($db,$id){
   $sql="SELECT * FROM event WHERE event_id='".$id."'";
   $stmt=$db->execute($sql);
   return $db->listing($stmt);

 }//end of details_event_DAO

 function page_events_DAO($db,$arrArgument){
   $position=$arrArgument['position'];
   $item_per_page=$arrArgument['item_per_page'];
   $sql="SELECT * FROM event ORDER BY event_id ASC LIMIT " . $position . "," . $item_per_page;
   $stmt = $db -> execute($sql);
   return $db-> listing($stmt);
 }//end page_events_DAO

 function total_events_DAO($db){
   $sql="SELECT COUNT(*) as total FROM event";
   $stmt=$db->execute($sql);
   return $db->listing($stmt);
  //return "hola";
 }



}//end of event_dao class
