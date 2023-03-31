<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */
$mahax=1;
$tipax=2;
$peyk=3;
$anbar=4;
$barbari=5;

$terminal=6;
?>

<style>
	* {
		direction: rtl;
	}
	.general-styles h1,.general-styles h2{
    font-family: iransans !important;
    font-size: 2.5rem !important;
}
.general-styles h3,.general-styles h4{
    font-family: iransans !important;
    font-size: 1.8rem !important;
}
.general-styles .btn,
.general-styles .button,
.general-styles .hero-action-btn,
button,
input[type=button],
input[type=reset],
input[type=submit] {
    font-size: .875rem !important;
    border-radius: 1.571em;
    padding: 1.036em 2.134em ;
    border-width: 0;
    display: inline-block;
    color: #333e48;
    background-color: #efecec;
    border-color: #efecec;
    transition: all .2s ease-in-out;
}
button[name="apply_coupon"]{
    padding: 1.036em 2.134em !important ;
}
.wc_payment_method>label:first-of-type{margin: 0;}
.general-styles > p{
	font-size: .875em !important;
}
#payment .place-order .button {
    font-size: 1.387em important;
    width: 100%;
    font-weight: 700;
    white-space: pre-wrap;
}
	div .general-styles {
		background-color: white;
		border: 1px solid #e3dfde;
		margin-bottom: 10px;
		padding-right: 20px;
		padding-bottom: 20px;

	}
	.wc_payment_method input[type=radio]+label::before{display: none; content: unset}
	.buttons button {
		background-color: #7db8d4;
		color: white;
		width: 220px;
		padding: 5px;
		border-radius: 10px;
		margin: 10px;
		border-bottom: 3px solid gray;
	}
	label{
		font-size:14px;
	}
	input[type=range]{
	-webkit-appearance: auto;
	appearance: auto;
	}
	#payment .payment_methods li label{margin-right:0}
	.buttons button:hover {
		background-color: #4994b8;
	}

	div .general-styles p {
		display: inline-block;
	}

	div .peykinputs {
		
		visibility:hidden;
		margin-bottom: 15px;
	}

	div .peykinputs input  {
		background-color: #f0dcf2;
		display: inline-block;
		padding:0.5rem;
		    font-family: iransans 
	}

	div .general-styles input {
		display: inline-block;
	}

	div .general-styles input[type=text] {
		border: 0 none white;
		border-radius: 5px;
	}

	.general-styles .discountbox {
		border: 1px solid #4254ad;
		padding: 10px;
		padding-right: -20px;
		border-radius: 15px;
		width: 80%;
		height: 50px;
		display: inline;
		margin-right: 80px;
		margin-bottom: 20px;
	}

	.general-styles .discountbox input[type=text] {
		border: 0 none white !important;
		width: 250px;
		margin-right: 0;
	}

	.general-styles .discountbox input[type=submit] {
		background-color: #c8cbcc;
		color: white;
		width: 70px;
		border-radius: 10px 5px 5px 10px;
	}

	.general-styles .paymentgateway {
		display: inline-block;
		border: 1px solid gray;
		border-bottom: 3px solid gray;
		border-radius: 10px;
		height: 50px;
		width: 250px;
		padding: 0px;
		margin-bottom: 20px;
	}

	.general-styles .paymentgateway:hover {
		background-color: #dee2e3;
	}

	.general-styles .paymentgateway p {
		position: relative;
		display: inline-block;
	}

	.general-styles .paymentgateway .payonline img {
		width: 55px;
		height: 55px;
		object-fit: cover;
		padding-right: 6px;
		padding-bottom: 10px;
		display: inline-block
	}

	.general-styles .paybycart {
		border: 1px solid gray;
		display: inline-block;
		padding: 15px 100px;
		border-bottom: 3px solid gray;
		border-radius: 10px !important;
		margin-right: 70px;
		display: none;
	}

	.general-styles .paybycart:hover {
		background-color: #dee2e3;
	}

	.ordersummary h1 {
		margin-bottom: -15px;
	}
	.ordersummary a button{
		color: #333e48 !important;
	}
	div.general-styles img.productimage {
		width: 100px;
		height: 100px;
		object-fit: contain;
	}

	div.general-styles div.ordercount p {
		border: 1px solid gray;
		padding: 7px;
		border-radius: 5px;

	}

	div.general-styles div.ordercount p.countoforder {
		width: 30px;
		text-align: center;
	}

	div.general-styles div.ordercount img {
		border: 1px solid gray;
	}

	div.general-styles div.ordercount img.deleteimage {
		width: 30px;
		height: 30px;
		border: none;
	}

	.general-styles .Storeselectionnotice {
		background-color: #d1062b;
		color: white;
		padding: 15px;
		border-radius: 8px;
		display: block;
		width: 80%;
		margin: auto 10%;
		text-align: center;
	}

	div .general-styles p {
		margin-top: 0px
	}

	.insurance .general-styles input[type=text] {
		border: 1px solid black !important;
	}

	.insurance .general-styles input[type=range] {
		width: 70%;
		direction: ltr;

	}

	.insurance .general-styles .insurancerightcolumn {
		border-right: 2px solid gray;
	}

	.insurance {
		display: none;
	}

	div .general-styles input[type=text] {
		border: 1px solid gray;
		margin-right: 60px;
	}

	div .deliveryrtype {
		/* display:inline-block; */
	}

	div .deliveryrtype select {
		margin-bottom: 20px;
		border-radius: 8px !important;
		width: 30%;
		height: 30px;
		color: blue;
		font-size: 12px;
	}

	div .perdonaldelivery .general-styles .deliveryrtype {
		display: inline-block;
		width: 100%;
	}

	div .general-styles p.productname {
		color: blue;
		margin-bottom: -20px;
	}

	.payableamount {
		margin-bottom: 30px;
	}

	@media screen and (min-width: 1024px) and (max-width: 1200px) {
		.general-styles .discountbox {
			display: block !important;
		}

		.general-styles .discountbox input[type=text] {
			width: 80%;
		}

		.general-styles .discountbox input[type=submit] {
			width: 15%
		}

	}

	@media screen and (min-width: 768px) and (max-width: 1024px) {
		div.general-styles div.ordercount p {
			padding: 2px;
		}

		.general-styles .discountbox {
			margin-bottom: 10px;
		}

		.general-styles .payonline {
			margin: auto 15px;
		}

		.general-styles .paybycart {
			margin: auto 10px;
		}
	}

	.insurance-barbarydelivery {
		display: none;
	}

	.insurance-terminaldelivery {
		display: none;
	}

	.insurance-barbarydelivery .general-styles input[type=range] {
		width: 70%;
		direction: ltr;
	}

	.insurance-terminaldelivery .general-styles input[type=range] {
		width: 70%;
		direction: ltr;
	}

	.terminaladdress {
		font-size: 12px;
		font-weight: 600;
		margin-top: 3%;
	}

	.barbaryaddress {

		margin-top: 3%;
	}

	.barbaryaddress input {
		width: 50%;
		background-color: f0dcf2;
		border-radius: 5px;
		margin-right: 8%;
		border: 1px solid gray;
	}

	.terminaladdress input {
		width: 50%;
		background-color: #f0dcf2;
		border-radius: 7px;
		margin-right: 5%;
		border: 1px solid gray;
	}

	.terminaladdress a.terminal_adress_register {
		width: 15%;
		background-color: #5bc978;
		color: white;
		border-radius: 7px;
		margin-right: 2%;
		border: 1px solid gray;
		padding: 0.8rem;
		font-size: 12px;
	}

	.terminaladdress input[type=submit]:hover {
		background-color: #3c9152;
	}


	.barbaryaddress input {
		width: 50%;
		background-color: #f0dcf2;
		border-radius: 7px;
		margin-right: 5%;
		border: 1px solid gray;
	}

	.barbaryaddress input.barbary_adress_register {
		width: 15%;
		background-color: #5bc978;
		color: white;
		border-radius: 7px;
		margin-right: 2%;
		border: 1px solid gray;
	}

	.barbaryaddress input[type=submit]:hover {
		background-color: #3c9152;
	}

	.insurance-tipax {
		display: none;
	}

	.insurance-tipax .general-styles input[type=range] {
		width: 70%;
		direction: ltr;
	}

	.insurance-peyk {
		display: none;
	}

	.insurance-peyk .general-styles input[type=range] {
		width: 70%;
		direction: ltr;
	}

	#pravacy_peyk_register {
		padding:0.5rem;
		background-color: #5bc978;
		color: white;
		border-radius: 7px;
		margin-right: 4%;
		border: 1px solid gray;
		display: inline-block;
	}
