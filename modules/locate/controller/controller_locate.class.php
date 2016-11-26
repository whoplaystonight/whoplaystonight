<?php
class controller_locate {
    function __construct() {
        include LOG_CLASS;
        include (TOOLS . "common.inc.php");

        $_SESSION['module'] = "locate";
    }

    function locate() {
        require_once(VIEW_PATH_INC."header.php");
        require_once(VIEW_PATH_INC."menu.php");
        loadView(LOCATE_VIEW_PATH, 'locate.php');
    }

    function maploader() {
        set_error_handler('ErrorHandler');
        try {
            $arrValue = loadModel(MODEL_OFERTAS, "ofertas_model", "select", array('column' => array('false'), 'field' => array('*')));
        } catch (Exception $e) {
            $arrValue = false;
        }
        restore_error_handler();

        if ($arrValue) {
            $arrArguments['ofertas'] = $arrValue;
            $arrArguments['success'] = true;
            echo json_encode($arrArguments);
        } else {
            $arrArguments['success'] = false;
            $arrArguments['error'] = 503;
            echo json_encode($arrArguments);
        }
    }
}
