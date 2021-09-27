<?php 

function team_callout($wp_customize) {

    // Section
    $wp_customize->add_section('team-callout-section', [
        'title' => 'Team',
    ]);

    // Field
    $wp_customize->add_setting('team-callout-title', [
        'default' => 'MEET OUR TEAM',
    ]);

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'team-callout-title-control', [
        'label' => 'Title',
        'section' => 'team-callout-section',
        'settings' => 'team-callout-title'
    ]));

    $wp_customize->add_setting('team-callout-desc', [
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et arcu nunc.',
    ]);

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'team-callout-desc-control', [
        'label' => 'Description',
        'section' => 'team-callout-section',
        'settings' => 'team-callout-desc',
        'type' => 'textarea',
    ]));

}

add_action( 'customize_register', 'team_callout' );