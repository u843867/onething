<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package oneThing
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'onething'); ?></a>

            <header id="masthead" class="site-header" role="banner">

                <!--   the next line is checking for the existence of a header image and no header text, if true then display the header image -->
                <?php if (get_header_image() && ('blank' == get_header_textcolor() )) : ?>

                    <div class="header-image">

                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="">
                        </a>

                    </div>

                <?php endif; // End header image check. ?>


                <?php
                if (get_header_image() && !('blank' == get_header_textcolor())) {
                    echo '<div class="site-branding header-background-image" style="background-image: url(' . get_header_image() . ')">';
                } else {
                    echo '<div class="site-branding">';
                }
                ?>

                <div class="title-box">
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                    <p class="site-description"><?php bloginfo('description'); ?></p>
                </div>
        </div>
    </div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'onething'); ?></button>
        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>

        <div class="search-toggle">
            <i class="fa fa-search"></i>
            <a href="#search-container" class="screen-reader-text"><?php _e('Search', 'onething'); ?></a>
        </div>
        
        <?php onething_social_menu() ?>


    </nav><!-- #site-navigation -->

    <div id="search-container" class="search-box-wrapper clear">
        <div class="search-box clear">
            <?php get_search_form(); ?>
        </div>
    </div>
    
</header><!-- #masthead -->

<div id="content" class="site-content">
