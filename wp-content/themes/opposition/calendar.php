<?php
/**
 * Template Name: Calendar
 *
 * @package opposition
 */

get_header();
?>
<section id="forums">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    the_content();
                    

                    // End of the loop.
                endwhile;
            ?>
        </div>
    </div>
</div>
</section>
<?php
    get_footer();
