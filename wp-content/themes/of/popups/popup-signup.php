<?php 
if(0 == $current_user->ID)
{
    ?>
    <div class="popup-signup">
        <div class="white-popup">
            <div class="bg-holder">
                <div class="bg-frame">
                    <div class="block-signup">
                        <h2>Sign Up</h2>
                        <p class="members">Members. <a href="#">Log in</a></p>
                        <form action="" name="signup_form" id="signup_form" class="form-signup" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-item">
                                    <label for="object-10">Name</label>
                                    <input type="text" name="last_name" id="object-10" class="form-text" />
                                </div><!-- form-item -->
                                <div class="form-item">
                                    <label for="object-11">Username</label>
                                    <input type="text" name="signup_username" id="object-11" class="form-text" />
                                </div><!-- form-item -->
                                <div class="form-item">
                                    <label for="object-12">Email Address</label>
                                    <input type="text" name="signup_email" id="object-12" class="form-text" />
                                </div><!-- form-item -->
                                <div class="form-item">
                                    <label for="object-13">Password</label>
                                    <input type="text" name="signup_password" id="object-13" class="form-text" />
                                </div><!-- form-item -->
                                <div class="form-item">
                                    <label for="object-14">Confirm Password</label>
                                    <input type="text" name="signup_password_confirm" id="object-14" class="form-text" />
                                </div><!-- form-item -->
                                <div class="form-item">
                                    <label for="object-15">Location</label>
                                    <select id="object-15">
                                        <option>USA</option>
                                        <option>Russia</option>
                                        <option>Australia</option>
                                        <option>USA</option>
                                        <option>USA</option>
                                        <option>Russia</option>
                                        <option>Australia</option>
                                        <option>USA</option>
                                        <option>USA</option>
                                        <option>Russia</option>
                                        <option>Australia</option>
                                        <option>USA</option>
                                        <option>USA</option>
                                        <option>Russia</option>
                                        <option>Australia</option>
                                        <option>USA</option>
                                        <option>USA</option>
                                        <option>Russia</option>
                                        <option>Australia</option>
                                        <option>USA</option>
                                        <option>USA</option>
                                        <option>Russia</option>
                                        <option>Australia</option>
                                        <option>USA</option>
                                        <option>USA</option>
                                        <option>Russia</option>
                                        <option>Australia</option>
                                        <option>USA</option>
                                        <option>USA</option>
                                        <option>Russia</option>
                                        <option>Australia</option>
                                        <option>USA</option>
                                    </select>
                                </div><!-- form-item -->
                                <div class="form-item">
                                    <label for="object-16">Zipcode</label>
                                    <input type="text" id="object-16" class="form-text" />
                                </div><!-- form-item -->
                                <div class="checkbox-item">
                                    <input type="checkbox" id="object-17" class="form-checkbox" />
                                    <label for="object-17">Remember me on this computer</label>
                                </div>
                                <p>By clicking the "Sign up using Facebook" button , you agree to Terms of Service</p>
                                <div class="form-item">
                                    <input type="submit" class="form-submit" value="Sign Up" />
                                </div><!-- form-item -->
                            </fieldset>
                        </form>
                        <div class="divider-holder">
                            <span>or</span>
                        </div><!-- divider-holder -->
                        <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img-facebook-02.png" alt="" /></a>
                        <p class="bottom-text">We'll never post anything without your permission</p>
                    </div><!-- block-signup -->
                </div><!-- bg-frame -->
            </div><!-- bg-holder -->
            <span class="close-popup">&nbsp;</span>
        </div><!-- white-popup -->
    </div><!-- popup-signup -->
    <script type="text/javascript">
        $(document).ready(function() 
        {
            $('#registerform .btn-signup').live('click', function(){
                $('.error-message-register').html();
                $.ajax({  
                    type: "POST",  
                    url: "<?php bloginfo('home') ?>/wp-content/themes/of/ajax-register.php",
                    data: $(this).parents("form").serialize(),
                    success: function(data){
                        //clear_form_elements($('#registerform'));
                        $('.error-message-register').html('<span class="ajax-error-text">'+data+'</span>');
                    }
                });
                
                return false;
            });  
        });
    </script>
    <?php
}
?>