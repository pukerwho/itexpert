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
      'title' => 'Настройка Header',
      'priority'  => 10,
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
  }

  // Блок Footer
  if ( $section = 'section_footer' ) {

    //Bg
    $setting = 'footer_bg';
    $wp_customize->add_setting( $setting, [
      'default'   => '',
      'transport' => $transport
    ] );
    $wp_customize->add_control( 
      new WP_Customize_Image_Control( $wp_customize, $setting, [
        'label'    => 'Фон',
        'settings' => $setting,
        'section'  => $section
      ] )
    );

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
      'priority'  => 200,
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
  }

  // Секция
  if( $section = 'display_options' ){

    $wp_customize->add_section( $section, [
      'title'     => 'Отображение',
      'priority'  => 200,                   // приоритет расположения
      'description' => 'Внешний вид сайта', // описание не обязательное
    ] );

    // настройка
    $setting = 'color_scheme';

    $wp_customize->add_setting( $setting, [
      'default'   => 'normal',
      'transport' => $transport
    ] );

    $wp_customize->add_control( $setting, [
      'section'  => $section,
      'label'    => 'Цветовая схема',
      'type'     => 'radio',
      'choices'  => [
        'normal'    => 'Светлая',
        'inverse'   => 'Темная',
      ]
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

    // настройка
    $setting = 'footer_copyright_text';

    $wp_customize->add_setting( $setting, [
      'default'            => 'Все права защищены',
      'sanitize_callback'  => 'sanitize_text_field',
      'transport'          => $transport
    ] );

    $wp_customize->add_control( $setting, [
      'section'  => 'display_options', // id секции
      'label'    => 'Копирайт',
      'type'     => 'text' // текстовое поле
    ] );

  }

  // секция
  if( $section = 'scroll_up' ){

    // Добавляем ещё одну секцию - Настройки фона
    $wp_customize->add_section( $section, [
      'title'    => 'Скролл вверх',
      'priority' => 201,
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