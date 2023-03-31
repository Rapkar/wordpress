<?php

add_action( 'cmb2_admin_init', 'cmb2_subpage_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_subpage_metaboxes() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'subpage_background',
		'title'         => __( 'background', 'cmb2' ),
		'object_types'  => array( 'page','empa-producer-page' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
        'show_on' => array( 'key' => 'page-template', 'value' => ['page-sub.php','page-producers.php','page-producers-cat.php'] ),
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );
	$cmb->add_field( array(
		'name'       => __( 'background', 'cmb2' ),
		'desc'       => __( 'background : http...', 'cmb2' ),
		'id'         => 'subpage_background_url',
		'type'       => 'file',
		 // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );
}
if(is_super_admin()){
add_action( 'cmb2_admin_init', 'cmb2_post_metaboxes' );
}
/**
 * Define the metabox and field configurations.
 */
function cmb2_post_metaboxes() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'post_brand_cat_id',
		'title'         => __( 'brand', 'cmb2' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
   
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );
    $args = array(
        'type' => 'empa-producers',
        'taxonomy' => 'empa_producers_cats',
        'orderby' => 'ID',
    );

    $cats = get_categories($args);
    $producer_cats_pages = [];
    foreach ($cats  as $item) {
        $producer_cats_pages[$item->term_id] = $item->name .'[ ID => '.$item->term_id.' ]';
    }
    $cmb->add_field(array(
        'name'       => __('brand', 'cmb2'),
        'desc'       => __('brand :...', 'cmb2'),
        'id'         => 'wp_post_brand_cat_id',
        'type'       => 'select',
        'options'          => $producer_cats_pages,
    ));
}