</style>
<style>
	.order-review-wrapper,
	div#customer_details {
		background-color: transparent !important;
		color: #000 !important;
	}

	.no-btn button {
		display: none !important;
	}

	.woocommerce-billing-fields__field-wrapper {
		display: flex;
		flex-direction: row-reverse;
		flex-wrap: wrap;
	}

	.woocommerce-billing-fields__field-wrapper select {
		height: 45px;
		width: 100%;
		border-radius: 6px;
		padding-right: 0;
	}

	.form-row.form-row-first {
		padding-left: 0;
	}

	.form-row.form-row-last {
		padding-right: 0;
	}

	.col2-set,
	.order-review-wrapper {
		display: none;
	}
	body form.woocommerce-checkout {display:block !important}
	.general-styles[attr-active="true"] #place_order{
		background-color:green !important;
	}
</style>
<script>
	jQuery(document).ready(function($) {
		$("#deliveryrtypes").change(function() {
			var val1 = $(this).val();
			if (val1 === 'privacydelivery')
				$('.peykinputs').css("visibility", "visible");
			else
				$('.peykinputs').css("visibility", "hidden");
		});
	});

	jQuery(document).ready(function($) {
		$("#deliveryrtypes").change(function() {
			var val1 = $(this).val();
			if (val1 === 'registereddelivery')
				$('.registereddeliveries').css("display", "block");
			else
				$('.registereddeliveries').css("display", "none");
		});
	});
