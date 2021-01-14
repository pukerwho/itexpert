<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', __('ITExpert Settings') )
    ->add_tab( __('Blog'), array(
        Field::make( 'rich_text', 'crb_blog_text', 'Content' ),
    ) );
}

?>