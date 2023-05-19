<?php

// Display the featured posts on the homepage
function custom_featured_posts_display() {
    $category = get_option('custom_featured_posts_category');
    $number_of_posts = get_option('custom_featured_posts_number_of_posts');


    $args = array(
        'category__in' => array($category),
        'posts_per_page' => $number_of_posts,
    );

    // Check if the selected category is not empty
    if (!empty($category)) {
        $featured_posts = new WP_Query($args);

    // Extract the featured posts
        if ($featured_posts->have_posts()) {
            echo '<div class="custom-featured-posts">';
            while ($featured_posts->have_posts()) {
                $featured_posts->the_post();
                echo '<div class="custom-featured-post">';
                echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
        
                
                // Get Featured Image
                if (has_post_thumbnail()) {
                    echo '<div class="custom-featured-post-thumbnail">' . get_the_post_thumbnail($featured_posts->ID, 'medium') . '</div>';
                }
                // Get the category terms
                $post_categories = get_the_terms(get_the_ID(), 'category');
                if ($post_categories && !is_wp_error($post_categories)) {
                    echo '<div class="custom-featured-post-category">';
                    foreach ($post_categories as $category) {
                        echo '<a href="' . esc_url(get_term_link($category)) . '"> <button class="custom-featured-post-button-cat">' . esc_html($category->name) . ' </button></a>';
                    }
                    echo '</div>';
                }
               // Get Post Excerpt
                $excerpt = get_the_excerpt();
                $trimmed_excerpt = wp_trim_words($excerpt, 15, '...');

                echo '<div class="custom-featured-post-excerpt">' . $trimmed_excerpt . '</div>';

                // Get Button and link
                echo '<a href="' . get_permalink() . '"><button class="custom-featured-post-button">View Post</button></a>';
        
                echo '</div>';
            }
            echo '</div>';
        }
        

        wp_reset_postdata();
    }
    else {
        echo '<p>No category selected.</p>';
    }
}



add_action('custom_featured_posts', 'custom_featured_posts_display');

