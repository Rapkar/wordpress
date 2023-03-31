<?php

function create_post_type_events()
{
	register_post_type(
		'empa-events',

		array(
			'labels' => array(
				'name' => __('events'),
				'singular_name' => __('events')
			),
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'menu_icon'  => 'dashicons-clock'
		)
	);
	add_post_type_support( 'empa-events', ['excerpt','thumbnail'] );
}
add_action('init', 'create_post_type_events');

add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'event detail',
		'title'         => __( 'Organizer', 'cmb2' ),
		'object_types'  => array( 'empa-events' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );
	$cmb->add_field( array(
		'name'       => __( 'status', 'cmb2' ),
		'desc'       => __( 'status : Online Etkinlink', 'cmb2' ),
		'id'         => 'status_event',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	// Regular text field
// 	$cmb->add_field( array(
// 		'name'       => __( 'Organizer', 'cmb2' ),
// 		'desc'       => __( 'Organizer name : john doe', 'cmb2' ),
// 		'id'         => 'Organizer_event',
// 		'type'       => 'text',
// 		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
// 		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
// 		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
// 		// 'on_front'        => false, // Optionally designate a field to wp-admin only
// 		// 'repeatable'      => true,
// 	) );
	$cmb->add_field( array(
		'name'       => __( 'Calender_title', 'cmb2' ),
		'desc'       => __( 'Calender title : john doe', 'cmb2' ),
		'id'         => 'calender_title_event',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );
	
	$cmb->add_field( array(
		'name'       => __( 'Calender_link', 'cmb2' ),
		'desc'       => __( 'EXT link : http://', 'cmb2' ),
		'id'         => 'calender_link_event',
		'type'       => 'text',
		'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );
}

