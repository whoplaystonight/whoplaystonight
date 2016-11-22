<?php
// session_start();
include ($_SERVER['DOCUMENT_ROOT'] . "/whoplaystonight/modules/users/utils/functions_user.inc.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/whoplaystonight/tools/upload.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/whoplaystonight/tools/common.inc.php");

if ((isset($_GET["upload"])) && ($_GET["upload"] == true)) {
    $result_avatar = upload_files();
    $_SESSION["result_avatar"] = $result_avatar;
}

if ((isset($_POST['alta_users_json']))) {
    // echo json_encode("Hola mundo");exit;
    alta_users();
}

function alta_users() {
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
        $path_model = $_SERVER['DOCUMENT_ROOT'] . '/whoplaystonight/modules/users/model/model/';
        $arrValue = loadModel($path_model, "users_model", "create_user", $arrArgument);

        if ($arrValue)
            $mensaje = "User has been successfully registered";
        else
            $mensaje = "Error in the register process. Try it later.";

        //redirigir a otra pagina con los datos de $arrArgument y $mensaje
        $_SESSION['user'] = $arrArgument;
        $_SESSION['msje'] = $mensaje;

        $callback = "index.php?module=users&view=results_users";

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

if (isset($_GET["delete"]) && $_GET["delete"] == true) {
    $result = remove_files();
    //echo json_encode($result);
    //exit;

    $_SESSION['result_avatar'] = array();
    $result = remove_files();
    if ($result === true) {
        echo json_encode(array("res" => true));
    } else {
        echo json_encode(array("res" => false));
    }
    //echo remove_files();
   // echo remove_files();
}

///////////////////////////// Load data //////////////////////////////////
if (isset($_GET["load"]) && $_GET["load"] == true) {
    $jsondata = array();
    if (isset($_SESSION['user'])) {
        //echo debug($_SESSION['user']);
        $jsondata["user"] = $_SESSION['user'];
    }
    if (isset($_SESSION['msje'])) {
        //echo $_SESSION['msje'];
        $jsondata["msje"] = $_SESSION['msje'];
    }
    $jsondata["avatar"] = $_SESSION["result_avatar"];
    close_session();
    echo json_encode($jsondata);
    exit;
}

function close_session() {
    unset($_SESSION['user']);
    unset($_SESSION['msje']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}

//////////////// load_data (deletes the form when you go back) ////////////////
if ((isset($_GET["load_data"])) && ($_GET["load_data"] == true)) {
    $jsondata = array();

    if (isset($_SESSION['user'])) {
        $jsondata["user"] = $_SESSION['user'];
        echo json_encode($jsondata);
        exit;
    } else {
        $jsondata["user"] = "";
        echo json_encode($jsondata);
        exit;
    }
}

//////////// load_pais //////////////
if(  (isset($_GET["load_pais"])) && ($_GET["load_pais"] == true)  ){
    // echo json_encode("Hello I'm here");
    $json = array();

    // $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';
    $url = 'http://plastmagysl.com/repoCountryNamesByName.json';
    $path_model=$_SERVER['DOCUMENT_ROOT'].'/whoplaystonight/modules/users/model/model/';
    $json = loadModel($path_model, "user_model", "obtain_countries", $url);

    if($json){
        echo $json;
        exit;
    }else{
        $json = "error";
        echo $json;
        exit;
    }
}

//////////// load_provincias //////////////
if(  (isset($_GET["load_provincias"])) && ($_GET["load_provincias"] == true)  ){
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

//////////// load_poblaciones //////////////
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