

/*This is a pluggin to show a text by default in each input field.
When the input has the focus, this text dissapear*/
jQuery.fn.fill_or_clean=function(){

    this.each(function() {

        /*EVENT ID*/
        if($("#event_id").val()===""){
            $("#event_id").val("Enter event ID");
            $("#event_id").focus(function () {
                if ($("#event_id").val()==="Enter event ID"){
                    $("#event_id").val("");
                }//2n_if
            });
        }//end of event_id if

        /*Onblur is activated when the user removes focus*/
        $("#event_id").blur(function(){

            if($("#event_id").val()===""){
                $("#event_id").val("Enter event ID");
            }
        });//end of event_id blur function


        /*BAND ID*/
        if($("#band_id").val()===""){
            $("#band_id").val("Enter band ID");
            $("#band_id").focus(function () {
                if ($("#band_id").val()==="Enter band ID"){
                    $("#band_id").val("");
                }//2n_if
            });
        }//end of event_id if

        /*Onblur is activated when the user removes focus*/
        $("#band_id").blur(function(){

            if($("#band_id").val()===""){
                $("#band_id").val("Enter band ID");
            }
        });//end of band_id blur function


        /*BAND NAME*/
        if($("#band_name").val()===""){
            $("#band_name").val("Enter band name");
            $("#band_name").focus(function () {
                if ($("#band_name").val()==="Enter band name"){
                    $("#band_name").val("");
                }//2n_if
            });
        }//end of band_name if

        /*Onblur is activated when the user removes focus*/
        $("#band_name").blur(function(){

            if($("#band_name").val()===""){
                $("#band_name").val("Enter band name");
            }
        });//end of band_name blur function

        /*DESCRIPTION*/
        if($("#description").val()===""){
            $("#description").val("Enter a description");
            $("#description").focus(function () {
                if ($("#description").val()==="Enter a description"){
                    $("#description").val("");
                }//2n_if
            });
        }//end of description if

        /*Onblur is activated when the user removes focus*/
        $("#description").blur(function(){

            if($("#description").val()===""){
                $("#description").val("Enter a description");
            }
        });//end of band_name blur function

        /*NUMBER OF PARTICIPANTS*/
        if($("#n_participants").val()===""){
            $("#n_participants").val("Enter number of particpants");
            $("#n_participants").focus(function () {
                if ($("#n_participants").val()==="Enter number of particpants"){
                    $("#n_participants").val("");
                }//2n_if
            });
        }//end of description if

        /*Onblur is activated when the user removes focus*/
        $("#n_participants").blur(function(){

            if($("#n_participants").val()===""){
                $("#n_participants").val("Enter number of particpants");
            }
        });//end of band_name blur function


        /*DATE OF EVENT*/
        if($("#date_event").val()===""){
            $("#date_event").val("Enter date of event");
            $("#date_event").focus(function () {
                if ($("#date_event").val()==="Enter date of event"){
                    $("#date_event").val("");
                }//2n_if
            });
        }//end of description if

        /*Onblur is activated when the user removes focus*/
        $("#date_event").blur(function(){

            if($("#date_event").val()===""){
                $("#date_event").val("Enter date of event");
            }
        });//end of band_name blur function


         /*DATE OF TICKET SALES*/
        if($("#date_ticket").val()===""){
            $("#date_ticket").val("Enter date of ticket sales");
            $("#date_ticket").focus(function () {
                if ($("#date_ticket").val()==="Enter date of ticket sales"){
                    $("#date_ticket").val("");
                }//2n_if
            });
        }//end of description if

        /*Onblur is activated when the user removes focus*/
        $("#date_ticket").blur(function(){

            if($("#date_ticket").val()===""){
                $("#date_ticket").val("Enter date of ticket sales");
            }
        });//end of band_name blur function

    });//this.each function
    return this;

};//end of fill or clean function

/***********************    END OF FILL OR CLEAN FUNCTIONS    ******************/




//////////////////////////////////////////////////////////////////////////////////
                    /*   ENABLE-DISABLE DATEPICKER FUNCTIONS  */
//////////////////////////////////////////////////////////////////////////////////

      /*TO ENABLE DATE_TICKET INPUT**/

       function enable_date_ticket(){

            $("#date_ticket").val("Enter date of ticket sales");
            $("#date_ticket").prop('disabled',false);


        }//end disable_date_ticket;

       /*TO DISABLE DATE_TICKET INPUT**/

       function disable_date_ticket(){

            $("#date_ticket").val("Free admission");
            $("#date_ticket").prop('disabled',true);
            alert("Check Ticket option to change");


        }//end disable_date_ticket;

