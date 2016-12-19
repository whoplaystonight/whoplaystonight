/*To hide details_prod*/
//$("#details_prod").hide();
$("document").ready(function(){

  $('.prod').click(function(){
    var id=this.getAttribute('id');

     $.post(amigable("?module=events_front_end&function=idProducts"),{'idProduct':id}, function(data,status){
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

    }).fail(function(xhr){

        $("#results").load(amigable("?module=events_front_end&function=view_error_false&aux=view_error"));
  
    });//end of get.fail
  });//End if prod.click
});//End of document.ready
