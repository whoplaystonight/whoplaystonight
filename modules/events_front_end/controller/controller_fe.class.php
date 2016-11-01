<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Exercise_3/paths.php");
include LOG_CLASS;
include SITE_ROOT . 'tools/common.inc.php';
include SITE_ROOT . 'tools/filters.inc.php';
include SITE_ROOT . 'tools/response_code.inc.php';
include SITE_ROOT . 'modules/events_front_end/tools/tools_fe.inc.php';
include SITE_ROOT . 'tools/tools.inc.php';

$_SESSION['module']="events_front_end";

////////////////////////////////////////////////////////////////////////////////
//                To calculate the number of pages                            //
////////////////////////////////////////////////////////////////////////////////

if((isset($_GET["num_pages"])) && ($_GET["num_pages"]==="true")){

  $item_per_page=3;


   set_error_handler('ErrorHandler');

    try{

    $arrValue=loadModel(EVENT_MODEL_PATH, "events_fe_model","total_events");
     $get_total_rows=$arrValue[0]["total"];
     $pages=ceil($get_total_rows / $item_per_page);

    }catch(Exception $e){

      showErrorPage(2,"ERROR -503 BD", 'HTTP/1.0 503 Service Unavailable', 503);

    }//end try catch

    restore_error_handler();

    if($get_total_rows){

    $jsondata["pages"]=$pages;
    echo json_encode($jsondata);
    exit;

   }else{

     showErrorPage(2,"ERROR -404 NO DATA", 'HTTP/1.0 404 Not Found', 404);

   }//end of get_total_rows

}//////////////////////////end GET num_pages////////////////////////////////////




if(isset($_GET["idProduct"])){
  $arrValue=null;
  $id=$_GET['idProduct'];


  // $result=filter_num_int($_GET['idProduct']);
  // debugECHO($result);
  // exit;

  // if($result['resultado']){
  //   $id=$result['datos'];
  // }else{
  //   $id=1;
  // }


  set_error_handler('ErrorHandler');

  try{

      $arrValue=loadModel(EVENT_MODEL_PATH,"events_fe_model","details_event",$id);


    }catch(Exception $e){

      showErrorPage(2,"ERROR -503 BD", 'HTTP/1.0 503 Service Unavailable', 503);

    }//end try-catch

  restore_error_handler();

  if($arrValue){

    $jsondata["product"]=$arrValue[0];
    echo json_encode($jsondata);
    exit;

  }else{

    showErrorPage(2,"ERROR -404 NO DATA", 'HTTP/1.0 404 Not found', 404);

  }


}else{

  $item_per_page=3;

  if(isset($_POST["page_num"])){
    $result=filter_num_int($_POST["page_num"]);
      if($result['resultado']){
        $page_number=$result['datos'];
        // debugECHO($page_number);
        // exit;
      }

  }else{

    $page_number=1;
    // debugECHO($page_number);
    // exit;

  }

  set_error_handler('ErrorHandler');
  try{

    $position=(($page_number -1)*$item_per_page);
    // debugECHO($position);
    // exit;

    $arrArgument=array(
      'position'=> $position,
      'item_per_page'=> $item_per_page

    );

    $arrValue=loadModel(EVENT_MODEL_PATH, "events_fe_model","page_events", $arrArgument);
    // debugECHO($arrValue);
    // exit;

  }catch(Exception $e){

    showErrorPage(0,"ERROR -503 BD Unavailable");

  }

  restore_error_handler();

  if($arrValue){
    paint_template_products($arrValue);
  }else{
    showErrorPage(0, "ERROR -404 NO PRODUCTS");
  }

}//enf of if idproduct
