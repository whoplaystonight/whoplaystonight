<?php
  class controller_portfolio{

    public function __construct(){
      //include(TOOLS . "common.inc.php");
    }

    public function begin(){
      require_once(VIEW_PATH_INC. "header.php");
      require_once(VIEW_PATH_INC. "menu.php");

      loadView('modules/portfolio/view/' , 'portfolio.php');

      require_once(VIEW_PATH_INC . "footer.php");
    }
  }