</script>
<style>
	#shipping_method {
		display: flex;
		flex-wrap: wrap;
	}

	#shipping_method li {
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 0.5rem
	}

	#shipping_method li label {
		display: flex;
		margin: 0;
		align-items: center !important;
	}

	#shipping_method li label>span,
	#shipping_method li span bdi {
		position: relative;
		font-weight: 600 !Important;
		color: black;
	}

	ul#shipping_method li label {
		width: 100%;
		font-weight: 600 !Important;
		color: black;
	}

	body.woocommerce-checkout input {
		margin-left: 0.5rem;
	}

	div .general-styles input[type=text] {
		margin-right: 0;
		font-size: 12px;
	}

	.general-styles form.checkout_coupon.woocommerce-form-coupon {
		display: block !important;
	}

	.woocommerce-form-coupon-toggle {
		display: none;
	}

	.no_wc_payment_methods .wc_payment_methods {
		display: none;
	}

	form.checkout_coupon.woocommerce-form-coupon {
		float: none;
		background-color: transparent;
		box-shadow: none;
		margin-top: 0;
	}

	input [name="shipping_address_2"] {
		display: none;
	}

	h3#ship-to-different-address {
		display: none;
	}

	.modal-body h3 {
		display: none;
	}

	#ce4wp_checkout_consent_checkbox_field {
		display: none;
	}

	.shipping_address input[name="ship_default_adr"],
	.shipping_address input[name="ship_to_multi_address"],
	.shipping_address input[name="shipping_address_2"] {
		display: none;
	}

	input[name="shipping_company"] {
		display: none;
	}

	#shipping_company {
		display: none;
	}

	#shipping_state {
		width: 100%;
		height: 40px;
	}

	#shipping_method li input {
		opacity: 0;


	}

	#shipping_method li input::after {
		content: '';
		width: 100%;
		height: 100%;
		background-color: #7db8d4;
	}

	#shipping_method li {
		background-color: #7db8d4;
		position: relative;
		color: white;
		width: 220px;
		padding: 5px;
		border-radius: 10px;
		margin: 10px;
		border-bottom: 3px solid gray;
	}

	#shipping_method li:hover,
	#shipping_method li input:hover,
	#shipping_method li label:hover {
		background-color: rgb(4, 72, 105);
		cursor: pointer;
	}

	#shipping_method li.actived {
		background-color: rgb(4 71 104);
	}

	#shipping_method li label {
		width: 100%;
		height: 100%;
	}

	#shipping_method li label,
	#shipping_method li label span,
	#shipping_method li label bdi {
		color: white !important;
	}

	.no-img img {
		display: none;
	}
