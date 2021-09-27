<?php get_header(); ?>

<?php if (have_posts()) : ?>
<?php the_post(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri( '/images/ocean.jpg' ); ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
        <p>Keep up with our latest news.</p>
        </div>
    </div>  
</div>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?= get_post_type_archive_link(get_post_type()); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Event</a> <span class="metabox__main"><?php the_title() ?></span></p>
    </div>

    <div class="generic-content">
        <?php the_content(); ?>
    </div>
</div>

<?php endif; ?>

<?php get_footer(); ?>