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
        )
    )

);