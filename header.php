<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="apple-touch-icon" href="/example.png">
  <base href="/">
  <link rel="alternate" hreflang="x-default" href="<?php echo home_url(); ?>">
  <link rel="alternate" hreflang="en" href="<?php echo home_url(); ?>/en">
  <link rel="alternate" hreflang="ru" href="<?php echo home_url(); ?>/ru">
  <link rel="alternate" hreflang="ua" href="<?php echo home_url(); ?>/ua">
  <?php
  // ENQUEUE your css and js in inc/enqueues.php

    wp_head();
  ?>
</head>
<body <?php echo body_class(); ?>>
  <?php 
    //Отображение шапки (реверс?)
    $custom_header_reverse = get_theme_mod( 'custom_header_reverse' ); 
    if ($custom_header_reverse) { $header_reverse = 'flex-row-reverse'; } else { $header_reverse = ''; }
  ?>
  <style>
    .header {
      background: transparent;
    }

    .header.scrolled {
      background: <?php echo get_theme_mod( 'custom_header_gradient_one' ); ?>; 
      background: linear-gradient(90deg, <?php echo get_theme_mod( 'custom_header_gradient_one' ); ?> 0%, <?php echo get_theme_mod( 'custom_header_gradient_two' ); ?> 100%);
    }
    @media (max-width: 1023px) {
      .header {
        background: <?php echo get_theme_mod( 'custom_header_mobile_bg' ); ?> !important;
      }
    }
  </style>
  <header class="header">
    <div class="container mx-auto">
      <div class="w-full">
        <div class="header-wrapper">
          <div class="header-content <?php echo $header_reverse; ?>">
            <div class="logo">
              <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_theme_mod( 'custom_header_logo' ); ?>" alt="<?php _e('Logo', 'itexpert'); ?>">  
              </a>
            </div>
            <div class="hidden lg:block menu header-menu">
              <?php wp_nav_menu([
                'theme_location' => 'head_menu',
                'menu_class' => 'header-menu__list'
              ]); ?>
            </div>
            <div class="header-burger menu block lg:hidden">
              <span class="menu-line"></span>
              <span class="menu-line"></span>
              <span class="menu-line"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-menu__mobile">
      <div class="container mx-4 py-4">
        <?php wp_nav_menu([
          'theme_location' => 'head_menu',
          'menu_class' => 'flex flex-col items-center text-xl text-white'
        ]); ?>  
      </div>
    </div>
  </header>
  <section id="content" role="main">