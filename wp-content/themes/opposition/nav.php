<?php
/**
 * The template for displaying site navigation
 *
 * @package opposition
 */
?>

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">OPPOSITION</a>
            </div>

            <?php
                wp_nav_menu( array(
                    'theme_location'  => 'primary',
                    'menu_id'         => 'primary-menu',
                    'menu_class'      => 'nav navbar-nav',
                    'container'       => 'div',
                    'container_class' => '',
                    'container_id'    => 'navbar-collapse',
                ) );
            ?>

        </div>
    </nav>
