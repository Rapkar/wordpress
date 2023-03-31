<?php
function create_post_type_producerpage()
{
    register_post_type(
        'empa-producer-page',

        array(
            'labels' => array(
                'name' => __('Categories pages'),
                'singular_name' => __('Categories pages')
            ),
            // 'taxonomies' => array( 'post_tag' ),
             'hierarchical' => true,
			        'rewrite' => array(
            'slug'       => 'empa-producer-page',
            'with_front' => false,
        ),
            'public' => true,
            'show_in_rest' => true,
            'has_archive' => true,
            'menu_icon'  => 'dashicons-feedback',
			'supports'           => array('title' ,  'page-attributes', 'editor', 'author', 'excerpt','something-else'),
        )

    );
}
add_action('init', 'create_post_type_producerpage');



add_action('cmb2_admin_init', 'cmb2_simple_empa_producerpage');
/**
 * Define the metabox and field configurations.
 */
function cmb2_simple_empa_producerpage()
{

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box(array(
        'id'            => 'empat_producers_cat_id',
        'title'         => __('Logo', 'cmb2'),
        'object_types'  =>  array('empa-producer-page'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ));

    $args = array(
        'type' => 'empa-producers',
        'taxonomy' => 'empa_producers_cats',
        'orderby' => 'ID',
        'parent' => 0
    );

    $cats = get_categories($args);
    $producer_cats_pages = [];
    foreach ($cats  as $item) {
        $producer_cats_pages[$item->term_id] = $item->name;
    }
    $cmb->add_field(array(
        'name'       => __('page', 'cmb2'),
        'desc'       => __('page :...', 'cmb2'),
        'id'         => 'empat_producers_cat_id',
        'type'       => 'select',
        'options'          => $producer_cats_pages,
    ));
	    $cmb->add_field(array(
        'name'       => __('Logo', 'cmb2'),
        'desc'       => __('Logo :...', 'cmb2'),
        'id'         => 'empat_producers_cat_page_logo',
        'type'       => 'file',
    ));
}
