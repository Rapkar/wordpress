<?php
/*
 * @wordpress-plugin
 * Plugin Name:     elementor quize
 * Plugin URI:        https://php-tutorial.ir/
 * Description:       elementor quize for wp
 * Version:           1.0
 * Requires at least: 5
 * Requires PHP:      5.6
 * Author:            Hossein Soltanian
 * Author URI:        https://php-tutorial.ir/
 * Text Domain:       login-verify-plm
 * Domain Path:       /languages
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 *
HTML Forms
Copyright (C) 2017-2020,hossein soltanian, hosseinbidar7@gmail.com
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
// The Widget_Base class is not available immediately after plugins are loaded, so
// we delay the class' use until Elementor widgets are registered

function neh_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );
	wp_enqueue_style('nehwidgetcss',$plugin_url .'widget/neh.css');
}
add_action( 'wp_enqueue_scripts', 'neh_load_plugin_css' );
add_action('elementor/widgets/widgets_registered', function ($widgets_manager ) {
     require(__DIR__ . "/widget/index.php");
    // Let Elementor know about our widg
    $widgets_manager->register(new \quize);
});


?>