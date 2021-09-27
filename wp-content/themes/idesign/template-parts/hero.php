<section id="hero">
    <div class="container">
        <div class="hero-content">
            <div class="section-title hero-title">
                <h2><?= get_bloginfo('name'); ?></h2>
            </div>
            <h1 class="display-text"><?= get_bloginfo('description'); ?></h1>
            <p class="text-body"><?= get_theme_mod('hero-callout-desc'); ?></p>
            <a href="#contact" class="btn btn-primary">Contact Us</a>
        </div>
        <div class="hero-banner">
            <div class="hero-image"><img src="<?= get_bloginfo('template_directory'); ?>/assets/images/banner/__.png" alt="banner"></div>
            <div class="hero-image"><img src="<?= get_bloginfo('template_directory'); ?>/assets/images/banner/xl2.png" alt="banner"></div>
            <div class="hero-image"><img src="<?= get_bloginfo('template_directory'); ?>/assets/images/banner/boooks.jpg" alt="banner"></div>
            <div class="hero-image"><img src="<?= get_bloginfo('template_directory'); ?>/assets/images/banner/event.png" alt="banner"></div>
        </div>
    </div>
</section>