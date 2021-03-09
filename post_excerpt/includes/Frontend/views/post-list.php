<div class="wedevs-pemsc-short-code-wrapper" id="wedevs-post-list">
    <?php foreach ($this->posts as $post): ?>
        <?php
            $count = get_post_meta( $post->ID, 'post_view_count', true );
            $excerpt = get_post_meta( $post->ID, 'wedevs_pemsc_post_excerpt', true );
            $count = ! empty ( $count ) ? $count : 0;
        ?>
        
        <div class="wedevs-pemsc-single-post-view">
            <h2>
                <?php _e( $post->post_title, 'wedevs-pemsc' ); ?>
                <span class="wedevs-pemsc-post-status"><?php _e( $post->post_status, 'wedevs-pemsc' ) ?></span class="status">
            </h2>

            <div>
                <p>View: <?php _e( $count, 'wedevs-pemsc' )  ?></p>
                <p>ID: <?php _e( $post->ID, 'wedevs-pemsc' ); ?></p>

                <p class="wedevs-pemsc-post-excerpt">
                    <?php _e( $excerpt, 'wedevs-pemsc' ); ?>
                </p>

                <a href="<?php _e( get_permalink($post->ID), 'wedevs-pemsc' ) ?>">Read More...</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>