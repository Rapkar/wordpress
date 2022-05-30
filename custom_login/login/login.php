<?php

class custom_login
{
    // properties

    private $user_login;
    private $user_password;
    private $remember;
    private $verification_code;
    // properties

    /*
    * _construct 
    * add actions 
    */
    function __construct()
    {
       
        $this->user_login = $_POST['user_name'];
        if (!is_user_logged_in()) {

           # add_action('init', 'ajax_login_init');
            add_action('init', array($this, 'enqueue_my_script'));
        }
        // add_action('login_enqueue_scripts', array($this, 'enqueue_my_script'));
       # add_action('wp_enqueue_scripts', array($this, 'enqueue_my_script'));

        add_action('wp_ajax_login_form_auth', array($this, 'login_form_auth'));
        add_action('wp_ajax_nopriv_login_form_auth', array($this, 'login_form_auth'));

        add_action('wp_ajax_verificate_code',  array($this, 'verificate_code'));
        add_action('wp_ajax_nopriv_verificate_code',  array($this, 'verificate_code'));
    }

  

    // register styles
    // add js and css file of login page
    public function enqueue_my_script()
    {
        wp_register_script('custom_wp_admin_js', get_template_directory_uri() . '/inc2/custom.js', ['jquery-core'], '1.0.0', true);
        wp_enqueue_script('custom_wp_admin_js');
        wp_localize_script('custom_wp_admin_js', 'custom_wp_admin_js_data', array('ajax_url' => admin_url('admin-ajax.php'), 'site' => get_template_directory_uri(),'ajax_nonce'=> wp_create_nonce( "wpdocs-special-string" )));

    }


    // send mail of verificate code mached
    public function my_auth_login($user, $to)
    {
        if ($user) {
            
            $to_email = $to;
            $subject = site_url() ." : verificate_code";
            

          $body = "Hi,your code : " . get_user_meta($user->ID, 'verificate_code', true);
        
            $headers = "From:".site_url();

            if (mail($to_email, $subject, $body, $headers)) {
                #return ("Email send...");
            } else {
                #return ("Email sending failed...");
            }
        }
        wp_logout();
    }
//     private function set_login_info($user_login,$user_password,$remember,$verification_code=null){
//         $this->user_login = $user_login;
//         $this->user_password = $user_password;
//         $this->remember = $remember;
//         $this->verification_code = $verification_code;
//    }
//    private function get_login_info(){
//    $result= array('login'=> $this->user_login,
//     'pass'=> $this->user_password,
//     'remember'=>  $this->remember,
//     'verification' => $this->verification_code);
//     return $result;
// }
    // Auth user
    // verify has user or not

    public function login_form_auth()
    {
       #check_ajax_referer( 'ajax-login-nonce', 'security' );

      # $this->set_login_info($_POST['user_name'],$_POST['user_password'],$_POST['remember']);
        $creds = array(
            'user_login'    =>  $_POST['user_name'],
            'user_password' =>  $_POST['user_password'],
            'remember'      =>  $_POST['remember']
        );
      
        $user = wp_signon($creds, false );
        #if ( is_wp_error($user) ): $res= $user->get_error_message(); endif;
       
        if (!is_wp_error($user)) {
            wp_set_current_user($user->ID);
            update_user_meta($user->ID, 'verificate_code', rand(0, 9999));
            $res = true;
        } else {
            $res = false;
        }
        $this->my_auth_login($user, $user->user_email);
        echo json_encode($res);
      
        die();
    }

    // verificate code mached
    public function verificate_code( $user_login)
    {
        $creds = array(
            'user_login'    =>  $_POST['user_name'],
            'user_password' =>  $_POST['user_password'],
            'remember'      =>  $_POST['remember']
        );
        
        $vercode = $_POST['verification_code'];
        $user = wp_signon($creds, false );
        #if ( is_wp_error($user) ): $res= $user->get_error_message(); endif;
        if (!is_wp_error($user) ) {
            wp_set_current_user($user->ID);
            if ($vercode == get_user_meta($user->ID, 'verificate_code', true)) {
                $res = true;
            }
        } else {
            $res = $user_login;
        }

        echo json_encode($res);
        die();
    }
}


$custom_login = new custom_login;
