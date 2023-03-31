<?php
function create_post_type_producers()
{
    register_post_type(
        'empa-producers',
        array(
            'labels' => array(
                'name' => __('Producers'),
                'singular_name' => __('Producers')
            ),
            // 'taxonomies' => array( 'post_tag' ),
            'public' => true,
            'show_in_rest' => true,
            'has_archive' => true,
            'menu_icon'  => 'dashicons-welcome-write-blog',
            'taxonomies' => array('empa_producers_tag'),
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        )
    );

    // add_post_type_support( 'empa-producers', ['excerpt',''] );
    register_taxonomy('empa_producers_tag', 'empa-producers', ['show_in_rest' => true]);
    register_taxonomy('empa_producers_cats', 'empa-producers', ['show_in_rest' => true, 'hierarchical' => true]);
}
add_action('init', 'create_post_type_producers');



add_action('cmb2_admin_init', 'cmb2_simple_empa_producers');
/**
 * Define the metabox and field configurations.
 */
function cmb2_simple_empa_producers()
{

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box(array(
        'id'            => 'empat_producers_detail',
        'title'         => __('Logo', 'cmb2'),
        'object_types'  =>  array('term'), // Post type
        'taxonomies'       => array('term', 'empa_producers_cats'),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ));
    $cmb->add_field(array(
        'name'       => __('Logo', 'cmb2'),
        'desc'       => __('Logo :...', 'cmb2'),
        'id'         => 'empat_producers_url',
        'type'       => 'file',
        'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ));
    $args = array(
        'post_type'   => 'empa-producers',
        'order'       => 'ASC',
        'orderby'     => 'title'
    );
    $producer_pages = get_posts($args);
    $producer_cats_pages = [];

    foreach ($producer_pages as $item) {
        $producer_cats_pages[$item->ID] = get_the_title($item->ID);
    }
    $args_about = array(
        'post_type'   => 'empa-producer-page',
        'order'       => 'ASC',
        'orderby'     => 'title'
    );
    $producer_pages = get_posts( $args_about);
    $producer_cats_pages_about = [];

    foreach ($producer_pages as $item) {
        $producer_cats_pages_about[$item->ID] = get_the_title($item->ID);
    }
    $cmb->add_field(array(
        'name'       => __('Page', 'cmb2'),
        'desc'       => __('Page :...', 'cmb2'),
        'id'         => 'empat_producers_url_page',
        'type'       => 'select',
        'options'          => $producer_cats_pages,
    ));
    $cmb->add_field(array(
        'name'       => __('About', 'cmb2'),
        'desc'       => __('About :...', 'cmb2'),
        'id'         => 'empat_producers__page_about',
        'type'       => 'select',
        'options'          => $producer_cats_pages_about,
    ));
    $cmb->add_field(array(
        'name'       => __('Brand url', 'cmb2'),
        'desc'       => __('Brand url :...', 'cmb2'),
        'id'         => 'empat_producers_url_Brand',
        'type'       => 'oembed',
    ));
    $cmb->add_field(array(
        'name'       => __('Brand content', 'cmb2'),
        'desc'       => __('Brand content :...', 'cmb2'),
        'id'         => 'empat_producers_content',
        'type'       => 'wysiwyg',
    ));
}
add_action('cmb2_admin_init', 'cmb2_simple_empa_producer_single');
/**
 * Define the metabox and field configurations.
 */
function cmb2_simple_empa_producer_single()
{
    $cmb = new_cmb2_box(array(
        'id'            => 'empat_producers_single_cat_id_bo',
        'title'         => __('Logo', 'cmb2'),
        'object_types'  =>  array('empa-producers'), // Post type
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
    );

    $cats = get_categories($args);
    $producer_cats_pages = [];
    foreach ($cats  as $item) {
        $producer_cats_pages[$item->term_id] = $item->name .'[ ID => '.$item->term_id.' ]';
    }
    $cmb->add_field(array(
        'name'       => __('page', 'cmb2'),
        'desc'       => __('page :...', 'cmb2'),
        'id'         => 'empat_producers_single_cat_id',
        'type'       => 'select',
        'options'          => $producer_cats_pages,
    ));
}