<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/whoplaystonight/';
define('SITE_ROOT', $path);
require(SITE_ROOT . "modules/users/model/BLL/user_bll.class.singleton.php");

class user_model {

    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = product_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_product($arrArgument) {
        return $this->bll->create_product_BLL($arrArgument);
    }

    public function list_products(){
        return $this->bll->list_products_BLL();
    }

    public function details_products($id) {
        return $this->bll->details_products_BLL($id);
    }

    public function obtain_countries($url) {
        return $this->bll->obtain_countries_BLL($url);
    }

    public function obtain_provinces() {
        return $this->bll->obtain_provinces_BLL();
    }

    public function obtain_towns($arrArgument) {
        return $this->bll->obtain_towns_BLL($arrArgument);
    }
}
