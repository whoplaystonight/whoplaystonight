<?php

  require_once("paths.php");
  require 'autoload.php';
  include(TOOLS . "filters.inc.php");
  include(TOOLS . "tools.inc.php");
  include(TOOLS . "response_code.inc.php");

  if(PRODUCTION){
  	ini_set('display_errors',1);
  	ini_set('error_reporting',E_ERROR | E_WARNING | E_NOTICE);
  }else{
  	ini_set('display_errors',0);
  	ini_set('error_reporting',0);
  }

  	session_start();
  	$_SESSION['module']="";
    $_SESSION['result_avatar']=array();

    function handlerRouter() {


	    if (!empty($_GET['module'])) {
			     $URI_module = $_GET['module'];
           //debugECHO($URI_module);
  		} else {
  			   $URI_module = 'main';
  		}



  		if (!empty($_GET['function'])) {
  			   $URI_function = $_GET['function'];
           //debugECHO($URI_function);
  		} else {
  			   $URI_function = 'begin';
  		}

  	  handlerModule($URI_module, $URI_function);


  	}//end of handlerRouter function



    function handlerModule($URI_module, $URI_function){
      $modules=simplexml_load_file('resources/modules.xml');
      $exist=false;

      foreach($modules->module as $module){

        if(($URI_module===(String)$module->uri)){
          $exist=true;

          $path=MODULES_PATH . $URI_module."/controller/controller_". $URI_module. ".class.php";
          // debugECHO($path);

          if(file_exists($path)){
            //debugECHO("Estic al if");

            require($path);
            $controllerClass="controller_". $URI_module;
            //debugECHO($controllerClass);

            $obj = new $controllerClass;


          }else{
            debugECHO("Estic al else");
            showErrorPage(4,"",'HTTP/1.0 400 Bad Request', 400);

          }

          handlerfunction(((String)$module->name), $obj, $URI_function);
          break;
        }

      }//end foreach

      if(!$exist){

        showErrorPage(4,"",'HTTP/1.0 400 Bad Request', 400);

      }//End of if exist

    }//end of handlerModule function


    function handlerFunction($module, $obj, $URI_function){

      $functions = simplexml_load_file(MODULES_PATH . $module . "/resources/functions.xml");
      $exist=false;

      foreach($functions->function as $function){
        if(($URI_function === (String)$function->uri)){
          $exist=true;
          $event=(String)$function->name;
          break;
        }//enf if

      }//End foreach

      if(!$exist){
        showErrorPage(4,"",'HTTP/1.0 400 Bad Request', 400);
      }else{
        call_user_func(array($obj,$event));
      }
    }

    handlerRouter();
