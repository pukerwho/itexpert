<?php	
	// Блок Footer
  if ( $section = 'section_footer' ) {

    //Bg
    $setting = 'footer_bg';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( new \WP_Customize_Media_Control(
        $wp_customize,
        'footer_bg',
        array(
            'priority'    => 10,
            'mime_type'   => 'image',
            'settings'    => $setting,
            'label'       => 'Background',
            'section'     => $section,
        )
    ) );

    //Логотип
    $setting = 'footer_logo';
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

    $wp_customize->add_section( $section, [
      'title' => 'Footer',
      'priority'  => 4,
    ]);

    //Instagram
    $setting = 'footer_instagram';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section'  => $section,
      'label'    => 'Instagram',
      'type'     => 'text'
    ]);

    //Facebook
    $setting = 'footer_facebook';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section'  => $section,
      'label'    => 'Facebook',
      'type'     => 'text'
    ]);

    //Telegram
    $setting = 'footer_telegram';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section'  => $section,
      'label'    => 'Telegram',
      'type'     => 'text'
    ]);

    //Linkedin
    $setting = 'footer_linkedin';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section'  => $section,
      'label'    => 'Linkedin',
      'type'     => 'text'
    ]);

    //Youtube
    $setting = 'footer_youtube';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section'  => $section,
      'label'    => 'Youtube',
      'type'     => 'text'
    ]);

    //Pinterest
    $setting = 'footer_pinterest';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section'  => $section,
      'label'    => 'Pinterest',
      'type'     => 'text'
    ]);

    //Twitter
    $setting = 'footer_twitter';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section'  => $section,
      'label'    => 'Twitter',
      'type'     => 'text'
    ]);

    $setting = 'footer_copyright';
    $wp_customize->add_setting( $setting, [
      'default'            => 'Все права защищены',
      'sanitize_callback'  => 'sanitize_text_field',
      'transport'          => $transport
    ] );

    $wp_customize->add_control( $setting, [
      'section'  => $section, // id секции
      'label'    => 'Копирайт',
      'type'     => 'text' // текстовое поле
    ] );

    //Скрипт в FOOTER
    $setting = 'custom_footer_scripts';
    $wp_customize->add_setting($setting);
    $wp_customize->add_control(
        $setting,
        array(
          'label' => 'Scripts in FOOTER',
          'section' => $section,
          'type' => 'textarea',
        )
    );
  }
?>