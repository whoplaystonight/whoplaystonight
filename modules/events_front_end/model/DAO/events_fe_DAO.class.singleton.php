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

  //list_limit_products
 function page_events_DAO($db,$arrArgument){

   $sql="SELECT * FROM event ORDER BY event_id ASC LIMIT " . $arrArgument['position'] . "," . $arrArgument['limit'];
   $stmt = $db -> execute($sql);
   return $db-> listing($stmt);
 }//end page_events_DAO

 //count_products
 function total_events_DAO($db){
   $sql="SELECT COUNT(*) as total FROM event";
   $stmt=$db->execute($sql);
   return $db->listing($stmt);
  //return "hola";
 }

  public function select_column_events_DAO($db,$arrArgument){
    $sql="SELECT  " . $arrArgument . " FROM event ORDER BY " . $arrArgument;
    $stmt=$db->execute($sql);
    return $db->listing($stmt);
  }

  public function select_like_events_DAO($db,$arrArgument){
    $sql="SELECT DISTINCT * FROM event WHERE " . $arrArgument['column'] . " like '%" .$arrArgument['like']. "%'";
    $stmt=$db->execute($sql);
    return $db->listing($stmt);
  }

  public function count_like_events_DAO($db,$arrArgument){

    $sql="SELECT COUNT(*) as total FROM event WHERE " . $arrArgument['column'] . " like '%" .$arrArgument['like']. "%'";
    $stmt=$db->execute($sql);
    return $db->listing($stmt);

    }

  public function select_like_limit_events_DAO($db,$arrArgument){
    $sql="SELECT DISTINCT * FROM event WHERE " .  $arrArgument['column'] . " like '%" .$arrArgument['like']. "%' ORDER BY event_id ASC LIMIT " . $arrArgument['position'] . "," . $arrArgument['limit'];
    $stmt=$db->execute($sql);
    return $db->listing($stmt);

  }

}//end of event_dao class
