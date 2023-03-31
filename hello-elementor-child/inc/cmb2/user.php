<?php

if(is_super_admin()){
add_action('cmb2_admin_init', 'empa_user_cat_id_metabox');
}
/**
 * Hook in and add a metabox to add fields to the user profile pages
 */
function empa_user_cat_id_metabox()
{
    $prefix = 'empa_user_';
    $cmb_user = new_cmb2_box(array(
        'id'               => $prefix . 'user_cat',
        'title'            => __('User Profile Metabox', 'cmb2'), // Doesn't output for user boxes
        'object_types'     => array('user'), // Tells CMB2 to use user_meta vs post_meta
        'show_names'       => true,
        'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
    ));

    $args = array(
        'type' => 'empa-producers',
        'taxonomy' => 'empa_producers_cats',
        'orderby' => 'ID',
    );

    $cats = get_categories($args);
    $producer_cats_pages = [];
    foreach ($cats  as $item) {
        $producer_cats_pages[$item->term_id] = $item->name;
    }
    $cmb_user->add_field(array(
        'name'       => __('For brand', 'cmb2'),
        'desc'       => __('just can be add post fo this brand :...', 'cmb2'),
        'id'       => $prefix . 'user_cat_id',
        'type'       => 'select',
        'options'          => $producer_cats_pages,
    ));
}
