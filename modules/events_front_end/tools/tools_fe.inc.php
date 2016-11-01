<?php

function paint_template_error($message){

  $log =Log::getInstance();
  $log->add_log_general("error paint_template_error", "events_front_end","response". http_response_code());
  $log->add_log_user("error paint_template_error","","events_front_end","response". http_response_code());

  $arrData =response_code(http_response_code());

  print("<div id='page'>");
  print ("<br><br>");
  print("<div id='header' class='status4xx'>");
  print("<h1>" . $message . "</h1>");
  print("<div>");
  print("<div id='content'>");
  print("<h2>The following error occured:</h2>");
  print("<p>The requested URL was not found on this server.</p>");
  print ("<P>Please check the URL or contact the <!--WEBMASTER//-->webmaster<!--WEBMASTER//-->.</p>");
  print ("</div>");
  print ("<div id='footer'>");
  print ("<p>Powered by <a href='http://www.ispconfig.org'>ISPConfig</a></p>");
  print ("</div>");
  print("</div>");

}//end of paint_template_error function

function paint_template_products($arrData){
  print("<script type='text/javascript' src='modules/events_front_end/view/js/modal_products.js'></script>");
  print("<section>");
  print("<div class='container'>");
  print("<div id='list_events' class='row text-center pad-row'>");
  print("<ol class='breadcrumb'>");
  print("<li class='active'>Events</li>");
  print("</ol>");
  print("<br>");
  print("<br>");
  print("<br>");
  print("<br>");
  if(isset($arrData)&& !empty($arrData)){
    foreach($arrData as $event){
      print("<div class='prod' id='". $event['event_id'] . "'>");
      print("<img class='prodImg' src='". $event['poster']."' alt='event'>");
      print("<p>" . $event['band_name']."</p>");
      print("<p id='p2'>". $event['type_event']);
      print("<p id='p3'>". $event['date_event']);
      print("</div>");
    }//end of foreach;
  }//end of if
  print("</div>");
  print ("</div>");
  print("</section>");
}//end of paint_template_products function
