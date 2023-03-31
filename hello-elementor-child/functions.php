<?php
require_once  'inc/cmb2/index.php';
//  if(function_exists()){
require_once  'inc/index.php';

//  }

// ********** ADD STYLES TO THEME ********//
add_action('wp_enqueue_scripts', 'empa_enqueue_styles');

function empa_enqueue_styles()
{

    wp_enqueue_style('bootstrap-css', esc_url(get_stylesheet_directory_uri()) . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_script('bootstrap-js', esc_url(get_stylesheet_directory_uri()) . '/js/bootstrap.min.js', array(), '1.0.0', true);
    # wp_enqueue_script('jquery', esc_url(get_stylesheet_directory_uri()) . '/js/jquery.js', array(), '1.0.0', true);
    wp_enqueue_script('custom', esc_url(get_stylesheet_directory_uri()) . '/js/custom.js', array('jquery-core'), '1.0.0', true);
    wp_localize_script('custom', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

    wp_enqueue_style('emap-swiper', get_stylesheet_directory_uri() . '/inc/widgets/assets/css/swiper-bundle.min.css');
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/inc/widgets/assets/css/main.css');
    wp_enqueue_script('emap-swiper', get_stylesheet_directory_uri() . '/inc/widgets/assets/js/swiper-bundle.min.js');
    wp_enqueue_script('emap-swiper-custom', get_stylesheet_directory_uri() . '/inc/widgets/assets/js/Swiper-custom.js', array('emap-swiper', 'jquery-core'), '1', true);

    $parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();

    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array('child-main'),
        2.2 // this only works if you have Version in the style header
    );
    wp_enqueue_style('child-main', get_template_directory_uri() . '/style.css', array(), '3.4.0');
}
// ********** ADD STYLES TO THEME ********//


// ********** CAN BE UPLOAD WEBP FILES ********//
function webp_upload_mimes($existing_mimes)
{
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';
    // return the array back to the function with our added mime type
    return $existing_mimes;
}

add_filter('mime_types', 'webp_upload_mimes');
//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path)
{
    if ($result === false) {
        $displayable_image_types = array(IMAGETYPE_WEBP);
        $info = @getimagesize($path);
        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }
    return $result;
}

// ********** CAN BE UPLOAD WEBP FILES ********//


// ********** EVENT CALENDER AJAX ********//
add_action('wp_ajax_load_events', 'load_events');
add_action('wp_ajax_nopriv_load_events', 'load_events');
function load_events()
{
    $post = json_encode(get_post($_POST['event_id']));
    $post = get_post($_POST['event_id']);
    $post->status_event = get_post_meta(get_the_ID(), 'status_event', true);
    $post->Organizer_event = get_post_meta(get_the_ID(), 'Organizer_event', true);

    $html = '
    <div class="row px-2 mt-2">
         <div class="col-lg-4">
           <img class="img-fluid" src="' . get_the_post_thumbnail_url($_POST['event_id']) . '">
          </div>
      <div class="col-lg-8 d-flex flex-column">
        <h2>' . $post->post_title . '</h2>
        <date>' . get_the_date('d M Y') . ' </date>
        <locate>' . get_post_meta($_POST['event_id'], 'status_event', true) . '</locate>
        <span>' . get_post_meta($_POST['event_id'], 'Organizer_event', true) . '</span>
        <p>' . $post->post_excerpt . ' </p>
      </div>
    </div>';
    echo $html;
    wp_die();
}

// ********** EVENT CALENDER AJAX ********//


// ********** ADD MENU FOR SIDEBAR ********//
register_nav_menus(array(
    'sidebar' => 'sidebare for subpage',
    'account' => 'account',
    'Header' => 'Header',
));

// ********** ADD MENU FOR SIDEBAR ********//



// ********** FAQS LOAD AJAX with CAT ID ********//
add_action('wp_ajax_empa_faqs_load', 'empa_faqs_load');
add_action('wp_ajax_nopriv_empa_faqs_load', 'empa_faqs_load');
function empa_faqs_load()
{
	if( $_POST['tag_id'] != 'all' ){
    $args = array(
        'post_type' => 'empa-faqs',
		
        'tax_query' => array(
            array(
                'taxonomy' => 'empa_faqs_tag',
                'field' => 'term_id',
                'terms' => $_POST['tag_id']
            )
        )
	
    );
}else{
	    $args = array(
        'post_type' => 'empa-faqs',
    );
}
    $query = new WP_Query($args);
    $html = '';
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

            $html .= '<div class="card">
    <div class="col-1 toggle" data-toggle="collapse" href="#collapse' . get_the_ID() . '"><span>+</span></div>
    <div class="card-header col-11 ">

      <a class="card-link" data-toggle="collapse" href="#collapse' . get_the_ID() . '">
       ' . get_the_title() . '
      </a>
    </div>

    <div id="collapse' . get_the_ID() . '" class="collapse " data-parent="#accordion">
      <div class="card-body">
  ' . get_post_meta(get_the_ID(), 'empa_answer_title', true) . '
      </div>
    </div>
  </div>';
        endwhile;
    endif;
    echo $html;
    wp_die();
}
// ********** FAQS LOAD AJAX with CAT ID ********//


// ********** FAQS LOAD AJAX with WORD ********//
add_action('wp_ajax_empa_faqs_load_serachbar', 'empa_faqs_load_serachbar');
add_action('wp_ajax_nopriv_empa_faqs_load_serachbar', 'empa_faqs_load_serachbar');
function empa_faqs_load_serachbar()
{
    $need = $_POST['slug'];
    global $wpdb;
    $need2 = "SELECT * FROM `{$wpdb->prefix}posts` WHERE `post_title` LIKE '%$need%' ";
    // SELECT * FROM `empa_posts` WHERE `post_title` LIKE '%AWS%'
    $html = '';
    $results = $wpdb->get_results("SELECT * FROM `{$wpdb->prefix}posts` WHERE `post_title` LIKE '%$need%' AND `post_status` LIKE 'publish' AND `post_type` LIKE 'empa-faqs' ");
    foreach ($results as $item) :
        $html .= '  <div class="card  ">
              <div class="col-1 toggle" data-toggle="collapse" href="#collapse' . $item->ID . '"><span>+</span></div>
              <div class="card-header col-11 ">

                <a class="card-link" data-toggle="collapse" href="#collapse' . $item->ID . '">
             ' . $item->post_title . '
                </a>
              </div>

              <div id="collapse' . $item->ID . '" class="collapse " data-parent="#accordion">
                <div class="card-body">
                ' . get_post_meta($item->ID, 'empa_answer_title', true) . '
                </div>
              </div>
            </div>';
    endforeach;
    echo   $html;
    wp_die();
}
// ********** FAQS LOAD AJAX with WORD ********//


// ********** REDIRECT TO CUSTOM LOGIN PAGE ********//
function redirect_login_page()
{
    $login_url  = home_url('/login');
    $url = basename($_SERVER['REQUEST_URI']); // get requested URL
    isset($_REQUEST['redirect_to']) ? ($url   = "wp-login.php") : 0; // if users ssend request to wp-admin
    if ($url  == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_url);
        exit;
    }
}
add_action('init', 'redirect_login_page');