.no-img a{
	color: #4254ad;
	
}
	.no-border tr {
		border-top: none !important;
	}

	.wc_payment_methods {
		display: flex;
		flex-wrap: wrap;
	}

	.wc_payment_methods li {
		display: flex;
		justify-content: center;
		align-items: center;
		border: 1px solid gray;
		border-bottom: 3px solid gray;
		border-radius: 10px;
		height: 50px;
		width: 210px;
		margin: 0.7rem;
		padding: 0px;
		margin-bottom: 20px;
		border-bottom: 3px solid gray !important;
	}

	#payment .payment_methods li {
		padding: 0 !important;
	}

	.wc_payment_methods li label {
		width: 100%;
		height: 100%;
		display: flex !important;
		cursor: pointer;
		flex-direction: row-reverse;
		align-items: center;
		justify-content: center;
	}
	.wc_payment_methods li input{
		cursor: pointer;
	}
	.general-styles.no-btn .payment_box {
		display: none !important;
	}

	.general-styles.no-btn .form-row.place-order {
		display: none;
	}

	#payment .payment_methods li>.input-radio {
		opacity: 0;
	}

	#payment li:hover ,#payment li.actived {
		background-color: #dee2e3;
	}

	#place_order {
		background-color: #d1062b !important;
		box-shadow: none !important;

	}

	div .general-styles {
		padding-top: 1rem;
	}

	div[attr-active="false"] {
		pointer-events: none;
		filter: brightness(0.97);
	}

	.product-quantity input {
		width: 50px;
		margin-left: 0 !important;
		border: 1px solid gray;

		border-radius: 5px;
	}

	.product-quantity a {
		border: 1px solid gray;
		padding: 7px;
		border-radius: 5px;
	}

	.product-quantity input::-webkit-outer-spin-button,
	.product-quantity input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;

		/*text-align: center;
    display: flex;
    justify-content: center; */
	}

	/* Firefox */
	.product-quantity input[type=number] {
		-moz-appearance: textfield;


	}

	.product-quantity a {
		padding: 0.5rem;
		margin: 0.5rem;
	}
	@media only screen and (max-width: 600px) {
  
		.terminaladdress{
			display:flex;
			flex-direction:column;
		}
		.terminaladdress input {
			width:95% !important;
			margin:auto !important
		}
	.terminaladdress a{
		width:100% !important;
			margin:auto !important
	}
	select{
		width :95% !Important;
		margin:auto
	}
		
  }
</style>
<?php


// var_dump(WC()->session->get('chosen_shipping_methods')[0]);
add_filter('woocommerce_checkout_fields', 'custom_wc_checkout_fields_no_label');

// Our hooked in function - $fields is passed via the filter!
// Action: remove label from $fields
function custom_wc_checkout_fields_no_label($fields)
{
	// loop by category
	foreach ($fields as $category => $value) {
		// loop by fields
		foreach ($value as $field => $property) {
			// remove label property
			unset($fields[$category][$field]['label']);
		}
	}
	return $fields;
}
if (!defined('ABSPATH')) {
	exit;
}
?>
<?php

