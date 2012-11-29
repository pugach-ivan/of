<?php get_header(); ?>

<div id="twocolumn">
    <div id="content">
        <div class="content-box">
            <?php wp_reset_query(); ?>
            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>
                    <div class="info-box">
                        <h1><?php the_title() ?></h1>
                        <?php the_content() ?>
                    </div>
                    <?php comments_template(); ?>
                <?php endwhile; ?>

            <?php else : ?>
                <div class="post-not-found">
                    <div class="title">
                        <h1>Not Found</h1>
                    </div>
                    <div class="content">
                        <p>Sorry, but you are looking for something that isn't here.</p>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <?php get_sidebar('right');?>
</div>
<?php get_sidebar('left');?>
<?php get_footer(); ?>
