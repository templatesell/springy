<?php
/*Slider Options*/

$wp_customize->add_section( 'springy_slider_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Slider Settings', 'springy' ),
   'panel' 		 => 'springy_panel',
) );

/*callback functions slider*/
if ( !function_exists('springy_slider_active_callback') ) :
  function springy_slider_active_callback(){
      global $springy_theme_options;
      $enable_slider = absint($springy_theme_options['springy_enable_slider']);
      if( 1 == $enable_slider ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Slider Enable Option*/
$wp_customize->add_setting( 'springy_options[springy_enable_slider]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['springy_enable_slider'],
   'sanitize_callback' => 'springy_sanitize_checkbox'
) );

$wp_customize->add_control(
    'springy_options[springy_enable_slider]', 
    array(
       'label'     => __( 'Enable Slider', 'springy' ),
       'description' => __('You can select the category for the slider below. More Options are available on premium version.', 'springy'),
       'section'   => 'springy_slider_section',
       'settings'  => 'springy_options[springy_enable_slider]',
        'type'      => 'checkbox',
       'priority'  => 15,
   )
 );

 /*Select the Slider from*/
$wp_customize->add_setting('springy_options[springy-select-slider-from]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['springy-select-slider-from'],
    'sanitize_callback' => 'springy_sanitize_select'
));

$wp_customize->add_control('springy_options[springy-select-slider-from]', array(
    'choices' => array(
        'from-page' => __('Slider From Page', 'springy'),
        'from-post' => __('Slider From Post', 'springy'),
    ),
    'label' => __('Select Slider From Options', 'springy'),
    'description' => __('You can either select the slider from post category or pages.', 'springy'),
    'section' => 'springy_slider_section',
    'settings' => 'springy_options[springy-select-slider-from]',
    'type' => 'select',
    'priority' => 15,
    'active_callback' => 'springy_slider_active_callback',

));

/*callback functions slider getting from post*/
if ( !function_exists('springy_slider_get_from_active_callback') ) :
  function springy_slider_get_from_active_callback(){
      global $springy_theme_options;
      $enable_slider = absint($springy_theme_options['springy_enable_slider']);
      $slider_from = esc_attr($springy_theme_options['springy-select-slider-from']);
      if( 1 == $enable_slider && $slider_from == 'from-post' ){
          return true;
      }
      else{
          return false;
      }
  }
endif;        

/*Slider Category Selection*/
$wp_customize->add_setting( 'springy_options[springy-select-category]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['springy-select-category'],
    'sanitize_callback' => 'absint'

) );

$wp_customize->add_control(
    new Springy_Customize_Category_Dropdown_Control(
        $wp_customize,
        'springy_options[springy-select-category]',
        array(
            'label'     => __( 'Select Category For Slider', 'springy' ),
            'description' => __('Choose one category to show the slider. More settings are in pro version.', 'springy'),
            'section'   => 'springy_slider_section',
            'settings'  => 'springy_options[springy-select-category]',
            'type'      => 'category_dropdown',
            'priority'  => 15,
            'active_callback'=> 'springy_slider_get_from_active_callback',
        )
    )

);

/*callback functions slider getting from page*/
if ( !function_exists('springy_slider_get_from_page_active_callback') ) :
  function springy_slider_get_from_page_active_callback(){
      global $springy_theme_options;
      $enable_slider = absint($springy_theme_options['springy_enable_slider']);
      $slider_from = esc_attr($springy_theme_options['springy-select-slider-from']);
      if( 1 == $enable_slider && $slider_from == 'from-page' ){
          return true;
      }
      else{
          return false;
      }
  }
endif; 

/* Page Selection option for the Slider one*/
$wp_customize->add_setting('springy_options[springy-select-slider-from-page-one]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['springy-select-slider-from-page-one'],
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control('springy_options[springy-select-slider-from-page-one]', array(
    'label' => __('Select the page', 'springy'),
    'description' => __('Select the page for the first slide. The featured image will be appear as the slider image.', 'springy'),
    'section' => 'springy_slider_section',
    'settings' => 'springy_options[springy-select-slider-from-page-one]',
    'type' => 'dropdown-pages',
    'priority' => 15,
    'active_callback' => 'springy_slider_get_from_page_active_callback',
));
/* Page Selection option for the Slider two*/
$wp_customize->add_setting('springy_options[springy-select-slider-from-page-two]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['springy-select-slider-from-page-two'],
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control('springy_options[springy-select-slider-from-page-two]', array(
    'label' => __('Select the page', 'springy'),
    'description' => __('Select the page for the first slide. The featured image will be appear as the slider image.', 'springy'),
    'section' => 'springy_slider_section',
    'settings' => 'springy_options[springy-select-slider-from-page-two]',
    'type' => 'dropdown-pages',
    'priority' => 15,
    'active_callback' => 'springy_slider_get_from_page_active_callback',
));

/* Page Selection option for the Slider three*/
$wp_customize->add_setting('springy_options[springy-select-slider-from-page-three]', array(
    'capability' => 'edit_theme_options',
    'transport' => 'refresh',
    'default' => $default['springy-select-slider-from-page-three'],
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control('springy_options[springy-select-slider-from-page-three]', array(
    'label' => __('Select the page', 'springy'),
    'description' => __('Select the page for the first slide. The featured image will be appear as the slider image.', 'springy'),
    'section' => 'springy_slider_section',
    'settings' => 'springy_options[springy-select-slider-from-page-three]',
    'type' => 'dropdown-pages',
    'priority' => 15,
    'active_callback' => 'springy_slider_get_from_page_active_callback',
));