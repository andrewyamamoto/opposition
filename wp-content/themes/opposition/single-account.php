<?php
    /**
     * Template Name: Account
     *
     * @package opposition
     */
     get_header();
?>
<section id="account">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>My Account</h1>
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


        // End of the loop.
    endwhile;
?>
            </div>

        </div>

    </div>

</section>

<?php
    get_footer();
