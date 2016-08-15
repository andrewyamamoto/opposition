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
    <div id="home"></div>
    <section id="navi">

        <div class="actionbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            // wp_nav_menu( array(
                            //     'theme_location'  => 'action',
                            //     'menu_id'         => '',
                            //     'menu_class'      => 'action pull-right',
                            //     'container'       => 'a',
                            //     'container_class' => '',
                            // ) );
                        ?>
                    </div>
                </div>
            </div>
        </div>



        <?php get_template_part('nav'); ?>

    </section>
