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
            <div class="col-lg-8 col-lg-offset-2">
                <h1>
                    <?php
                        if ( get_field('about_title') ) {
                            the_field('about_title');
                        }
                    ?>
                </h1>
                <?php
                    if( have_rows('about_columns') ):
                        // $count = 0;
                        while ( have_rows('about_columns') ) : the_row();
                            $col1 = get_sub_field('column1');
                            $col2 = get_sub_field('column2');
                        endwhile;
                ?>
                    <div class="col-lg-6">
                        <?php echo $col1; ?>
                    </div>
                    <div class="col-lg-6">
                        <?php echo $col2; ?>
                    </div>

                <?php
                    else:
                    endif;
                ?>
                    <?php
                    //<p>
                        // if ( get_field('about_description') ) {
                        //     the_field('about_description');
                        // }
                        //</p>
                    ?>
            </div>
        </div>
    </div>

</section>
