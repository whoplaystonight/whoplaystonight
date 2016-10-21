////////////////////////////////////////////////////////////////////////////////
                            /*  LOAD_USERS_AJAX  */
////////////////////////////////////////////////////////////////////////////////


function load_users_ajax(){

  $.ajax({
    type:'GET',
    url:"modules/products/controller/controller_products.class.php?load=true",
    async:false

  }).success(function(data){


    var json=JSON.parse(data);

    print_user(json);

  }).fail(function(xhr){

    alert(xhr.responseText);

  });
}//end of load_users_ajax



////////////////////////////////////////////////////////////////////////////////
                            /*  LOAD_USERS_GET_V1  */
////////////////////////////////////////////////////////////////////////////////

function load_users_get_v1(){

  $.get("modules/products/controller/controller_products.class.php?load=true", function (data, status){

    var json=JSON.parse(data);
    print_user(json);

  });

}//End of load_users_get_v1



////////////////////////////////////////////////////////////////////////////////
                            /*  LOAD_USERS_GET_V2  */
////////////////////////////////////////////////////////////////////////////////

function load_users_get_v2(){

  var jqxhr=$.get("modules/products/controller/controller_products.class.php?load=true", function (data){
    var json=JSON.parse(data);

    print_user(json);
  }).done(function(){

  }).fail(function () {

  });

  jqxhr.always(function () {

  });


}//End of loas_users_get_v2


////////////////////////////////////////////////////////////////////////////////
                            /*  DOCUMENT READY  */
////////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {

  load_users_ajax();

});


////////////////////////////////////////////////////////////////////////////////
                            /*  PRINT_USER FUNCTION  */
////////////////////////////////////////////////////////////////////////////////


function print_user(data){
  //console.log(data.event.type_access);

  var content=document.getElementById("content");
  var div_event=document.createElement("div");
  var paragraph=document.createElement("p");

  var message= document.createElement("div");
  message.innerHTML="Message:";
  message.innerHTML+=data.message;

  var event_id=document.createElement("div");
  event_id.innerHTML="Event id:";
  event_id.innerHTML+=data.event.event_id;

  var band_id=document.createElement("div");
  band_id.innerHTML="Band id:";
  band_id.innerHTML+=data.event.band_id;

  var band_name=document.createElement("div");
  band_name.innerHTML="Band name:";
  band_name.innerHTML+=data.event.band_name;

  var description=document.createElement("div");
  description.innerHTML="Description:";
  description.innerHTML+=data.event.description;

  var country=document.createElement("div");
  country.innerHTML="Country:";
  country.innerHTML+=data.event.country;

  var province=document.createElement("div");
  province.innerHTML="Province:";
  province.innerHTML+=data.event.province;

  var town=document.createElement("div");
  town.innerHTML="Town:";
  town.innerHTML+=data.event.town;

  var type_event=document.createElement("div");
  type_event.innerHTML="Type of event:";
  type_event.innerHTML+=data.event.type_event;

  var n_participants=document.createElement("div");
  n_participants.innerHTML="Number of participants:";
  n_participants.innerHTML+=data.event.n_participants;

  var date_event=document.createElement("div");
  date_event.innerHTML="Date of event:";
  date_event.innerHTML+=data.event.date_event;

  var type_access=document.createElement("div");
  type_access.innerHTML="Type of access:";
  for(var i=0; i<data.event.type_access.length;i++){
    type_access.innerHTML+="-"+data.event.type_access[i];
  }

  var date_ticket=document.createElement("div");
  date_ticket.innerHTML="Date of ticket sales:";
  date_ticket.innerHTML+=data.event.date_ticket;

  var openning=document.createElement("div");
  openning.innerHTML="Doors openning:";
  openning.innerHTML+=data.event.openning;

  var start=document.createElement("div");
  start.innerHTML="Star of event:";
  start.innerHTML+=data.event.start;

  var end=document.createElement("div");
  end.innerHTML="End of event:";
  end.innerHTML+=data.event.end;

  var cad=data.event.avatar;
  var img=document.createElement("div");
  var html ='<img src="' + cad + '" height="75" width"75">';
  img.innerHTML=html;

  div_event.appendChild(paragraph);
  paragraph.appendChild(message);
  paragraph.appendChild(event_id);
  paragraph.appendChild(band_id);
  paragraph.appendChild(band_name);
  paragraph.appendChild(description);
  paragraph.appendChild(country);
  paragraph.appendChild(province);
  paragraph.appendChild(town);
  paragraph.appendChild(type_event);
  paragraph.appendChild(n_participants);
  paragraph.appendChild(date_event);
  paragraph.appendChild(type_access);
  paragraph.appendChild(date_ticket);
  paragraph.appendChild(openning);
  paragraph.appendChild(start);
  paragraph.appendChild(end);
  content.appendChild(div_event);
  content.appendChild(img);

}//end of print_user function
