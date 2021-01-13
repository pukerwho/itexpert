<?php 
	// Секция Global
  if( $section = 'display_options' ){

    $wp_customize->add_section( $section, [
      'title'     => 'Global',
      'priority'  => 2,
      'description' => 'Внешний вид сайта',
    ] );

    // настройка Шрифта
    $setting = 'main_font';
    $wp_customize->add_setting( $setting, [
      'default'   => 'arial',
      'type'      => 'theme_mod',
      'transport' => $transport
    ] );

    $wp_customize->add_control( $setting, [
      'section'  => 'display_options',
      'label'    => 'Шрифт',
      'type'     => 'select',
      'choices'  => [
        'roboto-slab'   => 'Roboto Slab',
        'open-sans'   => 'Open Sans',
        'oswald' => 'Oswald',
      ]
    ] );

    // Scroll Up Bg
    $setting = 'scroll_up_bg';
    $wp_customize->add_setting( $setting, [
      'default'   => '#0c5adb',
      'transport' => $transport
    ] );
    $wp_customize->add_control( 
      new WP_Customize_Color_Control( $wp_customize, $setting, [
        'label'    => 'Фон для Scroll Up',
        'settings' => $setting,
        'section'  => $section
      ] )
    );

    // Scroll Up Logo
    $setting = 'scroll_up_arrow';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( 
      new WP_Customize_Image_Control( $wp_customize, $setting, [
        'label'    => 'Указатель для Scroll Up',
        'settings' => $setting,
        'section'  => $section
      ] )
    );
  }
?>