<?php
//SITE_ROOT
$root = $_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/';
define('SITE_ROOT',$root);

//SITE_PATH
define('SITE_PATH', 'http://'.$_SERVER['HTTP_HOST'].'/whoplaystonight/');

//VIEW
define('CSS_PATH',SITE_PATH.'view/css/');
define('VIEW_JS', SITE_PATH.'view/js/');
define('IMG_PATH', SITE_PATH.'view/img/');
define('VIEW_PATH_INC',SITE_ROOT.'view/inc/');
define('VIEW_PATH_INC_ERROR',SITE_ROOT.'view/inc/templates_error/');
define('VIEW_PLUGINS', SITE_PATH.'view/plugins/');


//LOG
define('LOG_CLASS', SITE_ROOT.'classes/log.class.singleton.php');
define('USER_LOG_DIR', SITE_ROOT.'log/products/site_Products_errors.log');
define('GENERAL_LOG_DIR',SITE_ROOT.'log/general/site_General_errors.log');

//PRODUCTION
define('PRODUCTION',true);

//MODEL
define('MODEL_PATH',SITE_ROOT.'model/');

//MODULES_PATH
define('MODULES_PATH', SITE_ROOT.'modules/');

//RESOURCES
define('RESOURCES',SITE_ROOT.'resources/');

//MEDIA
define('MEDIA_PATH',SITE_ROOT.'media/');

//TOOLS
define('TOOLS',SITE_ROOT.'tools/');

//module events_front_end
define('EVENTS_MODEL',SITE_ROOT.'modules/events_front_end/model/');
define('EVENTS_MODEL_BLL', SITE_ROOT.'modules/events_front_end/model/BLL/');
define('EVENTS_MODEL_DAO', SITE_ROOT.'modules/events_front_end/model/DAO/');
define('EVENTS_MODEL_MODEL',SITE_ROOT.'modules/events_front_end/model/model/');
define('EVENTS_TOOLS',SITE_ROOT.'modules/events_front_end/tools/');
define('EVENTS_VIEW_JS', SITE_PATH.'modules/events_front_end/view/js/');
define('EVENTS_VIEW_CSS',SITE_PATH.'modules/events_front_end/view/css/');

//model products
define('PRODUCTS_TOOLS',SITE_ROOT.'modules/products/tools/');
define('PRODUCTS_VIEW_JS',SITE_PATH.'modules/products/view/js/');
define('PRODUCTS_MODEL_MODEL', SITE_ROOT.'modules/products/model/model/');
define('PRODUCTS_VIEW_CSS', SITE_PATH.'modules/products/view/css/');

//amigables
define('URL_AMIGABLES', TRUE);
