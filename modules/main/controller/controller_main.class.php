<?php
  class controller_main{

    public function __construct(){

    }

    public function begin(){
      require_once(VIEW_PATH_INC. "header.php");
      require_once(VIEW_PATH_INC. "menu.php");
      loadView('modules/main/view/' , 'main.php');
      require_once(VIEW_PATH_INC . "footer.php");
    }

  }
