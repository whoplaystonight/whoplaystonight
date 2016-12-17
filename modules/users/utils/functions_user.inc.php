<?php

function validate_user($value) {
    //return json_encode("Hola mundo");
    $error = array();
    $valido = true;
    $filter = array(
        'username' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[A-Za-z]{2,30}$/')
        ),
        'email' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/')
        ),
        'password' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9a-zA-Z]{6,32}$/')
        ),
        'birthday' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-z0-9- -.]/')
        ),
    );

    $result = filter_var_array($value, $filter);

    //no filter
    $result['interests'] = $value['interests'];
    $result['country'] = $value['country'];
    $result['province'] = $value['province'];
    $result['town'] = $value['town'];

    //obsolescence date can't be before enter date
    // $dates = validate_dates($result['enter_date'], $result['obsolescence_date']);
    // if (!$dates) {
        // $error['obsolescence_date'] = "Obsolescence date can't be before enter date";
        // $valido = false;
    // }

    if (!$result['username']) {
        $error['username'] = 'Username must be 2 to 30 letters';
        $valido = false;
    }

    if (!$result['birthday']) {
        if ($_POST['birthday'] == "") {
            $error['birthday'] = "birthday can't be empty";
            $valido = false;
        } else {
            $error['birthday'] = 'format date error (dd/mm/yyyy)';
            $valido = false;
        }
    }

    return $return = array('resultado' => $valido, 'error' => $error, 'datos' => $result);
}

function validate_dates($enter_date, $obsolescence_date) {
    $day1 = substr($enter_date, 0, 2);
    $month1 = substr($enter_date, 3, 2);
    $year1 = substr($enter_date, 6, 4);
    $day2 = substr($obsolescence_date, 0, 2);
    $month2 = substr($obsolescence_date, 3, 2);
    $year2 = substr($obsolescence_date, 6, 4);

    if (strtotime($day1 . "-" . $month1 . "-" . $year1) <= strtotime($year2 . "-" . $month2 . "-" . $day2)) {
        return true;
    }
    return false;
}

function get_gravatar($email, $s = 80, $d = 'wavatar', $r = 'g', $img = false, $atts = array()) {
    $email = trim($email);
    $email = strtolower($email);
    $email_hash = md5($email);

    $url = "https://www.gravatar.com/avatar/" . $email_hash;
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}
