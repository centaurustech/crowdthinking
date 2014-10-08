
<div class="popup-common" id="sys_popup_common">
    <div class="overlay-bl-bg"></div>
    <div class="container_12 pop-content">
        <div class="grid_12 wrap-btn-close ta-r">
            <i class="icon iBigX closePopup"></i>
        </div>
        <div class="grid_6 prefix_1">
            <div class="form login-form">
                <form id="form">
                    <h3 class="rs title-form">Register</h3>
                    <div class="box-white">
                        <h4 class="rs title-box">New to <?php echo "Crowd Thinking";?></h4>
                        <p class="rs">A <?php echo "Crowd Thinking";?> account is required to continue.</p>
                        <div class="form-action" >
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                <label for="txt_name">
                                    <input id="txt_name" class="txt fill-width" type="text" id="name" name="name" placeholder="Enter first name" required/>
                                </label>
                                    <label for="txt_email">
                                        <input id="txt_email" class="txt fill-width" type="email" name="email1" placeholder="Enter your e-mail address" required/>
                                    </label>
                                    <label for="txt_re_email">
                                        <input id="txt_re_email" class="txt fill-width" type="email" name="email2" placeholder="Re-enter your e-mail adress" required/>
                                    </label>
                                </div>
                                <div class="col">
                                <label for="txt_lastName">
                                    <input id="txt_lastName" class="txt fill-width" type="text" id="lastName" name="lastName" placeholder="Enter last name" required/>
                                </label>
                                    <label for="txt_password">
                                        <input id="txt_password" class="txt fill-width" type="password" name="pass1" placeholder="Enter password" required/>
                                    </label>
                                    <label for="txt_re_password">
                                        <input id="txt_re_password" class="txt fill-width" type="password" name="pass2" placeholder="Re-enter password" required/>
                                    </label>
                                </div>
                            </div>
                            <p class="rs pb10">By signing up, you agree to our <a href="#" class="fc-orange">terms of use</a> and <a href="#" class="fc-orange">privacy policy</a>.</p>
                            <p class="rs ta-c">
                                <button class="btn btn-red btn-submit" type="button" id="register">Register</button>
                            </p>
                        </div>
                        <div class="alert" style="color:red">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="grid_4">
            <div class="form login-form">
                <form id="formLog">
                    <h3 class="rs title-form">Login</h3>
                    <div class="box-white">
                        <h4 class="rs title-box">Already Have an Account?</h4>
                        <p class="rs">Please log in to continue.</p>
                        <div class="form-action">
                            <label for="txt_email_login">
                                <input id="txt_email_login" class="txt fill-width" type="email" name="emailLog" placeholder="Enter your e-mail address" required/>
                            </label>
                            <label for="txt_password_login">
                                <input id="txt_password_login" class="txt fill-width" type="password" name="passLog" placeholder="Enter password" required/>
                            </label>

                            <label for="chk_remember" class="rs pb20 clearfix">
                                <input id="chk_remember" type="checkbox" class="chk-remember"/>
                                <span class="lbl-remember">Remember me</span>
                            </label>
                            <p class="rs ta-c pb10">
                                <button class="btn btn-red btn-submit" type="button" id="login">Login</button>
                            </p>
                            <p class="rs ta-c">
                                <a href="#" class="fc-orange">I forgot my password</a>
                            </p>
                            </div>
                        <div class="alertL" style="color:red">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script>
$('#register').click(function() {
    var form = $('#form');
      form.validate();
      if (form.valid()){
    $(this).append("<img id='loader' width='50%' src='images/ajax-loader.gif'>");
    var name = $('input[name="name"]').val();
    var lastName = $('input[name="lastName"]').val();
    var email1 = $('input[name="email1"]').val();
    var email2 = $('input[name="email2"]').val();
    var pass1 =$('input[name="pass1"]').val();
    var pass2 = $('input[name="pass2"]').val();
    $.ajax({
                type: 'POST',
                url: 'register.php',
                data: {name:name,lastName:lastName,email1:email1,email2:email2,pass1:pass1,pass2:pass2},
                success: function(response){
                    $('#loader').remove();
                    $('.alert').html(response).show();
                },
                error: function(msg){
                        $('.alert').html(response).show();
                  
                }
            });
  }
  }); 
$('#login').click(function() {
    var form = $('#formLog');
      form.validate();
      if (form.valid()){
    $(this).append("<img id='loader' width='50%' src='images/ajax-loader.gif'>");
    var email = $('input[name="emailLog"]').val();
    var pass =$('input[name="passLog"]').val();
    $.ajax({
                type: 'POST',
                url: 'login.php',
                data: {email:email,pass:pass},
                success: function(response){
                    $('#loader').remove();
                    if (response == "This email has not been registered in CrowdThinking" || response == "Your email and/or password are incorrect" ){
                        $('.alertL').html(response).show()
                    } else{
                    window.open(response, "_self");
                    }
                    
                },
                error: function(msg){
                        $('.alertL').html(msg).show();
                }
            });
  }
  }); 


</script>
