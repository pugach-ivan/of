        </div><!-- wrap -->
        <div id="footer">
            <p class="copy">Copyright <?php date('Y'); ?></p>
            <?php
                wp_nav_menu( array(
                    'menu' => 'Footer Menu 1',
                    'title_li' => '',
                    'container' => '',
                    'menu_id' => '',
                    'menu_class' => 'footer-menu',
                ));
            ?>
        </div><!-- footer -->
        <div class="faider">&nbsp;</div>
        <?php require_once(TEMPLATEPATH . '/popups/popup-login.php'); ?>
        <?php require_once(TEMPLATEPATH . '/popups/popup-signup.php'); ?>
        <?php require_once(TEMPLATEPATH . '/popups/popup-create.php'); ?>
    </div><!-- wrapper -->
    <?php wp_footer() ?>
</body>
</html>