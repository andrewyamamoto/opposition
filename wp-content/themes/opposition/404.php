<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package opposition
 */

get_header(); ?>

	<section id='fourohfour'>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
					<h1>404 - These are not the droids you're looking for.</h1>
					<img src="<?php echo get_template_directory_uri() . '/img/404.png' ?>" alt="" />
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();
