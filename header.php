<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php
    global $page, $paged;
    
    wp_title( '|', true, 'right' );
    
    bloginfo( 'name' );
    
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";
    ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_directory' ); ?>/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/img/favicon.ico">
    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js" type="text/javascript"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body>
  <div class="container">
    <div class="row">

      <?php get_sidebar(); ?>

      <div class="col-md-8 col-sm-8 content-main">
        <div class="row">
          <div class="col-md-6 col-xs-12 col-sm-8">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only"><?php _e('Navigation', 'boromeke'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <h1 class="logo">
                <img src="<?php bloginfo( 'template_directory' ); ?>/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="72%">
                </h1>
              </a>
            	<span class="head"><?php bloginfo( 'description' ); ?></span>
            	<div class="pull-left rss">
                <a href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-rss fa-4x webfont"></i></a>
              </div>
            </div>
            <?php
              wp_nav_menu(
                array(
                  'theme_location'  => 'all-menu',
                  'container'       => 'div',
                  'container_class' => 'collapse navbar-collapse',
                  'container_id'    => 'navbar-ex-collapse',
                  'menu_class'      => 'nav navbar-nav navbar-right hidden-lg hidden-md hidden-sm',
                  'echo'            => true,
                  'depth'           => 0,
                  )
                ); ?>
          </div>
          <?php get_search_form(); ?>
          </div>
