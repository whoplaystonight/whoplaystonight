<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">WHO PLAYS TONIGHT?</a>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?php if(isset($_GET['module']) === 'main'){echo 'active';} else {echo 'deactivate';}?>">
                            <a href="<?php amigable('?module=main'); ?>">HOME</a>
                        </li>
                        <li class="<?php if(isset($_GET['module']) === 'services'){echo'active';} else {echo 'deactivate';}?>">
                            <a href="<?php amigable('?module=services'); ?>">SERVICES</a>
                        </li>
                        <li class="<?php if(isset($_GET['module']) === 'products'){echo'active';} else {echo 'deactivate';}?>">
                            <a href="<?php amigable('?module=products&function=events_form'); ?>">EVENTS</a>
                        </li>
                        <li class="<?php if(isset($_GET['module']) === 'events_front_end') {echo'active';} else {echo 'deactivate';}?>">
                            <a href="<?php amigable('?module=events_front_end&function=list_events');?>">LIST EVENT</a>
                        </li>
                        <li class="<?php if(isset($_GET['module']) === 'portfolio'){echo'active';} else {echo 'deactivate';}?>">
                            <a href="<?php amigable('?module=portfolio'); ?>">PORTFOLIO</a>
                        </li>
                        <li class="<?php if(isset($_GET['module']) === 'pricing'){echo'active';} else {echo 'deactivate';}?>">
                            <a href="<?php amigable('?module=pricing'); ?>">PRICING</a>
                        </li>
                        <li class="<?php if(isset($_GET['module']) === 'users'){echo 'active';} else {echo 'deactivate';}?>">
                            <a href="<?php amigable('?module=users&function=sign_up'); ?>">SIGN UP</a>
                        </li>
                        <!-- <li id="LogProf">
                            <a href="<?php echo USERS_VIEW_PATH . "modal.php"; ?>"
                            class="button special" data-toggle="modal" id="Login" data-target="#LoginModal">Login</a>
                        </li> -->
                        <li id="LogProf" class="<?php if(isset($_GET['module']) === 'users'){echo 'active';} else {echo 'deactivate';}?>">
                            <a href="<?php amigable('?module=users&function=login'); ?>">Login</a>
                        </li>
                        <li class="<?php if(isset($_GET['module']) === 'contact') {echo 'active';} else {echo 'deactivate';}?>">
                            <a href="<?php amigable('?module=contact&function=contact'); ?>">CONTACT</a>
                        </li>
                        <li class="<?php if(isset($_GET['module']) === 'locate'){echo 'active';} else {echo 'deactivate';}?>">
                            <a href="<?php amigable('?module=locate&function=locate'); ?>">LOCATE</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
    <br>
    <!-- Modal login -->
    <div id="LoginModal" class="modal_login modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>

    <section id="title" class="emerald">

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1><?php
                    if (!isset($_GET['module'])) {
                        echo "Home";
                    }else{
                        switch($_GET['module']){
                            case 'services':
                            echo '<a href="<?php amigable(\'?module=services\'); ?>">SERVICES</a>';
                            break;
                            case 'products':
                            echo '<a href="<?php amigable(\'?module=products&function=events_form\'); ?>">EVENTS</a>';
                            break;
                            default:
                            echo '<a href="<?php amigable(\'?module=main\'); ?>">HOME</a>';
                            break;
                        }
                    }
                    ?></h1>
                    <strong>WEB TEST</strong>
                </div>
                <h2 class="BackHome"><a href="<?php amigable('?module=main'); ?>">Back Home</a></h2>
            </div>
        </div>
    </section>
    <!-- MENU END-->
<!DOCTYPE html>
