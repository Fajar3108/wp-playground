<?php

function idesign_resources() {
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/app.js' );
    wp_enqueue_style('idesign-main-styles', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
}

add_action( 'wp_enqueue_scripts', 'idesign_resources' );

function custom_settings_add_menu() {
    add_menu_page('Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}

add_action( 'admin_menu', 'custom_settings_add_menu' );

function load_admin_things() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
}

add_action( 'admin_enqueue_scripts', 'load_admin_things' );