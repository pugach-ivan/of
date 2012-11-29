<?php
/*
if(0 != $current_user->ID)
{
    ?>
    <a href="<?php echo wp_logout_url( get_bloginfo('home') ); ?>" class="logout">Logout</a>
    <ul id="nav">
        <li class="has-drop"><a href="/mentors">cultureConnect</a></li>
        <li><a href="/groups">cultureGroups</a></li>
        <li><a href="/marketplace">cultureCommerce</a></li>
    </ul>
    <?php
}
else
{
    ?><a href="/" class="logout">Login</a><?php
}
*/
?>
<div class="user-area">
    <div class="account-holder">
        <div class="account-frame">
            <div class="account-box">
                <img src="images/img-avatar.jpg" alt="" />
                <a href="#">My Account</a>
            </div><!-- account-box -->
            <ul class="registration-list">
                <li class="login-link"><a href="#">Login</a></li>
                <li class="sing-link"><a href="#">Sign Up</a></li>
            </ul>
        </div><!-- account-frame -->
    </div><!-- account-holder -->
    <div class="social-holder">
        <div class="social-frame">
            <div class="social-box">
                <span>What are my friends doing?</span>
                <a href="#"><img src="images/img-facebook.png" alt="" /></a>
            </div><!-- social-box -->
        </div><!-- social-frame -->
    </div><!-- social-holder -->
</div><!-- user-area -->