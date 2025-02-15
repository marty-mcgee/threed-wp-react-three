<?php
/*
Plugin Name: ThreeD WP React Three
Description: Embed a Three.js React-Three-Fiber canvas in a WordPress page using a shortcode
Version: 0.0.0
Author: Marty McGee
*/

function r3f_enqueue_scripts() {
    // Enqueue React app's JavaScript and CSS
    wp_enqueue_script(
        'r3f-react-app',
        plugin_dir_url(__FILE__) . 'threed-wp-react-app/build/static/js/main.d76af341.js',
        array(),
        '1.0',
        true
    );
    wp_enqueue_style(
        'r3f-react-app-style',
        plugin_dir_url(__FILE__) . 'threed-wp-react-app/build/static/css/main.f855e6bc.css',
        array(),
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'r3f_enqueue_scripts');