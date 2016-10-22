<?php

  function loadModel($model_path, $model_name, $function, $arrArgument=''){

    $model=$model_path . $model_name . '.class.singleton.php';
    // echo json_encode($model);
    // exit;
    if(file_exists($model)){

      include_once($model);
      $modelClass= $model_name;

      if (!method_exists($modelClass, $function)){

          die($function .'function not found in Model'. $model_name);

      }
      $obj= $modelClass::getInstance();

      if (isset($arrArgument)){
          return $obj->$function($arrArgument);
      }
    }else{
      die($model_name . 'Model not found under model folder');
    }

  }//End of loadModel function


  function loadView($path_view, $model,$data=''){
    $view_path=$path_view . $model;
    $arrData='';

    if(file_exists($view_path)){
      if(isset($data)){
        $arrData=$data;
        include_once($view_path);
      }else{
        $message="NO TEMPLATE FOUND";
        $arrData=$message;
        require_once'view/inc/404.php';
        die();
      }
    }


  }//end of loadView function
