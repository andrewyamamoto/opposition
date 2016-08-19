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
    <?php //the_content(); ?>
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div style='text-align:center'>
                    <?php the_post_thumbnail();?>
                </div>
                <h1>
                <?php

                    if ( get_field('intro_title') ) {
                        the_field('intro_title');
                    }
                 ?>
                </h1>
                <div class="callout">
                    <a href="#team" class='team btn btn-primary'>WHO THE F ARE WE</a>
                </div>

                <!-- <p> -->
                    <?php
                        // if ( get_field('intro_description') ) {
                        //     the_field('intro_description');
                        // }
                     ?>
                <!-- </p> -->
            </div>
        </div>
    </div>
    <?php if ( is_front_page() ) : ?>
        <video id="bgvid" poster="<?php echo get_template_directory_uri() . '/img/star.jpg' ?>" autoplay muted loop>
            <source src="<?php echo get_template_directory_uri() . '/vid/Star.mp4.mp4' ?>" type="video/mp4">
            <source src="<?php echo get_template_directory_uri() . '/vid/Star.webmvp8.webm' ?>" type="video/webm">
        </video>

    <?php else: ?>
        <!-- <div class='interiorheader'></div> -->
    <?php endif;?>


</section>
