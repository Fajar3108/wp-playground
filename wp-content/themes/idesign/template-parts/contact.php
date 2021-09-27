<section id="contact">
    <div class="container">
        <div class="contact__info">
            <div class="contact__desc">
                <h2>Contact Information</h2>
                <p><i class="fas fa-map-marker-alt"></i> <?= get_option( 'address' ); ?></p>
            </div>
            <ul>
                <li><i class="fas fa-envelope"></i> <?= get_option( 'email' ); ?></li>
                <li><i class="fas fa-phone"></i> <?= get_option( 'phone' ); ?></li>
            </ul>
        </div>
        <?= do_shortcode( '[contact-form-7 id="164" title="IDesign Contact"]', false ) ?>
</div>
</section>