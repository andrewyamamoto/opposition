<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package opposition
 */

?>
<footer>
	<?php if ( is_front_page() ) : ?>
		<!-- <video id="bgvidbot" poster="<?php echo get_template_directory_uri() . '' ?>" autoplay muted loop>
			<source src="<?php echo get_template_directory_uri() . '/vid/orange_star_bottom.mp4' ?>" type="video/mp4">
			<source src="<?php echo get_template_directory_uri() . '/vid/orange_star_bottom.webm' ?>" type="video/webm">
		</video> -->
	<?php else: ?>
		<div class='interiorheader'></div>
	<?php endif;?>
</footer>
<?php wp_footer(); ?>

</body>
</html>
