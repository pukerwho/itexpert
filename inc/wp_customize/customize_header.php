<?php
	
	//Настройка Header
  if ( $section = 'custom_header' ) {

    $wp_customize->add_section( $section, [
      'title' => 'Header',
      'priority'  => 1,
    ]);

    //Логотип
    $setting = 'custom_header_logo';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( 
      new WP_Customize_Image_Control( $wp_customize, $setting, [
        'label'    => 'Логотип',
        'settings' => $setting,
        'section'  => $section
      ] )
    );

    //Градиент
    $setting = 'custom_header_gradient_one';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( 
      new WP_Customize_Color_Control( $wp_customize, $setting, [
        'label'    => 'Градиент для фона (ЦВЕТ №1)',
        'settings' => $setting,
        'section'  => $section
      ] )
    );

    $setting = 'custom_header_gradient_two';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( 
      new WP_Customize_Color_Control( $wp_customize, $setting, [
        'label'    => 'Градиент для фона (ЦВЕТ №2)',
        'settings' => $setting,
        'section'  => $section
      ] )
    );

    $setting = 'custom_header_mobile_bg';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( 
      new WP_Customize_Color_Control( $wp_customize, $setting, [
        'label'    => 'Фон на мобильных',
        'settings' => $setting,
        'section'  => $section
      ] )
    );

    //Поменять местами 
    $setting = 'custom_header_reverse';

    $wp_customize->add_setting( $setting, [
      'default'    =>  'false',
      'transport'  =>  $transport
    ] );

    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'Логотип справа?',
      'type'    => 'checkbox',
    ] );

    //Скрипт в HEAD
    $setting = 'custom_header_scripts';
    $wp_customize->add_setting($setting);
    $wp_customize->add_control(
        $setting,
        array(
          'label' => 'Scripts in HEAD',
          'section' => $section,
          'type' => 'textarea',
        )
    );
  }
?>