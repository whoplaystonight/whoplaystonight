<?php
session_start();

include ($_SERVER['DOCUMENT_ROOT']."/Exercise_3/modules/products/tools/functions_products.inc.php");
include($_SERVER['DOCUMENT_ROOT']."/Exercise_3/tools/upload.php");




////////////////////////////////////////////////////////////////////////////////
                        /* UPLOAD AVATAR STATEMENT  */
////////////////////////////////////////////////////////////////////////////////


if((isset($_GET["upload"]))&& ($_GET["upload"]==true)){
  $result_avatar = upload_files();
  $_SESSION['result_avatar']=$result_avatar;
}



////////////////////////////////////////////////////////////////////////////////
                      /* REGISTER EVENT CALL STATEMENT  */
////////////////////////////////////////////////////////////////////////////////


if((isset($_POST['register_event_json']))){
	register_event();
}




////////////////////////////////////////////////////////////////////////////////
                      /* REGISTER EVENT FUNCTION  */
////////////////////////////////////////////////////////////////////////////////


function register_event(){

	$jsondata=array();
	$eventJSON=json_decode($_POST["register_event_json"],true);
  // echo json_encode($eventJSON);
  // exit;
  $result = validate_product($eventJSON);

  if(empty($_SESSION['result_avatar'])){
    $_SESSION['result_avatar']=array('resultado'=> true, 'error'=> "",'datos'=> 'media/default-avatar.png');
  }

  $result_avatar=$_SESSION['result_avatar'];



  /*CHECK $result*/
  if(($result['result'])&&($result_avatar['resultado'])){
      $arrArgument=array(
      		'event_id'=>$result['data']['event_id'],
      		'band_id'=>$result['data']['band_id'],
      		'band_name'=>$result['data']['band_name'],
      		'description'=>$result['data']['description'],
      		'type_event'=>$result['data']['type_event'],
      		'n_participants'=>$result['data']['n_participants'],
      	  'date_event'=>$result['data']['date_event'],
      		'type_access'=>$result['data']['type_access'],
      		'date_ticket'=>$result['data']['date_ticket'],
      		'openning'=>$result['data']['openning'],
      		'start'=>$result['data']['start'],
      		'end'=>$result['data']['end'],
          'avatar'=>$result_avatar['datos']
      );//End of arrArgument array
      // echo json_encode($arrArgument);
      // exit;

      $message="Event has been successfully created";

      /*To redirect to other page the data of $arrArgument and $message*/
      $_SESSION['event']=$arrArgument;
      $_SESSION['message']=$message;

    	$callback="index.php?module=products&view=results_products";

      $jsondata["success"]=true;
    	$jsondata["redirect"]=$callback;
    	echo json_encode($jsondata);
    	exit;

   }else{

      $jsondata["success"]=false;
      $jsondata["error"]=$result['error'];
      $jsondata["error_avatar"]=$result_avatar['error'];
      // echo json_encode($jsondata["error_avatar"]);
      // exit;


      header('HTTP/1.0 499 Bad error');
      echo json_encode($jsondata);



  }//End of if-else result
}//end of register_event function




////////////////////////////////////////////////////////////////////////////////
                            /* DELETE AVATAR STATEMENT  */
////////////////////////////////////////////////////////////////////////////////


  if(isset($_GET["delete"])&& ($_GET["delete"]==true)){
  	$_SESSION['result_avatar']=array();
    $result=remove_files();
    if($result===true){
      echo json_encode(array("res"=>true));
    }else{
      echo json_encode(array("res"=>false));
    }

  }//End of if delete



////////////////////////////////////////////////////////////////////////////////
                          /*LOAD USER STATEMENT*/
////////////////////////////////////////////////////////////////////////////////

if (isset($_GET["load"])&& $_GET["load"]==true){
  $jsondata=array();
  if (isset($_SESSION['event'])){
    $jsondata['event']=$_SESSION['event'];
  }
  if (isset($_SESSION['message'])){
    $jsondata['message']=$_SESSION['message'];
  }
  close_session();
  echo json_encode($jsondata);
  exit;

}//End of if load



////////////////////////////////////////////////////////////////////////////////
                          /*CLOSE SESSION FUNCTION*/
////////////////////////////////////////////////////////////////////////////////

function close_session(){
  unset($_SESSION['event']);
  unset($_SESSION['message']);
  $_SESSION=array();
  session_destroy();

}//end of close_session
