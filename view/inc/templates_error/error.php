<div id='page'>
  <br><br>
  <div id='header' class='status4xx'><!--Aqui deberia ir el siguiente codigo: class="status<?php /*echo $arrData['code']*/?>"-->
    <?php
      if(isset($arrData)&& !empty($arrData)){
        ?>
        <h1> ERROR <?php echo $arrData['code'] ?>-<?php echo $arrData['text']?></h1>
        <?php
      }
      ?>
  </div>
  <div id='content'>
    <h2>The following error occurred:</h2>
    <p>The requested URL was not found on this server.</p>
    <p>Please check the URL or contact the webmaster.</p>
  </div>
  <div id='footer'>
    <p>Powered by <a href='http://www.ispconfig.org'>ISPConfig</a></p>
  </div>
</div>
