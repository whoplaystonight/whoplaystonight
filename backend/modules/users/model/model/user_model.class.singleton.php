<?php

require(SITE_ROOT . "modules/users/model/BLL/user_bll.class.singleton.php");

class user_model {

    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = user_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_user($arrArgument) {
        return $this->bll->create_user_BLL($arrArgument);

    }

    public function list_users(){
        return $this->bll->list_users_BLL();
    }

    public function details_users($id) {
        return $this->bll->details_users_BLL($id);
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

    public function count($arrArgument) {
        return $this->bll->count_BLL($arrArgument);
    }

    public function select($arrArgument) {
        return $this->bll->select_BLL($arrArgument);
    }

    public function update($arrArgument) {
        return $this->bll->update_BLL($arrArgument);
    }
}
