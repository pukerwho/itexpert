<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;

global $pagenow;
    if (( $pagenow == 'post.php' ) || (get_post_type() == 'post')) {
        wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/css/style.css' );
} else {
    wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri() . '/css/style2.css' );
}

Block::make( __( 'ITExpert Welcome Block' ) )
    ->add_tab('Background', array(
        Field::make( 'image', 'block_welcome_bg', __( 'Background Image' ) )->set_value_type( 'url'),
    ) )
    ->add_tab('Content', array(
        Field::make( 'text', 'block_welcome_heading', __( 'Title' ) ),
        Field::make( 'color', 'block_welcome_heading_color', __( 'Title color' ) ),
        Field::make( 'textarea', 'block_welcome_text', __( 'Description (Text)' ) ),
        Field::make( 'color', 'block_welcome_text_color', __( 'Description text color' ) ),
        Field::make( 'image', 'block_welcome_photo', __( 'Photo' ) ),
    ) )
    ->add_tab('Button', array(
        Field::make( 'text', 'block_welcome_btn_text', __( 'Button text' ) ),
        Field::make( 'text', 'block_welcome_btn_link', __( 'Button link' ) ),
        Field::make( 'color', 'block_welcome_btn_text_color', __( 'Button text color' ) ),
        Field::make( 'color', 'block_welcome_btn_bg_color', __( 'Button background color' ) ),
        Field::make( 'color', 'block_welcome_btn_hover_text_color', __( 'Button hover text color' ) ),
        Field::make( 'color', 'block_welcome_btn_hover_bg_color', __( 'Button hover background color' ) ),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
        <style>
            .welcome_btn {
                transition: background 0.35s;
            }
            .welcome_btn span {
                transition: color 0.35s;
            }
            .welcome_btn:hover {
               background: <?php echo esc_html( $fields['block_welcome_btn_hover_bg_color'] ); ?> !important;
            }
            .welcome_btn:hover span {
                color: <?php echo esc_html( $fields['block_welcome_btn_hover_text_color'] ); ?> !important;
            }
        </style>
        <div class="welcome" style="background: url(<?php echo $fields['block_welcome_bg'] ?>);background-attachment: fixed;">
            <div class="container mx-auto py-32 lg:py-12 px-4 lg:px-0">
                <div class="w-full lg:w-10/12 flex flex-col lg:flex-row items-center justify-center mx-auto">
                    <div class="w-full lg:w-1/2 text-center lg:text-left">
                        <!-- Заголовок -->
                        <h1 class="text-3xl lg:text-5xl leading-tight mb-5" style="color: <?php echo esc_html( $fields['block_welcome_heading_color'] ); ?>"><?php echo esc_html( $fields['block_welcome_heading'] ); ?></h1>

                        <!-- Описание -->
                        <div class="welcome_description text-3xl leading-tight mb-10" style="color: <?php echo esc_html( $fields['block_welcome_text_color'] ); ?>"><?php echo esc_html( $fields['block_welcome_text'] ); ?></div>

                        <!-- Кнопка -->
                        <a href="<?php echo esc_html( $fields['block_welcome_btn_link'] ); ?>" class="welcome_btn text-2xl uppercase px-6 py-3" style="background: <?php echo esc_html( $fields['block_welcome_btn_bg_color'] ); ?>">
                            <span style="color: <?php echo esc_html( $fields['block_welcome_btn_text_color'] ); ?>"><?php echo esc_html( $fields['block_welcome_btn_text'] ); ?></span>
                        </a>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <!-- Картинка -->
                        <?php echo wp_get_attachment_image( $fields['block_welcome_photo'], 'full' ); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
    } );

