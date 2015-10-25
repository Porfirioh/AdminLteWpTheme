<?php

add_action('init', 'of_options');

if (!function_exists('of_options')) {
    function of_options()
    {

// VARIABLES
        $themename = get_theme_data(STYLESHEETPATH . '/style.css');
        $themename = $themename['Name'];
        $shortname = "al";

// Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = get_option('of_options');

        $GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
        $of_categories = array();
        $of_categories_obj = get_categories('hide_empty=0');
        foreach ($of_categories_obj as $of_cat) {
            $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
        }
        $categories_tmp = array_unshift($of_categories, "Choose a category:");

//Access the WordPress Pages via an Array
        $of_pages = array();
        $of_pages_obj = get_pages('sort_column=post_parent,menu_order');
        foreach ($of_pages_obj as $of_page) {
            $of_pages[$of_page->ID] = $of_page->post_name;
        }
        $of_pages_tmp = array_unshift($of_pages, "Choose a page:");

// Image Alignment radio box
        $options_thumb_align = array("alignleft" => "Left", "alignright" => "Right", "aligncenter" => "Center");

// Image Links to Options
        $options_image_link_to = array("image" => "The Image", "post" => "The Post");

// Number of featured posts to display
        $featured_options_select = array("2", "4", "6", "8", "10", "12");

//Stylesheets Reader
        $alt_stylesheet_path = OF_FILEPATH . '/styles/';
        $alt_stylesheets = array();

        if (is_dir($alt_stylesheet_path)) {
            if ($alt_stylesheet_dir = opendir($alt_stylesheet_path)) {
                while (($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false) {
                    if (stristr($alt_stylesheet_file, ".css") !== false) {
                        $alt_stylesheets[] = $alt_stylesheet_file;
                    }
                }
            }
        }

//More Options
        $uploads_arr = wp_upload_dir();
        $all_uploads_path = $uploads_arr['path'];
        $all_uploads = get_option('of_uploads');
        $thumbsekil = array("Solda", "Şerit");
// Set the Options Array
        $options = array();

        $options[] = array("name" => "General Settings",
            "type" => "heading");

        $options[] = array(
            'name' => __('Do you want logo panel?', 'options_check'),
            'desc' => __('Do you want logo panel? If you check, it\'ll be shown at top of the side menu.', 'options_check'),
            'id' => 'panel',
            'std' => '1',
            'type' => 'checkbox');

        $options[] = array(
            "name" => "Logo",
            "desc" => "You can upload an image for logo. If you check logo panel true, it'll be shown.",
            "id" => "logo",
            "type" => "upload");

        $options[] = array(
            'name' => __('Panel Info Text', 'options_check'),
            'desc' => __('A mini text that will appear next to the logo.', 'options_check'),
            'id' => 'info',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Facebook Url', 'options_check'),
            'desc' => __('You can enter your Facebook profile url.', 'options_check'),
            'id' => 'facebook',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Twitter Url', 'options_check'),
            'desc' => __('You can enter your Twitter profile url.', 'options_check'),
            'id' => 'twitter',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Google+ Url', 'options_check'),
            'desc' => __('You can enter your Google+ profile url.', 'options_check'),
            'id' => 'google-plus',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Pinterest Url', 'options_check'),
            'desc' => __('You can enter your Pinterest profile url.', 'options_check'),
            'id' => 'pinterest',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Instagram Url', 'options_check'),
            'desc' => __('You can enter your Instagram profile url.', 'options_check'),
            'id' => 'instagram',
            'std' => '',
            'type' => 'text');

        $options[] = array(
            'name' => __('Linkedin Url', 'options_check'),
            'desc' => __('You can enter your Linkedin profile url.', 'options_check'),
            'id' => 'linkedin',
            'std' => '',
            'type' => 'text');

        update_option('of_template', $options);
        update_option('of_themename', $themename);
        update_option('of_shortname', $shortname);

    }
}
?>