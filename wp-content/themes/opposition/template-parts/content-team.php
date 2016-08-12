<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package opposition
 */

?>

<section id="team">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 col-lg-offset-3">
                <h1>
                    <?php
                        if ( get_field('team_title') ) {
                            the_field('team_title');
                        }
                    ?>
                </h1>
                <p>
                    <?php
                        if ( get_field('team_description') ) {
                            the_field('team_description');
                        }
                    ?>
                </p>
            </div>

        </div>

    </div>

        <?php
            $count_posts    = wp_count_posts('original_members');
            $post_rows      = 4;
            $group          = array();
            $group_split    = array();


            $args           = array('post_type' => 'original_members');
            $loop           = new WP_Query($args);

        ?>

        <?php
                while ( $loop->have_posts() ) : $loop->the_post();

                    $m_title                    = get_field('opp_member_title');
                    $m_desc                     = get_field('opp_member_description');
                    $extraArray                 = array();

                    while ( have_rows('opp_member_extras') ) : the_row();

                        $extra_label            = get_sub_field('opp_member_label');
                        $extra_label_content    = get_sub_field('opp_member_content');
                        $extraAttr = "<span class='extra-label'>" . $extra_label . ": " . "</span>" . "<span class='extra-content'>" . $extra_label_content . "</span>";

                        array_push( $extraArray, $extraAttr);

                    endwhile;

                    if(has_post_thumbnail()){
                        $thumb_id               = get_post_thumbnail_id();
                        $thumb_url_array        = wp_get_attachment_image_src($thumb_id, 'member-image', true);
                        $thumb_url              = $thumb_url_array[0];
                    }else{
                        $thumb_url = "http://placehold.it/117x117";
                    }

                    array_push( $group, array( get_the_title() , $thumb_url , $m_title , $m_desc, $extraArray ) );

                endwhile;
        ?>

        <?php

            $group_split = array_chunk( $group, $post_rows );

            foreach($group_split as $k=>$v ){ ?>


            <article class="member-area">

                <div class="container">

                    <div class="row">

                    <?php

                        foreach($v as $vv){

                            switch($vv[2]):
                                case 'Founder':
                                $type = "gold";
                                break;
                                case 'Officer':
                                $type = "silver";
                                break;
                                case 'Member':
                                $type = "bronze";
                                break;
                            endswitch

                        ?>
                            <div class='col-lg-3 col-md-3 col-sm-6 item'>

                                <div class='member'>

                                    <img src='<?php echo $vv[1] ?>'>
                                    <div class='name'><?php echo $vv[0] ?></div>
                                    <div class='title'><?php echo $vv[2] ?></div>
                                    <div class='star <?php echo $type ?>'></div>

                                    <div class='extra'>

                                        <div class="container">

                                            <div class="row">

                                                <div class="col-lg-8 col-lg-offset-2">

                                                    <div class='extra-content'>
                                                        <span class='close-btn'><i class='fa fa-times'></i></span>
                                                        <div class='name'><?php echo $vv[0] ?></div>
                                                        <div class='title'><?php echo $vv[2] ?></div>
                                                        <p class='description'><?php echo $vv[3] ?></p>
                                                    </div>
                                                    <div class='attributes-content'>
                                                        <?php foreach($vv[4] as $extra){ ?>

                                                        <div class='attributes'>
                                                            <?php echo $extra ?>
                                                        </div>

                                                        <?php } ?>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div> <!-- end member -->

                            </div><!-- end item -->

                        <?php } ?>

                    </div>

                </div>

                <div class='extra-info-container'>

                </div>

            </article>
        <?php } ?>

            <?php wp_reset_postdata(); ?>

        </div>


</section>