Block::make( __( 'ITExpert Column Block' ) )
    ->add_tab('Info', array(
        Field::make( 'text', 'block_column_title', __( 'Title' ) ),
        Field::make( 'text', 'block_column_desktop', __( 'Number of column for Desktop' ) )->set_attribute( 'type', 'number' )->set_default_value( 3 ),
        Field::make( 'text', 'block_column_mobile', __( 'Number of column for Mobile' ) )->set_attribute( 'type', 'number' )->set_default_value( 1 ),
    ))
    ->add_tab('Columns', array(
        Field::make( 'complex', 'block_column', __( 'Колонка' ) )->add_fields( array(
            Field::make( 'image', 'block_column_icon', __( 'Иконка для колонки' ) )->set_value_type( 'url'),
            Field::make( 'text', 'block_column_title', __( 'Заголовок для колонки' ) ),
            Field::make( 'textarea', 'block_column_description', __( 'Описание для колонки' ) ),
        )),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <?php 
                $column_width_desktop = 100/$fields['block_column_desktop'];
                $column_width_mobile = 100/$fields['block_column_mobile'];
            ?>
            <div class="services py-20">
                <h2 class="text-4xl font-bold text-center mb-12"><?php echo esc_html( $fields['block_column_title'] ); ?></h2>
                <div class="container lg:mx-auto px-4 lg:px-0">
                    <div class="hidden lg:flex flex-wrap -mx-4">
                        <?php 
                            $columns = $fields['block_column']; 
                            foreach($columns as $column):
                        ?>
                            <div class="services_item text-center px-4" style="width: <?php echo $column_width_desktop; ?>%;">
                                <div class="services_item_icon mb-4">
                                    <img src="<?php echo $column['block_column_icon']; ?>" class="mx-auto" width="80">
                                </div>
                                <div class="services_item_title text-2xl mb-4">
                                    <?php echo $column['block_column_title']; ?>
                                </div>
                                <div class="services_item_description">
                                    <?php echo $column['block_column_description']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="flex flex-wrap lg:hidden">
                        <?php 
                            $services_mobile_columns = $fields['block_column']; 
                            foreach($services_mobile_columns as $column):
                        ?>
                            <div class="services_item text-center mb-10" style="width: <?php echo $column_width_mobile; ?>%;">
                                <div class="services_item_icon mb-4">
                                    <img src="<?php echo $column['block_column_icon']; ?>" width="80" class="mx-auto">
                                </div>
                                <div class="services_item_title text-2xl mb-4">
                                    <?php echo $column['block_column_title']; ?>
                                </div>
                                <div class="services_item_description">
                                    <?php echo $column['block_column_description']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php
    } );


