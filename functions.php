<?php
// Include your functions files here
include('inc/enqueues.php');
// Add your theme support ( cf :  http://codex.wordpress.org/Function_Reference/add_theme_support )
function customThemeSupport() {
    global $wp_version;
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    // let wordpress manage the title
    add_theme_support( 'title-tag' );
    add_theme_support( 'editor-gradient-preset' );
    add_theme_support( 'align-wide' );
    //add_theme_support( 'custom-background', $args );
    //add_theme_support( 'custom-header', $args );
    // Automatic feed links compatibility
    if( version_compare( $wp_version, '3.0', '>=' ) ) {
        add_theme_support( 'automatic-feed-links' );
    } else {
        automatic_feed_links();
    }
}
add_action( 'after_setup_theme', 'customThemeSupport' );
// Content width
if( !isset( $content_width ) ) {
    // @TODO : edit the value for your own specifications
    $content_width = 960;
}

require_once get_template_directory() . '/inc/shortcodes.php';
require_once get_template_directory() . '/inc/theme-settings.php';
require_once get_template_directory() . '/inc/social-sharing.php';
require_once get_template_directory() . '/inc/TGM/example.php';

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once __DIR__ . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'crb_register_custom_fields' );
function crb_register_custom_fields() {
  require_once __DIR__ . '/inc/custom-fields/gutenberg-blocks.php';
}


register_nav_menus( array(
  'head_menu' => 'Меню в шапке',
  'footer_menu' => 'Меню в подвале',
  'cat_navi_menu' => 'Меню в Блоге',
) );

// подключаем файлы со стилями
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
    
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/all.js', '',filemtime( get_theme_file_path('js/all.js')),true);
};

// подключаем стили к админке
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
  wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
}

function my_lbwps_enabled($enabled, $id)
{
    if ( is_singular( 'post' ) ) {
      return $enabled;  
    }

    return false;
}

add_filter('lbwps_enabled', 'my_lbwps_enabled', 10, 2);

