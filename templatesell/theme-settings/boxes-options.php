<?php
/*Promo Section Options*/

$wp_customize->add_section( 'springy_promo_section', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Boxes Below Slider Settings', 'springy' ),
    'panel'          => 'springy_panel',
) );

/*callback functions slider*/
if ( !function_exists('springy_promo_active_callback') ) :
    function springy_promo_active_callback(){
        global $springy_theme_options;
        $enable_promo = absint($springy_theme_options['springy_enable_promo']);
        if( 1 == $enable_promo ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

/*Boxes Enable Option*/
$wp_customize->add_setting( 'springy_options[springy_enable_promo]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['springy_enable_promo'],
    'sanitize_callback' => 'springy_sanitize_checkbox'
) );

$wp_customize->add_control( 'springy_options[springy_enable_promo]', array(
    'label'     => __( 'Enable Boxes', 'springy' ),
    'description' => __('Enable and select the category to show the boxes below slider.', 'springy'),
    'section'   => 'springy_promo_section',
    'settings'  => 'springy_options[springy_enable_promo]',
    'type'      => 'checkbox',
    'priority'  => 5,

) );

/*Promo Category Selection*/
$wp_customize->add_setting( 'springy_options[springy-promo-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['springy-promo-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Springy_Customize_Category_Dropdown_Control(
        $wp_customize,
        'springy_options[springy-promo-select-category]',
        array(
            'label'     => __( 'Category For Boxes', 'springy' ),
            'description' => __('From the dropdown select the category for the boxes. Category having post will display in below boxes section.', 'springy'),
            'section'   => 'springy_promo_section',
            'settings'  => 'springy_options[springy-promo-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 5,
            'active_callback'=>'springy_promo_active_callback'
        )
    )
);