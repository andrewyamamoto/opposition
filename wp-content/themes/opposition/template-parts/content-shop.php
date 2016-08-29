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

                    // echo do_shortcode( '[featured_products per_page="12" columns="" orderby="date" ]' );

                    // $args = array(
                    //     'post_type' => 'product',
                    //     'meta_key' => '_featured',
                    //     'meta_value' => 'yes',
                    //     'posts_per_page' => 12
                    // );
                    //
                    // $featured_query = new WP_Query( $args );
                    //
                    // if ($featured_query->have_posts()) :
                    //
                    //     while ($featured_query->have_posts()) :
                    //
                    //         $featured_query->the_post();
                    //
                    //         $product = wc_get_product( $featured_query->post->ID );
                    //         $price = get_post_meta( $featured_query->post->ID, '_regular_price', true);
                    //         $addtocart = get_post_meta( $featured_query->post->ID, '_regular_price', true);
                    //         $title = get_post_meta( $featured_query->post->ID, 'post_title', true);
                    //         // print_r($product);
                    //         // echo "$price";
                    //         // print the_title();
                    //         // print_r($product);
                    //         echo "<div class='col-lg-3'>";
                    //         // print_r($product);
                    //         echo woocommerce_show_product_images();
                    //         echo woocommerce_template_single_title();
                    //         echo woocommerce_template_single_price();
                    //         echo woocommerce_template_loop_add_to_cart();
                    //         echo "</div>";
                    //         // echo "$addtocart";
                    //         // foreach($product as $item){
                    //         //
                    //         // }
                    //
                    //         // Output product information here
                    //
                    //
                    //     endwhile;
                    //
                    // endif;
                    //
                    // wp_reset_query();

                ?>

                <?php

                    $args = array(
                        'post_type'   => 'product',
                        'stock'       => 1,
                        'showposts'   => 6,
                        'orderby'     => 'date',
                        'order'       => 'DESC' ,
                        'meta_query'  => array(
                            array(
                                'key'     => '_featured',
                                'value'   => 'yes'
                            )
                        )
                    );

                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

                    <div class='col-lg-3'>
                        <a class="item" href="<?php echo get_permalink($product->ID) ?>">
                        <?php
                            if ( has_post_thumbnail( $loop->post->ID ) )
                                echo get_the_post_thumbnail( $loop->post->ID, 'shop_catalog' );
                            else
                                echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" class="img-responsive" />';
                        ?>
                            <h3><?php the_title(); ?></h3>

                        <?php
                        // echo get_permalink($product->ID);
                            echo $product->get_price_html();
                            // woocommerce_template_loop_add_to_cart( $loop->post, $product );
                        ?>
                        </a>
                    </div>

                <?php
                    endwhile;
                    wp_reset_query();
                    ?>
            </div>

        </div>

    </div>

</section>
