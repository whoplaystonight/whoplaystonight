<?php
class controller_users {
    public function __construct(){
        include (USERS_UTILS_FUNCTIONS);
        include(TOOLS . "upload.php");
        include (TOOLS . "mail.inc.php");
    }

    public function sign_up(){
        require_once(VIEW_PATH_INC . "header.php");
        require_once(VIEW_PATH_INC . "menu.php");
        loadView('modules/users/view/','create_users.php');
        require_once(VIEW_PATH_INC . "footer.php");
    }

    // if ((isset($_GET["upload"])) && ($_GET["upload"] == true)) {
    //     $result_avatar = upload_files();
    //     $_SESSION["result_avatar"] = $result_avatar;
    // }
    //
    // if ((isset($_POST['alta_users_json']))) {
    //     // echo json_encode("Hola mundo");exit;
    //     alta_users();
    // }

    public function alta_users() {
        $jsondata = array();
        $usersJSON = json_decode($_POST["alta_users_json"], true);
        $result = validate_user($usersJSON);

        if (empty($_SESSION['result_avatar'])) {
            $_SESSION['result_avatar'] = array('resultado' => true, 'error' => "", 'datos' => 'media/default-avatar.png');
        }
        $result_avatar = $_SESSION['result_avatar'];


        if ($result['resultado'] && ($result_avatar['resultado'])) {

            $arrArgument = array(
                'username' => ucfirst($result['datos']['username']),
                'email' => ucfirst($result['datos']['email']),
                'password' => $result['datos']['password'],
                'birthday' => $result['datos']['birthday'],
                'interests' => $result['datos']['interests'],
                'country' => $result['datos']['country'],
                'province' => $result['datos']['province'],
                'town' => $result['datos']['town'],
            );

            ///////////// Insert into BD /////////////
            $arrValue = false;
            $path_model = USERS_MODEL_MODEL;
            $arrValue = loadModel($path_model, "user_model", "create_user", $arrArgument);

            if ($arrValue)
            $mensaje = "User has been successfully registered";
            else
            $mensaje = "Error in the register process. Try it later.";

            //redirigir a otra pagina con los datos de $arrArgument y $mensaje
            $_SESSION['user'] = $arrArgument;
            $_SESSION['msje'] = $mensaje;

            // $callback = "index.php?module=users&function=result_users";
            $callback = "index.php?module=main";
            $jsondata["success"] = true;
            $jsondata["redirect"] = $callback;
            // echo json_encode("asdf" . $jsondata);
            // exit;
            echo json_encode($jsondata);
            exit;
        } else {
            //console_log("false");
            $jsondata["success"] = false;
            $jsondata["error"] = $result['error'];
            //future avatar error

            header('HTTP/1.0 400 Bad error');
            echo json_encode($jsondata);
        }
    }

    // if (isset($_GET["delete"]) && $_GET["delete"] == true) {
    //     $result = remove_files();
    //     //echo json_encode($result);
    //     //exit;
    //
    //     $_SESSION['result_avatar'] = array();
    //     $result = remove_files();
    //     if ($result === true) {
    //         echo json_encode(array("res" => true));
    //     } else {
    //         echo json_encode(array("res" => false));
    //     }
    //     //echo remove_files();
    //     // echo remove_files();
    // }
    //
    // ///////////////////////////// Load data //////////////////////////////////
    // if (isset($_GET["load"]) && $_GET["load"] == true) {
    //     $jsondata = array();
    //     if (isset($_SESSION['user'])) {
    //         //echo debug($_SESSION['user']);
    //         $jsondata["user"] = $_SESSION['user'];
    //     }
    //     if (isset($_SESSION['msje'])) {
    //         //echo $_SESSION['msje'];
    //         $jsondata["msje"] = $_SESSION['msje'];
    //     }
    //     $jsondata["avatar"] = $_SESSION["result_avatar"];
    //     close_session();
    //     echo json_encode($jsondata);
    //     exit;
    // }
    //
    // //////////////// load_data (deletes the form when you go back) ////////////////
    // if ((isset($_GET["load_data"])) && ($_GET["load_data"] == true)) {
    //     $jsondata = array();
    //
    //     if (isset($_SESSION['user'])) {
    //         $jsondata["user"] = $_SESSION['user'];
    //         echo json_encode($jsondata);
    //         exit;
    //     } else {
    //         $jsondata["user"] = "";
    //         echo json_encode($jsondata);
    //         exit;
    //     }
    // }

