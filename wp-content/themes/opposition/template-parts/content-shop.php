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
    <h1>SHOP STUFF HERE</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                    echo do_shortcode( '[featured_products per_page="12" columns="4"]' );
                ?>
            </div>
        </div>
    </div>

</section>
