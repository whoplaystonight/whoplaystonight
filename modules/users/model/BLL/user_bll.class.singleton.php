<?php

$path = $_SERVER['DOCUMENT_ROOT'] . '/whoplaystonight/';
// define('SITE_ROOT', $path);
define('MODEL_PATH', SITE_ROOT . 'model/');

require (MODEL_PATH . "Db.class.singleton.php");
require(SITE_ROOT . "modules/users/model/DAO/user_dao.class.singleton.php");

class user_bll {

    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = productDAO::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_product_BLL($arrArgument) {
        return $this->dao->create_product_DAO($this->db, $arrArgument);
    }

    public function list_products_BLL(){
        return $this->dao->list_products_DAO($this->db);
    }

    public function details_products_BLL($id) {
        return $this->dao->details_products_DAO($this->db,$id);
    }

    public function obtain_countries_BLL($url) {
        return $this->dao->obtain_countries_DAO($url);
    }

    public function obtain_provinces_BLL() {
        return $this->dao->obtain_provinces_DAO();
    }

    public function obtain_towns_BLL($arrArgument) {
        return $this->dao->obtain_towns_DAO($arrArgument);
    }

}
