=== Custom Featured Posts ===
Tags: featured post
Requires at least: 4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Display Featured post on your website with 1 shortcode

== Description ==

Featured Posts allows you to add featured posts to your blog's website via shortcode in pages and/or posts.
This plugin makes it easy to select posts from a category and display wherever you need them on your website.

== Installation ==
1. Upload the 'custom-featured-posts' folder to the '/wp-content/plugins/' directory.
2. Activate the 'custom-featured-posts' list plugin through the 'Plugins' menu in WordPress.
3. Go to settings--> All Settings and click on the custom featured post option to visit the configuration page. 
4. Use the following shortcode.

== Settings ==
1. On the plugin settings page, there are two options:

- A " Feature category " Select dropdown
- A " Number of Posts to Display " Number Box 

 For a category to show in the select dropdown, the category must have a post attached to it, empty categories with no posts will not be displayed.

2. Select a category from the " Feature category " select dropdown and select the number of posts to display from the " Number of Posts to Display " Number Box 
3. Click on the " Save Changes " Buttom to save your settings. 

= Shortcodes =
* <code>[custom_featured_posts]</code>

= Template code =
* <code><?php echo do_shortcode('[custom_featured_posts]'); ?></code>

== TO DISPLAY FEATURE POSTS ==
Open any post or page and paste the [custom_featured_posts] Shortcode to display posts from your selected category.

== Changelog ==

= 1.0 =
* Initial release.
