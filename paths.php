<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/Exercise_3/';
define('SITE_ROOT',$root);
define('LOG_CLASS', SITE_ROOT.'classes/Log.class.singleton.php');
define('USER_LOG_DIR', SITE_ROOT.'log/products/Site_Products_errors.log');
define('GENERAL_LOG_DIR',SITE_ROOT.'log/general/Site_General_errors.log');
define('PRODUCTION',true);
define('MODEL_PATH',SITE_ROOT.'model/');
define('EVENT_MODEL_PATH',SITE_ROOT.'modules/events_front_end/model/model/');