Block::make( __( 'ITExpert Some facts in numbers Block' ) )
    ->add_tab('Background', array(
        Field::make( 'image', 'block_facts_bg', __( 'Background Image' ) )->set_value_type( 'url'),
    ))
    ->add_tab('Info', array(
        Field::make( 'text', 'block_facts_title', __( 'Title' ) ),
        Field::make( 'color', 'block_facts_title_color', __( 'Цвет заголовка' ) )->set_default_value( '#222222' ),
        Field::make( 'textarea', 'block_facts_description', __( 'Description' ) ),
        Field::make( 'color', 'block_facts_description_color', __( 'Цвет описания' ) )->set_default_value( '#222222' ),
    ))
    ->add_tab('Columns', array(
        Field::make( 'text', 'block_facts_column_desktop', __( 'Number of column for Desktop' ) )->set_attribute( 'type', 'number' )->set_default_value( 3 ),
        Field::make( 'text', 'block_facts_column_mobile', __( 'Number of column for Mobile' ) )->set_attribute( 'type', 'number' )->set_default_value( 1 ),
        Field::make( 'complex', 'block_facts_column', __( 'Fact' ) )->set_layout( 'tabbed-vertical' )->add_fields( array(
            Field::make( 'text', 'block_facts_column_number', __( 'Значение' ) ),
            Field::make( 'text', 'block_facts_column_description', __( 'Описание факта' ) ),
        )),
        Field::make( 'color', 'block_facts_column_number_color', __( 'Цвет для цифр' ) )->set_default_value( '#222222' ),
        Field::make( 'color', 'block_facts_column_description_color', __( 'Цвет для описания фактов' ) )->set_default_value( '#222222' ),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <?php 
                $column_width_desktop = 100/$fields['block_facts_column_desktop'];
                $column_width_mobile = 100/$fields['block_facts_column_mobile'];

                $facts_description_color = $fields['block_facts_description_color'];
                $facts_title_color = $fields['block_facts_title_color'];
                $facts_column_description_color = $fields['block_facts_column_description_color'];
                $facts_column_number_color = $fields['block_facts_column_number_color'];
            ?>
            <div class="facts py-20" style="background: url(<?php echo $fields['block_facts_bg'] ?>);background-attachment: fixed;">
                <!-- Заголовок -->
                <h2 class="text-4xl font-bold text-center mb-6 px-2" style="color: <?php echo $facts_title_color; ?>">
                    <?php echo esc_html( $fields['block_facts_title'] ); ?>
                </h2>

                <!-- Описание -->
                <div class="w-4/5 text-2xl text-center mb-10 mx-auto" style="color: <?php echo $facts_description_color; ?>">
                    <?php echo esc_html( $fields['block_facts_description'] ); ?>
                </div>

                <!-- Факты -->
                <div class="container mx-4 lg:mx-auto px-4 lg:px-0">
                    <!-- Десктопная версия -->
                    <div class="hidden lg:flex flex-wrap -mx-4">
                        <?php 
                            $facts_desktop_columns = $fields['block_facts_column']; 
                            foreach($facts_desktop_columns as $column):
                        ?>
                            <div class="facts_item text-center px-4" style="width: <?php echo $column_width_desktop; ?>%;">
                                <div class="facts_item_number text-3xl font-bold" style="color: <?php echo $facts_column_number_color; ?>">
                                    <span class="counter-number"></span>
                                    <span class="counter-text"><?php echo $column['block_facts_column_number']; ?></span>
                                </div>
                                <div class="facts_item_text text-xl" style="color: <?php echo $facts_column_description_color; ?>">
                                    <?php echo $column['block_facts_column_description']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Мобильная версия -->
                    <div class="flex flex-wrap lg:hidden">
                        <?php 
                            $facts_mobile_columns = $fields['block_facts_column']; 
                            foreach($facts_mobile_columns as $column):
                        ?>
                            <div class="facts_item text-center px-4" style="width: <?php echo $column_width_mobile; ?>%;">
                                <div class="facts_item_number text-3xl font-bold" style="color: <?php echo $facts_column_number_color; ?>">
                                    <?php echo $column['block_facts_column_number']; ?>
                                </div>
                                <div class="facts_item_text text-xl" style="color: <?php echo $facts_column_description_color; ?>">
                                    <?php echo $column['block_facts_column_description']; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php
    } );


Block::make( __( 'ITExpert Steps Block' ) )
    ->add_tab('Photo', array(
        Field::make( 'image', 'block_steps_photo', __( 'Photo' ) )->set_value_type( 'url'),
    ) )
    ->add_tab('Info', array(
        Field::make( 'text', 'block_steps_title', __( 'Title' ) ),
        Field::make( 'textarea', 'block_steps_description', __( 'Description' ) ),
    ) )
    ->add_tab('Steps', array(
        Field::make( 'complex', 'block_steps', __( 'Steps' ) )->set_layout( 'tabbed-vertical' )->add_fields( array(
            Field::make( 'text', 'block_step_title', __( 'Step title' ) ),
            Field::make( 'textarea', 'block_step_description', __( 'Step description' ) ),
        )),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <div id="block_steps" class="block_steps py-20">
                <h2 class="block_steps_title text-4xl text-center font-bold mb-4">
                    <?php echo esc_html( $fields['block_steps_title'] ); ?>
                </h2>
                <div class="block_steps_description text-2xl text-center mb-10">
                    <?php echo esc_html( $fields['block_steps_description'] ); ?>
                </div>
                <div class="container mx-auto px-4 lg:px-0">
                    <div class="flex flex-col lg:flex-row lg:items-center">
                        <div class="w-full lg:w-1/2 pr-0 lg:pr-4">
                            <img src="<?php echo esc_html( $fields['block_steps_photo'] ); ?>" alt="">
                        </div>
                        <div class="w-full lg:w-1/2 pl-0 lg:pl-4">
                            <?php 
                                $steps = $fields['block_steps']; 
                                foreach($steps as $step):
                            ?>
                                <div class="block_steps_item mb-6">
                                    <div class="text-2xl font-bold mb-4">
                                        <?php echo $step['block_step_title']; ?>
                                    </div>
                                    <div class="text-md">
                                        <?php echo $step['block_step_description']; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    } );

