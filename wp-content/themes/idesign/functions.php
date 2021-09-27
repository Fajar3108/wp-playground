<?php 

// Import Style
include(get_template_directory() . '/inc/admin/scripts.php');
// Custom Settings
include(get_template_directory() . '/inc/admin/settings.php');
// Designer Post
include(get_template_directory() . '/inc/admin/designer.php');

// Editable Content
include(get_template_directory() . '/inc/appearance/hero_appearance.php');
include(get_template_directory() . '/inc/appearance/about_appearance.php');
include(get_template_directory() . '/inc/appearance/team_appearance.php');

function navbar_menu(){
    register_nav_menu('navbar-menu', 'Navbar Menu');
}

add_action('init', 'navbar_menu');

add_theme_support( 'post-thumbnails' );
