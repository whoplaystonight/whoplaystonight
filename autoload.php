<?php

  spl_autoload_register(null, false);

  spl_autoload_extensions('.php,.inc.php,.class.php,.class.singleton.php');

  spl_autoload_register('loadClasses');

  function loadClasses($className){

    if(file_exists('classes/'.$className.'.class.singleton.php')){
      set_include_path('classes/');
      spl_autoload($className);

    }elseif(file_exists('model/'.$className.'.class.singleton.php')){
      set_include_path('model/');
      spl_autoload($className);

    }elseif(file_exists('modules/events_front_end/model/BLL/'.$className.'.class.singleton.php')){
        set_include_path('modules/events_front_end/model/BLL/');
        spl_autoload($className);

    }elseif(file_exists('modules/events_front_end/model/DAO/'.$className.'.class.singleton.php')){
      set_include_path('modules/events_front_end/model/DAO/');
      spl_autoload($className);

    }elseif(file_exists('modules/products/model/BLL/'.$className.'.class.singleton.php')){
      set_include_path('modules/products/model/BLL/');
      spl_autoload($className);

    }elseif(file_exists('modules/products/model/DAO/'.$className.'.class.singleton.php')){
      set_include_path('modules/products/model/DAO/');
      spl_autoload($className);
    }

  }//end loadClasses
