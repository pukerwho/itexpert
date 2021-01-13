<?php
	// Секция Блог
  if( $section = 'blog_options' ){

    $setting = 'custom_blog_bg';
    $wp_customize->add_setting( $setting, [
      'default'   => '#f6f6f6',
      'transport' => $transport
    ] );
    $wp_customize->add_control( 
      new WP_Customize_Color_Control( $wp_customize, $setting, [
        'label'    => 'Фон',
        'settings' => $setting,
        'section'  => $section
      ] )
    );

    $wp_customize->add_section( $section, [
      'title'     => 'Blog',
      'priority'  => 3,
      'description' => 'Settings',
    ] );

    //Показывать заголовок?
    $setting = 'custom_blog_title';

    $wp_customize->add_setting( $setting, [
      'default'    =>  'true',
      'transport'  =>  $transport
    ] );

    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'Показывать заголовок?',
      'type'    => 'checkbox',
    ] );

    //Выводить категории?
    $setting = 'custom_blog_cat_navi';

    $wp_customize->add_setting( $setting, [
      'default'    =>  'true',
      'transport'  =>  $transport
    ] );

    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'Выводить меню?',
      'type'    => 'checkbox',
    ] );

    //Blog Templates
    $setting = 'custom_blog_template';

    $wp_customize->add_setting( $setting, [
      'default'   => 'blog_template_one',
      'transport' => $transport
    ] );

    $wp_customize->add_control( $setting, [
      'section'  => $section, // секция
      'label'    => 'Template',
      'type'     => 'select', // выпадающий список select
      'choices'  => [ // список значений и лейблов выпадающего списка в виде ассоциативного массива
        'blog_template_one'   => 'Template One',
        'blog_template_two'   => 'Template Two',
      ]
    ] );

    //Выводить автора и дату?
    $setting = 'show_blog_meta';

    $wp_customize->add_setting( $setting, [
      'default'    =>  'true',
      'transport'  =>  $transport
    ] );

    $wp_customize->add_control( $setting, [
      'section' => $section,
      'label'   => 'Show Author and Date on single post',
      'type'    => 'checkbox',
    ] );

  }
?>