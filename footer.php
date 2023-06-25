<footer id="footer">
    <div class="navigation-in-footer container-fluid">
        <?php wp_nav_menu( array(
            'theme_location' => 'footer_menu_1'
        ) ); ?>
        <h3>Have any questions?</h3>
        <?php echo apply_shortcodes('[contact-form-7 id="57" title="Contact form 1"]'); ?>
        <div class="navigation-in-footer--contacts">
            <a href="mailto:webmaster@example.com">webmaster@example.com</a>
            <a href="tel:+4733378901">+47 333 78 901</a>
        </div>
        <small class="navigation-in-footer--copyright">Copyright © 2019 Some Company Name. All Rights Reserved.</small>
    </div>
</footer>

<?php 
wp_footer(); 
?>
    </body>
</html>