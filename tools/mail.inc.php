<?php
//header('Content-Type: text/html; charset=UTF-8');

function enviar_email($arr) {
  $html = '';
  $subject = '';
  $body = '';
  $ruta = '';
  $return = '';

  switch ($arr['type']) {
    case 'alta':
    $subject = 'Your sign up in Who Plays Tonight?';
    $ruta = "<a href='" . amigable("?module=users&function=verify&aux=A" . $arr['token'], true) . "'>aqu&iacute;</a>";
    $body = 'Thanks for sign up in Who Plays Tonight?<br> To complete the registration press ' . $ruta;
    break;

    case 'modificacion':
      $subject = 'Your new password in Who Plays Tonight?';
      $ruta = '<a href="' . amigable("?module=users&function=changepass&aux=" . $arr['token'], true) . '">aqu&iacute;</a>';
      $body = 'To change your password press ' . $ruta;
      break;

      case 'contact':
      $subject = 'Your petition to Who Plays Tonight? has been sent';
      $ruta = '<a href=' . 'https://localhost/whoplaystonight'. '>aqu&iacute;</a>';
      $body = 'To visit our web press here ' . $ruta;
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
    $html .= "<p>Sent by Who Plays Tonight?</p>";
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
