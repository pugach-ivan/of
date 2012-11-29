<?php
global $current_user;
get_currentuserinfo();
if(0 == $current_user->ID)
{
    header('Location:' . get_bloginfo('home'));
}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ) ?></title>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/fontface.css"/>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.main.js"></script>
    <?php wp_head(); ?>
    <?php
    /*
    <script type="text/javascript">
        $(document).ready(function() {
            $('.acomment-reply').live('click', function(){
                alert('111');
                return false;
            });
        });
    </script>
    */?>
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <div class="header-box">
                <h1 class="logo"><a href="<?php bloginfo('home') ?>/"><?php bloginfo('name') ?></a></h1>
                <?php
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
                ?>
            </div>
            <div class="user-holder">
                <div class="user-section">
                    <ul class="user-options">
                        <?php
                        if(0 != $current_user->ID)
                        {
                            ?>
                            <li class="opener">
                                <?php bp_loggedin_user_avatar( 'type=thumb&width=23&height=23' ) ?>
                                <a href="<?php echo bp_core_get_userlink( bp_loggedin_user_id(), false, true ); ?>" class="opener">My Account</a>
                                <?php if ( bp_is_active( 'messages' ) ) : ?>
                                    <ul class="drop">
                                        <li>
                                            <a href="<?php bloginfo('url'); ?>/members/<?php echo $current_user->data->user_login; ?>/messages/inbox">Messages</a>
                                            <span class="number"><?php echo BP_Messages_Thread::get_total_threads_for_user($current_user->data->ID); ?></span>
                                        </li>
                                        <li>
                                            <a href="<?php bloginfo('url'); ?>/members/<?php echo $current_user->data->user_login; ?>/friends">Friends</a>
                                            <span class="number"><?php echo BP_Friends_Friendship::total_friend_count(); ?></span>
                                        </li>
                                        <li>
                                            <a href="<?php bloginfo('url'); ?>/members/<?php echo $current_user->data->user_login; ?>/groups">Groups</a>
                                            <span class="number"><?php echo BP_Groups_Member::total_group_count($current_user->ID); ?></span>
                                        </li>
                                        <?php
                                        $classifiedsQuery = query_posts('post_type=classifieds&author=' . $current_user->ID);
                                        $classifiedsCount = count($classifiedsQuery);
                                        ?>
                                        <li>
                                            <a href="/members/<?php echo $current_user->user_login;?>/classifieds-2/my-classifieds">Classifieds</a>
                                            <span class="number"><?php echo $classifiedsCount;?></span>
                                        </li>
                                    </ul>
                                <?php endif; ?>
                            </li>
                            <li class="opener">
                                <a href="#" class="opener">Notifications</a>
                                <?php
                                $count = groups_get_invites_for_user($current_user->data->ID);
                                $classifiedsAllQuery = query_posts('post_type=classifieds&author=-' . $current_user->ID);
                                $classifiedsAllCount = count($classifiedsAllQuery);
                                 ?>
                                <span class="number"><?php echo bp_get_total_unread_messages_count() + bp_friend_get_total_requests_count() + $count['total'] + $classifiedsAllCount; ?></span>
                                <ul class="drop">
                                    <li>
                                        <a href="<?php bloginfo('url'); ?>/members/<?php echo $current_user->data->user_login; ?>/messages/inbox">Messages</a>
                                        <span class="number"><?php echo bp_get_total_unread_messages_count(); ?></span>
                                    </li>
                                    <li>
                                        <a href="<?php bloginfo('url'); ?>/members/<?php echo $current_user->data->user_login; ?>/friends">Friends</a>
                                        <span class="number"><?php echo bp_friend_get_total_requests_count(); ?></span>
                                    </li>
                                    <li>
                                        <a href="<?php bloginfo('url'); ?>/groups">Groups</a>
                                        <span class="number"><?php echo $count['total']; ?></span>
                                    </li>
                                    <li>
                                        <a href="/marketplace">Classifieds</a>
                                        <span class="number"><?php echo $classifiedsAllCount; ?></span>
                                    </li>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                        <li><?php echo recommend_a_friend_link( '', '', 'Invite a friend' ); ?></li>
                        <?php //<li><a href="#invite-holder" class="open-popup">Invite a friend</a></li> ?>
                    </ul>
                    <form action="<?php echo bp_search_form_action() ?>" method="post" class="search-box">
                        <fieldset>
                            <input type="submit" class="submit" name="search-submit" value="Go" />
                            <?php echo cr_search_form_type_select(); ?>
                            <div class="row">
                                <label for="search" class="search">search</label>
                                <input type="text" name="search-terms" class="text" value="<?php echo isset( $_REQUEST['s'] ) ? esc_attr( $_REQUEST['s'] ) : 'Search'; ?>" id="search"/>
                                <span>in</span>
                            </div>
                        </fieldset>

                        <?php wp_nonce_field( 'bp_search_form' ) ?>

                    </form>
                </div>
            </div>
        </div>
        <div id="main">
            <?php
            if ( function_exists('adsensem_ad'))
            {
                ?>
                <div class="entry-ads">
                    <?php echo adsensem_ad('header-company'); ?>
                </div>
                <?php
            }
            ?>
            <div class="main-holder">