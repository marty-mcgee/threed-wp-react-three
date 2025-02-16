<?php
/*
Plugin Name: ThreeD WP React Three
Description: Embed a Three.js React-Three-Fiber canvas in a WordPress page using a shortcode
Version: 0.0.8
Author: Marty McGee
*/

function r3f_shortcode() {
    return '<div id="r3f-root"></div>';
}
add_shortcode('threed_wp_react_three', 'r3f_shortcode');

function r3f_enqueue_scripts() {
    // Check if we're on a singular post or page
    if (is_singular()) {
        global $post;

        // Check if the post content contains the [threed_wp_react_three] shortcode
        if (isset($post) && has_shortcode($post->post_content, 'threed_wp_react_three')) {
            // Enqueue React app's JavaScript and CSS
            wp_enqueue_script(
                'r3f-react-app',
                plugin_dir_url(__FILE__) . 'threed-wp-react-three/build/static/js/main.b5cf77f4.js',
                array(),
                '1.0',
                true // in footer
            );
            wp_enqueue_style(
                'r3f-react-app-style',
                plugin_dir_url(__FILE__) . 'threed-wp-react-three/build/static/css/main.f855e6bc.css',
                array(),
                '1.0'
            );

            // Add defer attribute for better loading performance
            add_filter('script_loader_tag', function($tag, $handle) {
                if ('threewp-bundle' === $handle) {
                    return str_replace(' src', ' defer src', $tag);
                }
                return $tag;
            }, 10, 2);
        }
    }   
}
add_action('wp_enqueue_scripts', 'r3f_enqueue_scripts');

/*
function r3f_inject_react_app() {
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const rootElement = document.getElementById('r3f-root');
            if (rootElement) {
                const script = document.createElement('script');
                script.src = '<?php echo plugin_dir_url(__FILE__) . 'threed-wp-react-three/build/static/js/main.b5cf77f4.js'; ?>';
                document.body.appendChild(script);
            }
        });
    </script>
    <?php
}
add_action('wp_footer', 'r3f_inject_react_app');
*/