<?php
global $userdata, $bp;
get_currentuserinfo();
?><div class="aside">
    <?php
    if(0 != $userdata->ID)
    {
        ?>
        <div class="side-box">
            <div class="side-holder">
                <div class="user-box">
                    <div class="img-holder">    
                        <a href="<?php echo bp_core_get_userlink( bp_loggedin_user_id(), false, true ); ?>"><?php bp_loggedin_user_avatar( 'type=thumb&width=58&height=58' ) ?></a>
                    </div>
                    <h3><a href="<?php echo bp_core_get_userlink( bp_loggedin_user_id(), false, true ); ?>"><?php echo $userdata->first_name . ' ' . $userdata->last_name; ?></a></h3>
                    <address>
                        <?php bp_member_profile_data('field=Nationality or a culture(s) that you identify yourself with');?> <span><?php bp_member_profile_data('field=City');?>, <?php bp_member_profile_data('field=State');?> <?php bp_member_profile_data('field=Country');?></span>
                    </address>
                    <ul>
                        <li><a class="side-photo" href="<?php bloginfo('url'); ?>/members/<?php echo $userdata->data->user_login; ?>/images">Photos</a></li>
                        <li><a class="side-video" href="<?php bloginfo('url'); ?>/members/<?php echo $userdata->data->user_login; ?>/videos">Videos</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php displayMentorsSidebarBlock(); ?>
</div>