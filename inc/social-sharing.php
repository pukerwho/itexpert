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
    $linkedinUrl = 'https://www.linkedin.com/shareArticle?mini=true&url='. $crunchifyURL .'&title='. $crunchifyTitle .'&summary=&source=';
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
    $whatsappURL = 'https://wa.me/?text='. $crunchifyURL .'';

    $content .= '<ul class="flex items-center">';
    if(get_theme_mod( 'facebook_share' )) {
        $content .= '<li class="share-item"><a class="share-link share-facebook" href="'.$facebookURL.'" target="_blank"><svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z"/></svg></a></li>';    
    }

    if(get_theme_mod( 'twitter_share' )) {
        $content .= '<li class="share-item"><a class="share-link share-twitter" href="'.$twitterURL.'" target="_blank"><svg id="Bold" enable-background="new 0 0 24 24" height="15" viewBox="0 0 24 24" width="15" xmlns="http://www.w3.org/2000/svg"><path d="m21.534 7.113c.976-.693 1.797-1.558 2.466-2.554v-.001c-.893.391-1.843.651-2.835.777 1.02-.609 1.799-1.566 2.165-2.719-.951.567-2.001.967-3.12 1.191-.903-.962-2.19-1.557-3.594-1.557-2.724 0-4.917 2.211-4.917 4.921 0 .39.033.765.114 1.122-4.09-.2-7.71-2.16-10.142-5.147-.424.737-.674 1.58-.674 2.487 0 1.704.877 3.214 2.186 4.089-.791-.015-1.566-.245-2.223-.606v.054c0 2.391 1.705 4.377 3.942 4.835-.401.11-.837.162-1.29.162-.315 0-.633-.018-.931-.084.637 1.948 2.447 3.381 4.597 3.428-1.674 1.309-3.8 2.098-6.101 2.098-.403 0-.79-.018-1.177-.067 2.18 1.405 4.762 2.208 7.548 2.208 8.683 0 14.342-7.244 13.986-14.637z"/></svg></a></li>';
    }

    if(get_theme_mod( 'linkedin_share' )) {
        $content .= '<li class="share-item"><a class="share-link share-linkedin" href="'.$linkedinUrl.'" target="_blank"><svg id="Bold" enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="14" xmlns="http://www.w3.org/2000/svg"><path d="m23.994 24v-.001h.006v-8.802c0-4.306-.927-7.623-5.961-7.623-2.42 0-4.044 1.328-4.707 2.587h-.07v-2.185h-4.773v16.023h4.97v-7.934c0-2.089.396-4.109 2.983-4.109 2.549 0 2.587 2.384 2.587 4.243v7.801z"/><path d="m.396 7.977h4.976v16.023h-4.976z"/><path d="m2.882 0c-1.591 0-2.882 1.291-2.882 2.882s1.291 2.909 2.882 2.909 2.882-1.318 2.882-2.909c-.001-1.591-1.292-2.882-2.882-2.882z"/></svg></a></li>';
    }

    if(get_theme_mod( 'telegram_share' )) {
        $content .= '<li class="share-item"><a class="share-link share-telegram" href="'.$telegramURL.'" target="_blank"><svg enable-background="new 0 0 24 24" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="m12 24c6.629 0 12-5.371 12-12s-5.371-12-12-12-12 5.371-12 12 5.371 12 12 12zm-6.509-12.26 11.57-4.461c.537-.194 1.006.131.832.943l.001-.001-1.97 9.281c-.146.658-.537.818-1.084.508l-3-2.211-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.121l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953z"/></svg></a></li>';
    }

    if(get_theme_mod( 'viber_share' )) {
        $content .= '<li class="share-item"><a class="share-link share-telegram" href="'.$viberURL.'" target="_blank"><svg id="Bold" enable-background="new 0 0 24 24" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="m23.155 13.893c.716-6.027-.344-9.832-2.256-11.553l.001-.001c-3.086-2.939-13.508-3.374-17.2.132-1.658 1.715-2.242 4.232-2.306 7.348-.064 3.117-.14 8.956 5.301 10.54h.005l-.005 2.419s-.037.98.589 1.177c.716.232 1.04-.223 3.267-2.883 3.724.323 6.584-.417 6.909-.525.752-.252 5.007-.815 5.695-6.654zm-12.237 5.477s-2.357 2.939-3.09 3.702c-.24.248-.503.225-.499-.267 0-.323.018-4.016.018-4.016-4.613-1.322-4.341-6.294-4.291-8.895.05-2.602.526-4.733 1.93-6.168 3.239-3.037 12.376-2.358 14.704-.17 2.846 2.523 1.833 9.651 1.839 9.894-.585 4.874-4.033 5.183-4.667 5.394-.271.09-2.786.737-5.944.526z"/><path d="m12.222 4.297c-.385 0-.385.6 0 .605 2.987.023 5.447 2.105 5.474 5.924 0 .403.59.398.585-.005h-.001c-.032-4.115-2.718-6.501-6.058-6.524z"/><path d="m16.151 10.193c-.009.398.58.417.585.014.049-2.269-1.35-4.138-3.979-4.335-.385-.028-.425.577-.041.605 2.28.173 3.481 1.729 3.435 3.716z"/><path d="m15.521 12.774c-.494-.286-.997-.108-1.205.173l-.435.563c-.221.286-.634.248-.634.248-3.014-.797-3.82-3.951-3.82-3.951s-.037-.427.239-.656l.544-.45c.272-.216.444-.736.167-1.247-.74-1.337-1.237-1.798-1.49-2.152-.266-.333-.666-.408-1.082-.183h-.009c-.865.506-1.812 1.453-1.509 2.428.517 1.028 1.467 4.305 4.495 6.781 1.423 1.171 3.675 2.371 4.631 2.648l.009.014c.942.314 1.858-.67 2.347-1.561v-.007c.217-.431.145-.839-.172-1.106-.562-.548-1.41-1.153-2.076-1.542z"/><path d="m13.169 8.104c.961.056 1.427.558 1.477 1.589.018.403.603.375.585-.028-.064-1.346-.766-2.096-2.03-2.166-.385-.023-.421.582-.032.605z"/></svg></a></li>';
    }

    if(get_theme_mod( 'whatsapp_share' )) {
        $content .= '<li class="share-item"><a class="share-link share-telegram" href="'.$whatsappURL.'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" height="18" width="18" viewBox="0 0 418.862 420.875"><path d="M357.835,61.163A207.2,207.2,0,0,0,210.305,0C95.352,0,1.794,93.552,1.749,208.54A208.175,208.175,0,0,0,29.587,312.8L0,420.875l110.558-29a208.364,208.364,0,0,0,99.664,25.384h.086c114.941,0,208.507-93.561,208.554-208.552A207.291,207.291,0,0,0,357.835,61.163ZM210.307,382.037h-.07a173.088,173.088,0,0,1-88.227-24.162l-6.329-3.757-65.607,17.21,17.511-63.966L63.464,300.8a172.919,172.919,0,0,1-26.5-92.25C37,112.98,114.761,35.224,210.376,35.224A173.37,173.37,0,0,1,383.649,208.693C383.61,304.274,305.849,382.037,210.307,382.037Zm95.082-129.825c-5.211-2.608-30.831-15.213-35.608-16.954s-8.25-2.607-11.724,2.608-13.46,16.955-16.5,20.433-6.079,3.914-11.289,1.3-22-8.11-41.907-25.865c-15.491-13.818-25.95-30.882-28.989-36.1s-.324-8.037,2.284-10.635c2.345-2.336,5.212-6.087,7.817-9.13s3.474-5.217,5.211-8.693.869-6.521-.434-9.129-11.725-28.259-16.067-38.694c-4.23-10.16-8.526-8.784-11.725-8.945-3.036-.151-6.514-.184-9.987-.184a19.146,19.146,0,0,0-13.9,6.521c-4.777,5.217-18.239,17.825-18.239,43.473s18.673,50.429,21.278,53.907,36.746,56.113,89.021,78.685a299.074,299.074,0,0,0,29.707,10.977c12.483,3.967,23.844,3.407,32.823,2.065,10.012-1.5,30.831-12.605,35.174-24.777s4.341-22.608,3.038-24.781S310.6,254.821,305.389,252.212Z"/></svg></a></li>';
    }

    if(get_theme_mod( 'pinterest_share' )) {
        $content .= '<li class="share-item"><a class="share-link share-telegram" href="'.$pinterestURL.'" target="_blank"><svg id="Bold" enable-background="new 0 0 24 24" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg"><path d="m12.326 0c-6.579.001-10.076 4.216-10.076 8.812 0 2.131 1.191 4.79 3.098 5.633.544.245.472-.054.94-1.844.037-.149.018-.278-.102-.417-2.726-3.153-.532-9.635 5.751-9.635 9.093 0 7.394 12.582 1.582 12.582-1.498 0-2.614-1.176-2.261-2.631.428-1.733 1.266-3.596 1.266-4.845 0-3.148-4.69-2.681-4.69 1.49 0 1.289.456 2.159.456 2.159s-1.509 6.096-1.789 7.235c-.474 1.928.064 5.049.111 5.318.029.148.195.195.288.073.149-.195 1.973-2.797 2.484-4.678.186-.685.949-3.465.949-3.465.503.908 1.953 1.668 3.498 1.668 4.596 0 7.918-4.04 7.918-9.053-.016-4.806-4.129-8.402-9.423-8.402z"/></svg></a></li>';
    }

    $content .= '</ul>';
    echo $content;
  }else{
    // if not a post/page then don't include sharing button
    echo '';
  }
};

add_action( 'show_social_share_buttons', 'crunchify_social_sharing_buttons' );

?>