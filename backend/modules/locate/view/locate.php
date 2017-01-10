<!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhxaDfVV53FiAvq_HxOzdYIrGqszV_VM4" async defer></script>
<script src="<?php echo LOCATE_JS_PATH; ?>geolocator.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo LOCATE_CSS_PATH; ?>locate.css"> -->
<link rel="stylesheet" type="text/css" href="https://localhost/whoplaystonight/modules/locate/view/css/locate.css">

<!-- <link rel="stylesheet" type="text/css" href="https://localhost/whoplaystonight/modules/locate/view/css/locate.css">  -->
<section id="main" class="wrapper">
    <div class="container">

        <header class="major">
            <h2>Events</h2>
            <p>Here you can view the location of the events.</p>
        </header>

        <div class="image fit">
            <div id='ubicacion'></div>
            <!-- Se escribe un mapa con la localizacion anterior-->
            <div id="demo"></div>
            <div id="mapholder"></div>
            <div class="ofertas"></div>
        </div>

    </div>
</section>
