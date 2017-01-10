<?php
  class controller_services{

    public function __construct(){
      //include(TOOLS . "common.inc.php");
    }

    public function begin(){

      loadView('modules/services/view/' , 'services.php');

    }
  }
