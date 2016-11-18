<?php


class Conf{

  private $_user;
  private $_pass;
  private $_host;
  private $_db;
  private $_port;
  static $_instance;


  /*This is the class constructor*/
  private function __construct(){

    $conf= parse_ini_file(MODEL_PATH."db.ini");
    $this->_user=$conf['user'];
    $this->_pass=$conf['password'];
    $this->_host=$conf['host'];
    $this->_db=$conf['db'];
    $this->_port=$conf['port'];

  }//end of construct


  /*This is a used resource so that in case the instance is cloned, this one
  turns empty*/
  private function __clone(){

  }//End of clone function


  /* To create an unic instance of this class*/
  public static function getInstance(){

    if(!(self::$_instance instanceof self))
      self::$_instance=new self();
      return self::$_instance;

  }//End of getInstance


  /* To get a property of this class. This is an improvement to avoid declaring
  a "get" function for each property*/
  public function __get($property) {

    if (property_exists($this, $property)){
      return $this->$property;
    }

  }//end of __get


}//end of class Conf
