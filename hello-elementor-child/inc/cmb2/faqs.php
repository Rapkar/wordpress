<?php

function create_post_type_faqs()
{
	register_post_type(
		'empa-faqs',

		array(
			'labels' => array(
				'name' => __('faqs'),
				'singular_name' => __('faqs')
			),
			// 'taxonomies' => array( 'post_tag' ),
			'public' => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'menu_icon'  => 'dashicons-feedback',
			'taxonomies' => array('empa_faqs_tag'),
		)
		
	);
	add_post_type_support( 'empa-faqs', ['excerpt',''] );
	register_taxonomy('empa_faqs_tag', 'empa-faqs',['show_in_rest' => true]);
}
add_action('init', 'create_post_type_faqs');

add_action( 'cmb2_admin_init', 'cmb2_simple_empa_faqs' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_simple_empa_faqs() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'empat_faqs_detail',
		'title'         => __( 'Answer', 'cmb2' ),
		'object_types'  =>  array( 'empa-faqs' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );
	$cmb->add_field( array(
		'name'       => __( 'Answer', 'cmb2' ),
		'desc'       => __( 'Answer :...', 'cmb2' ),
		'id'         => 'empa_answer_title',
		'type'       => 'wysiwyg',
		'show_on_cb' => 'cmb2_hide_if_no_cats',
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );



}