/***********************    END OF ENABLE-DISABLE DATEPICKER FUNCTIONS    ******************/




//////////////////////////////////////////////////////////////////////////////////
                    /*   ENABLE-DISABLE FREE ADMISSION FUNCTIONS  */
//////////////////////////////////////////////////////////////////////////////////

        function disable_free_admission(){

            var type_access_options=document.getElementsByName('type_access[]');
            if(type_access_options[0].value()==="Ticket"){
              type_access_options[2].prop(disabled,true);
            }
        }



/***********************    END OF ENABLE-DISABLE DATEPICKER FUNCTIONS    ******************/



//////////////////////////////////////////////////////////////////////////////////
                /*   VALIDATE COUNTRY, PROVINCE , TOWN FUNCTIONS  */
//////////////////////////////////////////////////////////////////////////////////

function validate_country(country) {
    if (country === null) {
        //return 'default_pais';
        return false;
    }else if (country.length === 0) {
        //return 'default_pais';
        return false;
    }else if (country === 'Select a country') {
        //return 'default_pais';
        return false;
    }else{
      return true;
    }
}


function validate_province(province) {
    if (province === null) {
        return 'default_provincia';
    }else if (province.length === 0) {
        return 'default_provincia';
    }else if (province === 'Select a province') {
        //return 'default_provincia';
        return false;
    }else{
        return true;
    }

}

function validate_town(town) {
    if (town === null) {
        return 'default_poblacion';
    }else if (town.length === 0) {
        return 'default_poblacion';
    }else if (town === 'Select a town') {
        //return 'default_poblacion';
        return false;
    }else{
        return true;
    }
}

/* To fix Uncaugh Error: Dropzone already attached*/
Dropzone.autoDiscover=false;



//////////////////////////////////////////////////////////////////////////////////
                            /*   DOCUMENT READY  */
//////////////////////////////////////////////////////////////////////////////////