function error_handler()
{
    $login_page  = home_url('/login');
    global $errors;
    $err_codes = $errors->get_error_codes(); // get WordPress built-in error codes
    $_SESSION["err_codes"] =  $err_codes;
    wp_redirect($login_page); // keep users on the same page
    exit;
}
add_filter('login_errors', 'error_handler');


// ********** REDIRECT TO CUSTOM LOGIN PAGE ********//

// ********** REDIRECT TO CUSTOM register PAGE ********//
function wpse_19692_registration_redirect()
{
    return home_url('/register');
}

add_filter('registration_redirect', 'wpse_19692_registration_redirect');

// ********** REDIRECT TO CUSTOM register PAGE ********//

// ********** REGISTER PAGE VALIDAE ********//
add_action('wp_ajax_empa_email_validate', 'empa_email_validate');
add_action('wp_ajax_nopriv_empa_email_validate', 'empa_email_validate');
function empa_email_validate()
{
    $email = $_POST['email'];

    if (email_exists($email) == '') {
        wp_send_json_success(['is free']);
    } else {
        wp_send_json_error(['is exist']);
    }

    wp_die();
}

// ********** REGISTER PAGE VALIDAE ********//


add_action('wp_ajax_empa_load_producer_cat_list', 'empa_load_producer_cat_list');
add_action('wp_ajax_nopriv_empa_load_producer_cat_list', 'empa_load_producer_cat_list');
function empa_load_producer_cat_list()
{
    $id = $_POST['id'];
    $html = '<ul>';
    $args = array(
        'type' => 'empa-producers',
        'taxonomy' => 'empa_producers_cats',
        'parent' => $id

    );
    $cats = get_categories($args);
    foreach ($cats as $cat) {
        $html .= '<li  class="">
            <a href="' . get_category_link($cat->term_id) . '">
                <img src="' . get_term_meta($cat->term_id, 'empat_producers_url', true) . '">
            </a>
        </li>';
    }
    $html .= '</ul>';

    wp_send_json_success(['html' => $html]);
    wp_die();
}
function menu_item_desc($item_id, $item)
{
    $menu_item_desc = get_post_meta($item_id, 'menu_img', true);
?>
    <label for="menu_img_<?php echo $item_id; ?>">Img Url:</label><br>
    <input type="hidden" class="nav-menu-id" value="<?php echo $item_id; ?>" />
    <input id="menu_img_<?php echo $item_id; ?>" name="menu_img[<?php echo $item_id; ?>]" type="text" value="<?= $menu_item_desc ?>">
<?php if (!empty($menu_item_desc)) {
        echo '<img src= "' . $menu_item_desc . '"></img>';
    }
}
add_action('wp_nav_menu_item_custom_fields', 'menu_item_desc', 10, 2);
function save_menu_item_desc($menu_id, $menu_item_db_id)
{
    if (isset($_POST['menu_img'][$menu_item_db_id]) && ($_POST['menu_img'][$menu_item_db_id] != '')) {
        $sanitized_data = sanitize_text_field($_POST['menu_img'][$menu_item_db_id]);

        update_post_meta($menu_item_db_id, 'menu_img', $sanitized_data);
    } else {
        delete_post_meta($menu_item_db_id, 'menu_img');
    }
}
add_action('wp_update_nav_menu_item', 'save_menu_item_desc', 10, 2);
function show_menu_item_desc($title, $item)
{
    if (is_object($item) && isset($item->ID)) {
        $menu_item_desc = get_post_meta($item->ID, 'menu_img', true);
        if (!empty($menu_item_desc)) {
            $title .= '<img src= "' . $menu_item_desc . '"></img>';
        }
    }
    return $title;
}
add_filter('nav_menu_item_title', 'show_menu_item_desc', 10, 2);


