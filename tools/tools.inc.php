<?php

  function debugPHP($array){
		echo "<pre>";
		print_r($array);
		echo "</pre><br>";
		//die(); no va
	}

  function debugECHO($var){
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo($var);
    echo "<br>";
    print($var);
    echo "<br>";
    print_r($var);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
  }

	function redirect($url){
		die('<script>top.location.href="'.$url .'";</script>');
	}




  ////////////////////////////////////////////////////////////////////////////////
                            /*CLOSE SESSION FUNCTION*/
  ////////////////////////////////////////////////////////////////////////////////

  function close_session(){
    unset($_SESSION['event']);
    unset($_SESSION['message']);
    $_SESSION=array();
    session_destroy();

  }//end of close_session
