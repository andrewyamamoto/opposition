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

</section>
