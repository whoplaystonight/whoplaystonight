<?php
//PROYECTO
define('PROJECT', '/whoplaystonight/');
//SITE_ROOT
$root = $_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/';
define('SITE_ROOT',$root);

//SITE_PATH
define('SITE_PATH', 'https://'.$_SERVER['HTTP_HOST'].'/whoplaystonight/');

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

//VIEW
define('VIEW_IMG',SITE_PATH.'view/img/');
define('VIEW_PATH_JS',SITE_ROOT.'view/js/');
define('VIEW_PATH_JS2',SITE_PATH.'view/js/');
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

//module products
define('PRODUCTS_TOOLS',SITE_ROOT.'modules/products/tools/');
define('PRODUCTS_VIEW_JS',SITE_PATH.'modules/products/view/js/');
define('PRODUCTS_MODEL_MODEL', SITE_ROOT.'modules/products/model/model/');
define('PRODUCTS_VIEW_CSS', SITE_PATH.'modules/products/view/css/');

//module users
define('PROVINCIASYPOBLACIONES', SITE_ROOT . 'resources/provinciasypoblaciones.xml');
define('USERS_UTILS_FUNCTIONS', SITE_ROOT . 'modules/users/utils/functions_user.inc.php');
define('USERS_MODEL_MODEL', SITE_ROOT.'modules/users/model/model/');
define('USERS_JS_PATH', SITE_PATH . 'modules/users/view/js/');
define('USERS_VIEW_CSS', SITE_PATH . 'modules/users/view/css/');
define('USERS_VIEW_PATH', SITE_PATH . 'modules/users/view/');

//module contact
define('CONTACT_JS_PATH', SITE_PATH . 'modules/contact/view/js/');
define('CONTACT_CSS_PATH', SITE_PATH . 'modules/contact/view/css/');
define('CONTACT_LIB_PATH', SITE_PATH . 'modules/contact/view/lib/');
define('CONTACT_IMG_PATH', SITE_PATH . 'modules/contact/view/img/');
define('CONTACT_VIEW_PATH', 'modules/contact/view/');

//module locate
define('LOCATE_VIEW_PATH', 'modules/locate/view/');
define('LOCATE_MODEL',SITE_ROOT.'modules/locate/model/');
define('LOCATE_MODEL_BLL', SITE_ROOT.'modules/locate/model/bll/');
define('LOCATE_MODEL_DAO', SITE_ROOT.'modules/locate/model/dao/');
define('LOCATE_MODEL_MODEL',SITE_ROOT.'modules/locate/model/model/');
define('LOCATE_JS_PATH', SITE_PATH . 'modules/locate/view/js/');
define('LOCATE_CSS_PATH', SITE_PATH . 'modules/locate/view/css/');

//amigables
define('URL_AMIGABLES', TRUE);

//JS
define('JS_PATH', SITE_PATH . '/view/js/');
