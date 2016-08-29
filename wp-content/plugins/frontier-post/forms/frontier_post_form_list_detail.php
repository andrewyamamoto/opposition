<?php

// list of users post based on current theme settings
	global $fps_access_check_msg;
	//Reset access message
	$fps_access_check_msg = "";
	$concat= get_option("permalink_structure")?"?":"&";
	//set the permalink for the page itself
	$frontier_permalink = get_permalink();
	$tmp_status_list = get_post_statuses( );

	// Add future to list
	$tmp_status_list['future'] = __("Future", "frontier-post");
	$tmp_info_separator = " | ";

	//Display before text from shortcode
	if ( strlen($fpost_sc_parms['frontier_list_text_before']) > 1 ){
		echo '<div id="frontier_list_text_before">'.$frontier_list_text_before.'</div>';
	}
	// Dummy translation of ago for human readable time
	$crap = __("ago", "frontier-post");

	if (strlen(trim($fpost_sc_parms['frontier_add_link_text']))>0){
		$tmp_add_text = $fpost_sc_parms['frontier_add_link_text'];
	}else{
		$tmp_add_text = __("Create New", "frontier-post")." ".fp_get_posttype_label_singular($fpost_sc_parms['frontier_add_post_type']);
	}

	//Display message
	frontier_post_output_msg();

	if (frontier_can_add($fpost_sc_parms['frontier_add_post_type']) && !fp_get_option_bool("fps_hide_add_on_list")){
	?>
		<fieldset class="frontier-new-menu">
			<a id="frontier-post-add-new-link" href='<?php echo frontier_post_add_link($tmp_p_id) ?>'><?php echo $tmp_add_text; ?></a>
		</fieldset>
	<?php

	}else{
		if ( current_user_can("manage_options") && strlen(trim($fps_access_check_msg)) > 0){
			echo '<div id="frontier-post-posttype-warning">';
			echo $fps_access_check_msg;
			echo ' - '.__("This message is only shown to admins", "frontier-post").'<br><br>';
			echo '</div>';
		}
	}


//*******************************************************************************************************
//  Quickpost
//*******************************************************************************************************


if( $user_posts->found_posts > 0 ){
	echo '<div id="frontier-post-list_form">';
	while ($user_posts->have_posts()){
		$user_posts->the_post();
		// only display private posts if author is current users
		if ($post->post_status == "private" && $current_user->ID != $post->post_author ){
			continue;
		}

		$tmp_status_class="frontier-post-list-status-".$post->post_status;

		?>
			<div class="post">
				<div class="date">
				<?php
					if ($post->post_status === 'publish' ){
						printf( _x( '%s ago', '%s = human-readable time difference', 'frontier-post' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
					}
				?>
				</div>
				<div class="title">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class='content'>

				<?php
					if ($fp_list_form == "full_post"){
						$tmp_content = apply_filters( 'the_content', $post->post_content );
						$tmp_content = str_replace( ']]>', ']]&gt;', $tmp_content );
						echo '<tr><td class="frontier-new-list" id="frontier-post-new-list-excerpt" colspan=2>';
						echo $tmp_content;
						echo '</td></tr>';
					}
					if ($fp_list_form == "excerpt"){
						//$tmp_content = get_the_excerpt();
						$tmp_content = $post->post_excerpt;
						if (strlen(trim($tmp_content)) == 0)
							$tmp_content = wp_trim_words($post->post_content);
							$tmp_content =  apply_filters( 'the_content', $tmp_content);

							//$tmp_content =  apply_filters( 'the_content', get_the_excerpt() );

							echo '<tr><td class="frontier-new-list" id="frontier-post-new-list-excerpt" colspan=2>';

							//the_excerpt();
							echo $tmp_content;
							echo '</td></tr>';
							echo '</td></tr>';
						}
				?>
				</div>




			</div>


		<?php
		//echo '<hr>';

		} // end while have posts



	if ( fp_bool($fpost_sc_parms['frontier_pagination']) )
		{
		$pagination = paginate_links(
			array(
				'base' => add_query_arg( 'pagenum', '%#%'),
				'format' => '',
				'prev_text' => __( '&laquo;', 'frontier-post' ),
				'next_text' => __( '&raquo;', 'frontier-post' ),
				'total' => $user_posts->max_num_pages,
				'current' => $pagenum,
				'add_args' => false  //due to wp 4.1 bug (trac ticket 30831)
				)
			);

		//if ( $pagination )
		//	echo $pagination;
		if ( $pagination )
			{
			echo '<div id="frontier-post-pagination">'.$pagination.'</div>';
			}


		}
	if ( !fp_bool($fpost_sc_parms['frontier_list_all_posts']) )
		echo "</br>".__("Number of posts already created by you: ", "frontier-post").$user_posts->found_posts."</br>";

	echo '</div>';
	} // end if have posts
else
	{
		echo "</br><center>";
		_e('Sorry, you do not have any posts (yet)', 'frontier-post');
		echo "</center><br></br>";
	} // end post count

//Re-instate $post for the page
wp_reset_postdata();
frontier_quickpost($fpost_sc_parms);
?>
<?php  ?>