/*document.ready: To indicate to the browser starts to execute the javascript code at this point*/
$(document).ready(function(){

        /*To configure DatePicker selectors*/
        $('#date_event').datepicker({
        		dateFormat: 'dd/mm/yy',
        		changeMonth: true,
        		changeYear: true,
        		minDate:0
        });


    	$('#date_ticket').datepicker({
    			dateFormat: 'dd/mm/yy',
    			changeMonth: true,
    			changeYear: true,
    			minDate:0
    	});


    $("#submit_products").click(function () {
      validate_user();
    });//end of submit_products function




////////////////////////////////////////////////////////////////////////////////
                      /*  TO LOAD OR DELETE DATA AT THE FORM  */
////////////////////////////////////////////////////////////////////////////////




    $.get("modules/products/controller/controller_products.class.php?load_data=true",
          function(response){
            if(response.event===""){
              $("#event_id").val('');
              $("#band_id").val('');
              $("#band_name").val('');
              $("#description").val('');
              $("#country").val('');
              $("#province").val('');
              $("#town").val('');
              var type_event_d=document.getElementsByName('type_event');
              for(var i=0; i<type_event_d.length;i++){
                type_event_d[i].checked=false;
              }
              $("#n_participants").val('');
              $("#date_event").val('');
              var type_access_d=document.getElementsByName('type_access[]');
              for(i=0;i<type_access_d.length; i++){
                if(type_access_d[i].checked){
                  type_access_d[i].checked=false;
                }//end if checked
              }//end for
              $("#date_ticket").val('');
              $("#openning").val('');
              $("#start").val('');
              $("#end").val('');
              /*To invoque the fill_or_clean pluggin*/
              $(this).fill_or_clean();

            }else{

              $("#event_id").val(response.event.event_id);
              $("#band_id").val(response.event.band_id);
              $("#band_name").val(response.event.band_name);
              $("#description").val(response.event.description);
              $("#country").val(response.event.country);
              $("#province").val(reponse.event.province);
              $("#town").val(response.event.town);
              var type_event_checked=response.event.type_event;
              var type_event=document.getElementsByName('type_event');
              for(var j=0; j<type_event.length; j++){
                if(type_event[j].value===type_event_checked){
                  type_event[j].checked=true;
                }//End of if
              }//end of for
              $("#n_participants").val(response.event.n_participants);
              $("#date_event").val(response.event.date_event);
              var type_access_checked=response.event.type_access;
              var type_access_f=document.getElementsByName('type_access[]');
              for (var z=0; z<type_access_checked.length;z++){
                for(var y=0; y<type_access_f.length;y++){
                  if(type_access_checked[z]===type_access_f[y]){
                    type_access_f[y].checked=true;
                  }//end if
                }//end 2nd for
              }//end 1st for
              $("#date_ticket").val(response.event.date_ticket);
              $("#openning").val(response.event.openning);
              $("#start").val(response.event.start);
              $("#end").val(response.event.end);
            }//end if-else response.event
          }, "json");//end $.get

    /*Dropzone function */
$("#dropzone").dropzone({
    url: "modules/products/controller/controller_products.class.php?upload=true",
    addRemoveLinks: true,
    maxFileSize: 200,
    dictResponseError: "Ha ocurrido un error en el server",
    acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
     init: function () {

          this.on("success", function (file, response) {
            //console.log("estic dins del upload");
            //console.log(response);
            //alert(response);
            $("#progress").show();
            $("#bar").width('100%');
            $("#percent").html('100%');
            $('.msg').text('').removeClass('msg_error');
            $('.msg').text('Success Upload image!!').addClass('msg_ok').animate({'right': '300px'}, 300);
         });
    },
    complete: function (file) {
        //if(file.status == "success"){
        //alert("El archivo se ha subido correctamente: " + file.name);
        //}
    },
    error: function (file) {
        //alert("Error subiendo el archivo " + file.name);
    },
    removedfile: function (file, serverFileName) {
        var name = file.name;
        $.ajax({
            type: "POST",
            url: "modules/products/controller/controller_products.class.php?delete=true",
            data: "filename=" + name,
            success: function (data) {
              console.log(data);

                $("#progress").hide();
                $('.msg').text('').removeClass('msg_ok');
                $('.msg').text('').removeClass('msg_error');
                $("#e_avatar").html("");

                var json = JSON.parse(data);
                if (json.res === true) {
                    var element;
                    if ((element = file.previewElement) !== null) {
                        element.parentNode.removeChild(file.previewElement);
                        //alert("Imagen eliminada: " + name);
                    } else {
                      return  false;
                    }//end of 2nd else
                } else { //json.res == false, elimino la imagen también
                    var element;
                    if ((element = file.previewElement) !== null) {
                        element.parentNode.removeChild(file.previewElement);
                    } else {
                        return false;
                    }//end of 3rd else
                }//end of 1st else
            }//end of success function
        });//end of $.ajax
    }//End of removedfile function
});//End of Dropzone

load_countries_v1();
$("#province").empty();
$("#province").append('<option value="" selected="selected">Select a province</option>');
$("#province").prop('disabled',true);
$("#town").empty();
$("#town").append('<option value="" selected="selected">Select a town</option>');
$("#town").prop('disabled', true);

$("#country").change(function (){
  var country=$(this).val();
  var province=$("#province");
  var town=$("#town");

  if(country !== 'ES'){
    province.prop('disabled',true);
    town.prop('disabled',true);
    $("#province").empty();
    $("#town").empty();
  }else{
    province.prop('disabled',false);
    town.prop('disabled',false);
    load_provinces_v1();
  }
});//End of country change


$("#province").change(function(){

    var prov=$(this).val();
    if(prov>0){
      load_towns_v1(prov);
    }else{
      $("#town").prop('disabled',false);
    }//End of province change function

});//End of province.change


////////////////////////////////////////////////////////////////////////////////
                            /*   FADEOUT FUNCTIONS   */
////////////////////////////////////////////////////////////////////////////////

        /*FUNCTIONS TO DELETE THE ERROR MESSAGE WHEN THE EXPRESION IS CORRECT*/

        /*To state the regular expresions to validate de entered data.*/
        var event_id_re=/^[E]{1}[0-9]{10}$/;
        var band_id_re=/^[B]{1}[0-9]{10}$/;
        var band_name_re=/^(.){1,50}$/;
        var description_re=/^(.){1,500}$/;
        var n_participants_re=/^[1-9]{1,3}$/;
        var date_event_re=/^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/]\d{4}$/;


        $("#event_id").keyup(function () {
            if ($(this).val() !== "" && event_id_re.test($(this).val())) {
                $(".error").fadeOut();
                return false;
            }
        });

        $("#band_id").keyup(function(){
            if($(this).val() !=="" && band_id_re.test($(this).val())){
                $(".error").fadeOut();
                return false;
            }
        });

        $("#band_name").keyup(function(){
            if($(this).val() !=="" && band_name_re.test($(this).val())){
                $(".error").fadeOut();
                return false;
            }
        });

        $("#description").keyup(function(){
            if($(this).val() !=="" && description_re.test($(this).val())){
                $(".error").fadeOut();
                return false;
            }
        });

        $("#n_participants").keyup(function(){
            if($(this).val() !=="" && n_participants_re.test($(this).val())){
                $(".error").fadeOut();
                return false;
            }
        });


/***********************    END OF FADEOUT FUNCTIONS    ******************/



//////////////////////////////////////////////////////////////////////////////////
                            /*   VALIDATE_USER FUNCTION   */
//////////////////////////////////////////////////////////////////////////////////

function validate_user(){
  var result=true;

  var event_id=document.getElementById('event_id').value;
  var band_id=document.getElementById('band_id').value;
  var band_name=document.getElementById('band_name').value;
  var description=document.getElementById('description').value;
  var country=document.getElementById('country').value;
  var province=document.getElementById('province').value;
  var town=document.getElementById('town').value;
  var type_event;
  var type_event_v=document.getElementsByName('type_event');
  for(var z=0; z<type_event_v.length;z++){
       if(type_event_v[z].checked){
         type_event=type_event_v[z].value;
         break;
         }
  }

  var n_participants=document.getElementById('n_participants').value;
  var date_event=document.getElementById('date_event').value;
  var type_access=[];
  var type_access_options=document.getElementsByName('type_access[]');
  var j=0;
  for (var i=0; i< type_access_options.length; i++){
    if(type_access_options[i].checked){
      type_access[j]=type_access_options[i].value;
      j++;
    }
  }
  var date_ticket=document.getElementById('date_ticket').value;
  var openning=document.getElementById('openning').value;
  var start=document.getElementById('start').value;
  var end=document.getElementById('end').value;
  //console.log(date_ticket);


  /*To state the regular expresions to validate de entered data.*/
  var event_id_re=/^[E]{1}[0-9]{10}$/;
  var band_id_re=/^[B]{1}[0-9]{10}$/;
  var band_name_re=/^(.){1,50}$/;
  var description_re=/^(.){20,500}$/;
  var n_participants_re=/^[1-9]{1,3}$/;
  var date_event_re=/^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/]\d{4}$/;

  /*To remove the previous error message */
  $(".error").remove();

  /*CHECK event_id FIELD*/
  /*To avoid the field event_id is empty*/
  if($("#event_id").val()===""||$("#event_id").val()==="Enter event ID"){
      $("#event_id").focus().after("<span class='error'>Enter event ID</span>");
      return false;
      /*to test the regular expression*/
  }else if(!event_id_re.test($("#event_id").val())){
      $("#event_id").focus().after("<span class='error'>Event ID must have one E follow by 10 digits</span>");
      return false;
  }//end of else if
  /*END OF FUNCTION*/

  /*CHECK band_id FIELD*/
  /*To avoid the field band_id is empty*/
  if($("#band_id").val()===""||$("#band_id").val()==="Enter band ID"){
      $("#band_id").focus().after("<span class='error'>Enter band ID</span>");
      return false;
      /*to test the regular expression*/
  }else if(!band_id_re.test($("#band_id").val())){
      $("#band_id").focus().after("<span class='error'>Band ID must have one B follow by 10 digits</span>");
      return false;
  }//end of else if
  /*END OF FUNCTION*/


  /*CHECK band_name FIELD*/
  /*To avoid the field band_name is empty*/
  if($("#band_name").val()===""||$("#band_name").val()==="Enter band name"){
      $("#band_name").focus().after("<span class='error'>Enter band name</span>");
      return false;
      /*to test the regular expression*/
  }else if(!band_name_re.test($("#band_name").val())){
      $("#band_name").focus().after("<span class='error'>Band name must not have more than 50 characters</span>");
      return false;
  }//end of else if
  /*END OF FUNCTION*/


  /*CHECK description FIELD*/
  /*To avoid the field description is empty*/
  if($("#description").val()===""||$("#description").val()==="Enter a description"){
      $("#description").focus().after("<span class='error'>Enter a description</span>");
      return false;
      /*to test the regular expression*/
  }else if(!description_re.test($("#description").val())){
    $("#description").focus().after("<span class='error'>Description must have between 20 and 500 characters</span>");
      return false;
  }//end of else if
  /*END OF FUNCTION*/


  /*CHECK country FIELD*/
  /*To avoid the field country is empty*/
  if(!validate_country(country)){
    $("#country").focus().after("<span class='error'>Please select a country</span>");
    return false;
  }

  /*CHECK province FIELD*/
  /*To avoid the field province is empty*/
  if(!validate_province(province)){
    $("#province").focus().after("<span class='error'>Please select a province</span>");
    return false;
  }

  /*CHECK town FIELD*/
  /*To avoid the field province is empty*/
  if(!validate_town(town)){
    $("#town").focus().after("<span class='error'>Please select a town</span>");
    return false;
  }

  /*CHECK RADIOBUTTONS*/
  /*Function to check if at least one radio button is selected*/
  var check_radio=function(){

      var radiobuttons=document.getElementsByName('type_event');
      var selected=false;
      for(var i=0; i<radiobuttons.length;i++){
          if(radiobuttons[i].checked){
              selected=true;
              break;
          }
      }
      return selected;
  };//end check_radio function;

  /* If statement to show the error message */
  if(!check_radio()){
      $("#presentation").focus().after("<span class='error'>You must select one option at least</span>");
      return false;
  }
  /*END OF FUNCTION*/



  /*CHECK n_participants FIELD*/
  /*To avoid the field n_participants is empty*/
  if($("#n_participants").val()===""||$("#n_participants").val()==="Enter number of particpants"){
      $("#n_participants").focus().after("<span class='error'>Enter number of particpants</span>");
      return false;
      /*to test the regular expression*/
  }else if(!n_participants_re.test($("#n_participants").val())){
      $("#n_participants").focus().after("<span class='error'>Number of participants must be between 1 and 999</span>");
      return false;
  }//end of else if
  /*END OF FUNCTION*/



  /*CHECK date_event FIELD*/
  /*To avoid the field date-evetn is empty*/
  /*if($("#date_event").val()===""||$("#date_event").val()==="Enter date of event"){
      $("#date_event").focus().after("<span class='error'>Enter date of event</span>");
      return false;
      /*to test the regular expression*/
  /*}else if(!date_event_re.test($("#date_event").val())){
      $("#date_event").focus().after("<span class='error'>Date of event must have dd/mm/yyyy format</span>");
      return false;
  }//end of else if*/


  /*CHECK CHECKBOX*/
  /*Function to check if at least one checkbox is selected*/
  var check_check=function(){

      var checkboxes=document.getElementsByName('type_access[]');
      var selected=false;
      for(var i=0; i<checkboxes.length;i++){
          if(checkboxes[i].checked){
              selected=true;
              break;
          }
      }
      return selected;
  };//end check_radio function;

  /* If statement to show the error message */
  if(!check_check()){
      $("#ticket").focus().after("<span class='error'>You must select one option at least</span>");
      return false;
  }
  /*END OF FUNCTION*/




  /*CHECK OPTION LIST OPENNING*/
  /*Function to check if an option of a list has been selected*/
  function check_list(list){
      var index=document.getElementById(list).selectedIndex;
      var result=true;
      if(index===null||index===0){
        result=false;
      }
      return result;
  }

  /*To check doors openning list*/
  if(!check_list("openning")){
      $("#openning").focus().after("<span class='error'>You must select one option at least</span>");
      return false;
  }

   /*To Start of event list*/
  if(!check_list("start")){
      $("#start").focus().after("<span class='error'>You must select one option at least</span>");
      return false;
  }

  /*To End of event list*/
  if(!check_list("end")){
      $("#end").focus().after("<span class='error'>You must select one option at least</span>");
      return false;
  }

  if($("#start").val()<$("#openning").val()){
    $("#start").focus().after("<span class='error'>Start time cannot be less than the time of opening doors</span>");
    return false;

  }

  if($("#end").val()<=$("#start").val()){
    $("#end").focus().after("<span class='error'>Ending time must be greater than the start time</span>");
    return false;
  }

  /*END OF FUNCTION*/




////////////////////////////////////////////////////////////////////////////////
                  /*   BEFORE SEND THE DATA TO THE SERVER  */
////////////////////////////////////////////////////////////////////////////////

  if(result){

    // if(country===null){
    //     country='default_country';
    // }else if(country.length===0){
    //     country='default_country';
    // }else if(country==='Select a country'){
    //     return 'default_country';
    // }

    if(province===null){
        province='default_province';
    }else if(province.length===0){
        province='default_province';
    }else if(province==='Select a province'){
        return 'default_province';
    }

    if(town===null){
        town='default_town';
    }else if(town.length===0){
        town='default_town';
    }else if(town==='Select a town'){
        return 'default_town';
    }

    /*To create a JavaScript array that contains the event data*/
    var data={"event_id":event_id, "band_id":band_id, "band_name":band_name, "description":description, "country":country, "province":province, "town":town, "type_event":type_event, "n_participants":n_participants,
              "date_event":date_event, "type_access":type_access, "date_ticket":date_ticket, "openning":openning, "start":start, "end":end};

    /*To convert the JavaScript array in a JSON string*/
    var event_data_JSON=JSON.stringify(data);

    $.post('modules/products/controller/controller_products.class.php',
            {register_event_json:event_data_JSON},
    function(response){

      //console.log(response);
      if(response.success){
        window.location.href=response.redirect;
      }


    }, "json").fail(function (xhr,textStatus,errorThrown){
              // console.log("Estoy en el fail");
              //console.log(xhr.responseJSON.error_avatar);
              if (xhr.status === 0) {
                  alert('Not connect: Verify Network.');
              } else if (xhr.status == 404) {
                  alert('Requested page not found [404]');
              } else if (xhr.status == 500) {
                  alert('Internal Server Error [500].');
              } else if (textStatus === 'parsererror') {
                  alert('Requested JSON parse failed.');
              } else if (textStatus === 'timeout') {
                  alert('Time out error.');
              } else if (textStatus === 'abort') {
                  alert('Ajax request aborted.');
              } else {
                  /*alert('Uncaught Error: ' + xhr.responseText);*/
              }

              if (xhr.responseJSON == 'undefined' && xhr.responseJSON === null )
                xhr.responseJSON = JSON.parse(xhr.responseText);

              if(xhr.responseJSON.error.event_id){
                //$("#e_event_id").html("<span class='error1'>" + xhr.responseJSON.error.event_id + "<span>");
                 $("#event_id").focus().after("<span class='error1'>" + xhr.responseJSON.error.event_id + "<span>");
               }

              if(xhr.responseJSON.error.band_id){
                  $("#band_id").focus().after("<span class='error1'>" + xhr.responseJSON.error.band_id + "<span>");
              }

              if(xhr.responseJSON.error.band_name){
                  $("#band_name").focus().after("<span class='error1'>" + xhr.responseJSON.error.band_name + "<span>");
              }

              if(xhr.responseJSON.error.description){
                  $("#description").focus().after("<span class='error1'>" + xhr.responseJSON.error.description + "<span>");
              }

              if(xhr.responseJSON.error.country){
                 $("#country").focus().after("<span class='error1'>" + xhr.responseJSON.error.country + "<span>");
              }

              if(xhr.responseJSON.error.province){
                 $("#province").focus().after("<span class='error1'>" + xhr.responseJSON.error.province + "<span>");
              }

              if(xhr.responseJSON.error.town){
                 $("#town").focus().after("<span class='error1'>" + xhr.responseJSON.error.town + "<span>");
              }


              if(xhr.responseJSON.error.type_event){
                  $("#type_event").focus().after("<span class='error1'>" + xhr.responseJSON.error.type_event + "<span>");
              }

              if(xhr.responseJSON.error.n_participants){
                  $("#n_participants").focus().after("<span class='error1'>" + xhr.responseJSON.error.n_participants + "<span>");
              }

              if(xhr.responseJSON.error.date_event){
                  $("#date_event").focus().after("<span class='error1'>" + xhr.responseJSON.error.date_event + "<span>");
              }

              if(xhr.responseJSON.error.type_access){
                  $("#type_access").focus().after("<span class='error1'>" + xhr.responseJSON.error.type_access + "<span>");
              }

              if(xhr.responseJSON.error.date_ticket){
                  $("#date_ticket").focus().after("<span class='error1'>" + xhr.responseJSON.error.date_ticket + "<span>");
              }

              if(xhr.responseJSON.error.openning){
                  $("#openning").focus().after("<span class='error1'>" + xhr.responseJSON.error.openning + "<span>");
              }

              if(xhr.responseJSON.error.start){
                  $("#start").focus().after("<span class='error1'>" + xhr.responseJSON.error.start + "<span>");
              }

              if(xhr.responseJSON.error.end){
                  $("#end").focus().after("<span class='error1'>" + xhr.responseJSON.error.end + "<span>");
              }

              if(xhr.responseJSON.error_avatar){
                $("#dropzone").focus().after("<span class='error1'>" + xhr.responseJSON.error_avatar + "<span>");
              }

            });//end of .fail

  }//End of if result

}//end of validate_user

});//end of ready function


