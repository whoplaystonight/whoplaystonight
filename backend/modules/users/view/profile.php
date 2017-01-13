<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
<script src="<?php echo USERS_JS_PATH . "profile.js" ?>"></script>
<link href='<?php echo USERS_VIEW_CSS;?>form.css' rel='stylesheet' type='text/css' />
<br /> <br />
<h1>Hello, <span id="name"></span>.</h1>
<form id="profile_form" name="profile_form" class="form-perfil">
    <fieldset>
        <legend><span class="number">1</span>Your basic info</legend>
        <label for="username">Username:</label>
        <input type="text" id="username" placeholder="username" class="form-control" name="username" value="">
        <div id="e_username"></div>

        <label for="email">Email:</label>
        <input type="text" id="email" class="form-control" placeholder="email" name="email" value=""></input>
        <div id="e_email"></div>

        <label>For changing the password click <a href="https://localhost/whoplaystonight/users/restore">here</a></label>

    </fieldset>
    <br>
    <fieldset>
        <legend><span class="number">2</span>Your profile</legend>
        <label>Birthday:</label>
        <input type="text" id="birthday" placeholder="dd/mm/yyyy" name="birthday" value="">
        <div id="e_birthday"></div>

        <label>Interests:</label>
        Rock <input type="checkbox" name="interests[]" id="rock" class="messageCheckbox" value="rock">
        Jazz  <input type="checkbox" name="interests[]" id="jazz" class="messageCheckbox" value="jazz">
        Blues  <input type="checkbox" name="interests[]" id="blues" class="messageCheckbox" value="blues">
        <div id="e_interests"></div>

        <!-- Dropzone img-->
        <!-- <label> Avatar:</label>
        <div class="form-group" id="progress">
            <div id="bar"></div>
            <div id="percent">0%</div >
        </div>

        <div class="msg"></div>
        <br/>
        <div id="dropzone" class="dropzone"></div><br/> -->

        <!-- Combobox country -->
        <!-- <label for="pais">Country</label>
            <div id="country">
                <select id="pais"></select>
            </div>

  			<span id="e_pais" class="styerror"></span>

        <label for="provincia">Province</label>
  			<select id="provincia"></select>
  			<span id="e_provincia" class="styerror"></span>

        <label for="poblacion">Town</label>
  			<select id="poblacion"></select>
  			<span id="e_poblacion" class="styerror"></span> -->

    </fieldset>
    <br>
    <button type="button" id="change_data" name="change_data">Apply Changes</button>

</form>
<br><br>
