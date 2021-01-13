<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_categories_options' );
function crb_categories_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
    ->where( 'term_taxonomy', 'IN', array('category') )
    ->add_fields( array(
    	Field::make( 'rich_text', 'crb_category_text', 'Content' ),
  ) );
}

?>