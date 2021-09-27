<?php 
/**
 * The Main Template File
 * 
 * @package IDesign
 */

get_header();
?>

<!-- Main -->
<main id="app">

    <!-- Hero -->
    <?php get_template_part('template-parts/hero'); ?>

    <!-- About -->
    <?php get_template_part('template-parts/about'); ?>

    <!-- Teams -->
    <section id="team">
        <div class="team-title">
            <h2 class="title-text"><?= get_theme_mod('team-callout-title'); ?></h2>
            <p class="body-text"><?= get_theme_mod('team-callout-desc'); ?></p>
        </div>
        <div class="team-list">
            <?php 
            $args = [
                'post_type' => 'designers',
            ];
            $custom_query = new WP_Query( $args );

            $i = 0;
            while($i < 4) : $custom_query->the_post(); 
            get_template_part('template-parts/team'); 
            $i++;
            endwhile;
            ?>
        </div>
    </section>
 
    <!-- Contact -->
    <?php get_template_part('template-parts/contact'); ?>

    <!-- Footer -->
    <?php get_footer(); ?>

</main>