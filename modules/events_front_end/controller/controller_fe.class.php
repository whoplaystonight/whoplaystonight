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
//                    To get band_name column                                 //
////////////////////////////////////////////////////////////////////////////////

if((isset($_GET["autocomplete"]))&& ($_GET["autocomplete"]==="true")){
  set_error_handler('ErrorHandler');

  try{

    $band_name=loadModel(EVENT_MODEL_PATH , "events_fe_model" , "select_column_events","band_name");

  }catch (Exception $e){

    showErrorPage(2,"ERROR -503 BD", 'HTTP/1.0 503 Service Unavailable', 503);

  }
  restore_error_handler();

  if($band_name){

    $jsondata["band_name"]=$band_name;
    echo json_encode($jsondata);
    exit;

  }else{

    showErrorPage(2,"ERROR -404 NO DATA", 'HTTP/1.0 404 Not Found', 404);

  }

}//End of autocomplete

////////////////////////////////////////////////////////////////////////////////
//                    To filter events by band_name                           //
////////////////////////////////////////////////////////////////////////////////

if(isset($_GET["band_name"])){

  $result=filter_string($_GET["band_name"]);

  if($result['resultado']){

    $criteria=$result['datos'];

  }else{

    $criteria='';
  }

  set_error_handler('ErrorHandler');
  try{
    $arrArgument=array(
      "column"=> "band_name",
      "like"=>$criteria
    );
    $event=loadModel(EVENT_MODEL_PATH,"events_fe_model","select_like_events",$arrArgument);
    // echo json_encode($event);
    // exit;

  }catch(Exception $e){

    showErrorPage(2,"ERROR -503 BD", 'HTTP/1.0 503 Service Unavailable', 503);

  }
  restore_error_handler();

  if($event){

    $jsondata["event_autocomplete"]=$event;
    echo json_encode($jsondata);
    exit;

  }else{

      showErrorPage(2,"ERROR -404 NO DATA", 'HTTP/1.0 404 Not Found', 404);

  }

}//end of filter events by band name function


////////////////////////////////////////////////////////////////////////////////
//                To count the number of filtered events                      //
////////////////////////////////////////////////////////////////////////////////

if(isset($_GET["count_event"])){

  $result=filter_string($_GET["count_event"]);
  if($result['resultado']){

    $criteria=$result['datos'];

  }else{

    $criteria='';

  }
  set_error_handler('ErrorHandler');
  try{

    $arrArgument = array(
      "column"=>"band_name",
      "like"=>$criteria
    );

    $total_rows=loadModel(EVENT_MODEL_PATH,"events_fe_model","count_like_events",$arrArgument);
    // echo json_encode($total_rows[0]["total"]);
    // exit;
  }catch(Exception $e){

    showErrorPage(2,"ERROR -503 BD", 'HTTP/1.0 503 Service Unavailable', 503);

  }
  restore_error_handler();

  if ($total_rows){

    $jsondata["num_events"]=$total_rows[0]["total"];
    echo json_encode($jsondata);
    exit;

  }else{

    showErrorPage(2,"ERROR -404 NO DATA", 'HTTP/1.0 404 Not Found', 404);

  }

}//End of count event function




////////////////////////////////////////////////////////////////////////////////
//                To calculate the number of pages                            //
////////////////////////////////////////////////////////////////////////////////

if((isset($_GET["num_pages"])) && ($_GET["num_pages"]==="true")){


  if(isset($_GET["keyword"])){
    $result=filter_string($_GET["keyword"]);
    if($result['resultado']){

      $criteria=$result['datos'];

    }else{

      $criteria='';

    }

  }


  $item_per_page=3;


   set_error_handler('ErrorHandler');

    try{
         $arrArgument=array(
           "column"=>"band_name",
           "like"=>$criteria
         );

         $arrValue=loadModel(EVENT_MODEL_PATH, "events_fe_model","count_like_events",$arrArgument);
          //  echo json_encode($arrValue);
          //  exit;

         $get_total_rows=$arrValue[0]["total"];
         $pages=ceil($get_total_rows / $item_per_page);
          // echo json_encode($pages);
          // exit;

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


////////////////////////////////////////////////////////////////////////////////
//                To get the details of an event or show all vents            //
////////////////////////////////////////////////////////////////////////////////


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

      //$arrValue=false;
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

  if(isset($_GET["keyword"])){
    $result=filter_string($_GET["keyword"]);
    if($result['resultado']){
        $criteria=$result['datos'];
    }else{
        $criteria='';
    }
  }


  if(isset($_POST["keyword"])){
    $result=filter_string($_POST["keyword"]);
    if($result['resultado']){
        $criteria=$result['datos'];
    }else{
        $criteria='';
    }
  }


  set_error_handler('ErrorHandler');
  try{

    $position=(($page_number -1)*$item_per_page);
    $limit=$item_per_page;
    $arrArgument=array(
      'column'=> "band_name",
      'like'=> $criteria,
      'position'=> $position,
      'limit'=> $limit
    );
    $arrValue=loadModel(EVENT_MODEL_PATH, "events_fe_model","select_like_limit_events", $arrArgument);
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
