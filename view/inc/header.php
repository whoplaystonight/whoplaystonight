<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<<<<<<< HEAD
  <title><?php
          if(!isset($_GET['module'])){
            echo "Home";
          }else{
            echo $_GET['module'];
          }
        ?>
  </title>

  <!-- BOOTSTRAP CORE STYLE CSS -->
  <link href="<?php echo CSS_PATH ?>bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <!-- CUSTOM STYLE CSS -->
  <link href="<?php echo CSS_PATH ?>style.css" rel="stylesheet" type="text/css" media="all"/>

  <!--for-mobile-apps-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta property="og:title" content="Vide" />
	<meta name="keywords" content="Roasting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

  <!--//for-mobile-apps-->
  <!-- <script src="js/jquery.min.js"></script> -->

  <!-- Favicon -->
  <link rel="shortcut icon" href="view/img/favicon.png" />

  <!--JS-->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="<?php echo VIEW_JS ?>main.js"></script>
  <script type="text/javascript" src="<?php echo SITE_PATH . '/' ?>view/js/cookies.js"></script>
  <script type="text/javascript" src="<?php echo USERS_JS_PATH ?>init.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link href="<?php echo CSS_PATH ?>main.css" rel="stylesheet">
  <!-- FONTAWESOME STYLE CSS -->
  <link href="<?php echo CSS_PATH ?>font-awesome.min.css" rel="stylesheet" />

  <!-- GOOGLE FONT -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700,300,200' rel='stylesheet' type='text/css'>

</head>
