<?php

spl_autoload_register(null, false);

spl_autoload_extensions('.php,.inc.php,.class.php,.class.singleton.php');

spl_autoload_register('loadClasses');

function loadClasses($className){

    // $pieces=explode("_",$className);
    // $module_name=$pieces[0];
    // $model_name="";
    //
    // if(isset($pieces[1])){
    //   $model_name=$pieces[1];
    //   $model_name=strtoupper($model_name);
    // }

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

    }elseif( file_exists('classes/email/'.$className.'.class.singleton.php' )){
        set_include_path('classes/email/');
        spl_autoload($className);

    }elseif( file_exists('libs/PHPMailer_v5.1/class.'.$className.'.php' ) ){
        set_include_path('libs/PHPMailer_v5.1/' );
        spl_autoload('class.'.$className);

    }elseif(file_exists('modules/locate/model/bll/'.$className.'.class.singleton.php')){
        set_include_path('modules/locate/model/bll/');
        spl_autoload($className);

    }elseif(file_exists('modules/locate/model/dao/'.$className.'.class.singleton.php')){
        set_include_path('modules/locate/model/dao/');
        spl_autoload($className);

    }
    // Module Users
    if( file_exists('modules/users/model/BLL/'.$className.'.class.singleton.php' ) ){//require(BLL_USERS . "user_bll.class.singleton.php");
        set_include_path('modules/users/model/BLL/');
        spl_autoload($className);
    }elseif( file_exists('modules/users/model/DAO/'.$className.'.class.singleton.php' ) ){//require(DAO_USERS . "user_dao.class.singleton.php");
        set_include_path('modules/users/model/DAO/');
        spl_autoload($className);
    }
}
