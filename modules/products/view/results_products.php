<?php
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	//echo "<pre>";
	//print_r($_POST);
	//echo "</pre>";
	debugPHP($_POST);
		
		
	//echo "<pre>";
	//print_r($_SESSION);
	//echo "</pre>";
	debugPHP($_SESSION);
	//die();

	
	//ChromePhp::log('Hello console!');
	//ChromePhp::log($_SESSION);
	//ChromePhp::warn('something went wrong!');
	debugChrome($_SESSION);
	
	$event=$_SESSION['event'];
	$message=$_SESSION['message'];
	
		// foreach ($event as $indice => $valor){
		// 	if($indice==='type_access'){
		// 		echo "<br>TYPE OF ACCESS:<br>";
		// 		$type_access = $event['type_access'];
		// 		foreach ($type_access as $indice => $valor) 
		// 			echo "$indice: $valor<br>";
		// 	}else{
		// 		echo "$indice: $valor<br>";
		// 	}
		// }
		echo"<br>". "<b style='color:green'>".$message;