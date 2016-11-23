<?php
  class controller_services{

    public function __construct(){
      include(TOOLS . "common.inc.php");
    }

    public function begin(){
      require_once(VIEW_PATH_INC. "header.php");
      require_once(VIEW_PATH_INC. "menu.php");

      loadView('modules/services/view/' , 'services.php');

      require_once(VIEW_PATH_INC . "footer.html");
    }
  }
