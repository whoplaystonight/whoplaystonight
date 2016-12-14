<?php
class locate_bll {
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = locate_dao::getInstance();
        $this->db = db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function update_BLL($arrArgument) {
        return $this->dao->update_DAO($this->db, $arrArgument);
    }

    public function count_BLL($arrArgument) {
        return $this->dao->count_DAO($this->db, $arrArgument);
    }

    public function select_BLL($arrArgument) {
        return $this->dao->select_DAO($this->db, $arrArgument);
    }
}
