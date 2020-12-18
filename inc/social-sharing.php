<?php
// CОЗДАЕМ КНОПКИ ДЛЯ СОЦ СЕТЕЙ
function crunchify_social_sharing_buttons($content) {
  global $post;
  if(is_singular()){
  
    // Get current page URL 
    $crunchifyURL = urlencode(get_permalink());
 
    // Get current page title
    $crunchifyTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
    // $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
    
    // Get Post Thumbnail for pinterest
    $crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
    $telegramURL = 'https://t.me/share/url?url='. $crunchifyURL .'&text='. $crunchifyTitle .'';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
    $viberURL = 'viber://pa?chatURI='. $crunchifyURL .'';
    $linkedinUrl = 'https://www.linkedin.com/sharing/share-offsite/?url={'. $crunchifyTitle .'}';

 
    // Based on popular demand added Pinterest too
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
    // Add sharing button at the end of page/page content
    
    $content .= '<ul class="flex items-center">';
    $content .= '<li class="share-item"><a class="share-link share-facebook" href="'.$facebookURL.'" target="_blank"><svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg></a></li>';

    $content .= '<li class="share-item"><a class="share-link share-twitter" href="'.$twitterURL.'" target="_blank"><svg enable-background="new 0 0 24 24"  viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m12.004 5.838c-3.403 0-6.158 2.758-6.158 6.158 0 3.403 2.758 6.158 6.158 6.158 3.403 0 6.158-2.758 6.158-6.158 0-3.403-2.758-6.158-6.158-6.158zm0 10.155c-2.209 0-3.997-1.789-3.997-3.997s1.789-3.997 3.997-3.997 3.997 1.789 3.997 3.997c.001 2.208-1.788 3.997-3.997 3.997z"/><path d="m16.948.076c-2.208-.103-7.677-.098-9.887 0-1.942.091-3.655.56-5.036 1.941-2.308 2.308-2.013 5.418-2.013 9.979 0 4.668-.26 7.706 2.013 9.979 2.317 2.316 5.472 2.013 9.979 2.013 4.624 0 6.22.003 7.855-.63 2.223-.863 3.901-2.85 4.065-6.419.104-2.209.098-7.677 0-9.887-.198-4.213-2.459-6.768-6.976-6.976zm3.495 20.372c-1.513 1.513-3.612 1.378-8.468 1.378-5 0-7.005.074-8.468-1.393-1.685-1.677-1.38-4.37-1.38-8.453 0-5.525-.567-9.504 4.978-9.788 1.274-.045 1.649-.06 4.856-.06l.045.03c5.329 0 9.51-.558 9.761 4.986.057 1.265.07 1.645.07 4.847-.001 4.942.093 6.959-1.394 8.453z"/><circle cx="18.406" cy="5.595" r="1.439"/></svg></a></li>';
    
    $content .= '<li class="share-item"><a class="share-link share-viber" href="'.$linkedinUrl.'" target="_blank"><svg id="Bold" enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="14" xmlns="http://www.w3.org/2000/svg"><path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z"/><path d="m.396 7.977h4.976v16.023h-4.976z"/><path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z"/></svg></a></li>';

    $content .= '<li class="share-item"><a class="share-link share-telegram" href="'.$telegramURL.'" target="_blank"><svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="m12 24c6.629 0 12-5.371 12-12s-5.371-12-12-12-12 5.371-12 12 5.371 12 12 12zm-6.509-12.26 11.57-4.461c.537-.194 1.006.131.832.943l.001-.001-1.97 9.281c-.146.658-.537.818-1.084.508l-3-2.211-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.121l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953z"/></svg></a></li>';
    
    $content .= '</ul>';
    echo $content;
  }else{
    // if not a post/page then don't include sharing button
    echo '';
  }
};

add_action( 'show_social_share_buttons', 'crunchify_social_sharing_buttons' );

?>