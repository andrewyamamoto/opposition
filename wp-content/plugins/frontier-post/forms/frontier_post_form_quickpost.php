<?php

//Display message
frontier_post_output_msg();

if ( strlen($fpost_sc_parms['frontier_edit_text_before']) > 1 )
	echo '<div id="frontier_edit_text_before">'.$fpost_sc_parms['frontier_edit_text_before'].'</div>';

//***************************************************************************************
//* Start form
//***************************************************************************************

	$fp_show_quickpost = get_user_meta( $current_user->ID, 'frontier_post_show_quickpost', true );

	echo '<div class="frontier_post_form"> ';
	echo '<form action="'.$frontier_permalink.'" method="post" name="frontier_post" id="frontier_post" enctype="multipart/form-data" >';
	echo '<input type= "hidden" id="fp_show_quickpost" name="fp_show_quickpost" value="'.$fp_show_quickpost.'" >';

	// do not remove this include, as it holds the hidden fields necessary for the logic to work
	include(FRONTIER_POST_DIR."/forms/frontier_post_form_header.php");
	wp_nonce_field( 'frontier_add_edit_post', 'frontier_add_edit_post_'.$thispost->ID );

?>
		<div class='fp-quickpost-ui'>
			<h3>Create new post</h3>
			<div class="form-group">
				<input class="frontier-formtitle form-control"  placeholder="<?php _e('Enter title here', 'frontier-post'); ?>" type="text" value="<?php if(!empty($thispost->post_title))echo $thispost->post_title;?>" name="user_post_title" id="fp_title" >
			</div>
			<div class="form-group">
				<?php wp_editor($thispost->post_content, 'frontier_post_content', frontier_post_wp_editor_args($fpost_sc_parms['frontier_quick_editor_height']));?>
			</div>
			<?php if ( fp_get_option_bool("fps_submit_save") ): ?>
				<button class="button fp_quickpost_button" type="submit" name="user_post_submit" id="user_post_save" value="save"><?php _e("Save", "frontier-post"); ?></button>
			<?php endif; ?>
			<?php if ( fp_get_option_bool("fps_submit_savereturn") ):?>
				<button class="button fp_quickpost_button" type="submit" name="user_post_submit" id="user_post_submit" value="savereturn"><?php echo $fpost_sc_parms['frontier_return_text']; ?></button>
			<?php endif; ?>
			<?php if ( fp_get_option_bool("fps_submit_publish") && ($thispost->post_status !== "publish" || $tmp_task_new) && current_user_can("frontier_post_can_publish") ): ?>
				<button class="button fp_quickpost_button btn btn-primary" type="submit" name="user_post_submit" 	id="user_post_publish" 	value="publish"><?php _e("Publish", "frontier-post"); ?></button>
			<?php endif; ?>
			<?php if ( fp_get_option_bool("fps_submit_preview") ): ?>
				<button class="button fp_quickpost_button" type="submit" name="user_post_submit" id="user_post_preview" value="preview"><?php _e("Save & Preview", "frontier-post"); ?></button>
			<?php endif; ?>
			<?php if ( fp_get_option_bool("fps_submit_cancel") ): ?>
				<input type="reset" value="<?php _e("Cancel", "frontier-post"); ?>"  class="btn btn-danger" name="cancel" id="frontier-post-cancel" onclick="location.href='<?php the_permalink();?>'">
			<?php endif; ?>
		</div>

	</form>

</div>

<?php
	// end form file
?>
