<?php
  class Db{

    private $host;
    private $port;
    private $user;
    private $pass;
    private $db;
    private $link;
    private $stmt;
    private $array;
    static $_instance;


    private function __construct(){

      $this->setConnection();
      $this->connect();

    }//end of constructor


    private function setConnection(){

      require_once 'Conf.class.singleton.php';
      $conf=Conf::getInstance();
      $this->host=$conf->_host;
      $this->port=$conf->_port;
      $this->db=$conf->_db;
      $this->user=$conf->_user;
      $this->pass=$conf->_pass;

    } //end of setConnection;


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


    private function connect(){

      $this->link=new mysqli($this->host, $this->user, $this->pass, $this->db,  $this->port);
      $this->link->select_db($this->db);

    }//end of function connect


    public function execute($sql){

      $this->stmt =$this->link->query($sql);
      return $this->stmt;

    }//end of function execute


    public function listing($stmt){

      $this->array=array();
      while ($row=$stmt->fetch_array(MYSQLI_ASSOC)){
        array_push($this->array, $row);
      }
      return $this->array;
    }//end of lidting function


  }//end of class
