<?php
session_start();

include($_SERVER['DOCUMENT_ROOT']."/Exercise_3/modules/products/tools/functions_products.inc.php");
include($_SERVER['DOCUMENT_ROOT']."/Exercise_3/tools/upload.php");
include($_SERVER['DOCUMENT_ROOT']."/Exercise_3/tools/common.inc.php");
$path_model=$_SERVER['DOCUMENT_ROOT'].'/Exercise_3/modules/products/model/model/';
// $path= $_SERVER['DOCUMENT_ROOT'].'/Execise_3/'
// define(SITE_ROOT,$path);



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
          'country'=>$result['data']['country'],
          'province'=>$result['data']['province'],
          'town'=>$result['data']['town'],
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


      /**********To insert into DB*******************/

      $arrValue=false;
      $path_model=$_SERVER['DOCUMENT_ROOT'].'/Exercise_3/modules/products/model/model/';
      $arrValue= loadModel($path_model, "event_model", "create_event", $arrArgument);
      // echo json_encode($arrValue);
      // exit;
      if($arrValue)
          $message="Event has been successfully created.";
      else
          $message="The event registration cannot be done. Please, try it again later.";

      /********* End of insert-db code**************/


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
                          /*LOAD EVENT STATEMENT*/
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



////////////////////////////////////////////////////////////////////////////////
                          /*LOAD OR DELETE DATA STATEMENT*/
////////////////////////////////////////////////////////////////////////////////

if ((isset($_GET["load_data"]))&& ($_GET["load_data"]==true)){
  $jsondata=array();

  if (isset($_SESSION['event'])){
    $jsondata["event"]=$_SESSION['event'];
    echo json_encode($jsondata);
    exit;
  }else{
    $jsondata["event"]="";
    echo json_encode($jsondata);
    exit;
  }//end of else
}//end of load data



////////////////////////////////////////////////////////////////////////////////
                          /*LOAD country SELECT*/
////////////////////////////////////////////////////////////////////////////////

  if((isset($_GET["load_country"])) && ($_GET["load_country"]==true)){

    $json=array();
    $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';

    //$path_model=$_SERVER['DOCUMENT_ROOT'].'/Exercise_3/modules/products/model/model/';
    $json=loadModel($path_model, "event_model","obtain_countries",$url);

    if($json){
      echo $json;
      exit;
    }else{
      $json="error";
      echo $json;
      exit;
    }//end of if else

  }//end of load_country



////////////////////////////////////////////////////////////////////////////////
                          /*LOAD provinces SELECT*/
////////////////////////////////////////////////////////////////////////////////

  if((isset($_GET["load_provinces"])) && ($_GET["load_provinces"]==true)){
    //  echo json_encode("Estic al load_provinces");
    //  exit;
    $jsondata=array();
    $json=array();

    //$path_model=$_SERVER['DOCUMENT_ROOT'].'/Exercise_3/modules/products/model/model/';
    $json=loadModel($path_model, "event_model","obtain_provinces");

    if($json){
      $jsondata["provinces"]=$json;
      echo json_encode($jsondata);
      exit;
    }else{
      $jsondata["provinces"]="error";
      echo json_encode($jsondata);
      exit;
    }//end of if else

  }//end of load_provinces



////////////////////////////////////////////////////////////////////////////////
                          /*LOAD provinces SELECT*/
////////////////////////////////////////////////////////////////////////////////

  if(isset($_POST['idPoblac'])){
    $jsondata=array();
    $json=array();

    //$path_model=$_SERVER['DOCUMENT_ROOT'].'/Exercise_3/modules/products/model/model/';
    $json=loadModel($path_model, "event_model","obtain_towns",$_POST['idPoblac']);

    if($json){
      $jsondata["towns"]=$json;
      echo json_encode($jsondata);
      exit;
    }else{
      $jsondata["towns"]="error";
      echo json_encode($jsondata);
      exit;
    }//end of if else

  }//end of load_provinces



////////////////////////////////////////////////////////////////////////////////
                          /*LIST PRODUCTS CONTROLL*/
////////////////////////////////////////////////////////////////////////////////


if ($_GET["idProducts"]) {
  $id=$_GET["idProduct"];
  $arrValue=loadModel($path_model,"event_model","details_event", $id);

  if($arrValue[0]){
    loadView('modules/products/view/','details_event.php'.$arrValue[0]);
  }else{
    $message="NOT FOUND PRODUCT";
    loadView('view/inc/', '404.php',$message);
  }//end if-else list one event

}else{
  $arrValue=loadModel($path_model,"event_model","list_events";

  if($arrValue){

    loadView('modules/products/view/','list_events.php'.$arrValue);

  }else{

    $message="THERE ARE NOT ANY PRODUCTS";
    loadView('view/inc/', '404.php', $message);

  }//end if-else list all events

}//end if-else List Products
