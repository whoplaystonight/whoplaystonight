<?php

  $path = $_SERVER['DOCUMENT_ROOT'] . '/Exercise_3/';
  define('SITE_ROOT', $path);
  define('MODEL_PATH',SITE_ROOT.'model/');

  require (MODEL_PATH."Db.class.singleton.php");
  require (SITE_ROOT."modules/products/model/DAO/event_dao.class.singleton.php");

  class event_bll{


    private $dao;
    private $db;
    static $_instance;


    private function __construct(){

      $this->dao=event_dao::getInstance();
      $this->db=Db::getInstance();

    }//end of constructor


    /* To create an unic instance of this class*/
    public static function getInstance(){

      if(!(self::$_instance instanceof self))
      self::$_instance=new self();
      return self::$_instance;

    }//End of getInstance


    public function create_event_BLL($arrArgument){

      return $this->dao->create_event_DAO($this->db, $arrArgument);

    }//end of create_event_BLL


    public function obtain_countries_BLL($url){
      return $this->dao->obtain_countries_DAO($url);
    }//end of obtain_countries_BLL

    public function obtain_provinces_BLL(){
      return $this->dao->obtain_provinces_DAO();
    }//end of obtain_provinces_BLL

    public function obtain_towns_BLL($arrArgument){
      return $this->dao->obtain_towns_DAO($arrArgument);
    }//end of obtain_towns_BLL


  }//end of event_bll class
