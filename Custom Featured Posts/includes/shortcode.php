<?php
// Register and handle the shortcode for displaying the featured posts section
function custom_featured_posts_shortcode($atts) {
    ob_start();
    custom_featured_posts_display();
    return ob_get_clean();
}
add_shortcode('custom_featured_posts', 'custom_featured_posts_shortcode');
