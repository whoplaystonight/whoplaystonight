<!-- Modal -->
<div class="modal-header">
    <script type="text/javascript" src="<?php echo USERS_JS_PATH; ?>login.js"></script>
    <!-- <script type="text/javascript" src="https://localhost/JoinElderly/modules/user/view/js/facebook.js"></script> -->

    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Acceder</h4>
</div>
<div class="modal-body">
    <form id="login_form" name="login_form" class="form-contact">
        <div class="control-group">
            <input type="text" id="inputUser" name="inputUser" placeholder="Usuario" class="input-block-level" dir="auto" maxlength="100">
        </div>
        <div class="control-group">
            <input type="password" id="inputPass" name="inputPass" placeholder="Contraseña" class="input-block-level" maxlength="100">
        </div>

        <input class="btn btn-primary" type="button" name="submitLog" id="submitLog" value="Enviar" />
    </form>
    <div class="separator"><p>Ó</p></div>
    <div class="social form-contact">
        <ul class="icons log">
            <li>
                <a class="fa fa-facebook" id="fb" href="#"><span class="label">Facebook</span> Login Facebook</a>
            </li>
        </ul>
    </div>
    <div class="form-contact reg ">
        <p>¿Aun no te has registrado? Hazlo <a href="<?php echo SITE_PATH; ?>users/sign_up/" id="linkReg">aquí</a></p>
        <p><a href="<?php echo SITE_PATH; ?>users/recuperar/" id="linkRest">¿Has olvidado tu contraseña?</a></p>
    </div>
