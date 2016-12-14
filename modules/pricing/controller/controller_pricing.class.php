<?php
  class controller_pricing{

    public function __construct(){

    }

    public function begin(){
      require_once(VIEW_PATH_INC. "header.php");
      require_once(VIEW_PATH_INC. "menu.php");

      loadView('modules/pricing/view/' , 'pricing.php');

      require_once(VIEW_PATH_INC . "footer.php");
    }
  }
