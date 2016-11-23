

function validate_search(search_value){
  if(search_value.length>0){
    var regexp =/^[a-zA-Z0-9 .,]*$/;
    return regexp.test(search_value);
  }
  return false;
}//end of validate_search function



function refresh(){
  $('.pagination').html='';
  $('.pagination').val='';
}//end of validate_search function



function search(keyword){

  var urlbase="index.php?module=events_front_end&function=";

  if(!keyword){
    url=urlbase + "number_pages_events&num_pages=true";
  }else{
    url=urlbase + "number_pages_events&num_pages=true&keyword=" + keyword;
  }

  $.get(url,function(data,status){

    var json=JSON.parse(data);
    var pages=json.pages;
    //console.log(pages);
    if(!keyword){
      url=urlbase + "obtain_events";
    }else{
      url=urlbase + "obtain_events&keyword=" + keyword;
    }

    $("#results").load(url);

    if(pages !==0){
      refresh();
      $(".pagination").bootpag({
        total:pages,
        page:1,
        maxVisible:3,
        next:'next',
        prev:'prev'
      }).on("page",function(e,num){
        e.preventDefault();
        if(!keyword){
          $("#results").load(url,{'page_num':num});
        }else{
          $("#results").load(url,{'page_num':num, 'keyword':keyword});
          reset();
        }
      });//end on
    }else{
      $("#results").load("index.php?module=events_front_end&function=view_error_false&view_error=false");
      $('.pagination').html('');
      reset();
    }//Endif pages!==0
    reset();

  }).fail(function(xhr){
    $("#results").load("index.php?module=events_front_end&function=view_error_true&view_error=true");
    $('.pagination').html('');
    reset();
  });

}//end of search function

function search_event(keyword){

  $.get("index.php?module=events_front_end&function=band_names&band_name=" + keyword, function(data,status){
    var json=JSON.parse(data);
    var event_=json.event_autocomplete;
    //console.log(data);
    $('#results').html('');
    $('.pagination').html('');


    poster.innerHTML='<img src="' + event_[0].poster + '" class="img-product">';

    band_name.innerHTML=event_[0].band_name;

    type_event.innerHTML=event_[0].type_event;

    description.innerHTML=event_[0].description;

    date_event.innerHTML=event_[0].date_event;

  }).fail(function(xhr){

    $("#results").load("index.php?module=events_front_end&function=view_error_false&view_error=false");
    $('.pagination').html('');
    reset();

  });

}//end of search_product function


function count_event(keyword){

  $.get("index.php?module=events_front_end&function=count_events&count_event=" + keyword, function(data,status){
    var json=JSON.parse(data);
    var num_events=json.num_events;
    alert("num_events:" + num_events);
    //console.log(num_events);
    if(num_events===0){

      $("#results").load("index.php?module=events_front_end&function=view_error_false&view_error=false");
      $('.pagination').html('');
      reset();
    }

    if(num_events==1){
        search_event(keyword);
    }

    if(num_events>1){

      search(keyword);
    }
  }).fail(function(){
    $("#results").load("index.php?module=events_front_end&function=view_error_true&view_error=true");
    $('.pagination').html('');
    reset();
  });

}//end of count_product function

function reset(){
  $("#poster").html('');
  $("#band_name").html('');
  $("#type_event").html('');
  $("#description").html('');
  $("#date_event").html('');
  $("#keyword").val('');
}

function getCookie(cname){
  var name = cname + "=";
  var ca=document.cookie.split(';');
  for(var i =0;i<ca.length;i++){
    var c=ca[i];
    while (c.charAt(0)==' ')
      c=c.substring(1);
    if (c.indexOf(name)===0)
      return c.substring(name.length, c.length);
  }//end of for
  return 0;
}//end of getCookie function

function setCookie(cname, cvalue, exdays){

  var d= new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie=cname + "=" + cvalue + "; " + expires;

}//end of setCookie

$(document).ready(function(){

  if(getCookie("search")){
    var keyword=getCookie("search");
    count_event(keyword);
    alert("load page getCookie(search): " + getCookie("search"));
    setCookie("search","",1);
  }else{
    search();
  }//end of getCookie search

  $("#search_event").submit(function (e) {
    var keyword=document.getElementById('keyword').value;
    var v_keyword=validate_search(keyword);
    if(v_keyword){
      setCookie("search", keyword,1);
    }
    alert("getCookie(search):" + getCookie("search"));
    location.reload(true);

    e.preventDefault();

  });//end of search_event submit


  $('#Submit').click(function () {
    var keyword=document.getElementById('keyword').value;
    var v_keyword=validate_search(keyword);
    if(v_keyword){
      setCookie("search", keyword,1);
    }
    alert("getCookie(search):" + getCookie("search"));
    location.reload(true);

    e.preventDefault();

  });

  $('#back').click(function(){
    search();
  });

  $.get("index.php?module=events_front_end&function=autocomplete_events&autocomplete=true", function(data,status){

    var json=JSON.parse(data);
    var name_events=json.band_name;
    //console.log(name_events);
    var suggestions =new Array();
    for (var i =0; i<name_events.length; i++){
      suggestions.push(name_events[i].band_name);
    }//end of for
    //console.log(suggestions);
    $("#keyword").autocomplete({
      source:suggestions,
      minLength:1,
      select:function(event, ui){
        var keyword =ui.item.label;
        count_event(keyword);
      }
    });
  }).fail(function(xhr){
    $("#results").load("index.php?module=events_front_end&function=view_error_false&view_error=false");
    $('.pagination').html('');
    reset();
  });//End of $.get autocomplete

});//end of document.ready
