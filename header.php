<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Mycool_Theme
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<script>document.documentElement.className=document.documentElement.className.replace("no-js","yes-js");window.G={D:{_qj:[]}};G.Q=function(k){G.D._qj.push(k)};</script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png">
	<meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
	<meta itemprop="description" content="<?php bloginfo( 'description' ); ?>">
	<meta itemprop="image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="<?php bloginfo( 'name' ); ?>">
	<meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="twitter:site" content="@harvestoakville">
	<meta name="twitter:creator" content="@harvestoakville">
	<meta name="twitter:image:src" content="<?php echo get_template_directory_uri(); ?>/screenshot.png">
	<meta name="og:title" content="<?php bloginfo( 'name' ); ?>">
	<meta name="og:description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png">
	<meta name="og:url" content="http://mycoolthemethekingdom.ca">
	<meta name="og:site_name" content="<?php bloginfo( 'name' ); ?>">
	<meta name="og:locale" content="en">
	<meta name="og:type" content="website">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="theme-color" content="#333333">
	<link rel="shortcut icon" type="image/favicon" href="<?php echo get_template_directory_uri(); ?>/dist/favicon.ico">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
	</script>
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/dist/manifest.69916cb44f1f6b0eff1a5ca74f2aa7e9.json" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skippy sr-only sr-only-focusable" href="#main"><?php _e( 'Skip to content', 'mycooltheme' ); ?></a>
	<header id="masthead" class="site-header" role="banner">

		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Logo</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto mr-4">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

	</header><!-- #masthead -->

	<main role="main" id="main" class="container">
