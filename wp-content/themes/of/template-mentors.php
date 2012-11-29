<?php
/*
Template Name: Mentors Template
*/
?><?php get_header( 'buddypress' ); ?>

    <div id="twocolumn">
        <div id="content">
            <?php do_action( 'bp_before_directory_members_page' ); ?>
            <?php
            global $wpdb;
            $db_query = 'SELECT user_id FROM wp_bp_xprofile_data WHERE field_id = 12 AND value = "Yes"';
            $match_ids = $wpdb->get_results($db_query, ARRAY_A  );
            $resultsIdsString = '';
            $i = 0;
            foreach ($match_ids as $value)
            {
                $resultsIdsString .= (1 < ++$i) ? ',' : '';
                $resultsIdsString .= $value['user_id'];
            }
            $get_these_members = 'include=' .$resultsIdsString;

            if (bp_has_members($get_these_members, 'per_page optional=9'))
            {
                ?>
                <ul id="members-list" class="item-list content-list" role="main">

                    <?php while ( bp_members() ) : bp_the_member(); ?>

                        <li>
                            <div class="img-holder">
                                <a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar('width=58&height=58'); ?></a>
                            </div>
                            <div class="wrap">
                                <h2><a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a></h2>

                                <?php if ( bp_get_member_latest_update() ) : ?>

                                    <em class="caption"><?php bp_member_latest_update(); ?></em>

                                <?php endif; ?>
                                <?php do_action( 'bp_directory_members_item' ); ?>

                                <?php // bp_member_profile_data( 'field=bio' ); ?>

                            </div>
                        </li>

                    <?php endwhile; ?>

                </ul>
                <?php do_action( 'bp_after_directory_members_list' ); ?>

                <?php bp_member_hidden_fields(); ?>

                <div id="pag-bottom" class="pagination">

                    <div class="pag-count" id="member-dir-count-bottom">

                        <?php bp_members_pagination_count(); ?>

                    </div>

                    <div class="pagination-links" id="member-dir-pag-bottom">

                        <?php bp_members_pagination_links(); ?>

                    </div>

                </div>
                <?php
            }
            ?>
        </div>
        <?php get_sidebar('right');?>
    </div>
    <?php get_sidebar('left');?>
<?php get_footer( 'buddypress' ); ?>