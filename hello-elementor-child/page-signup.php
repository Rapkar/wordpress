<?php /* Template Name: empa register page*/ ?>

<?php

get_header();
global $current_user;
wp_get_current_user();
wp_enqueue_script('jquery_validate', get_stylesheet_directory_uri() . '/js/jquery.validate.min.js', [], '1', false);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$tckimkickno = $_POST['tckimkickno'];
$acceptance_1 = $_POST['acceptance-1'];
$acceptance_2 = $_POST['acceptance-2'];
$acceptance_3 = $_POST['acceptance-3'];
$acceptance_4 = $_POST['acceptance-4'];
$acceptance_5 = $_POST['acceptance-5'];
$inputs = ['firstname', 'lastname', 'email', 'password', 'tckimkickno', 'acceptance-1'];
function validate_inputs(array $arr)
{
    $count = 0;
    foreach ($arr as $item) {
        if (isset($_POST[$item]) && $_POST[$item]  != '' && !empty($_POST[$item])) {
            $count++;
        }
    }
    if ($count == count($arr)) {
        return true;
    }
}


if (validate_inputs($inputs) && email_exists($email) == false) {
    // TODO: Do more rigorous validation on the submitted data

    // TODO: Generate a better login (or ask the user for it)
    $login = $firstname . $lastname;

    // TODO: Generate a better password (or ask the user for it)


    // TODO: Ask the user for an e-mail address


    // Create the WordPress User object with the basic required information
    $user_id = wp_create_user($login, $password, $email);

    if (!$user_id || is_wp_error($user_id)) {
    }

    $userinfo = array(
        'ID' => $user_id,
        'first_name' => $firstname,
        'last_name' => $lastname,
        'email' => $email,
        'tckimkickno' => $tckimkickno
    );

    // Update the WordPress User object with first and last name.
    wp_update_user($userinfo);

    // Add the company as user metadata
    update_user_meta($user_id, 'tckimkickno', $tckimkickno);
    update_user_meta($user_id, 'user_pass', $password);
    update_user_meta($user_id, 'show_admin_bar_front', false);
    echo "<script type='text/javascript'>
   window.location = '" . wp_login_url() . "';
</script>";
}

if (is_user_logged_in()) : ?>

    <p>You're already logged in and have no need to create a user profile.</p>

    <?php else : while (have_posts()) : the_post(); ?>

        <div id="page-<?php the_ID(); ?>" class="container register-page pt-5">
            <h2 class="mt-5"><?php the_title(); ?></h2>
            <span class="line my-5"></span>
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" class="col-lg-7 m-auto emap-register-form" method="post">
                <div class="row mb-4">
                    <div class="firstname col-lg-6 col-12">
                        <input name="firstname" class="w-100" required id="firstname" placeholder="Ad" value="<?php echo esc_attr($firstname) ?>">
                    </div>
                    <div class="lastname col-lg-6 col-12">
                        <input name="lastname" id="lastname" required class="w-100" placeholder="Soyad" value="<?php echo esc_attr($lastname) ?>">
                    </div>
                </div>

                <div class="email col-12 px-0  mb-4">
                    <input name="email" class="w-100" id="email" required placeholder="email" value="<?php echo esc_attr($email) ?>">
                </div>
                <div class="tckimkickno col-12 px-0  mb-4">
                    <input name="tckimkickno" class="w-100" type="text" required id="tckimkickno" placeholder="TC Kimlik No" value="<?php echo esc_attr($tckimkickno) ?>">
                </div>
                <div class="password col-12 px-0  mb-4">
                    <input name="password" class="w-100" type="password" id="password" required placeholder="Şifre" value="<?php echo esc_attr($password) ?>">
                </div>
                <div class="repassword col-12 px-0  mb-4">
                    <input name="repassword" class="w-100" type="password" id="repassword" placeholder="Şifre yeniden" value="<?php echo esc_attr($password) ?>">
                </div>
                <label class="d-flex mb-3">
                    <input type="checkbox" name="acceptance-1" required value="1" class="ml-0" aria-invalid="false">
                    <span><a href="#">Ticari Elektronik İleti Onayı</a> metnini okudum, onaylıyorum. Tarafınızdan gönderilecek bilgilendirme e-postalarını almak istiyorum.<br>
                </label>
                <label class="d-flex  mb-3">
                    <input type="checkbox" name="acceptance-2" required value="1" class="ml-0" aria-invalid="false">
                    <span><a href=""> Elektronik İleti Onayı</a> metnini okudum, onaylıyorum. Tarafınızdan gönderilecek bilgilendirme sms’lerini almak istiyorum.<br>
                </label>
                <label class="d-flex  mb-3">

                    <input type="checkbox" name="acceptance-3" required value="1" class="ml-0" aria-invalid="false">
                    <span><a href="#">Ticari Elektronik İleti Onayı</a> metnini okudum, onaylıyorum. Tarafınızdan yapılacak bilgilendirme arama’larını almak istiyorum.<br>
                </label>
                <label class="d-flex  mb-3">
                    <input type="checkbox" name="acceptance-4" required value="1" class="ml-0" aria-invalid="false">
                    <span><a href="#">Üyelik sözleşmesini</a> Okudum, Kabul Ediyorum.<br>
                </label>
                <label class="d-flex  mb-3">
                    <input type="checkbox" name="acceptance-5" required value="1" class="ml-0" aria-invalid="false">
                    <span><a href="#"><a href="#">KVKK sözleşmesini</a> Okudum, Kabul Ediyorum.<br>
                </label>
                <div class="offset-lg-6 col-6 d-flex justify-content-end mb-5 px-0 mt-5">
                    <div class="col-12 d-flex justify-content-end mb-5 px-0"> <a href="<?= home_url('/login') ?>" id="wp-reg" class="wp-reg">GİRİŞ YAP</a>
                        <button>ÜYE OL</button>
                    </div>


                </div>

            </form>
        </div>
        <script>
            // ********** REGISTER FORM VALIDATE ********//
            jQuery('#repassword').keyup(function() {
                if (jQuery(this).val() != jQuery('#password').val()) {
                    jQuery(this).css('background-color', '#f5000057 ');
                } else {
                    jQuery(this).css('background-color', '#FCFCFC');
                }
            })
            jQuery('#email').keyup(function() {
                jQuery.ajax({
                    url: "<?= admin_url('admin-ajax.php'); ?>",
                    type: "POST",
                    data: {
                        'action': 'empa_email_validate',
                        'email': jQuery('#email').val() + ' ',
                    }
                }).done(function(response) {
                    if (response.success == true) {
                        jQuery('#email').css('background-color', '#a8e7a3');
                    } else {
                        jQuery('#email').css('background-color', '#f5000057 ');

                    }
                });
            })
            // ********** REGISTER FORM VALIDATE ********//
        </script>

<?php endwhile;
endif;
get_footer();
?>