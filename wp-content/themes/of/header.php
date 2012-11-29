<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php bloginfo('template_url'); ?>/css/all.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
    <style media="all" type="text/css">@import "<?php bloginfo('template_url'); ?>/css/form.css";</style>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.6.2.pack.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/form.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.galleryScroll.1.5.2.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('div#carusel-ver').galleryScrollVer({
                step:1,
                duration:800,
                funcOnclick:function(){
                }
            });
        });
    </script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
    <?php wp_head(); ?>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <div class="header-wrap">
                <div class="header-top">
                    <div class="logo-box">
                        <strong class="logo"><a href="/">OrgerFun</a></strong>
                        <strong class="slogan">We put the fun back into organizing!</strong>
                    </div><!-- logo-box -->
                    <?php require_once(TEMPLATEPATH . '/header-user-area.php'); ?>
                </div><!-- header-top -->
                <div class="nav-area">
                    <div class="right-frame">
                        <div class="search-box">
                            <?php require_once(TEMPLATEPATH . '/searchform.php'); ?>
                        </div><!-- search-box -->
                        <a href="#" class="help-link">Need Help?</a>
                    </div><!-- right-frame -->
                    <ul id="nav">
                        <li><a href="#">Meet the Team</a></li>
                        <li class="find-link"><a href="#">Find Some Fun!</a></li>
                        <li class="create-link"><a href="#">Be an Orger!</a></li>
                        <li><a href="#">Find my Buddy!</a></li>
                    </ul>
                    <?php require_once(TEMPLATEPATH . '/popups/popup-find.php'); ?>
                </div><!-- nav-area -->
            </div><!-- header-wrap -->
        </div><!-- header -->
        <div id="wrap">