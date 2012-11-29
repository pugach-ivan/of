<?php get_header(); ?>

<div id="twocolumn">
    <div id="content">

        <div class="content-box">

            <h2 class="entry-title"><?php _e( 'Not Found', 'sandbox' ) ?></h2>
            <div class="entry-content">
                <p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps  searching will help.', 'sandbox' ) ?></p>
            </div>

        </div>

    </div>
    <?php get_sidebar('right');?>
</div>
<?php get_sidebar('left');?>

<?php get_footer(); ?>