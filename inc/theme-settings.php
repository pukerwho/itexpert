<?php 
add_action( 'customize_register', 'customizer_init' );
add_action( 'customize_preview_init', 'customizer_js_file' );

function customizer_init( WP_Customize_Manager $wp_customize ){

  // как обновлять превью сайта:
  // 'refresh'     - перезагрузкой фрейма (можно полностью отказаться от JavaScript)
  // 'postMessage' - отправкой AJAX запроса
  $transport = 'refresh';

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

  // Секция
  if( $section = 'display_options' ){

    $wp_customize->add_section( $section, [
      'title'     => 'Global',
      'priority'  => 2,                   // приоритет расположения
      'description' => 'Внешний вид сайта', // описание не обязательное
    ] );

    // настройка
    $setting = 'main_font';

    $wp_customize->add_setting( $setting, [
      'default'   => 'arial',     // этот шрифт будет задействован по умолчанию
      'type'      => 'theme_mod', // использовать get_theme_mod() для получения настроек, если указать 'option', то нужно будет использовать функцию get_option()
      'transport' => $transport
    ] );

    $wp_customize->add_control( $setting, [
      'section'  => 'display_options', // секция
      'label'    => 'Шрифт',
      'type'     => 'select', // выпадающий список select
      'choices'  => [ // список значений и лейблов выпадающего списка в виде ассоциативного массива
        'roboto-slab'   => 'Roboto Slab',
        'open-sans'   => 'Open Sans',
        'oswald' => 'Oswald',

      ]
    ] );

  }

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
      'priority'  => 3,                   // приоритет расположения
      'description' => 'Settings', // описание не обязательное
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

  // секция
  if( $section = 'scroll_up' ){

    // Добавляем ещё одну секцию - Настройки фона
    $wp_customize->add_section( $section, [
      'title'    => 'Scroll Up',
      'priority' => 5,
    ] );

    $setting = 'scroll_up_bg';
    $wp_customize->add_setting( $setting, [
      'default'   => '#0c5adb',
      'transport' => $transport
    ] );
    $wp_customize->add_control( 
      new WP_Customize_Color_Control( $wp_customize, $setting, [
        'label'    => 'Фон',
        'settings' => $setting,
        'section'  => $section
      ] )
    );

    //Логотип
    $setting = 'scroll_up_arrow';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( 
      new WP_Customize_Image_Control( $wp_customize, $setting, [
        'label'    => 'Указатель',
        'settings' => $setting,
        'section'  => $section
      ] )
    );

    // Добавим кнопку в дизайн сайта в кастомайзере для быстрого перехода к текущей настройке
    // при transport = postMessage здесь можно указать функцию,
    // которая будет заменять часть дизайна (таким образом можно не писать JS код)
    if ( isset( $wp_customize->selective_refresh ) ){

      $wp_customize->selective_refresh->add_partial( $setting, [
        'selector'            => '.site-footer .inner',
        'container_inclusive' => false,
        'render_callback'     => 'footer_inner_dh5theme',
        'fallback_refresh'    => false, // Prevents refresh loop when document does not contain .cta-wrap selector. This should be fixed in WP 4.7.
      ] );

      // поправим стиль, чтобы кнопку было видно
      add_action( 'wp_head', function(){
        echo '<style>.site-footer .inner .customize-partial-edit-shortcut{ margin: 10px 0 0 38px; }</style>';
      } );

    }

  }

}

function customizer_js_file(){
  wp_enqueue_script( 'theme-customizer', get_stylesheet_directory_uri() . '/js/theme-customizer.js', [ 'jquery', 'customize-preview' ], null, true );
}
?>