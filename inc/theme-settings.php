<?php 
add_action( 'customize_register', 'customizer_init' );
add_action( 'customize_preview_init', 'customizer_js_file' );

function customizer_init( WP_Customize_Manager $wp_customize ){

  // как обновлять превью сайта:
  // 'refresh'     - перезагрузкой фрейма (можно полностью отказаться от JavaScript)
  // 'postMessage' - отправкой AJAX запроса
  $transport = 'refresh';

  include('wp_customize/customize_header.php');
  include('wp_customize/customize_footer.php');
  include('wp_customize/customize_blog.php');
  include('wp_customize/customize_global.php');
  include('wp_customize/customize_share.php');

}

function customizer_js_file(){
  wp_enqueue_script( 'theme-customizer', get_stylesheet_directory_uri() . '/js/theme-customizer.js', [ 'jquery', 'customize-preview' ], null, true );
}
?>