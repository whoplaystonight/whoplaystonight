/*To hide details_prod*/
$("#details_prod").hide();
$("document").ready(function(){

  $('.prod').click(function(){
    var id=this.getAttribute('id');

    $.get("modules/products/controller/controller_fe.class.php?idProducts=" + id, function(data,status){
      var json=JSON.parse(data);
      var product=json.product;

      $("#poster").html('<img src="' + product.poster +'" height="75" width="75">');
      $("#band_name").html(product.band_name);
      $("#type_event").html(product.type_event);
      $("#description").html(product.description);
      $("#date_event").html(product.date_event);

      $("#details_prod").show();

      $("#product").dialog({
        /*To state the paramethers of modal dialog*/
        width:850,
        height:500,
        //show: "scale", //animation to appear
        //hide: "scale",//animation to hide
        resizable:"false",//fixed size
        //posiiton:"top",
        modal:"true",//to block content from below of the modal dialog
        buttons:{
          OK:function(){
            $(this).dialog("close");
          }
        },//end of ok button
        show: {
          effect:"blind",
          duration:1000
        },//end of show button
        hide:{
          effect:"explode",
          duration:1000
        }//end of hide button
      });//End of product dialog

    }).fail(function(xhr){
      if(xhr.status === 404){
        $("#results").load("modules/products/controller/controller_fe.class.php?view_error=false");
      }else{
        $("#results").load("modules/products/controller/controller_fe.class.php?view_error=true");
      }

    });//end of get.fail
  });//End if prod.click
});//End of document.ready
