<?php
    /**
     * Template Name: Checkout
     *
     * @package opposition
     */
     get_header();
?>
<section id="checkout">

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h1>Checkout</h1>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">
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
