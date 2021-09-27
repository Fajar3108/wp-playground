<?php 

function hero_callout($wp_customize) {

    // Section
    $wp_customize->add_section('hero-callout-section', [
        'title' => 'Hero',
    ]);

    // Field
    $wp_customize->add_setting('hero-callout-desc', [
        'default' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio odio illo ullam neque itaque id rerum quos. Esse tenetur labore vero, deleniti quo sed quasi! Porro optio quae cumque quaerat.',
    ]);

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'hero-callout-desc-control', [
        'label' => 'Description',
        'section' => 'hero-callout-section',
        'settings' => 'hero-callout-desc',
        'type' => 'textarea',
    ]));

}

add_action( 'customize_register', 'hero_callout' );