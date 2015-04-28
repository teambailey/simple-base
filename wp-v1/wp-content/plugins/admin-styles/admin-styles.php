<?php

/*
Plugin Name: My Admin Theme
Plugin URI: http://andrewbailey.me
Description: My WordPress Admin Theme - Upload and Activate.
Author: Andrew Bailey
Version: 1.0
Author URI: http://andrewbailey.me
*/

function my_admin_theme_style() {
    wp_enqueue_style('my-admin-theme', plugins_url('admin-styles.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');
add_action('login_enqueue_scripts', 'my_admin_theme_style');

?>