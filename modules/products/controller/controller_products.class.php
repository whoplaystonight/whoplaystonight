<?php
session_start();

//include ($_SERVER['DOCUMENT_ROOT']."/Exercise_3/modules/products/tools/functions_products.inc.php");
include($_SERVER['DOCUMENT_ROOT']."/Exercise_3/tools/upload.php");

if((isset($_GET["upload"]))&& ($_GET["upload"]==true)){
  $result_avatar = upload_files();
  $_SESSION['result_avatar']=$result_avatar;
}


if((isset($_POST['register_event_json']))){
	register_event();
}

function register_event(){

	$jsondata=array();
	$eventJSON=json_decode($_POST["register_event_json"],true);
  //$result = validate_product($eventJSON);

  if(empty($_SESSION['result_avatar'])){
    $_SESSION['result_avatar']=array('resultado'=> true, 'error'=> "",'datos'=> 'media/default-avatar.png');
  }

  $result_avatar=$_SESSION['result_avatar'];

		$jsondata["success"]=true;
		$jsondata["redirect"]=$_POST['register_event_json'];
		echo json_encode($jsondata);
		exit;


}//End function register_event_json

if(isset($_GET["delete"])&& ($_GET["delete"]==true)){
	$_SESSION['result_avatar']=array();
  $result=remove_files();
  if($result===true){
    echo json_encode(array("res"=>true));
  }else{
    echo json_encode(array("res"=>false));
  }

}


	// if ($_POST) {
	//
	// 	//$_SESSION=$_POST;
	//
	// 	//$result=validate_product();
	//
	//
	//
	// 		//die('<script>window.location.href="'.$callback .'";</script>');
	// 		redirect($callback);
	// 	}else{
	// 		$error=$result['error'];
	// 	}
	// }
	// include 'modules/products/view/create_products.php';