    //////////// load_pais //////////////
    public function load_pais_users(){
        if((isset($_POST["load_pais"])) && ($_POST["load_pais"] == true)){
            $json = array();

            // $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';
            $url = 'http://plastmagysl.com/repoCountryNamesByName.json';
            $path_model=$_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/modules/users/model/model/';
            $json = loadModel($path_model, "user_model", "obtain_countries", $url);
            // echo json_encode("load pais"); exit;
            if($json){
                echo $json;
                exit;
            }else{
                $json = "error";
                echo $json;
                exit;
            }
        }
    }

    //////////// load_provincias //////////////
    public function load_provincias_users(){
        if((isset($_POST["load_provincias"])) && ($_POST["load_provincias"] == true)){
            // echo json_encode("pizzapizza");exit;
            $jsondata = array();
            $json = array();

            $path_model=$_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/modules/users/model/model/';
            $json = loadModel($path_model, "user_model", "obtain_provinces");

            if($json){
                $jsondata["provincias"] = $json;
                echo json_encode($jsondata);
                exit;
            }else{
                $jsondata["provincias"] = "error";
                echo json_encode($jsondata);
                exit;
            }
        }
    }

    //////////// load_poblaciones //////////////
    public function load_poblaciones(){
        if(  isset($_POST['idPoblac']) ){
            $jsondata = array();
            $json = array();

            $path_model=$_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/modules/users/model/model/';
            $json = loadModel($path_model, "user_model", "obtain_towns", $_POST['idPoblac']);

            if($json){
                $jsondata["poblaciones"] = $json;
                echo json_encode($jsondata);
                exit;
            }else{
                $jsondata["poblaciones"] = "error";
                echo json_encode($jsondata);
                exit;
            }
        }
    }

    //////////// Social signin ////////////
    public function social_signin() {

        $user = json_decode($_POST['user'], true);
        set_error_handler('ErrorHandler');
        try {
            $arrValue = loadModel(USERS_MODEL_MODEL, "user_model", "count", array('column' => array('username'), 'like' => array($user['id'])));
        } catch (Exception $e) {
            $arrValue = false;
        }

        restore_error_handler();

        if (!$arrValue[0]["total"]) {
            if ($user['email']){
                $avatar = 'https://graph.facebook.com/' . ($user['id']) . '/picture';
            }else{
                $avatar = get_gravatar($mail, $s = 400, $d = 'identicon', $r = 'g', $img = false, $atts = array());
            }
            $arrArgument = array(
                'username' => $user['id'],
                'name' => $user['name'],
                'surname' => $user['surname'],
                'email' => $user['email'],
                'type' => 'client',
                'avatar' => $avatar,
                'activated' => "1"
            );
            set_error_handler('ErrorHandler');

            try {
                $value = loadModel(USERS_MODEL_MODEL, "user_model", "create_user", $arrArgument);
            } catch (Exception $e) {
                $value = false;
            }
            restore_error_handler();
        } else{
            $value = true;
        }

        if ($value) {
            set_error_handler('ErrorHandler');
            $arrArgument = array(
                'column' => array("username"),
                'like' => array($user['id']),
                'field' => array('*')
            );

            $user = loadModel(USERS_MODEL_MODEL, "user_model", "select", $arrArgument);

            restore_error_handler();
            echo json_encode($user);
        } else {
            echo json_encode(array('error' => true, 'datos' => 503));
        }
    }
    ///////// restore ////
    function restore() {
        require_once(VIEW_PATH_INC . "header.php");
        require_once(VIEW_PATH_INC . "menu.php");
        loadView('modules/users/view/', 'restore.php');
        require_once(VIEW_PATH_INC . "footer.php");
    }

