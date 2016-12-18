<?php
function enviar_email($arr) {
  $html = '';
  $subject = '';
  $body = '';
  $ruta = '';
  $return = '';

  switch ($arr['type']) {
    case 'alta':
    $subject = 'Tu Alta en Who Plays Tonight';
    $ruta = "<a href='" . amigable("?module=login&function=activar&aux=A" . $arr['token'], true) . "'>aqu&iacute;</a>";
    $body = 'Gracias por unirte a nuestra aplicaci&oacute;n<br> Para finalizar el registro, pulsa ' . $ruta;
    break;

    case 'modificacion':
      $subject = 'Tu Nuevo Password en Who_Plays_Tonight<br>';
      $ruta = '<a href="' . amigable("?module=login&function=activar&aux=F" . $arr['token'], true) . '">aqu&iacute;</a>';
      $body = 'Para recordar tu password pulsa ' . $ruta;
      break;

      case 'contact':
      $subject = 'Tu Petici&oacute;n a Who_Plays_Tonight ha sido enviada<br>';
      $ruta = '<a href=' . 'http://localhost/whoplaystonight'. '>aqu&iacute;</a>';
      $body = 'Para visitar nuestra web, pulsa ' . $ruta;
      break;

      case 'admin':
      $subject = $arr['inputSubject'];
      $body = 'inputName: ' . $arr['inputName']. '<br>' .
      'inputEmail: ' . $arr['inputEmail']. '<br>' .
      'inputSubject: ' . $arr['inputSubject']. '<br>' .
      'inputMessage: ' . $arr['inputMessage'];
      break;
    }

    $html .= "<html>";
    $html .= "<body>";
    $html .= "<h4>". $subject ."</h4>";
    $html .= $body;
    $html .= "<br><br>";
    $html .= "<p>Sent by Who_Plays_Tonight</p>";
    $html .= "</body>";
    $html .= "</html>";

    set_error_handler('ErrorHandler');
    try{
      $mail = email::getInstance();
      $mail->name = $arr['inputName'];
      if ($arr['type'] === 'admin')
      $mail->address = 'whoplaystonight@gmail.com';
      else
      $mail->address = $arr['inputEmail'];
      $mail->subject = $subject;
      $mail->body = $html;
    } catch (Exception $e) {
      $return = 0;
    }

    restore_error_handler();

    $return = $mail->enviar();

    return $return;
  }
