<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package opposition
 */

?>
<section id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>
                    <?php
                        if ( get_field('team_title') ) {
                            the_field('team_title');
                        }
                    ?>
                </h1>
                <p>
                    <?php
                        if ( get_field('team_description') ) {
                            the_field('team_description');
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>