function load_countries_v2(cad){
  $.getJSON(cad, function(data){
    $("#country").empty();
    $("#country").append('<option value="" selected="selected">Select a country</option>');

    $.each(data, function(i, valor){
      $("#country").append("<option value='"+ valor.sISOCode + "'>" + valor.sName +"</option>");
    });//End of each data
  })//end of getJson
  .fail(function() {
    alert("error load_countries");
  });
}//End of load_countries_v2


function load_countries_v1(){
  $.get("modules/products/controller/controller_products.class.php?load_country=true",
      function(response){
        //console.log(response);
        if(response==='error'){
          load_countries_v2("resources/ListOfCountryNamesByName.json");
        }else{
          load_countries_v2("modules/products/controller/controller_products.class.php?load_country=true");
        }
      })//End $.get
      .fail(function(response){
          load_countries_v2("resources/ListOfCountryNamesByName.json");
      });//End of fail
}//end of load_countries_v1


function load_provinces_v2(){
  $.get("resources/ListOfCountryNamesByName.xml", function(xml){
    $("#province").empty();
    $("#province").append('<option value"" selected="selected">Select a province</option>');

    $(xml).find("provincia").each(function () {
      var id=$(this).attr('id');
      var name=$(this).find('nombre').text();
      $("#province").append("<option value='" + id + "'>" + name + "</option>");
    });//End of $(xml)

  })
  .fail(function() {
    alert("error load_provinces");
  });//End of $.get

}//End of load_provinces_v2

