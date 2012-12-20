<div class="user-area">
    <div class="account-holder">
        <div class="account-frame">
            <?php
            if(0 != $current_user->ID)
            {
                ?>
                <div class="account-box">
                    <img src="<?php bloginfo('template_url'); ?>/images/img-avatar.jpg" alt="" />
                    <form action="">
                        <fieldset>
                            <select>
                                <option>My Account</option>
                                <option>My Account - 2</option>
                                <option>My Account -3</option>
                                <option>My Account -4</option>
                            </select>
                        </fieldset>
                    </form>
                </div><!-- account-box -->
                <?php
            }
            else
            {
                ?>
                <ul class="registration-list">
                    <li class="login-link"><a href="#">Login</a></li>
                    <li class="sing-link"><a href="#">Sign Up</a></li>
                </ul>
                <?php
            }
            ?>
        </div><!-- account-frame -->
    </div><!-- account-holder -->
    <div class="social-holder">
        <div class="social-frame">
            <div class="social-box">
                <span>What are my friends doing?</span>
                <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img-facebook.png" alt="" /></a>
            </div><!-- social-box -->
        </div><!-- social-frame -->
    </div><!-- social-holder -->
</div><!-- user-area -->