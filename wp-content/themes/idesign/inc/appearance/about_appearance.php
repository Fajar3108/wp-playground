<?php 

function about_callout($wp_customize) {

    // Section
    $wp_customize->add_section('about-callout-section', [
        'title' => 'About',
    ]);

    // Field
    $wp_customize->add_setting('about-callout-title', [
        'default' => 'WHO WE ARE',
    ]);

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'about-callout-title-control', [
        'label' => 'Title',
        'section' => 'about-callout-section',
        'settings' => 'about-callout-title'
    ]));

    $wp_customize->add_setting('about-callout-desc', [
        'default' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa illum sapiente doloribus ducimus nam, aut esse quidem iste deserunt rem. Incidunt hic nemo nobis officiis, quod culpa similique repudiandae fugit?',
    ]);

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'about-callout-desc-control', [
        'label' => 'Description',
        'section' => 'about-callout-section',
        'settings' => 'about-callout-desc',
        'type' => 'textarea',
    ]));

}

add_action( 'customize_register', 'about_callout' );