<?php
/*
Template Name: Classfields   Template
*/
?><?php get_header( 'buddypress' ); ?>
    <?php
    global $current_user;
    get_currentuserinfo();
    ?>
    <div id="twocolumn">
        <div id="content">
            <div class="content-box">
                <ul class="classifieds-list">
                    <li class="active"><a href="<?php bloginfo('url'); ?>/members/<?php echo $current_user->data->user_login; ?>/classifieds-2/my-classifieds">My Classifieds</a></li>
                    <li><a href="<?php bloginfo('url'); ?>/members/<?php echo $current_user->data->user_login; ?>/classifieds-2/create-new">Create New Ad</a></li>
                </ul>
                <?php do_action( 'bp_before_directory_members_page' ); ?>
                <?php query_posts('post_type=classifieds'); ?>
                <ul id="members-list" class="item-list content-list" role="main">

                    <?php while ( have_posts() ) : the_post();
                        global $post; ?>

                        <li>
                            <div class="img-holder">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(58,58)); ?></a>
                            </div>
                            <div class="wrap">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <p><a href="<?php the_permalink(); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></a></p>
                                <?php the_content(); ?>

                            </div>
                        </li>

                    <?php endwhile; ?>

                </ul>

                <div id="pag-bottom" class="pagination">

                    <div class="page-nav">
                        <div class="link-prev"><?php next_posts_link('previous') ?></div>
                        <div class="link-next"><?php previous_posts_link('next') ?></div>
                    </div>

                </div>
            </div>
        </div>
        <?php get_sidebar('right');?>
    </div>
    <?php get_sidebar('left');?>
<?php get_footer( 'buddypress' ); ?>