<?php

namespace ERP_CFB;

/**
 * Scripts and Styles Class
 */
class Assets {

    function __construct() {
        add_action( 'admin_enqueue_scripts', [ $this, 'register' ], 10 );
    }

    /**
     * Register our app scripts and styles
     *
     * @return void
     */
    public function register() {
        $this->register_scripts( $this->get_scripts() );
        // $this->register_styles( $this->get_styles() );
    }

    /**
     * Register scripts
     *
     * @param array $scripts
     *
     * @return void
     */
    private function register_scripts( $scripts ) {
        global $current_screen;

        if ( is_admin() && 'wp-erp_page_erp-accounting' != $current_screen->base ) {
            return;
        }
        foreach ( $scripts as $handle => $script ) {
            $deps      = isset( $script['deps'] ) ? $script['deps'] : false;
            $in_footer = isset( $script['in_footer'] ) ? $script['in_footer'] : false;
            $version   = isset( $script['version'] ) ? $script['version'] : WPERP_PPL_VERSION;

            wp_register_script( $handle, $script['src'], $deps, $version, $in_footer );

            // wp_localize_script( 'erp-reimbursement-admin', 'erp_reimbursement_var', array(
            //     'erp_reimbursement_module' => true,
            // ) );
        }
    }

    /**
     * Register styles
     *
     * @param array $styles
     *
     * @return void
     */
    public function register_styles( $styles ) {
        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, WPERP_PPL_INCLUDES );
        }
    }

    /**
     * Get all registered scripts
     *
     * @return array
     */
    public function get_scripts() {
        $prefix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.min' : '';
        $scripts = [
            'erp-cfb-admin' => [
                'src'       => WPERP_PPL_ASSETS . '/js/admin.js',
                'version'   => '1.3.0', // filemtime( WPERP_PPL_VIEWS . '/assets/js/admin.js' ),
                'in_footer' => true
            ]
        ];

        return $scripts;
    }

    /**
     * Get registered styles
     *
     * @return array
     */
    public function get_styles() {

        $styles = [
            'erp-cfb-admin' => [
                'src' => WPERP_PPL_ASSETS . '/css/admin.css'
            ],
        ];

        return $styles;
    }

}
