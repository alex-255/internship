<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="navigation-bar" class="container-fluid">
        <div class="row">
          <div class="col-12 col-xl-2 logo-area">
              <?php 
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                }
              ?>
          </div>
          <div class="col-12 col-xl-auto menu-area">
            <?php wp_nav_menu( array(
              'menu' => 'primary_menu',
              'theme_location' => 'primary_menu'
            ) ); ?>
          </div>
          <div class="col-12 col-xl-3 button-area">
              <a href="#" class="contact-button">contact</a>
          </div>
        </div>
    </div>