Block::make( __( 'ITExpert Reviews Block' ) )
    ->add_tab('Info', array(
        Field::make( 'text', 'block_reviews_title', __( 'Title' ) ),
        Field::make( 'color', 'block_reviews_title_color', __( 'Title Color' ) )->set_default_value( '#ffffff' ),
        Field::make( 'image', 'block_reviews_bg', __( 'Background' ) )->set_value_type( 'url'),
        Field::make( 'text', 'block_reviews_slug', __( 'Slug' ) ),
    ))
    ->add_tab('Reviews', array(
        Field::make( 'complex', 'block_reviews', __( 'Отзыв' ) )->set_layout( 'tabbed-vertical' )->add_fields( array(
            Field::make( 'textarea', 'block_review_text', __( 'Текст отзывы' ) ),
            Field::make( 'text', 'block_review_name', __( 'Имя' ) ),
            Field::make( 'text', 'block_review_head', __( 'Должность' ) ),
            Field::make( 'image', 'block_review_avatar', __( 'Аватарка' ) )->set_value_type( 'url'),
            Field::make( 'text', 'block_review_date', __( 'Дата отзыва' ) ),
        )),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <div class="block reviews py-20" style="background-image: url(<?php echo esc_html( $fields['block_reviews_bg'] ); ?>); background-attachment: fixed;">
                <h2 class="block_steps_title text-4xl text-center font-bold mb-20" style="color: <?php echo esc_html( $fields['block_reviews_title_color'] ); ?>">
                    <?php echo esc_html( $fields['block_reviews_title'] ); ?>
                </h2>
                <div class="container mx-auto px-4 lg:px-0">
                    <div class="w-full lg:w-11/12 swiper-container swiper-container-reviews" data-review-block="<?php echo esc_html( $fields['block_reviews_slug'] ); ?>">
                        <div class="swiper-wrapper">
                            <?php 
                                $reviews = $fields['block_reviews']; 
                                foreach($reviews as $review):
                            ?>
                            <div class="swiper-slide px-4">
                                <div class="review_item">
                                    <div class="review_item_content flex flex-col justify-between bg-white rounded-md shadow-lg p-12 mb-10">
                                        <div class="review_item_text mb-6">
                                            <?php echo $review['block_review_text']; ?>
                                        </div>
                                        <div class="review_item_date">
                                            <?php echo $review['block_review_date']; ?>
                                        </div>
                                    </div>
                                    <div class="review_item_author flex items-start">
                                        <div class="review_item_author_avatar mr-4">
                                            <img src="<?php echo $review['block_review_avatar']; ?>" alt="Avatar" width="90" height="90" class="rounded-full">
                                        </div>
                                        <div>
                                            <div class="review_item_author_name">
                                                <?php echo $review['block_review_name']; ?>
                                            </div>
                                            <div class="review_item_author_head">
                                                <?php echo $review['block_review_head']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination-reviews reviews_pagination"></div>
                    </div>
                </div>
            </div>
        <?php
    } );

Block::make( __( 'ITExpert Clients Block' ) )
    ->add_tab('Background', array(
        Field::make( 'image', 'block_clients_bg', __( 'Photo' ) )->set_value_type( 'url'),
    ) )
    ->add_tab('Info', array(
        Field::make( 'text', 'block_clients_title', __( 'Title' ) ),
        Field::make( 'textarea', 'block_clients_description', __( 'Description' ) ),
    ) )
    ->add_tab('Clients', array(
        Field::make( 'media_gallery', 'block_clients_logo', __( 'Logo' ) )->set_type( array( 'image' ) ),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <div class="block clients py-20" style="background-image: url(<?php echo esc_html( $fields['block_clients_bg'] ); ?>); background-attachment: fixed;">
                <h2 class="clients_title text-4xl text-center font-bold mb-4">
                    <?php echo esc_html( $fields['block_clients_title'] ); ?>
                </h2>
                <?php if ($fields['block_clients_description']): ?>
                    <div class="clients_description text-2xl text-center px-4 lg:px-0">
                        <?php echo esc_html( $fields['block_clients_description'] ); ?>
                    </div>
                <?php endif; ?>
                <div class="container mx-auto mt-16 px-4 lg:px-0">
                    <div class="flex flex-col lg:flex-row lg:items-center">
                        <div class="clients_logos">
                            <?php
                            $clients_logos = $fields['block_clients_logo'];
                            foreach( $clients_logos as $clients_logo ): ?>
                                <?php $logo_src = wp_get_attachment_image_src($clients_logo, 'large'); ?>
                                <div class="clients_logo">
                                    <img src="<?php echo $logo_src[0]; ?>" loading="lazy">    
                                </div>
                            <?php endforeach; ?>    
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php
    } );

