<?php
class locate_dao {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
        self::$_instance = new self();
        return self::$_instance;
    }

    public function count_DAO($db, $arrArgument) {
        /* $arrArgument is composed by 2 array ("column" and "like"), this iterates
        * the number of positions the array have, this way we get a method that builds a
        * custom sql to select with the needed arguments
        */
        $i = count($arrArgument['column']);
        $sql = "SELECT COUNT(*) as total FROM event WHERE ";
        for ($j = 0; $j < $i; $j++) {
            if ($i > 1 && $j != 0)
            $sql.=" AND ";
            $sql .= $arrArgument['column'][$j] . " like '" . $arrArgument['like'][$j] . "'";
        }

        $stmt = $db->execute($sql);
        return $db->listing($stmt);
    }

    public function select_DAO($db, $arrArgument) {
        $i = count($arrArgument['column']);
        $k = count($arrArgument['field']);
        $sql1 = "SELECT ";
        $sql2 = " FROM event WHERE ";

        if ($arrArgument['column'][0] != 'false')
        for ($j = 0; $j < $i; $j++) {
            if ($i > 1 && $j != 0)
            $sql.=" AND ";
            $sql .= $arrArgument['column'][$j] . " like '" . $arrArgument['like'][$j] . "'";
        }

        for ($l = 0; $l < $k; $l++) {
            if ($l > 1 && $k != 0)
            $fields.=", ";
            $fields .= $arrArgument['field'][$l];
        }

        if ($arrArgument['column'][0] != 'false')
        $sql = $sql1 . $fields . $sql2 . $sql;
        else
        $sql = $sql1 . $fields . ' FROM event';

        $stmt = $db->execute($sql);
        return $db->listing($stmt);
    }

    public function update_DAO($db, $arrArgument) {
        $i = count($arrArgument['field']);
        $k = count($arrArgument['column']);

        $sql1 = "UPDATE event SET ";
        $sql2 = "  WHERE ";

        for ($j = 0; $j < $i; $j++) {
            if ($i > 1 && $j != 0)
            $change.=", ";
            $change .= $arrArgument['field'][$j] . "='" . $arrArgument['new'][$j] . "'";
        }
        for ($l = 0; $l < $k; $l++) {
            if ($k > 1 && $l != 0)
            $sql.=" AND ";
            $sql .= $arrArgument['column'][$l] . " like '" . $arrArgument['like'][$l] . "'";
        }

        $sql = $sql1 . $change . $sql2 . $sql;
        return $db->execute($sql);
    }

}
