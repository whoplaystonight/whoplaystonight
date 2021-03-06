<?php

class controller_events_front_end{

  //////////////////////////////////////////////////////////////////////////////
  //                              CONSTRUCTOR                                 //
  //////////////////////////////////////////////////////////////////////////////

  public function __construct(){

    include(EVENTS_TOOLS. "tools_fe.inc.php");
    include LOG_CLASS;

    $_SESSION['module']="events_front_end";

  }//end of constructor

  //////////////////////////////////////////////////////////////////////////////
  //                         LIST EVENTS VIEW FUNCTION                        //
  //////////////////////////////////////////////////////////////////////////////

  public function list_events(){

    loadView('modules/events_front_end/view/' , 'list_products.php');

  }//end of list_events


  //////////////////////////////////////////////////////////////////////////////
  //                    To get band_name column                               //
  //////////////////////////////////////////////////////////////////////////////

  public function autocomplete_events(){

      if((isset($_GET["aux"]))&& ($_GET["aux"]==="true")){
        // echo json_encode("estic al autocomplete events");
        // exit;

        set_error_handler('ErrorHandler');

        try{

          $band_name=loadModel(EVENTS_MODEL_MODEL , "events_fe_model" , "select_column_events","band_name");

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

  }//end autocomplete_events function

  //////////////////////////////////////////////////////////////////////////////
  //                    To filter events by band_name                         //
  //////////////////////////////////////////////////////////////////////////////

  public function band_names(){


      if(isset($_GET["aux"])){

        $result=filter_string($_GET["aux"]);

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
          $event=loadModel(EVENTS_MODEL_MODEL,"events_fe_model","select_like_events",$arrArgument);
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

  }//end of band_names function

  ////////////////////////////////////////////////////////////////////////////////
  //                To count the number of filtered events                      //
  ////////////////////////////////////////////////////////////////////////////////

  public function count_events(){


      if(isset($_GET["aux"])){

        $result=filter_string($_GET["aux"]);
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

          $total_rows=loadModel(EVENTS_MODEL_MODEL,"events_fe_model","count_like_events",$arrArgument);
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

      }//End of if count event

  }//end of count_event function


  //////////////////////////////////////////////////////////////////////////////
  //                To calculate the number of pages                          //
  //////////////////////////////////////////////////////////////////////////////

  public function number_pages_events(){
    // echo json_encode("Estic al number_pages_events");
    // exit;


      if((isset($_GET["aux"])) && ($_GET["aux"]==="true")){
        // echo json_encode("Estic al number_pages_events");
        // exit;
      //if((isset($_POST["num_pages"])) && ($_POST["num_pages"]==="true")){


        if(isset($_GET["aux2"])){

          $result=filter_string($_GET["aux2"]);
          if($result['resultado']){

            $criteria=$result['datos'];

          }else{

            $criteria='';

          }
          // echo json_encode($criteria);
          // exit;
        }else{

          $criteria='';

        }
        $item_per_page=3;


        set_error_handler('ErrorHandler');

          try{
               $arrArgument=array(
                 "column"=>"band_name",
                 "like"=>$criteria
               );

               $arrValue=loadModel(EVENTS_MODEL_MODEL, "events_fe_model","count_like_events",$arrArgument);
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

        }//end GET num_pages

  }//end num_pages function


  public function view_error_true(){
    if((isset($_POST["view_error"]))&& ($_POST["view_error"]==="true")){
      showErrorPage(0,"ERROR - 503 BD Unavailable");
    }
  }

  public function view_error_false(){
    if((isset($_POST["view_error"]))&& ($_POST["view_error"]==="false")){
      showErrorPage(3,"RESULTS NOT FOUND");
    }
  }

  //////////////////////////////////////////////////////////////////////////////
  //                     To show the selected event                           //
  //////////////////////////////////////////////////////////////////////////////

  public function idProducts(){

      if(isset($_POST["idProduct"])){
        $arrValue=null;
        $id=$_POST['idProduct'];


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
            $arrValue=loadModel(EVENTS_MODEL_MODEL,"events_fe_model","details_event",$id);

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
      }//end of idProduct
  }//end of idProduct function


  //////////////////////////////////////////////////////////////////////////////
  //                     To show all the events                               //
  //////////////////////////////////////////////////////////////////////////////

  public function obtain_events(){
    // debugECHO("Estic al obtain events");
    // exit;

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

        if(isset($_GET["aux"])){
          $result=filter_string($_GET["aux"]);
          if($result['resultado']){
              $criteria=$result['datos'];
          }else{
              $criteria='';
          }
        }else{
            $criteria='';
        }
        //debugECHO($criteria);
        // exit;

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
          $arrValue=loadModel(EVENTS_MODEL_MODEL, "events_fe_model","select_like_limit_events", $arrArgument);
          //debugECHO($arrValue);
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

  }//end of obtain_events function

}//end of class
