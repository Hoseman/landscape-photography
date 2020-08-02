<?php
/**
 * The header for the photography theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Landscape_Photography
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="description" content="I am a photographer based in Buckinghamshire who specialises mainly in landscape photography. I capture most of my images close to home but I also venture further afield into the surrounding Home Counties countryside. As a keen walker I love exploring the outdoors and it is this sense of exploration that I attempt to capture in my photography. I only venture out when the light is at its best and I often spend weekends chasing the light trying to capture something momorable.">
    <meta name="author" content="Andrew Hosegood">
    <meta property="og:image" content="https://photography.achcreative.info/wp-content/uploads/2020/06/og-image.jpg" />
    <meta property="og:description" content="I am a photographer based in Buckinghamshire who specialises mainly in landscape photography. I capture most of my images close to home but I also venture further afield into the surrounding Home Counties countryside. As a keen walker I love exploring the outdoors and it is this sense of exploration that I attempt to capture in my photography. I only venture out when the light is at its best and I often spend weekends chasing the light trying to capture something momorable." />
    <meta property="og:url"content="http://photography.achcreative.info" />
    <meta property="og:title" content="Landscape Photography | By Andrew Hosegood" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-170982234-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-170982234-1');
    </script>

    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Landscape Photography | By Andrew Hosegood</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>




<section id="mainnav" class="main-navigation" style="<?php if (is_user_logged_in() && is_front_page()){ echo 'top:32px;'; } ?>">
        <a href="./"><?php the_custom_logo(); ?></a>

        <span class="navigation">
            
            <a onclick="scrollToTop()" class="hamburger hamburger--elastic">
                <div class="hamburger-box">
                  <div class="hamburger-inner"></div>
                </div>
            </a>
            
<!--            <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>    -->

            <div class="search-button center-position">
              <div class="search-icon">
              </div>
            </div>
        </span>
</section>


<section class="main-menu">

    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
        )
    );
    ?>

</section>

<section class="main-search-menu">
    <?php get_search_form(); ?>
</section>
















