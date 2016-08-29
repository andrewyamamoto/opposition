<?php
if( !defined( 'ABSPATH' ) )
    exit;


$setting    =    array(

    'settings'  =>  array(
        'section_general_settings'     => array(
            'name' => __( 'General settings', 'yith-donations-for-woocommerce' ),
            'type' => 'title',
            'id'   => 'ywcds_section_general'
        ),

        'projecy_name'  =>  array(
            'name'  =>  __( 'Donation Label ', 'yith-donations-for-woocommerce'),
            'desc'  =>  __( 'Enter your Donation label', 'yith-donations-for-woocommerce' ),
            'type'  =>  'text',
            'id'    =>  'ywcds_message_for_donation',
            'std'   =>  __( 'Enter a donation', 'yith-donations-for-woocommerce' ),
            'default'   =>  __( 'Enter a donation', 'yith-donations-for-woocommerce' ),
        ),

        'select_product_for_donation'   =>  array(
            'type'          =>  'ajax-products',
            'id'            =>  'ywcds_product_donation',
            'name'          =>  __( 'Select a product', 'yith-donations-for-woocommerce' ),
            'desc'          =>  __( 'Choose a product to associate with the donation', 'yith-donations-for-woocommerce' ),
            'ajax_action'   =>  'woocommerce_json_search_products',
            'placeholder'  =>  __( 'Search for a product', 'yith-donations-for-woocommerce' ),
            'multiple'      =>  'false',
            'std'       =>  '',
            'default'   =>  ''
        ),

        'link_product_donation' =>  array(
            'name'  =>  '',
            'desc'  =>  '',
            'type'  =>  'donation-product-link',
            'link_text'  =>  __( 'click here', 'yith-donations-for-woocommerce' ),
            'before_text'   =>  __( 'To let the plugin work correctly, a special product has been created to manage your donations. ', 'yith-donations-for-woocommerce' ),
            'after_text'   =>  __(' Show it', 'yith-donations-for-woocommerce' ),
            'post_id'   =>  get_option( '_ywcds_donation_product_id' ),
            'id'    =>  'ywcds_product_link'
        ),

        'section_general_settings_end' => array(
            'type' => 'sectionend',
            'id'   => 'ywtm_section_general_end'
        )
    )
);

return apply_filters( 'yith_wc_donations__free_settings', $setting );