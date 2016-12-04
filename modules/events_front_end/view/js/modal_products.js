/*To hide details_prod*/
//$("#details_prod").hide();
$("document").ready(function(){

  $('.prod').click(function(){
    var id=this.getAttribute('id');
    //console.log(id);
     //$.get("index.php?module=events_front_end&function=idProducts&idProduct=" + id, function(data,status){
     $.post("../../events_front_end/idProducts/",{'idProduct':id}, function(data,status){
      var json=JSON.parse(data);
      var event=json.product;
      //console.log(product);
      $('#results').html('');
      $('.pagination').html('');

      $("#poster").html('<img src="../../' + event.poster +'" height="300px" width="300px">');
      $("#band_name").html(event.band_name);
      $("#type_event").html(event.type_event);
      $("#description").html(event.description);
      $("#date_event").html(event.date_event);

      // $("#details_prod").show();

      // $("#product").dialog({
      //   /*To state the paramethers of modal dialog*/
      //   width:850,
      //   height:500,
      //   //show: "scale", //animation to appear
      //   //hide: "scale",//animation to hide
      //   resizable:"false",//fixed size
      //   //posiiton:"top",
      //   modal:"true",//to block content from below of the modal dialog
      //   buttons:{
      //     OK:function(){
      //       $(this).dialog("close");
      //     }
      //   },//end of ok button
      //   show: {
      //     effect:"blind",
      //     duration:1000
      //   },//end of show button
      //   hide:{
      //     effect:"explode",
      //     duration:1000
      //   }//end of hide button
      // });//End of product dialog

    }).fail(function(xhr){
      // if(xhr.status === 404){
      //   $("#results").load("modules/events_front_end/controller/controller_fe.class.php?view_error=false");
      // }else{
        $("#results").load("../../events_front_end/view_error_false/",{'view_error':false});
      // }

    });//end of get.fail
  });//End if prod.click
});//End of document.ready
