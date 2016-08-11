<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package opposition
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <section id="navi">

        <div class="actionbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            wp_nav_menu( array(
                                'theme_location'  => 'action',
                                'menu_id'         => '',
                                'menu_class'      => 'action pull-right',
                                'container'       => 'a',
                                'container_class' => '',
                            ) );
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php get_template_part('nav'); ?>

        <?php
            if ( is_front_page() ) : ?>
            <div class="intro-vid">

                <video id="bgvid" poster="<?php echo get_template_directory_uri() . '/img/start-animate-flip.jpg' ?>" autoplay muted loop>
                    <source src="<?php echo get_template_directory_uri() . '/vid/Star-animate-2.mp4' ?>" type="video/mp4">
                    <source src="<?php echo get_template_directory_uri() . '/vid/Star-animate-2.webm' ?>" type="video/webm">
                </video>

            </div>
        <?php else: ?>
            <div class='interiorheader'></div>
        <?php endif;?>



    </section>
