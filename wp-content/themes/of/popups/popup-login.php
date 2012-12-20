<?php 
if(0 == $current_user->ID)
{
    ?>
    <div class="popup-login">
        <div class="white-popup">
            <div class="bg-holder">
                <div class="bg-frame">
                    <div class="block-login">
                        <h2>Login</h2>
                        <form method="post" class="form login-form" action="" id="loginform">
                            <fieldset>
                                <p>Not registered with us yet? <a href="#">Sign up</a></p>
                                <div class="form-item">
                                    <label for="object-2">Email Address</label>
                                    <input type="text" name="log" id="object-2" class="form-text" />
                                </div>
                                <div class="form-item">
                                    <label for="object-3">Password</label>
                                    <input type="text" name="pwd" id="object-3" class="form-text" />
                                </div>
                                <p class="forgot-password"><a href="#">Forgot your password?</a></p>
                                <div class="checkbox-item">
                                    <input type="checkbox" name="rememberme" id="object-4" class="form-checkbox" />
                                    <label for="object-4">Remember me on this computer</label>
                                </div>
                                <div class="form-item">
                                    <input type="submit" class="form-submit" value="Login" />
                                </div>
                            </fieldset>
                        </form>
                        <div class="divider-holder">
                            <span>or</span>
                        </div><!-- divider-holder -->
                        <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img-facebook-02.png" alt="" /></a>
                        <p class="bottom-text">By clicking the "Sign up using Facebook" button , you agree to Terms of Service</p>
                    </div><!-- block-login -->
                </div><!-- bg-frame -->
            </div><!-- bg-holder -->
            <span class="close-popup">&nbsp;</span>
        </div><!-- white-popup -->
    </div><!-- popup-login -->
    <script type="text/javascript">
            $(document).ready(function() 
            {
                $('#loginform .form-submit').live('click', function(){
                    $('.error-message-login').html();
                    $.ajax({  
                        type: "POST",  
                        url: "<?php bloginfo('home') ?>/wp-content/themes/of/ajax-login.php",
                        data: $(this).parents("form").serialize(),
                        success: function(data){
                            if (data === 'Logged in successfully'){
                                window.location = window.location.protocol + '//' + window.location.hostname + window.location.pathname;

                            } else {
                                //clear_form_elements($('#loginform'));
                                $('.error-message-login').html('<span class="ajax-error-text">'+data+'</span>');
                            }
                        }
                        });
                    return false;
                });  
            });
        </script>
    <?php
}
?>