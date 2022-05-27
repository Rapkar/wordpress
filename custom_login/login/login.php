<?php

class custom_login
{
    // properties

    private $user_login;
    private $user_password;
    private $remember;
    // properties

    /*
    * _construct 
    * add actions 
    */
    function __construct()
    {

        add_action('login_enqueue_scripts', array($this, 'enqueue_my_script'));

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
        wp_localize_script('custom_wp_admin_js', 'custom_wp_admin_js_data', array('ajax_url' => admin_url('admin-ajax.php'), 'site' => get_template_directory_uri()));
    }


    // send mail of verificate code mached
    public function my_auth_login($user, $to)
    {
        if ($user) {
            
            $to_email = $to;
            $subject = "Simple Email Test via PHP";

            $body = "Hi,your code : " . get_user_meta($user->ID, 'verificate_code', true);
            $headers = "From: sender\'s email";

            if (mail($to_email, $subject, $body, $headers)) {
                #return ("Email send...");
            } else {
                #return ("Email sending failed...");
            }
        }
    }

    // Auth user
    // verify has user or not
    public function login_form_auth()
    {
        $this->user_login = $_POST['user_name'];
        $this->user_password = $_POST['user_password'];
        $this->remember = $_POST['remember'];
        $creds = array(
            'user_login'    =>  $this->user_login,
            'user_password' =>  $this->user_password,
            'remember'      =>  $this->remember
        );

        $user = wp_signon($creds, false);
        #if ( is_wp_error($user) ): $res= $user->get_error_message(); endif;
        wp_set_current_user($user->ID);
        update_user_meta($user->ID, 'verificate_code', rand(0, 9999));
        if (is_user_logged_in()) {
            $res = true;
        } else {
            $res = false;
        }
        $this->my_auth_login($user, $user->user_email);
        echo json_encode($res);
        die();
    }

    // verificate code mached
    public function verificate_code()
    {
        $creds = array(
            'user_login'    => $this->user_login,
            'user_password' => $this->user_password,
            'remember'      =>  $this->remember
        );
        $vercode = $_POST['verification_code'];
        $user = wp_signon($creds, false);
        #if ( is_wp_error($user) ): $res= $user->get_error_message(); endif;
        wp_set_current_user($user->ID);

        if (is_user_logged_in()) {
            if ($vercode == get_user_meta($user->ID, 'verificate_code', true)) {
                $res = true;
            }
        } else {
            $res = false;
        }

        echo json_encode($res);
        die();
    }
}


$custom_login = new custom_login;
