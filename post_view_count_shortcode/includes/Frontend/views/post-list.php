<div class="wedevs-pvcsc-short-code-wrapper" id="wedevs-post-list">
    <?php foreach ($this->posts as $post): ?>
        <?php
            $count = get_post_meta( $post->ID, 'post_view_count', true );
            $count = ! empty ( $count ) ? $count : 0;
        ?>
        
        <div class="wedevs-pvcsc-single-post-view">
            <h2>
                <?php _e( $post->post_title, 'wedevs-pvcsc' ); ?>
                <span class="wedevs-pvcsc-post-status"><?php _e( $post->post_status, 'wedevs-pvcsc' ) ?></span class="status">
            </h2>

            <div>
                View: <?php _e( $count, 'wedevs-pvcsc' )  ?>
                <br />
                ID: <?php _e( $post->ID, 'wedevs-pvcsc' ); ?>
                <br />
                <a href="<?php _e( get_permalink($post->ID), 'wedevs-pvcsc' ) ?>">Read More...</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>