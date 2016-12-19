<?php

  function loadModel($model_path, $model_name, $function, $arrArgument=''){

    $model=$model_path . $model_name . '.class.singleton.php';
    // echo json_encode($model);
    // exit;

    if(file_exists($model)){

      include_once($model);
      $modelClass= $model_name;


      if (!method_exists($modelClass, $function)){
          throw new Exception();
      }
      $obj= $modelClass::getInstance();

      if (isset($arrArgument)){

          return $obj->$function($arrArgument);
          // return call_user_func(array($obj, $function),$arrArgument);

      }

    }else{

      throw new Exception();

    }

  }//End of loadModel function


  function loadView($path_view='', $file_view='',$data=''){

    $view_path=$path_view . $file_view;
    //debugECHO($view_path);
    $arrData='';

    if(file_exists($view_path)){
      // debugECHO("Estic al file exists");
      // debugECHO($view_path);


      if(isset($data)){
        $arrData=$data;
      }

      require_once(VIEW_PATH_INC."header.php");
      require_once(VIEW_PATH_INC."menu.php");
      include_once($view_path);
      require_once(VIEW_PATH_INC."footer.php");

      }else{

        $result=filter_num_int($path_view);

        if($result['resultado']){
          $path_view=$result['datos'];
          //debugECHO("PAN");
        }else{
          $path_view=http_response_code();
          //debugECHO("JAMON");
        }

        $log=log::getInstance();
        $log->add_log_general("error loadView general", $_GET['module'],"response".$path_view);
        $log->add_log_user("error loadView general","",$_GET['module'],"response".$path_view);

        $result=response_code($path_view);
        $arrData=$result;
        require_once(VIEW_PATH_INC."header.php");
        require_once(VIEW_PATH_INC."menu.php");
        require_once VIEW_PATH_INC_ERROR . 'error.php';
        require_once(VIEW_PATH_INC."footer.php");
        //die();
      }//end if else $data

  }//end of loadView function
