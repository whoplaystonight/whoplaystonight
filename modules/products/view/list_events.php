<section >
    <div class="container">
        <div id="list_prod" class="row text-center pad-row">
            <ol class="breadcrumb">
                <li class="active" >Events</li>
            </ol>
            <br>
            <br>
            <br>
            <br>
            <?php

            if (isset($arrData) && !empty($arrData)) {
                foreach ($arrData as $event) {
                    //echo $productos['id'] . " " . $productos['nombre'] . "</br>";
                    //echo $productos['descripcion'] . " " . $productos['precio'] . "</br>";
                    ?>
                    <a id="prod" href="index.php?module=products&idProduct=<?php echo $event['event_id'] ?>" >
                        <img class="prodImg" src=<?php echo $event['poster'] ?> alt="product" >
                        <p><?php echo $event['band_name'] ?></p>
                        <p id="p2"><?php echo $event['type_event'] ?></p>
                    </a>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
