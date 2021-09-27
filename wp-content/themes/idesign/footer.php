<?php 
/**
 * The Footer
 * 
 * @package IDesign
 */
?>

<footer>
    <div class="container">
        <img src="<?= get_bloginfo('template_directory'); ?>/assets/images/logo.png" alt="Logo" class="footer__brand">
        <div class="footer__bottom">
            <p>&copy; 2021 All right reserved. INDODESIGN</p>
            <ul class="footer__social">
                <li><a href="<?= get_option( 'twitter' ); ?>"><i class="fa fa-twitter-square"></i></a></li>
                <li><a href="<?= get_option( 'facebook' ); ?>"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="<?= get_option( 'instagram' ); ?>"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</footer>

</body>
</html>