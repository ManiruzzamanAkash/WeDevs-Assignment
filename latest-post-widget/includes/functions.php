<?php

/**
 * Get Latest Posts
 * 
 * Get posts dataset for getting latest post with order, category filter and total limit
 *
 * @param array $args
 * 
 * @return array
 */
function wedevs_lpw_get_latest_posts ( $args = [] ) {
    global $wpdb;

    $defaults = [
        'number'   => 5,
        'orderby'  => 'ID',
        'order'    => 'DESC',
        'category' => '' // Could be empty string or null or any category id
    ];

    /**
     * wedevs_lpw_latest_posts filter
     * 
     * Pass params in this argument from theme or other plugin to modify this widget's data
     */
    $args     = wp_parse_args( $args, apply_filters( 'wedevs_lpw_latest_posts', $defaults ) );

    $order    = $args['order'];
    $orderby  = $args['orderby'];
    $category = $args['category'];

    $select = "SELECT * FROM $wpdb->posts p";
    $where  = "WHERE post_type = %s AND post_status = %s ";

    if( !empty( $category ) ) {
        $join = "JOIN $wpdb->term_relationships tr ON (p.ID = tr.object_id)
                JOIN $wpdb->term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id)
                JOIN $wpdb->terms t ON (tt.term_id = t.term_id)
                ";
        $where .= "AND tt.taxonomy = 'category' AND t.term_id = $category";
    } else {
        $join = "";
    }

    $sql          = "$select $join $where ORDER BY $orderby $order LIMIT %d";
    $sql_prepared = $wpdb->prepare( $sql, 'post', 'publish', $args['number'] );
    $latest_posts = $wpdb->get_results( $sql_prepared, ARRAY_A );

    return $latest_posts;
}