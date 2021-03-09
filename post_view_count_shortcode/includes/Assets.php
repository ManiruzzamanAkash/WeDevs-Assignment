<?php

namespace WeDevs\PostViewCount;

/**
 * Assets Class for handling assets
 */
class Assets {

    public function __construct () {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets'] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets'] );
    }

    /**
     * Get Styles
     *
     * @return array Styles as array
     */
    public function get_styles () {
        return [
            'wedevs-post-list-style'    => [
                'src'           => WD_POST_COUNT_ASSETS . '/css/post-list-shortcode.css',
                'version'       => filemtime(WD_POST_COUNT_PATH . '/assets/css/post-list-shortcode.css' ),
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
