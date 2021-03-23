<?php

/**
 * Get all custom fileds
 *
 * @param array $args
 * @return array
 */
function erp_cfb_get_all_custom_fileds( $args ) {
    $section     = $args['section'];
    $people_type = $args['people_type'];

    $customer_fields = get_option( 'erp-' . $people_type . '-fields' );
    $filtered_fields = [];

    if ( is_array( $customer_fields ) ) {
        foreach( $customer_fields as $field ) {
            if ( $section == $field['section'] ) {
                $filtered_fields[] = $field;
            }
        }
    }

    return $filtered_fields;
}

/**
 * Get custom field data
 *
 * @param int $id
 * @return array
 */
function erp_cfb_get_custom_filed_data( $args ) {
    $id          = $args['id'];
    $people_type = $args['people_type'];

    return erp_people_get_meta( $id, $people_type . '_custom_field', true );
}
