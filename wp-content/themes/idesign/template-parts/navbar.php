<!-- Navbar -->
<header>
    <div class="container">
        <nav id="navbar">
            <div class="nav-brand">
                <img src="<?= get_bloginfo('template_directory'); ?>/assets/images/logo.png" alt="Logo">
            </div>
            <div class="nav-toggle" id="toggle">
                <span></span>
                <span></span>
            </div>
            <?php wp_nav_menu([
                'theme_location' => 'navbar-menu',
                'container_class' => 'nav-menu',
            ]) ?>
        </nav>
    </div>
</header>