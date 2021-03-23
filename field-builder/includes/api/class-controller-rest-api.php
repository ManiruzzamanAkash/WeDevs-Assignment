<?php

namespace ERP_CFB\API;

/**
 * REST_API Handler
 */
class REST_API {

    public function __construct() {
        add_filter( 'erp_rest_api_controllers', array( $this, 'register_erp_cfb_controllers' ) );
    }

    /**
     * Register rest controller
     *
     * @param object $controllers
     * @return object
     */
    public function register_erp_cfb_controllers( $controllers ) {
        $this->include_controllers();

        $controllers = array_merge( $controllers, [
            '\ERP_CFB\API\Custom_Field_Builder_Controller',
        ] );

        return $controllers;
    }

    /**
     * Include controller
     *
     * @return void
     */
    public function include_controllers() {
        include_once WPERP_PPL_INCLUDES . '/api/class-rest-api-field-builder.php';
    }
}
