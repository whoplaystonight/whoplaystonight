<?php
class userDAO {

    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_user_DAO($db, $arrArgument) {
        $username = $arrArgument['username'];
        $email = $arrArgument['email'];
        $password = $arrArgument['password'];
        $birthday = $arrArgument['birthday'];

        $avatar = $_SESSION["nombre_fichero"];

        $rock = 0;
        $jazz = 0;
        $blues = 0;

        foreach ($availability as $indice) {
            if ($indice === 'rock')
                $rock = 1;
            if ($indice === 'jazz')
                $jazz = 1;
            if ($indice === 'blues')
                $blues = 1;
        }

        $country = $arrArgument['country'];
        $province = $arrArgument['province'];
        $town = $arrArgument['town'];

        $sql = "INSERT INTO users (product_name, product_description, product_price, product_id, enter_date, obsolescence_date, product_category, Web, Warehouse, Physical_store, avatar, country, province, town) VALUES ('". $product_name
        ."', '". $product_description ."', '". $product_price ."', '". $product_id ."' , '". $enter_date ."', '". $obsolescence_date
        ."', '". $product_category ."', '". $web ."','". $warehouse ."', '". $physical_store ."' ,'". $avatar ."', '". $country ."', '". $province ."', '". $town ."')";

        return $db->ejecutar($sql);
    }

    public function obtain_countries_DAO($url) {
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return ($file_contents) ? $file_contents : FALSE;
    }

    public function obtain_provinces_DAO() {
        $json = array();
        $tmp = array();

        $provincias = simplexml_load_file("../../../resources/provinciasypoblaciones.xml");
        $result = $provincias->xpath("/lista/provincia/nombre | /lista/provincia/@id");
        for ($i=0; $i<count($result); $i+=2) {
            $e=$i+1;
            $provincia=$result[$e];

            $tmp = array(
                'id' => (string) $result[$i], 'nombre' => (string) $provincia
            );
            array_push($json, $tmp);
        }
        return $json;
    }

    public function obtain_towns_DAO($arrArgument) {
        $json = array();
        $tmp = array();

        $filter = (string)$arrArgument;
        $xml = simplexml_load_file('../../../resources/provinciasypoblaciones.xml');
        $result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");

        for ($i=0; $i<count($result[0]); $i++) {
            $tmp = array(
                'poblacion' => (string) $result[0]->localidad[$i]
            );
            array_push($json, $tmp);
        }
        return $json;
    }

    public function list_users_DAO($db){
          $sql = "SELECT * FROM users";
          $stmt = $db->ejecutar($sql);
          return $db->listar($stmt);
    }

    public function details_users_DAO($db,$id) {
        $sql = "SELECT * FROM users WHERE id='".$id."'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
}
