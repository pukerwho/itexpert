<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_page_theme_options' );
function crb_page_theme_options() {
  // Container::make( 'post_meta', 'MORE' )
  //   ->where( 'post_type', '=', 'page' )
  //   ->add_fields( array(
      
  //   ) );
}

?>