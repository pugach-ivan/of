        </div>
    </div>
    <div id="footer">
        <div class="footer-holder">
            <div class="footer-box">
                <?php
                    wp_nav_menu( array(
                        'menu' => 'Footer Menu 1',
                        'title_li' => '',
                        'container' => '',
                        'menu_id' => '',
                        'menu_class' => 'footer-nav',
                    ));
                ?>
                <p>&copy;Copyright 2012 cultureRush</p>
            </div>
            <?php
                wp_nav_menu( array(
                    'menu' => 'Footer Menu 2',
                    'title_li' => '',
                    'container' => '',
                    'menu_id' => '',
                    'menu_class' => 'ad-footer-nav',
                ));
            ?>
        </div>
    </div>
    <div style="display: none;">
        <div id="mentor-info-box" style="width: 800px;">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Mentor Info') ) : ?>

            <?php endif; ?>
        </div>
    </div>
    <div id="invite-holder" style="display: none;">
        <?php //echo do_shortcode('[contact-form-7 id="32" title="Contact form 1"]');?>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Invite Friend') ) : ?>

        <?php endif; ?>
    </div>
    <?php wp_footer() ?>
</body>
</html>