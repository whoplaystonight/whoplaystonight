<body>
  <div class="banner">
  <div class="header-top">
    <div class="container">
      <div class="indicat">
        <span><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1398 W El Camino Real, Mountain View,UK</span>
      </div>
      <div class="detail">
        <ul>
          <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i> + 1 599-033-5036</li>
          <li><i class="glyphicon glyphicon-time" aria-hidden="true"></i> Mon-Sun 8:00 am to 23:00 pm </li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="container">
    <div class="navigation navi">
      <div class="logo">
        <h1><a href="<?php amigable('?module=main');?>">WHO PLAYS TONIGHT?</a></h1>
      </div>
      <div class="navigation-right">
        <span class="menu"><img src="images/menu.png" alt=" " /></span>
        <nav class="link-effect-3" id="link-effect-3">
          <ul class="nav1 nav nav-wil">
            <li class="<?php if(isset($_GET['module']) === 'main'){echo 'active';} else {echo 'deactivate';}?>"><a  data-hover="Home" href="<?php amigable('?module=main');?>">Home</a></li>
            <li class="<?php if(isset($_GET['module']) === 'products'){echo'active';} else {echo 'deactivate';}?>"><a data-hover="Events"  href="<?php amigable('?module=products&function=events_form');?>">Events</a></li>
            <li class="<?php if(isset($_GET['module']) === 'events_front_end') {echo'active';} else {echo 'deactivate';}?>"><a data-hover="List Events" href="<?php amigable('?module=events_front_end&function=list_events');?>">List Events</a></li>
            <li class="<?php if(isset($_GET['module']) === 'services'){echo'active';} else {echo 'deactivate';}?>"><a data-hover="Services"  href="<?php amigable('?module=services'); ?>">Services</a></li>
            <li class="<?php if(isset($_GET['module']) === 'portfolio'){echo'active';} else {echo 'deactivate';}?>"><a data-hover="Portfolio" href="<?php amigable('?module=portfolio'); ?>">Portfolio</a></li>
            <li class="<?php if(isset($_GET['module']) === 'pricing'){echo'active';} else {echo 'deactivate';}?>"><a data-hover="Pricing" href="<?php amigable('?module=pricing'); ?>">Pricing</a></li>
            <li class="<?php if(isset($_GET['module']) === 'contact') {echo 'active';} else {echo 'deactivate';}?>"><a data-hover="Contact" href="<?php amigable('?module=contact&function=contact'); ?>">Contact</a></li>
            <li id="LogProf" class="<?php if(isset($_GET['module']) === 'users'){echo 'active';} else {echo 'deactivate';}?>"><a data-hover="Sign Up" href="<?php amigable('?module=users&function=sign_up'); ?>">Sign Up</a></li>
            <li class="<?php if(isset($_GET['module']) === 'locate'){echo 'active';} else {echo 'deactivate';}?>"><a data-hover="Locate" href="<?php amigable('?module=locate&function=locate'); ?>">Locate</a></li>
          </ul>
        </nav>
            <!-- script-for-menu -->
              <script>
                 $( "span.menu" ).click(function() {
                 $( "ul.nav1" ).slideToggle( 300, function() {
                 // Animation complete.
                  });
                 });
              </script>
            <!-- /script-for-menu -->
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
  </div>
    <br>

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1><?php
                    if (!isset($_GET['module'])) {
                        echo '<a href="#">Home</a>';
                    }else{
                        switch($_GET['module']){
                            case 'products':
                            echo '<a href="<?php amigable(\'?module=products&function=events_form\');?>">Events</a>';
                            break;
                            case 'events_front_end':
                            echo '<a href="<?php amigable(\'?module=events_front_end&function=list_events\');?>">List Events</a></li>';
                            break;
                            case 'services':
                            echo '<a href="#">Services</a>';
                            break;
                            case 'portfolio':
                            echo '<a href="#">Portfolio</a>';
                            break;
                            case 'pricing':
                            echo '<a href="#">Pricing</a>';
                            break;
                            case 'contact':
                            echo '<a href="<?php amigable(\'?module=contact&function=contact\');?>">Contact</a>';
                            break;
                            case 'users':
                            echo '<a href="<?php amigable(\'?module=users&function=sign_up\');?>">Sign Up</a>';
                            break;
                            case 'locate':
                            echo '<a href="<?php amigable(\'?module=locate&function=locate\');?>">Locate</a>';
                            break;
                            default:
                            echo '<a href="#">Home</a>';
                            break;
                        }
                    }
                    ?></h1>
                    <strong>WEB TEST</strong>
                </div>
                <div>
                <h1 id="BackHome"><a href="<?php amigable('?module=main'); ?>">Back Home</a></h1>
                </div>
            </div>
        </div>

    <!-- MENU END-->
