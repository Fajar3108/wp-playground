<?php
get_header();
the_post();
?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri( '/images/ocean.jpg' ); ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>Learn how the school of your dreams got started.</p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">
    <?php $parent_id = wp_get_post_parent_id(get_the_ID()); ?>
    <?php if($parent_id) : ?>
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?= get_permalink($parent_id); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?= get_the_title($parent_id); ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
    </div>
    <?php endif; ?>

    <?php
      $get_pages = get_pages(array(
        'child_of' => get_the_ID()
      ));
    ?>
    <?php if ($parent_id || $get_pages) : ?>
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?= get_permalink($parent_id); ?>"><?= get_the_title($parent_id); ?></a></h2>
      <ul class="min-list">
        
        <?php 
          if ($parent_id) {
            $findChildOf = $parent_id;
          } else {
            $findChildOf = get_the_ID();
          }
          wp_list_pages(array(
            'title_li' => NULL,
            'child_of' => $findChildOf,
            'sort_column' => 'menu_order'
          )); 
        ?>
      </ul>
    </div>
    <?php endif; ?>

    <div class="generic-content">
      <p><?php the_content(); ?></p>
    </div>

  </div>

<?php get_footer(); ?>