//user role
function empa_producer_role_support()
{

	add_role('producer', 'producer', array(
		'read' => True,
		'level_True0' => True,
		'level_9' => True,
		'level_8' => True,
		'level_7' => True,
		'level_6' => True,
		'level_5' => True,
		'level_4' => True,
		'level_3' => True,
		'level_2' => True,
		'level_True' => True,
		'level_0' => True,
		'vc_access_rules_post_types/cms_block'=> True,
        'edit_posts' => True,
		'delete_post' => True,
        'publish_posts' => True,
        'edit_psp_empa-producers'=>false,
        'edit_psp_empa-producers'=>false,
        'edit_psp_empa-producers'=>false,
        'edit_published_posts' => True,
		'edit_dashboard'=> True,

	));
    $role = get_role( 'producer' );
    $role->add_cap('upload_files');
}
add_action('init', 'empa_producer_role_support');

function empa_producer_role_access() {
    if( is_user_logged_in() ) {
        $user = wp_get_current_user();
        $roles = $user->caps['producer'];
       if(  $roles){
  
        global $wp_post_types;
        $wp_post_types['empa-producers']->cap->edit_posts = 'do_not_allow';
        $wp_post_types['empa-producers']->cap->create_posts  = 'do_not_allow';
        $wp_post_types['empa-producer-page']->cap->edit_posts = 'do_not_allow';
        $wp_post_types['empa-producer-page']->cap->create_posts  = 'do_not_allow';
        $wp_post_types['empa-faqs']->cap->edit_posts = 'do_not_allow';
        $wp_post_types['empa-faqs']->cap->create_posts  = 'do_not_allow';
        $wp_post_types['empa-events']->cap->edit_posts = 'do_not_allow';
        $wp_post_types['empa-events']->cap->create_posts  = 'do_not_allow';
        $wp_post_types['elementor_library']->cap->edit_posts = 'do_not_allow';
        $wp_post_types['elementor_library']->cap->create_posts  = 'do_not_allow';
        add_action( 'admin_menu', 'mf_remove_menu_pages' );
        function mf_remove_menu_pages() {
           remove_menu_page('edit-comments.php');
           remove_menu_page('edit.php?post_type=elementor_library&tabs_group=library');
           remove_menu_page('edit.php?post_type=elementor_library');
           remove_menu_page('tools.php');
           remove_menu_page( 'wpcf7' );
           remove_menu_page( 'upload.php' );
        }
       }
    }
}
add_action('init', 'empa_producer_role_access');

function empa_post_publish_by_brand( $new_status, $old_status, $post ) {
    if ( $new_status == 'publish' && $old_status != 'publish' && ! is_admin() ) {
            update_post_meta($post->ID,'by_brand',get_user_meta(get_current_user_id(),'empa_user_user_cat_id',true));

    }
}
add_action('transition_post_status', 'empa_post_publish_by_brand', 10, 3 );