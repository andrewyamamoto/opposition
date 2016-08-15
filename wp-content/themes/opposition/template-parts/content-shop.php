<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package opposition
 */

?>
<section id="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <h1>
                    <?php
                        if ( get_field('opp_shop_title') ) {
                            the_field('opp_shop_title');
                        }
                    ?>
                </h1>

                <p>
                    <?php
                        if ( get_field('opp_shop_description') ) {
                            the_field('opp_shop_description');
                        }

                    ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php

                    echo do_shortcode( '[featured_products per_page="12" columns="4" orderby="date" ]' );

                    $args = array(
                        'post_type' => 'product',
                        'meta_key' => '_featured',
                        'meta_value' => 'yes',
                        'posts_per_page' => 12
                    );

                    $featured_query = new WP_Query( $args );

                    if ($featured_query->have_posts()) :

                        while ($featured_query->have_posts()) :

                            $featured_query->the_post();

                            $product = get_product( $featured_query->post->ID );
                            $price = get_post_meta( $featured_query->post->ID, '_regular_price', true);
                            $addtocart = get_post_meta( $featured_query->post->ID, '_regular_price', true);
                            // print_r($product);
                            echo "$price";
                            // foreach($product as $item){
                            //
                            // }

                            // Output product information here


                        endwhile;

                    endif;

                    wp_reset_query();

                ?>
            </div>
        </div>
    </div>

</section>
