<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/Exercise_3/';
define('SITE_ROOT',$root);
define('USER_LOG_DIR', SITE_ROOT.'log/products/Site_Products_errors.log');
define('GENERAL_LOG_DIR',SITE_ROOT.'log/general/Site_General_errors.log');
define('PRODUCTION',true);
