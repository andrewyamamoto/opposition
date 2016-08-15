<?php
/**
 * Template for News feed
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package opposition
 */

get_header(); ?>
    <section id="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <h1>
                        Media
                    </h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <div class="post">
                            <div class="date">
                                <?php the_date(); ?>
                            </div>
                            <div class="title">
                                <?php the_title(); ?>
                            </div>

                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>


    </section>

<?php get_footer();