remove_action( 'wp_head', '_wp_render_title_tag', 1 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

function my_custom_upload_mimes($mimes = array()) {
    $mimes['svg'] = "image/svg+xml";
    return $mimes;
}

add_action('upload_mimes', 'my_custom_upload_mimes');

# ---------------------------------------------------
# REMOVE SCREEN READER TEXT FROM POST PAGINATION
# ---------------------------------------------------
function sanitize_pagination($content) {
    // Remove h2 tag
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
}
 
add_action('navigation_markup_template', 'sanitize_pagination');

function get_page_url($template_name) {
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name.'.php',
        'compare' => '='
      ]
    ]
  ]);
  if(!empty($pages))
  {
    foreach($pages as $pages__value)
    {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}


add_action('init', 'create_taxonomy');
function create_taxonomy(){
  register_taxonomy('hashtags', array('post'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Хештеги',
      'singular_name'     => 'Хештег',
      'search_items'      => 'Поиск хештега',
      'all_items'         => 'Все хештеги',
      'view_item '        => 'Посмотреть хештег',
      'parent_item'       => 'Родительский хештег',
      'parent_item_colon' => 'Родительский хештег:',
      'edit_item'         => 'Редактировать хештег',
      'update_item'       => 'Одновить хештег',
      'add_new_item'      => 'Добавить',
      'new_item_name'     => 'Новый',
      'menu_name'         => 'Хештеги',
    ),
    'description'           => 'Хештеги, чтобы не использовать метки', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_in_menu'          => true, // равен аргументу show_ui
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => true, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => true,
    'update_count_callback' => '',
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );

}

//Alert для комментов
add_action( 'set_comment_cookies', function( $comment, $user ) {
  setcookie( 'ta_comment_wait_approval', '1', 0, '/' );
}, 10, 2 );

add_action( 'init', function() {
  if( isset( $_COOKIE['ta_comment_wait_approval'] ) && $_COOKIE['ta_comment_wait_approval'] === '1' ) {
    setcookie( 'ta_comment_wait_approval', '0', 0, '/' );
    echo "<script type='text/javascript'>
    document.addEventListener('DOMContentLoaded', function(event) {
      function insertAfter(referenceNode, newNode) {
        console.log(referenceNode);
        referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
      }

      var commentAlert = document.createElement('p');
      commentAlert.setAttribute('id', 'wait_approval');
      commentAlert.innerHTML = 'Ваш комментарий ожидает одобрения';

      var respondDiv = document.querySelector('#respond');
      console.log(respondDiv);
      insertAfter(respondDiv, commentAlert);
    });
    </script>";
    // add_action( 'comment_form_after', function() {
    //   echo "<p id='wait_approval' style=''><strong>" . _e('Ваш комментарий ожидает одобрения', 'restx') . "</strong></p>";
    // });
  }
});

add_filter( 'comment_post_redirect', function( $location, $comment ) {
  if ( get_post_type( $comment->comment_post_ID ) == 'post_comment' ) {
    // $current_url = home_url( add_query_arg( array(), $wp->request ) );
    $city_terms = get_the_terms($comment->comment_post_ID, 'citylist');
    foreach ($city_terms as $city_term) {
      $current_term_url = get_term_link($city_term->term_id, 'citylist'); 
    }
    $location = $current_term_url . '#wait_approval';  
    return $location;
  } else {
    $location = get_permalink( $comment->comment_post_ID ) . '#wait_approval';  
    return $location;
  }
}, 10, 2 );


function editLoginPage() { ?>
  <style type="text/css">
    #login h1 a {
      background-image: url(https://itexpert.work/wp-content/uploads/2020/06/ITExpert-1.png);
      display: block;
      width: 220px;
      height: 90px;
      background-size: auto;
    }
  </style>
<?php }

add_action('login_enqueue_scripts', 'editLoginPage');

function editLoginPageTitle() {
  return 'ITExpert';
}

add_action('login_headertext', 'editLoginPageTitle');

function editLoginPageTitleUrl() {
  return 'https://itexpert.work/';
}

add_action('login_headerurl', 'editLoginPageTitleUrl');


//techno comment form
add_filter('comment_form_default_fields','techno_comments_form');
if(!function_exists('techno_comments_form')){
    function techno_comments_form($default){
      $default['author'] = '<div  class="comment_forms from-area"><div  class="comment_forms_inner">
      
      <div class="comment_field">
        <div class="row flex flex-wrap">
          <div class="w-1/2 form-group pr-4">
            <input id="name" class="form-control" name="author" type="text" placeholder="'.esc_attr('Your Name','itexpert').'"/>
          </div>';

      $default['email'] = '
      <div class="w-1/2 form-group pl-4">
        <input id="email" class="form-control"  name="email" type="text" placeholder="'.esc_attr(' Email','itexpert').'"/>
      </div></div>';  
      $default['phone'] = '<div class="row flex flex-wrap">
      <div class="w-1/2 form-group pr-4">
        <input id="phone" class="form-control"  name="phone" type="text" placeholder="'.esc_attr('Phone','itexpert').'"/>
      </div>';

      $default['title'] = '
      <div class="w-1/2 form-group pl-4">
        <input id="title" class="form-control" name="url" type="text" placeholder="'.esc_attr('Your Website','itexpert').'"/>
      </div> </div></div>'; 
      $default['url']='';
      $default['message'] ='<div class="comment_field"><div class="form-group"><textarea name="comment" id="comment" class="form-control" cols="30" rows="6" placeholder="'.esc_attr(' Your comment...','itexpert').'"></textarea></div></div></div></div>';                                
 
        return $default;
    }
}

add_filter('comment_form_defaults','techno_form_default');

 if(!function_exists('techno_form_default')){
    function techno_form_default($default_info){
        if(!is_user_logged_in()){
            $default_info['comment_field'] = '';
        }else{
            $default_info['comment_field'] = '<div  class="comment_forms"><div  class="comment_forms_inner"> <div class="comment_field row"><div class="col-md-12 form-group"><label for="comment">'.esc_html__('Comment','itexpert').'<em>*</em></label><textarea name="comment" id="comment" class="form-control" cols="30" rows="6" placeholder="'.esc_attr('Your comment...','itexpert').'"></textarea></div></div> </div></div>';
        }
         
        $default_info['submit_button'] = '<button class="wpcf7-submit button" type="submit">'.esc_html__('Post Comment','techno').'<i class="flaticon-next"></i></button>';
        $default_info['submit_field'] = '%1$s %2$s';
        $default_info['comment_notes_before'] = ' ';
        $default_info['title_reply'] = esc_html__('Leave Comment','itexpert');
        $default_info['title_reply_before'] = '<div class="commment_title"><h3> ';
        $default_info['title_reply_after'] = '</h3></div> ';
 
        return $default_info;
    }
 
 }
  
  
//techno comment show
if(! function_exists('techno_comment')){
  function techno_comment($comment,$arg, $depth){
    $GLOBALS ['comment'] = $comment;
    ?>

    <!-- connent reply -->    
    <div class="post_comment">
      <div class="comment_inner">
        <div class="post_replay">
          <div class="post_replay_content">                     
            <div class="post_replay_inner" id="comment-<?php comment_ID(); ?>">
              <div class="post_reply_thumb">
                 <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> <?php echo get_avatar($comment,80); ?></a>
              </div>
              <div class="post_reply">
                <div class="st"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo get_comment_author(); ?></a></div>
                <div class="reply_date">
                  <span class="span_left"><?php echo get_comment_date(get_option('date_format')); ?></span>
                  <?php 
                    comment_reply_link(
                      array_merge($arg,array(
                        'reply_text' => '<span class="span_right">'. esc_html__('Reply','techno').'</span>',
                        'depth'    => $depth,
                        'max_depth' => $arg['max_depth']
                      ))
                  ); ?>   
                  
                </div>
                <p><?php comment_text(); ?></p>
                <div class="edit_comment"><?php edit_comment_link(esc_html__('(Edit)' , 'techno' ),'<small class="ecome">','</small>') ?></div>
              </div>
              
            </div>
          </div>                                
        </div>
      </div>
    </div>    
  
    <?php
  }
}


?>