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


  public function obtain_countries_DAO($url){
    $ch=curl_init();
    $timeout=10;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,$timeout);
    $file_contents=curl_exec($ch);
    curl_close($ch);

    return ($file_contents) ? $file_contents:FALSE;
  }//end of obtain_countries_DAO


 public function obtain_provinces_DAO(){
   $json=array();
   $tmp=array();
  //  echo json_encode("Estic al provinces_DAO");
  //  exit;
   $provinces=simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/resources/provinciasypoblaciones.xml');
   $result=$provinces->xpath("/lista/provincia/nombre | /lista/provincia/@id");
   for($i=0;$i<count($result);$i+=2){
     $e=$i+1;
     $province=$result[$e];
     $tmp=array(
        'id'=>(string)$result[$i], 'nombre' =>(string) $province
     );//End of array
     array_push($json,$tmp);
   }//End of for
   return $json;
 }//end of obtain_provinces_DAO


 public function obtain_towns_DAO($arrArgument){
   $json=array();
   $tmp=array();

   $filter=(string)$arrArgument;
   $xml=simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/resources/provinciasypoblaciones.xml');
   $result=$xml->xpath("/lista/provincia[@id='$filter']/localidades");

   for($i=0;$i<count($result[0]);$i++){

     $tmp=array(
        'poblacion'=>(string)$result[0]->localidad[$i]
     );//End of array
     array_push($json,$tmp);
   }//End of for
   return $json;
 }//end of obtain_provinces_DAO


 public function create_event_DAO($db, $arrArgument){

   $event_id=$arrArgument['event_id'];
   $band_id=$arrArgument['band_id'];
   $band_name=$arrArgument['band_name'];
   $description=$arrArgument['description'];
   $country=$arrArgument['country'];
   $province=$arrArgument['province'];
   $town=$arrArgument['town'];
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

   $sql="INSERT INTO event ( event_id,band_id, band_name, description, country, province, town,type_event,n_participants,date_event,type_access,date_ticket, openning,start, end,poster)
         VALUES('$event_id','$band_id','$band_name','$description','$country','$province','$town','$type_event','$n_participants','$date_event','$type_access_string','$date_ticket','$openning','$start','$end','$avatar')";

   return $db->execute($sql);

 }//end of create_event_DAO


 function list_events_DAO($db){
   $sql="SELECT * FROM event";
   $stmt =$db->execute($sql);
   return $db->listing($stmt);
 }//end of list_events_DAO

 function details_event_DAO($db,$id){
   $sql="SELECT * FROM event WHERE event_id='".$id."'";
   $stmt=$db->execute($sql);
   return $db->listing($stmt);

 }

}//end of event_dao class
