<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title><?php
            if(!isset($_GET['module'])){
              echo "Home";
            }else{
              echo $_GET['module'];
            }
          ?>
    </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="view/img/favicon.png" />

    <!--JS-->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="<?php echo VIEW_JS ?>main.js"></script>


    <!-- CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="<?php echo CSS_PATH ?>main.css" rel="stylesheet">
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="<?php echo CSS_PATH ?>bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="<?php echo CSS_PATH ?>font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="<?php echo CSS_PATH ?>style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />








</head>
