<?php

/**
 * Get Post Total View Count
 * 
 * Create a post meta 'post_view_count' and store/increment count value
 *
 * @param int $id Post ID
 * 
 * @return int
 */
function get_post_view_count ( $id ) {

    $count = 1;
    $post_view_count = get_post_meta( $id, 'post_view_count', true );

    if( empty( $post_view_count ) ) {
        add_post_meta ( $id, 'post_view_count', $count, true );
    } else {
        $count = $post_view_count + 1;
        update_post_meta( $id, 'post_view_count', $count );
    }

    return $count;
}
