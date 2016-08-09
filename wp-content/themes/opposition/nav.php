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
                <img src="<?php echo get_template_directory_uri() . '/img/opposition_logo.png'?>" width='50' alt="" />

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#oppo-navbar-collapse" aria-expanded="false">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">OPPOSITION</a>
            </div>
            <div class="collapse navbar-collapse" id="oppo-navbar-collapse">
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
            </div><!-- /.navbar-collapse -->

        </div>
    </nav>