    public function process_restore() {
        $result = array();
        if (isset($_POST['inputEmail'])) {
            $result = validate_email($_POST['inputEmail']);
            if ($result) {
                $column = array(
                    'email'
                );
                $like = array(
                    $_POST['inputEmail']
                );
                $field = array(
                    'token'
                );

                $token = "Cha" . md5(uniqid(rand(), true));
                $new = array(
                    $token
                );

                $arrArgument = array(
                    'column' => $column,
                    'like' => $like,
                    'field' => $field,
                    'new' => $new
                );
                $arrValue = loadModel(USERS_MODEL_MODEL, "user_model", "count", $arrArgument);

                if ($arrValue[0]['total'] == 1) {
                    $arrValue = loadModel(USERS_MODEL_MODEL, "user_model", "update", $arrArgument);

                    if ($arrValue) {
                        //////////////// Envio del correo al usuario
                        $arrArgument = array(
                            'token' => $token,
                            'email' => $_POST['inputEmail']
                        );
                        if (sendtoken($arrArgument, "modificacion"))
                            echo "Tu nueva contraseña ha sido enviada al email";
                        else
                            echo "Error en el servidor. Intentelo más tarde";
                    }
                } else {
                    echo "El email introducido no existe ";
                }
            } else {
                echo "El email no es válido";
            }
        }
    }
    ////////////// change password
    function changepass() {
        if (substr($_GET['aux'], 0, 3) == "Cha") {
            require_once(VIEW_PATH_INC . "header.php");
            require_once(VIEW_PATH_INC . "menu.php");
            loadView('modules/users/view/', 'changepass.php');
            require_once(VIEW_PATH_INC . "footer.php");
        } else {
            showErrorPage(1, "", 'HTTP/1.0 503 Service Unavailable', 503);
        }
    }

    function update_pass() {
        $jsondata = array();
        $pass = json_decode($_POST['passw'], true);

        $arrArgument = array(
            'column' => array('token'),
            'like' => array($pass['token']),
            'field' => array('password'),
            //'new' => array(password_hash($pass['password'], PASSWORD_BCRYPT))
            'new' => array($pass['password'])
        );
        set_error_handler('ErrorHandler');
        try {
            $value = loadModel(USERS_MODEL_MODEL, "user_model", "update", $arrArgument);
        } catch (Exception $e) {
            $value = false;
        }
        restore_error_handler();

        if ($value) {
            $url = amigable('?module=main&function=begin&aux=rest', true);
            $jsondata["success"] = true;
            $jsondata["redirect"] = $url;
            exit;
        } else {
            $url = amigable('?module=main&function=begin&aux=503', true);
            $jsondata["success"] = true;
            $jsondata["redirect"] = $url;
            echo json_encode($jsondata);
            exit;
        }
    }
    ///////////////// Verify
    function verify() {
        echo json_encode(substr($_GET['aux'], 0, 3));exit;
        if (substr($_GET['aux'], 0, 3) == "Ver") {
            $arrArgument = array(
                'column' => array('token'),
                'like' => array($_GET['aux']),
                'field' => array('activado'),
                'new' => array('1')
            );
            echo json_encode($arrArgument);exit;
            set_error_handler('ErrorHandler');
            try {
                $value = loadModel(USERS_MODEL_MODEL, "user_model", "update", $arrArgument);
            } catch (Exception $e) {
                $value = false;
            }
            restore_error_handler();

            if ($value) {
                loadView('modules/main/view/', 'main.php');
            } else {
                showErrorPage(1, "", 'HTTP/1.0 503 Service Unavailable', 503);
            }
        }
    }
}
