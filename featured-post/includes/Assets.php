<?php

namespace WeDevs\FeaturedPost;

/**
 * Assets Class for handling assets
 */
class Assets {

    public function __construct () {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
    }

    /**
     * Get Styles
     *
     * @return array Styles as array
     */
    public function get_styles () {
        return [
            'wedevs-latest-post-style'    => [
                'src'           => WD_Latest_Post_Widget_ASSETS . '/css/latest-post-widget.css',
                'version'       => filemtime( WD_Latest_Post_Widget_PATH . '/assets/css/latest-post-widget.css' ),
                'is_footer'     => false
            ]
        ];
    }

    /**
     * Register Assets
     * 
     * Register all of the assets
     *
     * @return void
     */
    public function register_assets () {
       
        $styles = $this->get_styles();
        
        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style[ 'deps' ]) ? $style[ 'deps' ] : false;

            wp_register_style( $handle, $style[ 'src' ], $deps, $style[ 'version' ], $style[ 'is_footer' ] );
        }

    }
}
