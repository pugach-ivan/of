<div id="sidebar">
    <?php displayClassifieds(); ?>

    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?>

    <?php endif; ?>
</div>