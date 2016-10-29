<?php
//$path=$_SERVER['DOCUMENT_ROOT'].'/Exercise_3/';
require_once($_SERVER['DOCUMENT_ROOT']."/Exercise_3/paths.php");
include SITE_ROOT . 'classes/Log.class.singleton.php';
include SITE_ROOT . 'tools/common.inc.php';
//include SITE_ROOT . 'tools/filters.inc.php';
//include SITE_ROOT . 'tools/response_code.inc.php';
//include SITE_ROOT . 'modules/events_front_end/tools/tools.inc.php';

$_SESSION['module']="events_fe";

////////////////////////////////////////////////////////////////////////////////
//                To calculate the number of pages                            //
////////////////////////////////////////////////////////////////////////////////

if((isset($_GET["num_pages"])) && ($_GET["num_pages"]==="true")){
  // $item_per_page=3;
  $path_model=SITE_ROOT .'modules/events_front_end/model/model/';

  // set_error_handler('ErrorHandler');
  //
  // try{

    $arrValue=loadModel($path_model, "events_fe_model","total_events");
  //   $get_total_rows=$arrValue[0]["total"];
  //   $pages=ceil($get_total_rows / $item_per_page);
  //
  // }catch(Exception $e){
  //
  //   showErrorPage(2,"ERROR -503 BD", 'HTTP/1.0 503 Service Unavailable', 503);
  //
  // }//end try catch
  //
  // restore_error_handler();
  //
  // if($get_total_rows){

    // $jsondata["pages"]=$pages;
    echo json_encode($arrValue);
    exit;

  // }else{
  //
  //   showErrorPage(2,"ERROR -404 NO DATA", 'HTTP/1.0 404 Not Found', 404);
  //
  // }//end of get_total_rows

}//////////////////////////end GET num_pages////////////////////////////////////
