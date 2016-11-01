
$(document).ready(function(){
  $.get("modules/events_front_end/controller/controller_fe.class.php?num_pages=true",function(data, status){
    var json=JSON.parse(data);
    var pages=json.pages;
    //console.log(pages);

    $("#results").load("modules/events_front_end/controller/controller_fe.class.php");

    $(".pagination").bootpag({
      total:pages,
      page:1,
      maxVisible:3,
      next:'next',
      prev:'prev'
    }).on("page",function(e,num){
      e.preventDefault();

      $("#results").load("modules/events_front_end/controller/controller_fe.class.php",{'page_num':num});

    });//end on

}).fail(function(xhr){

    if(xhr.status ===404){

      $("#results").load("modules/events_front_end/controller/controller_fe.class.php?view_error=false");

    }else{

      $("#results").load("modules/events_front_end/controller/controller_fe.class.php?view_error=true");

    }

  });//end of fail

});//end of document.ready
