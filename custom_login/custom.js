jQuery(document).ready(function($) {
    $('form').on('submit', function(e) {
        // validation code here
        jQuery.fn.exists = function() {
            return this.length > 0;
        };
        e.preventDefault();
        var user_login = $('#user_login').val();
        var user_pass = $('#user_pass').val();
        var remember = $('#rememberme').val();
        $("<img id='loadinggift' style='max-width:100px' src=" + custom_wp_admin_js_data.site + "/inc2/assets/loading.gif'>").insertAfter('.user-pass-wrap');

        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: custom_wp_admin_js_data.ajax_url,
            data: { action: 'login_form_auth', user_name: user_login, user_password: user_pass, remember: remember },

            success: function(data) {
                $('#loadinggift').remove();
                if (data == true) {

                    if (!$("#verification_code").exists()) {
                        $("<p><label for='verification_code'>verification  code :</label><input type='text' name='verification_code' id='verification_code' class='input' value='' size='20' autocapitalize='off' autocomplete='verification_code'></p>").insertAfter('.user-pass-wrap');
                    }
                    $('#wp-submit').prop('disabled', true);

                } else {

                    location.reload();
                }
            },
            error: function(errorThrown) {
                location.reload();
            }
        });

    });
    jQuery(document).on('keyup', 'input[type = text]#verification_code', function() {
        var user_login = $('form #user_login').val();
        var user_pass = $('form #user_pass').val();
        var verification_code = $('form #verification_code').val();
        var remember = $('form #rememberme').val();
        jQuery.ajax({
            type: "post",
            dataType: "json",
            url: custom_wp_admin_js_data.ajax_url,
            data: { action: 'verificate_code', user_name: user_login, user_password: user_pass, remember: remember, verification_code: verification_code },
            success: function(data) {
                console.log(data);
                if (data == true) {
                    $('form').prop('disabled', false);
                    $('form').submit();
                    document.getElementById("loginform").submit();
                    console.log(data);

                } else {
                    // location.reload();
                }
            },
            error: function(errorThrown) {
                console.log(errorThrown);
            }
        });
    });



});