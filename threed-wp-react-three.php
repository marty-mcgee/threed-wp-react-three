<?php
/*
Plugin Name: ThreeD WP React Three
Description: Embed a Three.js React-Three-Fiber canvas in a WordPress page using a shortcode
Version: 0.0.9
Author: Marty McGee
*/

function threed_wp_react_threeshortcode() {
    return '<div id="threed-root"></div>';
}
add_shortcode('threed_wp_react_three', 'threed_wp_react_threeshortcode');

function threed_wp_react_threeenqueue_scripts() {
    // Check if we're on a singular post or page
    if (is_singular()) {
        global $post;

        // Check if the post content contains the [threed_wp_react_three] shortcode
        if (isset($post) && has_shortcode($post->post_content, 'threed_wp_react_three')) {
            // Enqueue React app's JavaScript and CSS
            wp_enqueue_script(
                'threed-wp-react-three-script',
                plugin_dir_url(__FILE__) . 'threed-wp-react-three/build/static/js/main.9a9e317c.js',
                array(),
                '1.0',
                true // in footer
            );
            wp_enqueue_style(
                'threed-wp-react-three-style',
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
add_action('wp_enqueue_scripts', 'threed_wp_react_threeenqueue_scripts');

/*
function threed_wp_react_threeinject_react_app() {
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const rootElement = document.getElementById('threed-root');
            if (rootElement) {
                const script = document.createElement('script');
                script.src = '<?php echo plugin_dir_url(__FILE__) . 'threed-wp-react-three/build/static/js/main.9a9e317c.js'; ?>';
                document.body.appendChild(script);
            }
        });
    </script>
    <?php
}
add_action('wp_footer', 'threed_wp_react_threeinject_react_app');
*/