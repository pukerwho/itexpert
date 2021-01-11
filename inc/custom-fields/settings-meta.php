<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', __('Options') )
    ->add_tab( __('Scirpts'), array(
        Field::make( 'textarea', 'crb_main_head_scripts', 'Scripts in HEAD' ),
        Field::make( 'textarea', 'crb_main_footer_scripts', 'Scripts in FOOTER' ),
    ) );
}

?>