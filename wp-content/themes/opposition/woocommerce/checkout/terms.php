<?php
/**
 * Checkout terms and conditions checkbox
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php if ( wc_get_page_id( 'terms' ) > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) : ?>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Terms and Conditions</h4>
				</div>
				<div class="modal-body">
					<?php
					$my_id = 137;
					$post_id_5369 = get_post($my_id);
					$content = $post_id_5369->post_content;
					$content = apply_filters('the_content', $content);
					$content = str_replace(']]>', ']]>', $content);
					echo $content;
					?>
				</div>
			</div>
		</div>

	</div>

  <p class="form-row terms">
    <label for="terms" class="checkbox"><?php _e( 'I have read and accept the', 'woocommerce' ); ?> <a href="#" data-toggle="modal" data-target="#myModal" target="_blank"><?php _e( 'terms & conditions', 'woocommerce' ); ?></a></label>
    <input type="checkbox" class="input-checkbox" name="terms" <?php checked( isset( $_POST['terms'] ), true ); ?> id="terms" />
  </p>
<?php
/*
if ( wc_get_page_id( 'terms' ) > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) : ?>
    <p class="form-row terms wc-terms-and-conditions">
		<input type="checkbox" class="input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" />
        <label for="terms" class="checkbox"><?php printf( __( 'I&rsquo;ve read and accept the <a href="%s" target="_blank">terms &amp; conditions</a>', 'woocommerce' ), esc_url( wc_get_page_permalink( 'terms' ) ) ); ?> <span class="required">*</span></label>
        <input type="hidden" name="terms-field" value="1" />
    </p>
	*/ ?>
<?php endif; ?>
