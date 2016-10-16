<?php

class event_dao{


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


  public function create_event_DAO($db, $arrArgument){

    $event_id=$arrArgument['event_id'];
    $band_id=$arrArgument['band_id'];
    $band_name=$arrArgument['band_name'];
    $description=$arrArgument['description'];
    $type_event=$arrArgument['type_event'];
    $n_participants=$arrArgument['n_participants'];
    $date_event=$arrArgument['date_event'];
    $type_access=$arrArgument['type_access'];
    $type_access_string=implode(",", $type_access);
    $date_ticket=$arrArgument['date_ticket'];
    $openning=$arrArgument['openning'];
    $start=$arrArgument['start'];
    $end=$arrArgument['end'];
    $avatar=$arrArgument['avatar'];
    // echo json_encode($arrArgument);
    // exit;

    $sql="INSERT INTO event ( event_id,band_id, band_name, description,type_event,n_participants,date_event,type_access,date_ticket, openning,start, end,poster)
          VALUES('$event_id','$band_id','$band_name','$description','$type_event','$n_participants','$date_event','$type_access_string','$date_ticket','$openning','$start','$end','$avatar')";

    return $db->execute($sql);

  }


}//end of event_dao class
