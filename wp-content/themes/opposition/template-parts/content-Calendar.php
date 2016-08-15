<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package opposition
 */

?>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <h1>
                    <?php
                        // if ( get_field('about_title') ) {
                        //     the_field('about_title');
                        // }
                    ?>
                </h1>
{CALENDAR}
                <p>
                    <?php
                        // if ( get_field('about_description') ) {
                        //     the_field('about_description');
                        // }

                    ?>
                </p>
            </div>
        </div>
    </div>

</section>