do_action('woocommerce_before_checkout_form', $checkout);
?>
<?php
// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));


	return;
}
if (is_user_logged_in()) {
	global $current_user;
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8">
				<div class="general-styles ordersummary">
					<h1>
						آدرس تحویل سفارش
					</h1>
					<br>
					<p class="customer_address">
						<?php
						global $woocommerce;

						echo $woocommerce->customer->get_shipping_address();
						?>
					</p>
					<br>
					<i class="fa fa-user" aria-hidden="true"></i>
					<p id="user_name_shipping">
						<?php echo	 get_user_meta(get_current_user_id(), 'shipping_first_name', true) . ' ' . get_user_meta(get_current_user_id(), 'shipping_last_name', true); ?>
					</p>
					<br>
					<a href="#" onclick="get_customer_address()">
						<button style="background-color: transparent;padding: 0.5rem;" type="button" data-toggle="modal" data-target="#exampleModal">
							ویرایش آدرس
						</button>>
					</a>
					</p>


					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">
										<h3><?php esc_html_e('Billing &amp; Shipping', 'woocommerce'); ?></h3>
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body" style="min-height:515px;">
									<?php if ($checkout->get_checkout_fields()) : ?>
										<?php # do_action('woocommerce_checkout_billing'); 
										?>
										<?php do_action('woocommerce_checkout_shipping'); ?>
									<?php endif; ?>

								</div>
								<div class="modal-footer" style="text-align:right;">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
									<button type="button" id="submit-billing-form" class="btn btn-primary">ذخیره</button>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="general-styles">
					<h1>
						روش های ارسال
					</h1>
					<P>
						روش های ارسال از انبار آریا تکنو را انتخاب کنید
					</p>
					<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
						<tr class=" we cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
							<th><?php wc_cart_totals_coupon_label($coupon); ?></th>
							<td><?php wc_cart_totals_coupon_html($coupon); ?></td>
						</tr>
					<?php endforeach; ?>

					<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

						<?php do_action('woocommerce_review_order_before_shipping'); ?>

						<?php wc_cart_totals_shipping_html(); ?>

						<?php do_action('woocommerce_review_order_after_shipping'); ?>

					<?php endif; ?>

					<?php foreach (WC()->cart->get_fees() as $fee) : ?>

						<tr class="fee">
							<th><?php # echo esc_html($fee->name); 
								?></th>
							<td><?php  # wc_cart_totals_fee_html($fee); 
								?></td>
						</tr>
					<?php endforeach; ?>

					<?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) : ?>
						<?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
							<?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited 
							?>
								<tr class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
									<th><?php # echo esc_html($tax->label); 
										?></th>
									<td><?php # echo wp_kses_post($tax->formatted_amount); 
										?></td>
								</tr>

							<?php endforeach; ?>
						<?php else : ?>

							<tr class="tax-total">
								<th><?php # echo esc_html(WC()->countries->tax_or_vat()); 
									?></th>
								<td><?php # wc_cart_totals_taxes_total_html(); 
									?></td>
							</tr>
						<?php endif; ?>
					<?php endif; ?>
				</div>
				<div class="widget insurance" style="display:none;" attr-swich="<?= $mahax ?>">
					<?php  $data = get_option('woocommerce_' . 'flat_rate' . '_' . ''.$mahax.'' . '_settings');  ?>
					<?php $amount = WC()->cart->cart_contents_total;
					$price = $amount / 1000000;
					if($amount < 1000000){
						$price=2000;
						
					}else{
				$price = round($price, 0, PHP_ROUND_HALF_DOWN) * $data["shipping_min_bime"]; 	}  ?>

					<div class="general-styles">
						<h2>
							ارزش اظهاری خرید جهت بیمه
							ماهکس
						</h2>
						<h3>
							آریاتکنو
						</h3>
						<div class=" bime_value row">
							<div class="col-sm-6 insurancerightcolumn">
								<input type="radio" attr-detect="waching" name="insurance-radio" id="insuranceselectedvaluemahax_rb" value="<?= intval($price) ?>">
								<label for="selectedvalue">
									ارزش اظهاری بسته :
								</label>
								<br>
								<?= $price ?>
								<input type="range" name="mahaxselectedinsuranceradioo" id="mahaxselectedinsurancerange" attr-detect="mahaxselectedinsurancetext" min="<?= $data["shipping_min_bime"] ?>" max="<?= intval($price) ?>" value="" class="selectedvalue">
								<?= $data["shipping_min_bime"] ?>
								<input type="text" name="" id="mahaxselectedinsurancetext" readonly value="...">
								<p> تومان
								</p>
								<br>
								<p>
									مبلغ بیمه :
									<strong class="mahaxinsuranceselected">
										<?= $data["shipping_min_bime"] ?>
									</strong>
									تومان
								</p>
							</div>
							<div class="col-sm-6">
								<input type="radio" name="insurance-radio" id="max" value="<?= intval($price) ?>">
								<label for="max"> بیشترین ارزش بسته : </label>
								<br>
								<p>
									ارزش اظهاری بسته :
									<?= WC()->cart->cart_contents_total ?>
									تومان
									<br>
									مبلغ بیمه :
									<br>

									<?= $price ?>
									تومان
								</p>
								<br>
								<input type="radio" name="insurance-radio" id="min" value="<?= $data["shipping_min_bime"] ?>">
								<label for="min"> کمترین ارزش بسته : </label>
								<br>
								<p>
									ارزش اظهاری بسته :
									<?= WC()->cart->cart_contents_total ?>
									<br>
									مبلغ بیمه : <?= $data["shipping_min_bime"] ?> تومان
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="widget insurance-tipax" style="display:none;" attr-swich="<?= $tipax ?>">
					<?php # $data = get_option('woocommerce_' . 'local_pickup' . '_' . '15' . '_settings');  ?>
					<?php $amount = WC()->cart->cart_contents_total;
					$price = $amount / 1000000;
					if($amount < 1000000){
						$price=2000;
						
					}else{
				$price = round($price, 0, PHP_ROUND_HALF_DOWN) * $data["shipping_min_bime"]; 	}  ?>

					<div class="general-styles">
						<h2>
							ارزش اظهاری خرید جهت بیمه
							تیپاکس
						</h2>
						<h3>
							آریاتکنو
						</h3>
						<div class="bime_value row">
							<div class="col-sm-6 insurancerightcolumn">
								<input type="radio" attr-detect="waching" name="insurance-radio" id="insuranceselectedvaluemahax_rb" value="<?= intval($price); ?>">
								<label for="selectedvalue">
									ارزش اظهاری بسته :
								</label>
								<br>
								<?= $price ?>
								<input type="range" name="tipaxselectedinsuranceradioo" id="tipaxselectedinsurancerange" attr-detect="tipaxselectedinsurancetext" min="<?= $data["shipping_min_bime"] ?>" max="<?= intval($price) ?>" value="4000" class="selectedvalue">
								<?= $data["shipping_min_bime"] ?>

								<input type="text" name="" id="tipaxselectedinsurancetext" readonly value="4000">
								<p> تومان
								</p>
								<br>
								<p>
									مبلغ بیمه :
									<strong class="mahaxinsuranceselected">
										<?= $data["shipping_min_bime"] ?>
									</strong>
									تومان
								</p>
							</div>
							<div class="col-sm-6">
								<input type="radio" name="insurance-radio" id="max" value="<?= $price ?>">
								<label for="max"> بیشترین ارزش بسته : </label>
								<br>
								<p>
									ارزش اظهاری بسته :
									<?=  WC()->cart->cart_contents_total ?>
									تومان
									<br>
									مبلغ بیمه :
									<br>
									<?= $price ?>
									تومان
								</p>
								<br>
								<input type="radio" name="insurance-radio" id="min" value="<?= $data["shipping_min_bime"] ?>">
								<label for="min"> کمترین ارزش بسته : </label>
								<br>
								<p>
									ارزش اظهاری بسته :
									<?= WC()->cart->cart_contents_total ?>
									<br>
									مبلغ بیمه : <?= $data["shipping_min_bime"] ?> تومان
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="widget insurance-peyk" style="display:none;" attr-swich="<?= $peyk ?>">
					<?php # $data = get_option('woocommerce_' . 'flat_rate' . '_' . '18' . '_settings');  ?>
					<?php $amount = WC()->cart->cart_contents_total;
					$price = $amount / 1000000;
					if($amount < 1000000){
						$price=2000;
						
					}else{
				$price = round($price, 0, PHP_ROUND_HALF_DOWN) * $data["shipping_min_bime"]; 	}  ?>

					<div class="general-styles">
						<h2>
							ارزش اظهاری خرید جهت بیمه
							پیک
						</h2>
						<h3>
							آریاتکنو
						</h3>
						<div class="bime_value row">
							<div class="col-sm-6 insurancerightcolumn">
								<input type="radio" attr-detect="waching" name="insurance-radio" id="insuranceselectedvaluemahax_rb" value="<?= intval($price) ?>">
								<label for="selectedvalue">
									ارزش اظهاری بسته :
								</label>
								<br>
								<?= $price ?>
								<input type="range" name="insuranceselectedvaluemahax_rb" id="insuranceselectedvaluemahax_range" attr-detect="insuranceselectedvaluemahax_text" min="<?= $data["shipping_min_bime"] ?>" max="<?= $price ?>" value="4000" class="selectedvalue">
								<?= $data["shipping_min_bime"] ?>

								<input type="text" name="" id="insuranceselectedvaluemahax_text" readonly value="4000">
								<p> تومان
								</p>
								<br>
								<p>
									مبلغ بیمه :
									<strong class="mahaxinsuranceselected">
										<?= $data["shipping_min_bime"] ?>
									</strong>
									تومان
								</p>
							</div>
							<div class="col-sm-6">
								<input type="radio" name="insurance-radio" id="max" value="<?= $price ?>">
								<label for="max"> بیشترین ارزش بسته : </label>
								<br>
								<p>
									ارزش اظهاری بسته :
									<?= WC()->cart->cart_contents_total ?>
									تومان
									<br>
									مبلغ بیمه :
									<br>
									<?= $price ?>
									تومان
								</p>
								<br>
								<input type="radio" name="insurance-radio" id="min" value="<?= $data["shipping_min_bime"] ?>">
								<label for="min"> کمترین ارزش بسته : </label>
								<br>
								<p>
									ارزش اظهاری بسته :
									<?= WC()->cart->cart_contents_total ?>
									<br>
									مبلغ بیمه : <?= $data["shipping_min_bime"] ?> تومان
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="widget insurance-barbarydelivery" style="display:none;" attr-swich="<?= $barbari ?>">
					<div class="general-styles">
						<h2>
							ارزش اظهاری خرید جهت بیمه
							باربری
						</h2>
						<h3>
							آریا تکنو
						</h3>
						<div class="terminaladdress">
							<p>
								لطفا آدرس ترمینال را وارد کنید
							</p>
							<input type="text" name="terminaladdressvalue" id="terminaladdressvalue" placeholder="آدرس باربری ..." value="<?php echo $termnaladres ?>">
							<a href="#" name="terminal_adress_register" id="terminal_adress_register" value="" class="terminal_adress_register">ثبت آدرس باربری </a>
						</div>
					</div>
				</div>
				<div class="widget insurance-terminaldelivery" style="display:none;" attr-swich="<?= $terminal ?>">
					<div class="general-styles">
						<h2>
							ارزش اظهاری خرید جهت بیمه
							ترمینال
						</h2>
						<h3>
							آریاتکنو
						</h3>

						<div class="terminaladdress">
							<p>
								لطفا آدرس ترمینال را وارد کنید
							</p>
							<input type="text" name="terminaladdressvalue" id="terminaladdressvalue2" placeholder="آدرس ترمینال ..." value="<?php echo $termnaladres ?>">
							<a href="#" name="terminal_adress_register2" id="terminal_adress_register2" value="" class="terminal_adress_register">ثبت آدرس ترمینال </a>
						</div>

					</div>
				</div>
				<div class="widget perdonaldelivery" style="display:none;" attr-swich="<?= $anbar ?>">
					<div class="general-styles">
						<h2>
							مشخصات تحویل گیرنده از انبار آریاتکنو
						</h2>
						<p>
							کاربر گرامی در صورت مشخص نبودم اطلاعات تحویل گیرنده گزینه پیک عمومی و در صورت داشتن داشتن نام و کدملی تحویل گیرنده
							.................................................................
							....................................................................

						</p>
						<input name="bimeh_delivery" type="hidden" value="<?= $data["shipping_min_bime"] ?>">
						<div class="deliveryrtype">

							<select name="deliveryrtypes" id="deliveryrtypes">
								<option name="default" id="default" selected disabled>
									انتخاب نوع پیک ...
								</option>

								<option attr-index="پیک عمومی" value="generaldelivery" id="generaldelivery">
									پیک عمومی
								</option>

								<option attr-index="پیک شخصی" value="privacydelivery" id="privacydelivery">
									پیک شخصی
								</option>

								<option attr-index=" پیک های ثبت شده قبلی" value="registereddelivery" id="registereddelivery">
									پیک های ثبت شده قبلی
								</option>

							</select>
							<form method="POST" action="">
								<div class="peykinputs">
									<input type="text" name="pravacy_peyk_name" id="pravacy_peyk_name_1" placeholder="نام تحویل گیرنده">
									<input type="text" name="pravacy_peyk_natinalcode" id="pravacy_peyk_natinalcode_1" placeholder="کد ملی تحویل گیرنده ">
											<input type="tel" name="pravacy_peyk_natinalcode" id="pravacy_peyk_phonecode_1" placeholder="شماره تماس">
									<a href="#" name="pravacy_peyk_register" value="ثبت پیک شخصی " id="pravacy_peyk_register">ثبت پیک شخصی </a>
								</div>
							</form>
							<div class="registereddeliveries" style="display:none">
								<?php $items = get_user_meta(get_current_user_id(), 'shipping_post_terminal_user', true); ?>
								<select id="registereddeliveries_method">
									<option name="default" id="default" selected>
										پیک مورد نظر خود را انتخاب کنید.
									</option>
									<?php

									foreach ($items as $key => $item) { ?>
										<option name="default" value="<?= $item["username"] . ' ' . $item["usercode"] ?>">
											<?= $item["username"] . ' ' . $item["usercode"] ?>
										</option>
									<?php } ?>


								</select>
							</div>
						</div>

					</div>
				</div>

				<div class="general-styles" attr-target="1" attr-active="false">
					<h2>تخفیف</h2>
					<form class="checkout_coupon woocommerce-form-coupon d-block" method="post" style="display: block !Important;">


						<div class="d-flex">
							<p class="form-row form-row-first">
								<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" id="coupon_code" value="" />
							</p>

							<p class="form-row form-row-last">
								<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_html_e('Apply coupon', 'woocommerce'); ?></button>
							</p>
						</div>
						<div class="clear"></div>
					</form>

				</div>
				<div class="general-styles no-btn" attr-target="1" attr-active="false">
					<h2>روش پرداخت</h2>
					<div id="payment" class="woocommerce-checkout-payment">
						<?php if (WC()->cart->needs_payment()) : ?>
							<ul class="wc_payment_methods payment_methods methods">
								<?php
								if (!empty($available_gateways)) {
									foreach ($available_gateways as $gateway) {
										wc_get_template('checkout/payment-method.php', array('gateway' => $gateway));
									}
								} else {
									echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters('woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__('Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce') : esc_html__('Please fill in your details above to see available payment methods.', 'woocommerce')) . '</li>'; // @codingStandardsIgnoreLine
								}
								?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="general-styles no_wc_payment_methods " attr-target="2" attr-active="false">
					<table class="shop_table woocommerce-checkout-review-order-table">
						<thead>
							<tr>
								<th class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
								<th class="product-total"><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							do_action('woocommerce_review_order_before_cart_contents');

							foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
								$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

								if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
							?>
									<tr class="<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
										<td class="product-name">
											<?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; ?>
											<?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
											?>
											<?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
											?>
										</td>
										<td class="product-total">
											<?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
											?>
										</td>
									</tr>
							<?php
								}
							}

							do_action('woocommerce_review_order_after_cart_contents');
							?>
						</tbody>
						<tfoot>

							<tr class="cart-subtotal">
								<th><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
								<td><?php wc_cart_totals_subtotal_html(); ?></td>
							</tr>


							<?php do_action('woocommerce_review_order_before_order_total'); ?>

							<tr class="order-total">
								<th><?php esc_html_e('Total', 'woocommerce'); ?></th>
								<td><?php wc_cart_totals_order_total_html(); ?></td>
							</tr>

							<?php do_action('woocommerce_review_order_after_order_total'); ?>

						</tfoot>
					</table>
					<?php
					if (!wp_doing_ajax()) {
						do_action('woocommerce_review_order_before_payment');
					}
					?>
					<div id="payment" class="woocommerce-checkout-payment">

						<div class="form-row place-order" attr-target="2" attr-active="false">
							<noscript>
								<?php
								/* translators: $1 and $2 opening and closing emphasis tags respectively */
								printf(esc_html__('Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce'), '<em>', '</em>');
								?>
								<br /><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e('Update totals', 'woocommerce'); ?>"><?php esc_html_e('Update totals', 'woocommerce'); ?></button>
							</noscript>

							<?php wc_get_template('checkout/terms.php'); ?>

							<?php do_action('woocommerce_review_order_before_submit'); ?>

							<?php echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>'); // @codingStandardsIgnoreLine 
							?>

							<?php do_action('woocommerce_review_order_after_submit'); ?>

							<?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
						</div>
					</div>
					<?php
					if (!wp_doing_ajax()) {
						do_action('woocommerce_review_order_after_payment');
					}
					?>
				</div>


			</div>







			<?php if ($checkout->get_checkout_fields()) : ?>

				<?php do_action('woocommerce_checkout_before_customer_details'); ?>

				<div class="col2-set" id="customer_details">
					<div class="col-1">

					</div>

					<div class="col-2">

					</div>
				</div>

				<?php do_action('woocommerce_checkout_after_customer_details'); ?>

			<?php endif; ?>
			<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

			<h3 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>

			<?php do_action('woocommerce_checkout_before_order_review'); ?>

			<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action('woocommerce_checkout_order_review'); ?>
			</div>

			<?php do_action('woocommerce_checkout_after_order_review'); ?>




</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>