jQuery(document).ready(function($) {


    $("#submit-billing-form").on("click", function() {
        var firstname = $('input[name="shipping_first_name"]').val();
        var lastname = $('input[name="shipping_last_name"]').val();
        var adress = $('input[name="shipping_address_1"]').val();
        var city = $('input[name="shipping_city"]').val();
        var state = $('input[name="shipping_state"]').val();
        var postcode = $('input[name="shipping_postcode"]').val();

        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: {
                action: 'shipping_post_ajax',
                newaddress: {
                    'firstname': firstname,
                    'lastname': lastname,
                    'adress': adress,
                    'city': city,
                    'state': state,
                    'postcode': postcode
                }
            },
            success: function(response) {
                var data = JSON.parse(response);
                $(".general-styles.ordersummary p.customer_address").html(data.address);
                $("#user_name_shipping").html(data.name);

                $('#exampleModal').modal('hide');
            }
        });

    })

    $("#shipping_method input").on('click', function() {
        /* $('.widget').hide();
        $("#shipping_method li").removeClass('actived');
        $(this).parent().addClass('actived');
        $('.widget[attr-swich="' + $(this).attr('id') + '"]').toggle();

*/
    })
    $('.bime_value input[type="radio"]').on('click', function() {
        var cost = $(this).val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: {
                action: 'shipping_post_bimeh_ajax',
                cost: cost
            },
            success: function(response) {
                jQuery('body').trigger('update_checkout');
                $('div[attr-target="1"]').attr('attr-active', 'true');
                $('div[attr-target="2"]').attr('attr-active', 'true');
            }
        });
        $('.bime_value input[type="range"').on('change', function() {
            var cost = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: ajax_posts.ajaxurl,
                data: {
                    action: 'shipping_post_bimeh_ajax',
                    cost: cost
                },
                success: function(response) {
                    jQuery('body').trigger('update_checkout');
                    $('div[attr-target="1"]').attr('attr-active', 'true');
                    $('div[attr-target="2"]').attr('attr-active', 'true');
                }
            });
        })
    })


    $('input[type="range"]').on('change', function() {
        var se = $(this).attr('attr-detect');
        $('#' + se).html($(this).val());
        $('#' + se).val($(this).val());
        $('input[attr-detect="waching"]').val($(this).val());

    })
    $('#terminal_adress_register').on('click', function(e) {
        e.preventDefault();
        $(this).html('...');

        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: {
                action: 'shipping_post_terminaladdressvalue_ajax',
                url: $('#terminaladdressvalue').val()
            },
            success: function(response) {
                $(this).html('ثبت شد');
                jQuery('body').trigger('update_checkout');
                $('div[attr-target="1"]').attr('attr-active', 'true');
                $('div[attr-target="2"]').attr('attr-active', 'true');
            }
        });
    })
    $('#terminal_adress_register').on('click', function(e) {
        e.preventDefault();
        $(this).html('...');

        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: {
                action: 'shipping_post_terminaladdressvalue_ajax',
                url: $('#terminaladdressvalue').val()
            },
            success: function(response) {
                $('#terminal_adress_register').html('ثبت شد');
                jQuery('body').trigger('update_checkout');
                $('div[attr-target="1"]').attr('attr-active', 'true');
                $('div[attr-target="2"]').attr('attr-active', 'true');
            }
        });
    })
    $('#terminal_adress_register2').on('click', function(e) {
        e.preventDefault();
        $(this).html('...');

        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: {
                action: 'shipping_post_terminaladdressvalue_ajax',
                url: $('#terminaladdressvalue2').val()
            },
            success: function(response) {
                $('#terminal_adress_register2').html('ثبت شد');
                jQuery('body').trigger('update_checkout');
                $('div[attr-target="1"]').attr('attr-active', 'true');
                $('div[attr-target="2"]').attr('attr-active', 'true');
            }
        });
    })
    $('#payment .input-radio').on('click', function() {
        $(this).removeClass('actived');
        $(this).addClass('actived');
    })
    $("#shipping_method input").on('click', function() {
        $('.widget').hide();
        console.log($(this).closest('li').attr('attr'));
        $("#shipping_method li").removeClass('actived');
        $(this).parent().addClass('actived');
        $('.widget[attr-swich="' + $(this).closest('li').attr('attr') + '"]').toggle();
        var cost = $(this).attr('attr-bimeh');
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: {
                action: 'shipping_post_bimeh_ajax',
                cost: cost
            },
            success: function(response) {
                jQuery('body').trigger('update_checkout');
                $(this).parent().addClass('actived');
                console.log(cost);
            }
        });


    })
    $("#deliveryrtypes").on('change', function() {
        var model = $(this).val();

        var old_user = {}
        if ($(this).val() == 'privacydelivery') {

            $('#pravacy_peyk_register').on('click', function(e) {

                var username = $('#pravacy_peyk_name_1').val();
                var usercode = $('#pravacy_peyk_natinalcode_1').val();
                var phonenumber = $('#pravacy_peyk_phonecode_1').val();
                var user = {
                    username: username,
                    usercode: usercode,
                    phonenumber: phonenumber

                }
                var bimeh = $('input[name="bimeh_delivery"]').val();
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: ajax_posts.ajaxurl,
                    data: {
                        action: 'shipping_post_terminal_user',
                        type: model,
                        user: user,
                        bimeh: bimeh
                    },
                    success: function(response) {
                        $('#pravacy_peyk_register').html('ثبت شد');
                        jQuery('body').trigger('update_checkout');
                        $('div[attr-target="1"]').attr('attr-active', 'true');
                        $('div[attr-target="2"]').attr('attr-active', 'true');
                    }
                });
            })

        } else if ($(this).val() == 'registereddelivery') {
            $("#registereddeliveries_method").on('change', function() {
                var old_user = $(this).val();
                var bimeh = $('input[name="bimeh_delivery"]').val();
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: ajax_posts.ajaxurl,
                    data: {
                        action: 'shipping_post_terminal_user',
                        type: model,
                        user: old_user,
                        bimeh: bimeh
                    },
                    success: function(response) {
                        $('#pravacy_peyk_register').html('ثبت شد');
                        jQuery('body').trigger('update_checkout');
                        $('div[attr-target="1"]').attr('attr-active', 'true');
                        $('div[attr-target="2"]').attr('attr-active', 'true');
                    }
                });

            })

        } else {
            var bimeh = $('input[name="bimeh_delivery"]').val();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: ajax_posts.ajaxurl,
                data: {
                    action: 'shipping_post_terminal_user',
                    type: model,
                    user: old_user,
                    bimeh: bimeh
                },
                success: function(response) {
                    $('#pravacy_peyk_register').html('ثبت شد');
                    jQuery('body').trigger('update_checkout');
                    $('div[attr-target="1"]').attr('attr-active', 'true');
                    $('div[attr-target="2"]').attr('attr-active', 'true');
                }
            });
        }



    })

});