<?php
/**
 * Template Name: IRL
 *
 * @package opposition
 */

get_header();
?>
<section id="irl">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    the_content();
                
                endwhile;
            ?>
        </div>
    </div>
</div>
</section>
<?php
    get_footer();
