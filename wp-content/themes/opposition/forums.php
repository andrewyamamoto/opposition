<?php
/**
 * Template Name: forums
 *
 * @package opposition
 */

get_header();
?>
<section id="forums">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    // Include the page content template.
                    // get_template_part( 'template-parts/content', 'page' );
                    the_content();

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }

                    // End of the loop.
                endwhile;
            ?>
        </div>
    </div>
</div>
</section>
<?php
    get_footer();
