<?php
/*
Plugin Name: Post View Count
Plugin URI: http://wordpress.org/plugins/wedevs-post-view-count
Description: A plugin where a new vew count will be added after every post
Author: Maniruzzaman Akash
Version: 1.0.0
Author URI: https://akash.devsenv.com
Text Domain: wedevs-pvc
Domain Path: /languages
*/

if ( ! defined('ABSPATH') ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Post View Count Class
 */
final class Post_View_Count {

    /** Load Plugins */
    public function __construct () {
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }

    /**
     * Initializes a singleton instance
     *
     * @return  \Post_View_Count
     */
    public static function init () {
        static $instance = false;

        if ( !$instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Initialization of plugin
     *
     * @return void
     */
    public function init_plugin () {
        add_filter('the_content', [ $this, 'wedevs_pvc_posts_view_count' ] );
    }

    /**
     * Post View Count
     *
     * @param string $content
     * 
     * @return string
     */
    public function wedevs_pvc_posts_view_count ( $content ) {
        global $post;

        if ( $post->post_type === 'post' ) {
            $view_count = get_post_view_count( get_the_ID() );

            $label      = __( 'Total Hit', 'wedevs-pvc' );
            $tag        = apply_filters( "wedevs_pvc_tag", 'em' );      // Custom filter to change tags, default em
            $label      = apply_filters( "wedevs_pvc_label", $label );  // Custom filter to change label

            $content   .= sprintf( '<%s>%s: %s</%s>', $tag, $label, $view_count, $tag );
        }
        
        return $content;
    }

}


/**
 * Initializes the main plugin
 *
 * @return \Post_View_Count
 */
function Post_View_Count () {
    return Post_View_Count::init();
}

/* start the plugin */
Post_View_Count();
