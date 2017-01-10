<script type="text/javascript" src="<?php echo EVENTS_VIEW_JS ?>jquery.bootpag.min.js"></script>
<script type="text/javascript" src="<?php echo EVENTS_VIEW_JS ?>list_products.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo EVENTS_VIEW_CSS ?>main.css">


<br><br>
<center>
  <form name="search_event" id="search_event" class="search_event">
    <input type="text" value="" placeholder="Search event..." class="input_search" id="keyword" list="datalist"/>
    <input name="Submit" id="Submit" class="button_search" type="button">

  </form>
</center>

<div id="results"></div>

<center>
    <div class="pagination"></div>
</center>

<!-- modal window details_product -->
<section id="product">

        <center>
        <div id="details">
            <div id="poster" class="prodImg"></div>

            <div id="container">

                <h4> <strong><div id="band_name"></div></strong> </h4>
                <br>
                <p>
                <div id="type_event"></div>
                </p>
                <p>
                <div id="description"></div>
                </p>
                <h2> <strong><div id="date_event"></div></strong> </h5>
                <button type="button" id="back">Back</button>

            </div>

        </div>
      </center>

</section>
