<script src="modules/contact/view/lib/bootstrap-button.js"></script>
<script src="modules/contact/view/lib/jquery.validate.min.js"></script>
<script src="modules/contact/view/lib/jquery.validate.extended.js"></script>
<script src="modules/contact/view/js/contact.js"></script>

<link href="modules/contact/view/css/bootstrap.min.css" rel="stylesheet">
<link href="modules/contact/view/css/custom.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>


<div class="container">
    <form id="contact_form" name="contact_form" class="form-contact">
        <h2 class="form-contact-heading">Contact Us</h2>

        <div class="control-group">
            <input type="text" id="inputName" name="inputName" placeholder="Name" class="input-block-level" dir="auto" maxlength="100">
        </div>
        <div class="control-group">
            <input type="text" id="inputEmail" name="inputEmail" placeholder="Email *" class="input-block-level" maxlength="100">
        </div>
        <div class="control-group">
            <label for="sel1">Subject</label>
            <select class="form-control" id="inputSubject" name="inputSubject" title="Choose subject">
                <option value="compra">Info relativa a tu compra</option>
                <option value="evento">Celebra un evento con nosotros</option>
                <option value="programacion">Contacta con nuestro dpto de programacion</option>
                <option value="Trabaja">Trabaja con nosotros</option>
                <option value="proyectos">Deseas proponernos proyectos</option>
                <option value="sugerencias">Haznos sugerencias</option>
                <option value="reclamaciones">Atendemos tus reclamaciones</option>
                <option value="club">Club rural_shop</option>
                <option value="sociales">Proyectos sociales</option>
                <option value="festivos">Apertura de festivos</option>
                <option value="novedades">Te avisamos de nuestras novedades</option>
                <option value="diferente">Algo diferente</option>
            </select>
        </div>
        <div class="control-group">
              <textarea class="input-block-level" rows="4" name="inputMessage" placeholder="Message *" style="max-width: 100%;" dir="auto"></textarea>
        </div>

        <input type="hidden" name="token" value="contact_form" />

        <input class="btn btn-primary" type="submit" name="submit" id="submitBtn" disabled="disabled" value="send" />

        <img src="modules/contact/view/img/ajax-loader.gif" alt="ajax loader icon" class="ajaxLoader" /><br/><br/>
        <div id="resultMessage" style="display: none;"></div>
    </form>
</div> <!-- /container -->
