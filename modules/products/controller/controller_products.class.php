<?php

class controller_products{

  ////////////////////////////////////////////////////////////////////////////
                                  /*CONSTRUCTOR*/
  ////////////////////////////////////////////////////////////////////////////

  public function __construct(){
    include(PRODUCTS_TOOLS. "functions_products.inc.php");
    include(TOOLS . "upload.php");
    //include(TOOLS . "common.inc.php");
    include(LOG_CLASS);
    $_SESSION['module']="products";
  }


  // public function test(){
  //   echo json_encode("I'm in test");
  //   exit;
  // }
  ////////////////////////////////////////////////////////////////////////////
                          /* CREATE EVENTS FUNCION  */
  ////////////////////////////////////////////////////////////////////////////

  /*To invoke and show the create events form*/

  public function events_form(){
    //debugECHO("HOLA");
    require_once(VIEW_PATH_INC . "header.php");
    require_once(VIEW_PATH_INC . "menu.php");

    loadView('modules/products/view/','create_products.php');

    require_once(VIEW_PATH_INC . "footer.php");

  }

  //////////////////////////////////////////////////////////////////////////////
                            /* RESULTS EVENTS FUNCION  */
  //////////////////////////////////////////////////////////////////////////////

  /*To invoke and show the result events view*/

  public function results_view(){

    require_once(VIEW_PATH_INC . "header.php");
    require_once(VIEW_PATH_INC . "menu.php");

    echo '<br><br><br><br><br><br><br><br>';
    loadView('modules/products/view/','results_products.php');

    require_once(VIEW_PATH_INC . "footer.php");

  }

  //////////////////////////////////////////////////////////////////////////////
                          /* UPLOAD AVATAR STATEMENT  */
  //////////////////////////////////////////////////////////////////////////////

  public function upload_avatar(){

    if((isset($_GET["upload"]))&& ($_GET["upload"]==true)){
      $result_avatar = upload_files();
      $_SESSION['result_avatar']=$result_avatar;
    }
  }//enf of upload avatar function

  //////////////////////////////////////////////////////////////////////////////
                        /* REGISTER EVENT FUNCTION  */
  //////////////////////////////////////////////////////////////////////////////

  public function register_event(){
    if((isset($_POST['register_event_json']))){

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

          $_SESSION['result_avatar']=array();

          // echo json_encode($arrArgument);
          // exit;

          /**********To insert into DB*******************/

          $arrValue=false;

          set_error_handler('ErrorHandler');
          try{
            $arrValue= loadModel(PRODUCTS_MODEL_MODEL, "event_model", "create_event", $arrArgument);
            /********* End of insert-db code**************/
          }catch (Exception $e){
            $arrValue=false;
          }
          // echo json_encode($arrValue);
          // exit;

          restore_error_handler();

          if($arrValue){
              $message="Event has been successfully created.";
              /*To redirect to other page the data of $arrArgument and $message*/
              $_SESSION['event']=$arrArgument;
              $_SESSION['message']=$message;
              $callback="index.php?module=products&function=results_view";

              $jsondata["success"]=true;
              $jsondata["redirect"]=$callback;
              echo json_encode($jsondata);
              exit;

          }else{

              $message="The event registration cannot be done. Please, try it again later.";
              showErrorPage(1,"",'HTTP/1.0 503 Service Unavailable', 503);
          }

       }else{

          $jsondata["success"]=false;
          $jsondata["error"]=$result['error'];
          $jsondata["error_avatar"]=$result_avatar['error'];
          // echo json_encode($jsondata["error_avatar"]);
          // exit;

          header('HTTP/1.0 499 Bad error');
          echo json_encode($jsondata);

      }//End of if-else result
    }//end of if isset register_event_json
  }//end of register_event function

  //////////////////////////////////////////////////////////////////////////////
                              /* DELETE AVATAR STATEMENT  */
  //////////////////////////////////////////////////////////////////////////////

  public function delete_events(){
    if(isset($_GET["delete"])&& ($_GET["delete"]==true)){
      $_SESSION['result_avatar']=array();
      $result=remove_files();
      if($result===true){
        echo json_encode(array("res"=>true));
      }else{
        echo json_encode(array("res"=>false));
      }
    }//End of if delete
  }//end of delete_events_function

  //////////////////////////////////////////////////////////////////////////////
                            /*LOAD EVENT STATEMENT*/
  //////////////////////////////////////////////////////////////////////////////

  public function load_event(){

    if (isset($_GET["load"])&& $_GET["load"]==true){
      $jsondata=array();

      if (isset($_SESSION['event'])){
        $jsondata['event']=$_SESSION['event'];
      }
      if (isset($_SESSION['message'])){
        $jsondata['message']=$_SESSION['message'];
      }

      if($jsondata){
        close_session();
        echo json_encode($jsondata);
        exit;
      }else{
        close_session();
        showErrorPage(1,"", 'HTTP/1.0 404 Not Found', 404);
      }

    }//End of if load

  }//end of load_event_function



  //////////////////////////////////////////////////////////////////////////////
                            /*LOAD OR DELETE DATA STATEMENT*/
  //////////////////////////////////////////////////////////////////////////////

  public function load_data_event(){
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
  }//end of function


  //////////////////////////////////////////////////////////////////////////////
                            /*LOAD country SELECT*/
  //////////////////////////////////////////////////////////////////////////////

  public function load_country_events(){

    echo json_encode("Estic al load coutry");
    exit;
    if((isset($_GET["load_country"])) && ($_GET["load_country"]==true)){

      $json=array();

      $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';

      set_error_handler('ErrorHandler');
      try{
        $json=loadModel(PRODUCTS_MODEL_MODEL, "event_model","obtain_countries",$url);

      }catch (Exception $e){
        $json=array();
      }
      restore_error_handler();


      if(stristr($json,'error')){
        $json="error";
        echo $json;
        exit;
      }

      if($json){
        echo $json;
        exit;
      }else{
        $json="error";
        echo $json;
        exit;
      }//end of if else

    }//end of load_country
}



// public function prova(){
//   echo json_encode("ESTIC AL TEST");
//   exit;
// }



  //////////////////////////////////////////////////////////////////////////////
                            /*LOAD provinces SELECT*/
  //////////////////////////////////////////////////////////////////////////////

  public function load_provinces_events(){

    if((isset($_GET["load_provinces"])) && ($_GET["load_provinces"]==true)){
      //  echo json_encode("Estic al load_provinces");
      //  exit;
      $jsondata=array();
      $json=array();

      set_error_handler('ErrorHandler');
      try{
        $json=loadModel(PRODUCTS_MODEL_MODEL, "event_model","obtain_provinces");
      }catch (Exception $e){
        $json =array();
      }
      restore_error_handler();


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

  }//end of load_provinces function



  //////////////////////////////////////////////////////////////////////////////
                            /*LOAD towns SELECT*/
  //////////////////////////////////////////////////////////////////////////////

  public function load_towns(){

    if(isset($_POST['idPoblac'])){
      $jsondata=array();
      $json=array();

      set_error_handler('ErrorHandler');
      try{
      $json=loadModel(PRODUCTS_MODEL_MODEL, "event_model","obtain_towns",$_POST['idPoblac']);
      }catch (Exception $e){
      $json=array();
      }
      restore_error_handler();

      if($json){
        $jsondata["towns"]=$json;
        echo json_encode($jsondata);
        exit;
      }else{
        $jsondata["towns"]="error";
        echo json_encode($jsondata);
        exit;
      }//end of if else

    }//end of load_towns

  }//end of load towns function

}//End of class
