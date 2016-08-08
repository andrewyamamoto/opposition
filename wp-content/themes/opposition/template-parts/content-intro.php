<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package opposition
 */

?>

<section id="intro">
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
    <?php //the_content(); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <h1>
                <?php
                    if ( get_field('intro_title') ) {
                        the_field('intro_title');
                    }
                 ?>
                </h1>
                <p>
                    <?php
                        if ( get_field('intro_description') ) {
                            the_field('intro_description');
                        }
                     ?>
                </p>
            </div>
        </div>
    </div>
    <video id="bgvid" poster="<?php echo get_template_directory_uri() . '/img/start-animate-flip.jpg' ?>" autoplay muted loop>
        <source src="<?php echo get_template_directory_uri() . '/vid/Star-animate-2.mp4' ?>" type="video/mp4">
            <source src="<?php echo get_template_directory_uri() . '/vid/Star-animate-2.webm' ?>" type="video/webm">
    </video>
</section>
