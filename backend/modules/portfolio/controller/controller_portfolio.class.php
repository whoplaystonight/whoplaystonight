<?php
  class controller_portfolio{

    public function __construct(){
      //include(TOOLS . "common.inc.php");
    }

    public function begin(){

      loadView('modules/portfolio/view/' , 'portfolio.php');

    }
  }
