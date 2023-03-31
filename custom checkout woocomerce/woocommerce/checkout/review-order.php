<?php

/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
?>

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
						<?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>


<?php
	#$name=$_product->get_name();
	#$name = substr($name, 15);
	#$name=str_replace($name,'?','');
						?>

						<?php  echo '<a href="' . $_product->get_permalink() . '">' . wp_kses_post(apply_filters('woocommerce_cart_item_name', $name , $cart_item, $cart_item_key)) . '</a>&nbsp;'; ?>

						<?php # echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
					</td>
					<td class="product-total">
						<table class="no-border">
							<tr class="no-img">
								<td><?php echo '<a href="' . $_product->get_permalink() . '">' . wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '</a>&nbsp;'; ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);  ?>
								</td>
							</tr>
							<tr>
								<td>انبار آریاتکنو</td>
							</tr>
							<tr>
								<td style="display:flex;align-items:center" class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
									<?php
									if ($_product->is_sold_individually()) {
										$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
									} else {
										echo '<a  href="#" attr-id="' . $_product->get_id() . '" class="product-quantity-up"> + </a>';
										echo '<div  attr-id="' . $_product->get_id() . '" >';
										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $_product->get_max_purchase_quantity(),
												'min_value'    => '1',
												'product_name' => $_product->get_name()
											),
											$_product,
											false
										);
									}

									echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
									echo "</div>";
									echo '<a  href="#" attr-id="' . $_product->get_id() . '" class="product-quantity-down"> - </a> ';

									?>
									<script>
										jQuery(document).ready(function($) {
											$("a.product-quantity-up").on('click', function(e) {
												e.preventDefault();
												var id = $(this).attr('attr-id');
												var up = $('div[attr-id="' + id + '"] .quantity input').val();
												var max = $('div[attr-id="' + id + '"] .quantity input').attr('max');
												up++;
												var $thisbutton = $('div[attr-id="' + id + '"] .quantity input');
												var item_hash = $('div[attr-id="' + id + '"] .quantity input').attr('name').replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
												var item_quantity = $('div[attr-id="' + id + '"] .quantity input').val();
												var currentVal = parseFloat(item_quantity);
												if (up <= max) {
													$.ajax({
														type: "POST",
														dataType: "html",
														url: ajax_posts.ajaxurl,
														data: {
															action: 'shipping_quantity_product',
															hash: item_hash,
															quantity: currentVal,
															count: up,

														},
														success: function(response) {
															jQuery('body').trigger('update_checkout');
															console.log(response);
														}
													});
													$('div[attr-id="' + id + '"] .quantity input').val(up)
												}

											})
											$("a.product-quantity-down").on('click', function(e) {
												e.preventDefault();
												var id = $(this).attr('attr-id');
												var down = $('div[attr-id="' + id + '"] .quantity input').val();
												var min = $('div[attr-id="' + id + '"] .quantity input').attr('min');
												down--;
												var $thisbutton = $('div[attr-id="' + id + '"] .quantity input');
												var item_hash = $('div[attr-id="' + id + '"] .quantity input').attr('name').replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
												var item_quantity = $('div[attr-id="' + id + '"] .quantity input').val();
												var currentVal = parseFloat(item_quantity);
												if (down >= min) {
													$.ajax({
														type: "POST",
														dataType: "html",
														url: ajax_posts.ajaxurl,
														data: {
															action: 'shipping_quantity_product',
															hash: item_hash,
															quantity: currentVal,
															count: down,
														

														},
														success: function(response) {
															jQuery('body').trigger('update_checkout');
															console.log(response);
														}
													});
													$('div[attr-id="' + id + '"] .quantity input').val(min)
												}
											})

										})
									</script>
								</td>
								<td style="display:flex;align-items:center">
									<?php
									echo apply_filters(
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a  style="width:30px;height:30px"  href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><img style="width:30px;height:30px" class="deleteimage" src="https://www.cricbattle.com/images/remove.png"></a>',
											esc_url(wc_get_cart_remove_url($cart_item_key)),
											esc_html__('Remove this item', 'woocommerce'),
											esc_attr($_product->get_id()),
											esc_attr($_product->get_sku())
										),
										$cart_item_key
									);
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				</td>
				</tr>
		<?php
			}
		}

		do_action('woocommerce_review_order_after_cart_contents');
		?>
	</tbody>
	<tfoot>
		<tr>
			<th><?php esc_html_e('هزینه ارسال', 'woocommerce'); ?></th>
			<td> 
				<?php	$current_shipping_cost = WC()->cart->get_cart_shipping_total();
					echo $current_shipping_cost;?>
			</td>
		</tr>
		<tr>
			<th><?php esc_html_e('هزینه بیمه', 'woocommerce'); ?></th>
			<?php foreach (WC()->cart->get_fees() as $fee) : ?>
				<td> <?php wc_cart_totals_fee_html($fee) ?></td>
			<?php endforeach; ?>

		</tr>
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