<?php
if( !defined( 'ABSPATH' ) )
    exit;

if( !class_exists( 'YITH_Donations_Form_Widget' ) ) {

    class YITH_Donations_Form_Widget extends WP_Widget
    {

        public function __construct()
        {
            parent::__construct(
                'yith_wc_donations_form',
                __('YITH Donations for WooCommerce - Form', 'yith-donations-for-woocommerce'),
                array('description' => __('Add a simple form to add donations into your cart!', 'yith-donations-for-woocommerce'))
            );
        }


        public function form( $instance )
        {

            $title = isset( $instance['title'] ) ? $instance['title'] : '';

            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title'));?>"><?php _e('Title', 'yith-donations-for-woocommerce');?></label>
                <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title'));?>"
                       name="<?php echo esc_attr($this->get_field_name('title'));?>" value="<?php echo $title;?>"/>
            </p>
        <?php

        }


        public function update($new_instance, $old_instance) {

            $instance   =   array();

            $instance['title']  =   isset( $new_instance['title'] ) ? $new_instance['title'] : '';


            return $instance;

        }


        public function widget( $args, $instance ){

            global $YITH_Donations;
            $args_form   =   array(
                'project' =>  get_option( 'ywcds_project_title' ),
                'button_class'  =>  'button alt',
                'product_id'    =>  get_option( '_ywcds_donation_product_id' ),
                'button_text'   =>  $YITH_Donations->get_message( 'text_button' )
            );

            echo $args['before_widget'];
            echo $args['before_title'].$instance['title'].$args['after_title'];
            echo yith_wcds_get_template( 'add-donation-form-widget.php', $args_form, true );
            echo $args['after_widget'];
        }
    }
}