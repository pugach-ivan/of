<?php get_header(); ?>

<div id="main">
    <div id="two-column">
        <div id="sidebar">
            <div class="side-box">
                <h2>About</h2>
                <?php echo get_option( 'of_about', '' ); ?>
            </div><!-- side-box -->
            <?php displayNews(); ?>
            <div class="side-box">
                <h2>We're Hiring</h2>
                <?php echo get_option( 'of_we_hiring', '' ); ?>
            </div><!-- side-box -->
            <div class="side-box no-border">
                <h2>Social</h2>
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/img-facebook.png" alt="" /></a></p>
            </div><!-- side-box -->
        </div><!-- sidebar -->
        <div id="basic-content">
            <?php wp_reset_query(); ?>
            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>
                    <div class="title-holder">
                        <h2><?php the_title() ?></h2>
                    </div>
                    <?php the_content() ?>
                <?php endwhile; ?>

            <?php else : ?>
                <div class="post-not-found">
                    <div class="title">
                        <h2>Not Found</h2>
                    </div>
                    <div class="content">
                        <p>Sorry, but you are looking for something that isn't here.</p>
                    </div>
                </div>
            <?php endif; ?>
            
        </div><!-- basic-content -->
    </div><!-- two-column -->
</div><!-- main -->

<?php get_footer(); ?>
