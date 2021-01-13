<?php 
	// Секция Global
  if( $section = 'customize_share' ){

    $wp_customize->add_section( $section, [
      'title'     => 'Share',
      'priority'  => 4,
    ] );

    //Facebook
    $setting = 'facebook_share';
    $wp_customize->add_setting( $setting, [
      'default'    =>  'false',
      'transport'  =>  $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'Facebook',
      'type'    => 'checkbox',
    ] );

    //Twitter
    $setting = 'twitter_share';
    $wp_customize->add_setting( $setting, [
      'default'    =>  'false',
      'transport'  =>  $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'Twitter',
      'type'    => 'checkbox',
    ] );

    //Linkedin
    $setting = 'linkedin_share';
    $wp_customize->add_setting( $setting, [
      'default'    =>  'false',
      'transport'  =>  $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'Linkedin',
      'type'    => 'checkbox',
    ] );

    //Telegram
    $setting = 'telegram_share';
    $wp_customize->add_setting( $setting, [
      'default'    =>  'false',
      'transport'  =>  $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'Telegram',
      'type'    => 'checkbox',
    ] );

    //Viber
    $setting = 'viber_share';
    $wp_customize->add_setting( $setting, [
      'default'    =>  'false',
      'transport'  =>  $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'Viber',
      'type'    => 'checkbox',
    ] );

    //Pinterest
    $setting = 'pinterest_share';
    $wp_customize->add_setting( $setting, [
      'default'    =>  'false',
      'transport'  =>  $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'Pinterest',
      'type'    => 'checkbox',
    ] );

    //WhatsApp
    $setting = 'whatsapp_share';
    $wp_customize->add_setting( $setting, [
      'default'    =>  'false',
      'transport'  =>  $transport
    ] );
    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'WhatsApp',
      'type'    => 'checkbox',
    ] );
  }
?>