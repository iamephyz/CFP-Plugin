<?php

// settings page for the plugin
function custom_featured_posts_settings_page() {
    add_options_page(
        'Custom Featured Posts',
        'Custom Featured Posts',
        'manage_options',
        'custom-featured-posts',
        'custom_featured_posts_render_settings_page'
    );
}
add_action('admin_menu', 'custom_featured_posts_settings_page');

// Render the settings page content
function custom_featured_posts_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>Custom Featured Posts Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_featured_posts_settings');
            do_settings_sections('custom_featured_posts_settings');
            
            // Display the field for selecting the number of posts
            echo '<h2>Number of Posts to Display</h2>';
            echo '<input type="number" name="custom_featured_posts_number_of_posts" value="' . esc_attr(get_option('custom_featured_posts_number_of_posts')) . '" min="1" max="10" step="1" />';
            
            submit_button();
            ?>
        </form>
    </div>
    <?php
}


// Register settings for the plugin
function custom_featured_posts_register_settings() {
    add_settings_section(
        'custom_featured_posts_settings_section',
        'Featured Posts Settings',
        'custom_featured_posts_settings_section_callback',
        'custom_featured_posts_settings'
    );

    add_settings_field(
        'custom_featured_posts_category',
        'Featured Category',
        'custom_featured_posts_category_callback',
        'custom_featured_posts_settings',
        'custom_featured_posts_settings_section'
    );

    // Register the setting for the number of posts
    register_setting(
        'custom_featured_posts_settings',
        'custom_featured_posts_number_of_posts',
        array(
            'type' => 'integer',
            'default' => 2, // Set a default value if needed
            'sanitize_callback' => 'absint', // Ensure the value is a positive integer
        )
    );

    register_setting(
        'custom_featured_posts_settings',
        'custom_featured_posts_category'
    );
}
add_action('admin_init', 'custom_featured_posts_register_settings');

// Callback function to render the settings section description
function custom_featured_posts_settings_section_callback() {
    echo 'Select the category of posts to be featured on the homepage.';
}

// Callback function to render the category selection field
function custom_featured_posts_category_callback() {
    $category = get_option('custom_featured_posts_category');
    $categories = get_categories();

    echo '<select name="custom_featured_posts_category">';
    foreach ($categories as $cat) {
        $selected = ($category == $cat->term_id) ? 'selected' : '';
        echo '<option value="' . $cat->term_id . '" ' . $selected . '>' . $cat->name . '</option>';
    }
    echo '</select>';
}