function load_provinces_v1(){

  $.get("modules/products/controller/controller_products.class.php?load_provinces=true",
          function(response){
            //console.log(response);
            $("#province").empty();
            $("#province").append('<option value="" selected="selected">Select a province</option>');

            var json=JSON.parse(response);
            var provinces=json.provinces;
            //console.log(provinces);
            if(provinces==='error'){

              load_provinces_v2();

            }else{

              for(var i=0;i<provinces.length; i++){
                $("#province").append("<option value='" + provinces[i].id + "'>" + provinces[i].nombre + "</option>");
              }//enf of for
            }//end of else

          })//End of get
          .fail(function(response) {
            load_provinces_v2();

          });
}//end of load_provinces_v1

function load_towns_v2(prov) {
  $.get("resources/ListOfCountryNamesByName.xml", function(xml){
    $("#town").empty();
    $("#town").append('<option value"" selected="selected">Select a town</option>');

    $(xml).find('provincia[id=' + prov + ']').each(function(){
      $(this).find('localidad').each(function(){
        $("#town").append("<option value='" + $(this).text() + "'>" +$(this).text() + "</option>");
      });
    });
  })//End of $.get
  .fail(function(){
    alert("error load_towns");
  });
}//End of load_towns_v2


function load_towns_v1(prov){

  var data={idPoblac:prov};
  $.post("modules/products/controller/controller_products.class.php",data, function(response){
    //console.log(response);
    var json=JSON.parse(response);
    var towns=json.towns;
    //console.log(towns);
    $("#town").empty();
    $("#town").append('option value="" selected="selected">Select a town</option>');

    if(towns==='error'){
      load_towns_v2(prov);
    }else{
      for (var i=0; i<towns.length;i++){
        $("#town").append("<option value='" + towns[i].poblacion + "'>" + towns[i].poblacion + "</option>");

      }//end of for
    }//end of else
  }).fail(function(){
        load_towns_v2(prov);
  });//End of $.post
}//End of load_towns_v1
