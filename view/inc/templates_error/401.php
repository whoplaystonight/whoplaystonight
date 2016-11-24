<style type="text/css">
    body {
        color: #444444;
        background-color: #EEEEEE;
        font-family: 'Trebuchet MS', sans-serif;
        font-size: 80%;
    }
    h1 {}
    h2 { font-size: 1.2em; }
    #page{
        background-color: #FFFFFF;
        width: 60%;
        margin: 24px auto;
        padding: 12px;
    }
    #header {
        padding: 6px ;
        text-align: center;
    }
    .status3xx { background-color: #475076; color: #FFFFFF; }
    .status4xx { background-color: #C55042; color: #FFFFFF; }
    .status5xx { background-color: #F2E81A; color: #000000; }
    #content {
        padding: 4px 0 24px 0;
    }
    #footer {
        color: #666666;
        background: #f9f9f9;
        padding: 10px 20px;
        border-top: 5px #efefef solid;
        font-size: 0.8em;
        text-align: center;
    }
    #footer a {
        color: #999999;
    }
</style>
    <div id="page">
        <br><br><br><br><br><br><br>
        <div id="header" class="status4xx">
            <?php
            if (isset($arrData) && !empty($arrData)) {
                //https://es.wikipedia.org/wiki/Anexo:C%C3%B3digos_de_estado_HTTP
            ?>
                <h1>ERROR <?php echo $arrData['code'] ?> - <?php echo $arrData['text'] ?></h1>
            <?php
            }
            ?>
            
        </div>
        <div id="content">
            <h2>The following error occurred:</h2>
            <p>The requested URL was not found on this server.</p>
			<P>Please check the URL or contact the <!--WEBMASTER//-->webmaster<!--WEBMASTER//-->.</p>
        </div>
        <div id="footer">
            <p>Powered by <a href="http://www.ispconfig.org">ISPConfig</a></p>
        </div>
    </div>
