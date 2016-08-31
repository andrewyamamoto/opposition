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
