<script src="<?php echo CONTACT_LIB_PATH; ?>bootstrap-button.js"></script>
<script src="<?php echo CONTACT_LIB_PATH; ?>jquery.validate.min.js"></script>
<script src="<?php echo CONTACT_LIB_PATH; ?>jquery.validate.extended.js"></script>
<script src="<?php echo USERS_JS_PATH; ?>restore.js"></script>

<div class="container">
    <form id="restore_form" name="restore_form" class="form-contact">
        <br />
        <div class="form-title"><h2 class="form-contact-heading">¿Has olvidado la contraseña?</h2></div>
        <p>Por favor introduce tu email. En breve recibirás un correo con un enlace para cambiar tu contraseña.</p>

        <div class="control-group">
            <input type="text" id="inputEmail" name="inputEmail" placeholder="Email" class="input-block-level" maxlength="100">
        </div>

        <input type="hidden" name="token" value="restore_form" />

        <input class="btn btn-primary" type="submit" name="submit" id="restoreBtn" disabled="disabled" value="Enviar" />

        <img src="<?php echo CONTACT_IMG_PATH; ?>ajax-loader.gif" alt="ajax loader icon" class="ajaxLoader" /><br/><br/>

        <div id="resultMessage" style="display: none;"></div>
    </form>
</div> <!-- /container -->
