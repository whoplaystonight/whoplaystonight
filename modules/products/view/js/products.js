

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


    /*To invoque the fill_or_clean pluggin*/
    //$(this).fill_or_clean();

    /*Dropzone function */
$("#dropzone").dropzone({
    url: "modules/products/controller/controller_products.class.php?upload=true",
    addRemoveLinks: true,
    maxFileSize: 1000,
    dictResponseError: "Ha ocurrido un error en el server",
    acceptedFiles: 'image/*,.jpeg,.jpg,.png,.gif,.JPEG,.JPG,.PNG,.GIF,.rar,application/pdf,.psd',
     init: function () {

          this.on("success", function (file, response) {
            //console.log("estic dins del upload");
            console.log(response);
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
              //console.log("estic dins del delete");
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


////////////////////////////////////////////////////////////////////////////////
                            /*   FADEOUT FUNCTIONS   */
////////////////////////////////////////////////////////////////////////////////

        /*FUNCTIONS TO DELETE THE ERROR MESSAGE WHEN THE EXPRESION IS CORRECT*/

        /*To state the regular expresions to validate de entered data.*/
        // var event_id_re=/^[E]{1}[0-9]{10}$/;
        // var band_id_re=/^[B]{1}[0-9]{10}$/;
        // var band_name_re=/^(.){1,50}$/;
        // var description_re=/^(.){1,500}$/;
        // var n_participants_re=/^[1-9]{1,3}$/;
        // var date_event_re=/^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/]\d{4}$/;
        //
        //
        // $("#event_id").keyup(function () {
        //     if ($(this).val() !== "" && event_id_re.test($(this).val())) {
        //         $(".error").fadeOut();
        //         return false;
        //     }
        // });
        //
        // $("#band_id").keyup(function(){
        //     if($(this).val() !=="" && band_id_re.test($(this).val())){
        //         $(".error").fadeOut();
        //         return false;
        //     }
        // });
        //
        // $("#band_name").keyup(function(){
        //     if($(this).val() !=="" && band_name_re.test($(this).val())){
        //         $(".error").fadeOut();
        //         return false;
        //     }
        // });
        //
        // $("#description").keyup(function(){
        //     if($(this).val() !=="" && description_re.test($(this).val())){
        //         $(".error").fadeOut();
        //         return false;
        //     }
        // });
        //
        // $("#n_participants").keyup(function(){
        //     if($(this).val() !=="" && n_participants_re.test($(this).val())){
        //         $(".error").fadeOut();
        //         return false;
        //     }
        // });


/***********************    END OF FADEOUT FUNCTIONS    ******************/



//////////////////////////////////////////////////////////////////////////////////
                            /*   VALIDATE_USER FUNCTION   */
//////////////////////////////////////////////////////////////////////////////////

function validate_user(){
  var result=true;

  var event_id=document.getElementById('event_id').value;
  console.log(event_id);
  var band_id=document.getElementById('band_id').value;
  var band_name=document.getElementById('band_name').value;
  var description=document.getElementById('description').value;
  var type_event=document.getElementById('type_event').value;
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


  // // /*To state the regular expresions to validate de entered data.*/
  //var event_id_re=/^[E]{1}[0-9]{10}$/;
  // var band_id_re=/^[B]{1}[0-9]{10}$/;xº
  // var band_name_re=/^(.){1,50}$/;
  // var description_re=/^(.){1,500}$/;
  // var n_participants_re=/^[1-9]{1,3}$/;
  // var date_event_re=/^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/]\d{4}$/;
  //
   /*To remove the previous error message */
  //$(".error").remove();

  // /*CHECK event_id FIELD*/
  // /*To avoid the field event_id is empty*/
  // if($("#event_id").val()===""||$("#event_id").val()==="Enter event ID"){
  //     $("#event_id").focus().after("<span class='error'>Enter event ID</span>");
  //     return false;
  //     /*to test the regular expression*/
  // }else if(!event_id_re.test($("#event_id").val())){
  //     $("#event_id").focus().after("<span class='error'>Event ID must have one E follow by 10 digits</span>");
  //     return false;
  // }//end of else if
  // /*END OF FUNCTION*/

  // /*CHECK band_id FIELD*/
  // /*To avoid the field band_id is empty*/
  // if($("#band_id").val()===""||$("#band_id").val()==="Enter band ID"){
  //     $("#band_id").focus().after("<span class='error'>Enter band ID</span>");
  //     return false;
  //     /*to test the regular expression*/
  // }else if(!band_id_re.test($("#band_id").val())){
  //     $("#band_id").focus().after("<span class='error'>Band ID must have one B follow by 10 digits</span>");
  //     return false;
  // }//end of else if
  // /*END OF FUNCTION*/
  //
  //
  // /*CHECK band_name FIELD*/
  // /*To avoid the field band_name is empty*/
  // if($("#band_name").val()===""||$("#band_name").val()==="Enter band name"){
  //     $("#band_name").focus().after("<span class='error'>Enter band name</span>");
  //     return false;
  //     /*to test the regular expression*/
  // }else if(!band_name_re.test($("#band_name").val())){
  //     $("#band_name").focus().after("<span class='error'>Band name must not have more than 50 characters</span>");
  //     return false;
  // }//end of else if
  // /*END OF FUNCTION*/
  //
  //
  // /*CHECK description FIELD*/
  // /*To avoid the field description is empty*/
  // if($("#description").val()===""||$("#description").val()==="Enter a description"){
  //     $("#description").focus().after("<span class='error'>Enter a description</span>");
  //     return false;
  //     /*to test the regular expression*/
  // }else if(!description_re.test($("#description").val())){
  //   $("#description").focus().after("<span class='error'>Description must not have more than 500 characters</span>");
  //     return false;
  // }//end of else if
  // /*END OF FUNCTION*/
  //
  //
  // /*CHECK RADIOBUTTONS*/
  // /*Function to check if at least one radio button is selected*/
  // var check_radio=function(){
  //
  //     var radiobuttons=document.getElementsByName('type_event');
  //     var selected=false;
  //     for(var i=0; i<radiobuttons.length;i++){
  //         if(radiobuttons[i].checked){
  //             selected=true;
  //             break;
  //         }
  //     }
  //     return selected;
  // };//end check_radio function;
  //
  // /* If statement to show the error message */
  // if(!check_radio()){
  //     $("#presentation").focus().after("<span class='error'>You must select one option at least</span>");
  //     return false;
  // }
  // /*END OF FUNCTION*/
  //
  //
  //
  // /*CHECK n_participants FIELD*/
  // /*To avoid the field n_participants is empty*/
  // if($("#n_participants").val()===""||$("#n_participants").val()==="Enter number of particpants"){
  //     $("#n_participants").focus().after("<span class='error'>Enter number of particpants</span>");
  //     return false;
  //     /*to test the regular expression*/
  // }else if(!n_participants_re.test($("#n_participants").val())){
  //     $("#n_participants").focus().after("<span class='error'>Number of participants must be between 1 and 999</span>");
  //     return false;
  // }//end of else if
  // /*END OF FUNCTION*/
  //
  //
  //
  // /*CHECK date_event FIELD*/
  // /*To avoid the field date-evetn is empty*/
  // /*if($("#date_event").val()===""||$("#date_event").val()==="Enter date of event"){
  //     $("#date_event").focus().after("<span class='error'>Enter date of event</span>");
  //     return false;
  //     /*to test the regular expression*/
  // /*}else if(!date_event_re.test($("#date_event").val())){
  //     $("#date_event").focus().after("<span class='error'>Date of event must have dd/mm/yyyy format</span>");
  //     return false;
  // }//end of else if*/
  //
  //
  // /*CHECK CHECKBOX*/
  // /*Function to check if at least one checkbox is selected*/
  // var check_check=function(){
  //
  //     var checkboxes=document.getElementsByName('type_access[]');
  //     var selected=false;
  //     for(var i=0; i<checkboxes.length;i++){
  //         if(checkboxes[i].checked){
  //             selected=true;
  //             break;
  //         }
  //     }
  //     return selected;
  // };//end check_radio function;
  //
  // /* If statement to show the error message */
  // if(!check_check()){
  //     $("#ticket").focus().after("<span class='error'>You must select one option at least</span>");
  //     return false;
  // }
  // /*END OF FUNCTION*/



  //
  // /*CHECK OPTION LIST OPENNING*/
  // /*Function to check if an option of a list has been selected*/
  // function check_list(list){
  //     var index=document.getElementById(list).selectedIndex;
  //     var result=true;
  //     if(index===null||index===0){
  //       result=false;
  //     }
  //     return result;
  // }
  //
  // /*To check doors openning list*/
  // if(!check_list("openning")){
  //     $("#openning").focus().after("<span class='error'>You must select one option at least</span>");
  //     return false;
  // }
  //
  //  /*To Start of event list*/
  // if(!check_list("start")){
  //     $("#start").focus().after("<span class='error'>You must select one option at least</span>");
  //     return false;
  // }
  //
  // /*To End of event list*/
  // if(!check_list("end")){
  //     $("#end").focus().after("<span class='error'>You must select one option at least</span>");
  //     return false;
  // }
  //
  // /*END OF FUNCTION*/


/*****************************    END OF VALIDATE FUNCTION    ******************/

//console.log("Antes de que se envien los datos al servidor");

//////////////////////////////////////////////////////////////////////////////////
                            /*   BEFORE SEND THE DATA TO THE SERVER  */
//////////////////////////////////////////////////////////////////////////////////

  if(result){
    /*To create a JavaScript array that contains the event data*/
    var data={"event_id":event_id, "band_id":band_id, "band_name":band_name, "description":description, "type_event":type_event, "n_participants":n_participants,
              "date_event":date_event, "type_access":type_access, "date_ticket":date_ticket, "openning":openning, "start":start, "end":end};
    console.log(data.event_id);

    /*To convert the JavaScript array in a JSON string*/
    var event_data_JSON=JSON.stringify(data);

    $.post('modules/products/controller/controller_products.class.php',
            {register_event_json:event_data_JSON},
    function(response){

    //console.log(response);
      if(response.success){
        window.location.href=response.redirect;
      }


    }, "json").fail(function (xhr){
              console.log("Estoy en el fail");
              console.log(xhr);
              // if(xhr.reponseJSON.error.event_id){
              //    $("#event_id").focus().after("<span class='error1'>" + xhr.responseJSON.error.event_id + "<span>");
              //  }
            });//end of .fail

  }//End of if result

}//end of validate_user

});//end of ready function
