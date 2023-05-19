<?php
/**
 * Plugin Name: Custom Featured Posts
 * Description: A plugin to showcase featured posts on the homepage.
 * Version: 1.0
 * Author: Ephraim Edeh
 * Author URI: http://ephraimedeh.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

// Include the necessary files
require_once plugin_dir_path(__FILE__) . 'admin/settings.php';
require_once plugin_dir_path(__FILE__) . 'includes/display-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';

  function custom_featured_posts_enqueue_styles() {
    wp_enqueue_style('custom-featured-posts-style', plugin_dir_url(__FILE__) . 'includes/CFP-style.css');
}
add_action('wp_enqueue_scripts', 'custom_featured_posts_enqueue_styles');
