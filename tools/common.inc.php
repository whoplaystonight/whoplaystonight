<?php

  function loadModel($model_path, $model_name, $function, $arrArgument=''){

    $model=$model_path . $model_name . '.class.singleton.php';


    if(file_exists($model)){

      include_once($model);
      $modelClass= $model_name;


      if (!method_exists($modelClass, $function)){
          //loadView('view/inc','404.php',"Method not found under model folder");
          //die($function .'function not found in Model'. $model_name);
          throw new Exception();

      }
      $obj= $modelClass::getInstance();

      if (isset($arrArgument)){
          return $obj->$function($arrArgument);
      }
    }else{
      //loadView('view/inc','404.php',"Model not found under model folder");
      //die($model_name . 'Model not found under model folder');
      throw new Exception();
    }

  }//End of loadModel function


  function loadView($path_view='', $file_view='',$data=''){
    $view_path=$path_view . $file_view;
    $arrData='';

    if(file_exists($view_path)){
      if(isset($data)){
        $arrData=$data;
        include_once($view_path);
      }else{

        $result=filter_num_int($path_view);
        if($result['resultado']){
          $path_view=$result['datos'];
        }else{
          $path_view=http_response_code();
        }

        $log=Log::getInstance();
        $log->add_log_general("error loadView general", $_GET['module'],"response".$path_view);
        $log->add_log_user("error loadView general","",$_GET['module'],"response".$path_view);

        $result=response_code($path_view);
        $arrData=$result;
        require_once $_SERVER['DOCUMENT_ROOT'].'/Exercise_3/view/inc/templates_error/'."error".'php';

        // $message="NO TEMPLATE FOUND";
        // $arrData=$message;
        // require_once'view/inc/404.php';
        // die();
      }
    }


  }//end of loadView function