Block::make( __( 'ITExpert SendForm Block' ) )
    ->add_tab('Background', array(
        Field::make( 'image', 'block_sendform_bg', __( 'Photo' ) )->set_value_type( 'url'),
    ) )
    ->add_tab('Info', array(
        Field::make( 'text', 'block_sendform_title', __( 'Title' ) ),
        Field::make( 'textarea', 'block_sendform_description', __( 'Description' ) ),
    ) )
    ->add_tab('Clients', array(
        Field::make( 'text', 'block_sendform_form', __( 'Shortcode Form' ) ),
    ) )
    ->add_tab('Styles', array(
        Field::make( 'color', 'block_sendform_btn_bg', __( 'Background color for Btn' ) ),
        Field::make( 'color', 'block_sendform_btn_text', __( 'Text color for Btn' ) ),
        Field::make( 'color', 'block_sendform_btn_bg_hover', __( 'Background color for Btn (hover)' ) ),
        Field::make( 'color', 'block_sendform_btn_text_hover', __( 'Text color for Btn (hover)' ) ),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <style>
                .sendform input, .sendform textarea {
                    width: 100%;
                    font-size: 1.1rem;
                    font-weight: 400;
                    line-height: 1.5;
                    color: #495057;
                    background-color: #fff;
                    border-color: transparent;
                    -webkit-transition: .5s;
                    -o-transition: .5s;
                    transition: .5s;
                    border: 1px solid #e6e6e6;
                    padding: 0.75rem 1.25rem;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                    border-radius: 5px;
                    margin-bottom: 1.25rem;
                }.sendform input::placeholder, .sendform textarea::placeholder {
                    color: #495057;
                    opacity: 1;
                }
                .sendform input[type="submit"] {
                    width: auto;
                    display: block;
                    background-color: <?php echo esc_html( $fields['block_sendform_btn_bg'] ); ?>;
                    color: <?php echo esc_html( $fields['block_sendform_btn_text_hover'] ); ?>;
                    border-radius: 7px;
                    transition: .3s;
                    cursor: pointer;
                    margin: auto;
                    padding: 14px 39px;
                }
                .sendform input[type="submit"]:hover {
                    background-color: <?php echo esc_html( $fields['block_sendform_btn_bg_hover'] ); ?>;
                    color: <?php echo esc_html( $fields['block_sendform_btn_text'] ); ?>;
                }
            </style>
            <div class="block sendform py-20" style="background-image: url(<?php echo esc_html( $fields['block_sendform_bg'] ); ?>); background-attachment: fixed;">
                <div class="container mx-auto px-4 lg:px-0">
                    <div class="flex items-center flex-col lg:flex-row">
                        <div class="w-full lg:w-1/2 sendform_info pr-0 lg:pr-0 mb-6 lg:mb-0">
                            <h2 class="sendform_title text-4xl text-center font-bold mb-4">
                                <?php echo esc_html( $fields['block_sendform_title'] ); ?>
                            </h2>
                            <?php if ($fields['block_sendform_description']): ?>
                                <div class="sendform_description text-2xl text-center ">
                                    <?php echo esc_html( $fields['block_sendform_description'] ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="w-full lg:w-1/2 sendform_form pl-0 lg:pl-5">
                            <?php 
                                $form_contact = $fields['block_sendform_form']; 
                                echo do_shortcode(''. $form_contact .'');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    } );

Block::make( __( 'ITExpert About Block' ) )
    ->add_tab('Info', array(
        Field::make( 'text', 'block_about_title', __( 'Title' ) ),
        Field::make( 'text', 'block_about_subtitle', __( 'Subtitle' ) ),
        Field::make( 'textarea', 'block_about_text', __( 'Text' ) ),
        Field::make( 'image', 'block_about_photo', __( 'Photo' ) )->set_value_type( 'url'),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <div class="block_about py-20">
                <div class="container px-4 lg:px-0 mx-auto">
                    <div class="flex flex-col lg:flex-row items-center">
                        <div class="w-full lg:w-1/2 lg:pr-5 mb-8 lg:mb-0">
                            <h2 class="block_about_title text-4xl font-bold mb-4 mt-10 lg:mt-0">
                                <?php echo esc_html( $fields['block_about_title'] ); ?>
                            </h2>
                            <div class="block_about_subtitle text-2xl mb-10">
                                <?php echo esc_html( $fields['block_about_subtitle'] ); ?>
                            </div>
                            <div>
                                <?php echo esc_html( $fields['block_about_text'] ); ?>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 lg:pl-5">
                            <div class="block_about_photo">
                                <img src="<?php echo esc_html( $fields['block_about_photo'] ); ?>" alt="About">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        <?php
    } );

Block::make( __( 'ITExpert Mission Block' ) )
    ->add_tab('Info', array(
        Field::make( 'text', 'block_mission_title', __( 'Title' ) ),
        Field::make( 'textarea', 'block_mission_text', __( 'Text' ) ),
        Field::make( 'text', 'block_mission_author', __( 'Author' ) ),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <div class="block_mission py-20">
                <div class="container mx-auto">
                    <div class="w-full lg:w-10/12 flex items-center justify-center text-center mx-auto">
                        <div class="block_mission_wrap lg:w-4/5">
                            <h2 class="block_mission_title text-4xl font-bold mb-4">
                                <?php echo esc_html( $fields['block_mission_title'] ); ?>
                            </h2>
                            <div class="block_mission_text text-xl mb-4">
                                <?php echo esc_html( $fields['block_mission_text'] ); ?>
                            </div>
                            <div class="block_mission_author">
                                <?php echo esc_html( $fields['block_mission_author'] ); ?>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        <?php
    } );

Block::make( __( 'ITExpert FAQ Block' ) )
    ->add_tab('Content', array(
        Field::make( 'complex', 'block_faq', __( 'FAQ' ) )->set_layout( 'tabbed-vertical' )->add_fields( array(
                Field::make( 'text', 'block_faq_q', __( 'Question' ) ),
                Field::make( 'rich_text', 'block_faq_a', __( 'Answer' ) ),
            )),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <div class="block_faq py-4">
                <div class="container mx-auto">
                    <div itemscope itemtype="https://schema.org/FAQPage">
                        <?php 
                        $faqs = $fields['block_faq']; 
                        foreach( $faqs as $faq ): ?>
                            <details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="mb-3">
                                <summary class="zag text-lg" itemprop="name">
                                    <div class="icon">
                                        <svg height="14" viewBox="0 0 448 448" width="14" xmlns="http://www.w3.org/2000/svg"><path fill="#054ada" d="m272 184c-4.417969 0-8-3.582031-8-8v-176h-80v176c0 4.417969-3.582031 8-8 8h-176v80h176c4.417969 0 8 3.582031 8 8v176h80v-176c0-4.417969 3.582031-8 8-8h176v-80zm0 0"/></svg>
                                    </div>
                                    <div>
                                        <?php echo $faq['block_faq_q'] ?>    
                                    </div>
                                </summary> 
                                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="content">
                                    <div itemprop="text">
                                        <p><?php echo $faq['block_faq_a'] ?></p>
                                    </div>
                                </div>
                            </details>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php
    } );

Block::make( __( 'ITExpert Interview Block' ) )
    ->add_tab('Author', array(
        Field::make( 'image', 'block_interview_photo', __( 'Avatar' ) )->set_value_type( 'url'),
        Field::make( 'text', 'block_interview_author', __( 'Author' ) ),
        Field::make( 'text', 'block_interview_author_position', __( 'Author Position' ) ),
    ) )
    ->add_tab('QA', array(
        Field::make( 'complex', 'block_interview_qa', __( 'Отзыв' ) )->set_layout( 'tabbed-vertical' )->add_fields( array(
                Field::make( 'text', 'block_interview_q', __( 'Question' ) ),
                Field::make( 'rich_text', 'block_interview_a', __( 'Answer' ) ),
            )),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <div class="block_interview py-4 mb-4">
                <div class="block_interview_wrap pt-6 pb-1">
                    <div class="block_interview_author flex items-center mb-8">
                        <div class="mr-8">
                            <img src="<?php echo esc_html( $fields['block_interview_photo'] ); ?>" alt="" width="110">
                        </div>
                        <div>
                            <div class="text-xl mb-2"><?php echo esc_html( $fields['block_interview_author'] ); ?></div>
                            <div class="italic opacity-75"><?php echo esc_html( $fields['block_interview_author_position'] ); ?></div>
                        </div>
                    </div>
                    <div>
                        <?php 
                            $allqa = $fields['block_interview_qa']; 
                            foreach($allqa as $qa):
                        ?> 
                            <div class="text-xl font-bold mb-6">
                                <?php echo $qa['block_interview_q']; ?>
                            </div>
                            <div class="mb-8">
                                <?php echo $qa['block_interview_a']; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
            </div>
        <?php
    } );

Block::make( __( 'ITExpert Quote Block' ) )
    ->add_tab('Template', array(
        Field::make( 'select', 'block_quote_template', __( 'Template' ) )
        ->add_options( array(
            'one' => 'Template One',
            'two' => 'Template Two',
            'three' => 'Template Three',
        ) )
    ) ) 
    ->add_tab('Info', array(
        Field::make( 'textarea', 'block_quote_text', __( 'Text' ) ),
        Field::make( 'image', 'block_quote_photo', __( 'Photo' ) )->set_value_type( 'url'),
        Field::make( 'text', 'block_quote_author', __( 'Author' ) ),
        Field::make( 'text', 'block_quote_author_position', __( 'Author Position' ) ),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            
            <?php $quote_template = $fields['block_quote_template']; ?>

            <?php if ($quote_template === 'one'): ?>
            <div class="block_quote py-4">
                <div class="flex">
                    <div class="mr-10">
                        <div class="mb-4">
                            <img src="<?php echo esc_html( $fields['block_quote_photo'] ); ?>" alt="Expert" class="block_quote_template_one_photo">
                        </div>
                        <div class="text-center font-bold">
                            <?php echo esc_html( $fields['block_quote_author'] ); ?>
                        </div>
                    </div>
                    <div class="text-xl italic pt-4">
                        <?php echo esc_html( $fields['block_quote_text'] ); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($quote_template === 'two'): ?>
            <div class="block_quote py-12">
                <div class="relative bg-gray-300 p-10 rounded-md">
                    <div class="block_quote_template_two_icon">
                        <img src="<?php bloginfo('template_url'); ?>/img/icons/quote-template-two.svg" alt="Icon">
                    </div>
                    <div class="flex items-center mb-6">
                        <div class="mr-6">
                            <img src="<?php echo esc_html( $fields['block_quote_photo'] ); ?>" alt="Expert" class="block_quote_template_two_photo">
                        </div>
                        <div>
                            <div class="text-xl mb-2"><?php echo esc_html( $fields['block_quote_author'] ); ?></div>
                            <div class="opacity-75"><?php echo esc_html( $fields['block_quote_author_position'] ); ?></div>
                        </div>
                    </div>
                    <div class="text-xl">
                        <?php echo esc_html( $fields['block_quote_text'] ); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($quote_template === 'three'): ?>
            <div class="block_quote py-4">
                <div class="block_quote_template_three">
                    <div class="block_quote_template_three_text text-xl mb-6">
                        <?php echo esc_html( $fields['block_quote_text'] ); ?>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <img src="<?php echo esc_html( $fields['block_quote_photo'] ); ?>" alt="Expert" class="block_quote_template_three_photo">
                            <div class="mx-4">––</div>
                        </div>
                        <div class="text-xl">
                            <span><?php echo esc_html( $fields['block_quote_author'] ); ?>, </span>
                            <span class="italic"><?php echo esc_html( $fields['block_quote_author_position'] ); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php
    } );

Block::make( __( 'ITExpert Our Team Block' ) )
    ->add_tab('Columns', array(
        Field::make( 'text', 'block_team_column_desktop', __( 'Number of column for Desktop' ) )->set_attribute( 'type', 'number' )->set_default_value( 3 ),
    ) )
    ->add_tab('Info', array(
        Field::make( 'text', 'block_team_title', __( 'Title' ) ),
        Field::make( 'textarea', 'block_team_text', __( 'Description' ) ),
    ) )
    ->add_tab('Team', array(
        Field::make( 'complex', 'block_members', __( 'Member' ) )->set_layout( 'tabbed-vertical' )->add_fields( array(
            Field::make( 'image', 'block_member_photo', __( 'Фото' ) )->set_value_type( 'url'),
            Field::make( 'text', 'block_member_name', __( 'Имя' ) ),
            Field::make( 'text', 'block_member_head', __( 'Должность' ) ),
            Field::make( 'text', 'block_member_facebook', __( 'Facebook' ) ),
            Field::make( 'text', 'block_member_instagram', __( 'Instagram' ) ),
            Field::make( 'text', 'block_member_twitter', __( 'Twitter' ) ),
            Field::make( 'text', 'block_member_linkedin', __( 'Linkedin' ) ),
            Field::make( 'text', 'block_member_email', __( 'Email' ) ),
        )),
    ) )
    ->set_category( 'custom-category', 'ITExpert' )
    ->set_style( 'editor-style' )
    ->set_mode( 'preview' )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        ?>
            <?php 
                $column_width_desktop = 100/$fields['block_team_column_desktop'];
            ?>
            <div class="block_team py-20">
                <h2 class="block_team_title text-4xl text-center font-bold mb-4">
                    <?php echo esc_html( $fields['block_team_title'] ); ?>
                </h2>
                <div class="block_team_text text-xl text-center mb-4">
                    <?php echo esc_html( $fields['block_team_text'] ); ?>
                </div>
                <div class="container px-4 lg:px-0 lg:mx-auto">
                    <div class="flex flex-wrap -mx-4">
                        <?php 
                            $members = $fields['block_members']; 
                            foreach($members as $member):
                        ?>
                            <div class="block_team_member px-4 mb-10" style="width: <?php echo $column_width_desktop; ?>%;">
                                <div class="block_member_photo mb-4">
                                    <img src="<?php echo $member['block_member_photo']; ?>" alt="">
                                </div>
                                <div class="text-xl text-center mb-4">
                                    <?php echo $member['block_member_name']; ?>
                                </div>
                                <div class="text-sm text-center mb-6">
                                    <?php echo $member['block_member_head']; ?>
                                </div>
                                <div class="flex justify-center items-center -mx-1">
                                    <?php if ($member['block_member_facebook']): ?>
                                        <a href="<?php echo $member['block_member_facebook']; ?>">
                                            <img src="<?php bloginfo('template_url'); ?>/img/icons/facebook.svg" alt="Facebook" width="16" class="mx-1">    
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($member['block_member_instagram']): ?>
                                        <a href="<?php echo $member['block_member_instagram']; ?>">
                                            <img src="<?php bloginfo('template_url'); ?>/img/icons/instagram.svg" alt="Instagram" width="16" class="mx-1">    
                                        </a>
                                    <?php endif; ?>   
                                    <?php if ($member['block_member_twitter']): ?>
                                        <a href="<?php echo $member['block_member_twitter']; ?>">
                                            <img src="<?php bloginfo('template_url'); ?>/img/icons/twitter.svg" alt="Twitter" width="16" class="mx-1">    
                                        </a>
                                    <?php endif; ?> 
                                    <?php if ($member['block_member_linkedin']): ?>
                                        <a href="<?php echo $member['block_member_linkedin']; ?>">
                                            <img src="<?php bloginfo('template_url'); ?>/img/icons/linkedin.svg" alt="Linkedin" width="16" class="mx-1">    
                                        </a>
                                    <?php endif; ?>   
                                    <?php if ($member['block_member_email']): ?>
                                        <a href="<?php echo $member['block_member_email']; ?>">
                                            <img src="<?php bloginfo('template_url'); ?>/img/icons/email.svg" alt="Email" width="16" class="mx-1">    
                                        </a>
                                    <?php endif; ?>    
                                </div>
                                
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php
    } );
?>