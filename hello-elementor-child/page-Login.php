<?php /* Template Name: empa login Page */ ?>
<?php
get_header();

?>
<div class="container login-form my-5 py-5">
    <h2 class="mb-5 pt-4">ÜYE GİRİŞİ - KAYIT</h2>
    <span class="line mb-5"></span>
    <div class="col-6 m-auto">
        <?php
        if (!is_user_logged_in()) {
            $args = array(
                'redirect' => admin_url(), // redirect to admin dashboard.
                'form_id' => 'empa_loginform',
                'label_username' => __('Username:'),
                'placeholder_username' => __('Your username...'),
                'label_password' => __('Password:'),
                'label_remember' => __('Beni hatırla'),
                'label_log_in' => __('GİRİŞ YAP'),
                'remember' => true
            );
            wp_login_form($args);
        } else {
            echo  '<a class="btn btn-success float-left mr-auto mb-5" href="' . get_dashboard_url() . '">return Dashboard</a>';
        }

        ?>
    </div>
    <span class="line mt-5"></span>
</div>
<?php
$err_codes = isset($_SESSION["err_codes"]) ? $_SESSION["err_codes"] : 0;
if ($err_codes !== 0) {
    echo display_error_message($err_codes);
}
function display_error_message($err_code)
{
    // Invalid username.
    if (in_array('invalid_username', $err_code)) {
        $error = '<strong>ERROR</strong>: Invalid username.';
    }
    // Incorrect password.
    if (in_array('incorrect_password', $err_code)) {
        $error = '<strong>ERROR</strong>: The password you entered is incorrect.';
    }
    // Empty username.
    if (in_array('empty_username', $err_code)) {
        $error = '<strong>ERROR</strong>: The username field is empty.';
    }
    // Empty password.
    if (in_array('empty_password', $err_code)) {
        $error = '<strong>ERROR</strong>: The password field is empty.';
    }
    // Empty username and empty password.
    if (in_array('empty_username', $err_code)  &&  in_array('empty_password', $err_code)) {
        $error = '<strong>ERROR</strong>: The username and password are empty.';
    }
    return $error;
}
?>
<script>
    // ********** ADD PLACEHOLDER ATTR TO INPUTS ********//
    jQuery('#user_login').attr('placeholder', 'E-Posta');
    jQuery('#user_pass').attr('placeholder', 'Şifre');
    // ********** ADD PLACEHOLDER ATTR TO INPUTS ********//

    // ********** ADD EXTRA BUTTON ********//
    jQuery('p.login-submit').append('<a href="<?= home_url('/register') ?>" id="wp-reg" class="wp-reg" >YENİ ÜYE</a>');
    // ********** ADD EXTRA BUTTON ********//
</script>
<?php
get_footer();
