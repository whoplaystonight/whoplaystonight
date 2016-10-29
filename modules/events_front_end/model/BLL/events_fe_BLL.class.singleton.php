<?php

  $path = $_SERVER['DOCUMENT_ROOT'] . '/Exercise_3/';
  define('SITE_ROOT', $path);
  define('MODEL_PATH',SITE_ROOT.'model/');

  require (MODEL_PATH."Db.class.singleton.php");
  require (SITE_ROOT."modules/products/model/DAO/event_dao.class.singleton.php");

  class events_fe_BLL{


    private $dao;
    private $db;
    static $_instance;


    private function __construct(){

      // $this->dao=events_fe_DAO::getInstance();
      // $this->db=Db::getInstance();

    }//end of constructor


    /* To create an unic instance of this class*/
    public static function getInstance(){

      if(!(self::$_instance instanceof self))
      self::$_instance=new self();
      return self::$_instance;

    }//End of getInstance

    public function list_events_BLL(){
      return $this->dao->list_events_DAO($this->db);
    }//end of list_events_BLL function

    public function details_event_BLL($id){
      return $this->dao->details_event_DAO($this->db,$id);
    }//end of details_event_BLL function

    public function page_events_BLL($arrArgument){
      return $this->dao->page_events_DAO($this->db,$arrArgument);
    }//end of page_products

    public function total_events_BLL(){
      return "hola";
      //return $this->dao->total_events_DAO($this->db);
    }//end of total products



  }//end of event_bll class
