<?php

	function frontier_quickpost($fpost_sc_parms = array() ){

		if ( fp_get_option_bool('fps_use_quickpost') && frontier_can_add($fpost_sc_parms['frontier_add_post_type']) ){

			if (strlen(trim($fpost_sc_parms['frontier_add_link_text']))>0){
				$tmp_add_text = $fpost_sc_parms['frontier_add_link_text'];
			}else{
				$tmp_add_text = __("Create New", "frontier-post")." ".fp_get_posttype_label_singular($fpost_sc_parms['frontier_add_post_type']);
			}

			// echo '<fieldset id="frontier-post-quickpost" class="frontier-quickpost-show">';

			frontier_post_add_edit($fpost_sc_parms, true);

			// echo '</fieldset>';

		}
	} //End function



?>
