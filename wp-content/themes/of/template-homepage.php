<?php
/*
Template Name: Homepage Template
*/
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Culture Rush</title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/fontface.css"/>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.main.js"></script>
    <?php wp_head(); ?>
</head>
<body class="home">
    <div id="wrapper">
        <div id="header">
            <div class="header-box">
                <h1 class="logo"><a href="<?php bloginfo('home') ?>/">cultureRush</a></h1>
            </div>
            <div class="user-holder">
                <strong class="slogan">A place where you can harness the power of cultures</strong>
            </div>
        </div>
        <div id="main">
            <form name="login-form" id="login-form" class="login-form" action="<?php echo site_url( 'wp-login.php' ) ?>" method="post">
                <fieldset>
                    <h2>Login</h2>
                    <strong class="title">Connect, Share and Network</strong>
                    <div class="row">
                        <label for="email">Username</label>
                        <div class="text"><input type="text" name="log" id="email"/></div>
                    </div>
                    <div class="row">
                        <label for="password-1">Password</label>
                        <div class="text"><input type="password" name="pwd" id="password-1"/></div>
                    </div>
                    <div class="row alt">
                        <div class="holder">
                            <input type="checkbox" id="remember" name="rememberme" class="checkbox"/>
                            <label for="remember">Remember me on this computer</label>
                        </div>
                        <a href="#">Forgotten Password?</a>
                    </div>
                    <input type="hidden" name="redirect_to" value="<?php echo bp_root_domain() ?>" />
                    <input type="hidden" name="testcookie" value="1" />
                    <?php do_action( 'bp_login_bar_logged_out' ) ?>
                    <input type="submit" name="wp-submit" class="submit" value="Sign in"/>
                </fieldset>
            </form>
            <form action="" name="signup_form" id="signup_form" class="sign-up-form" method="post" enctype="multipart/form-data">
                <fieldset>
                    <h2>Sign Up</h2>
                    <strong class="title">Connect, Share and Network</strong>
                    <div class="row">
                        <label for="user-name">User Name</label>
                        <div class="text"><input type="text" name="signup_username" id="user-name"/></div>
                    </div>
                    <div class="row">
                        <label for="first-name">First Name</label>
                        <div class="text"><input type="text" name="field_1" id="first-name"/></div>
                    </div>
                    <div class="row">
                        <label for="last-name">Last Name</label>
                        <div class="text"><input type="text" name="last_name" id="last-name"/></div>
                    </div>
                    <div class="row">
                        <label for="your-email">Your Email</label>
                        <div class="text"><input type="text" name="signup_email" id="your-email"/></div>
                    </div>
                    <div class="row">
                        <label for="password-2">Password</label>
                        <div class="text"><input type="password" name="signup_password" id="password-2"/></div>
                    </div>
                    <div class="row">
                        <label for="password-3">Confirm Password</label>
                        <div class="text"><input type="password" name="signup_password_confirm" id="password-3"/></div>
                    </div>
                    <div class="row">
                        <label for="i-am">I am</label>
                        <select id="i-am" name="field_2">
                            <option>Select Sex</option>
                            <option value="Male">Select Sex</option>
                            <option value="Female">Select Sex</option>
                        </select>
                    </div>

                    <input type="submit" class="submit" value="Sign up"/>
                </fieldset>
            </form>
        </div>
        <div id="bg"><img src="<?php bloginfo('template_url'); ?>/images/img-main-1.jpg" alt="" width="1600" height="866" /></div>
    </div>
<?php get_footer(); ?>
