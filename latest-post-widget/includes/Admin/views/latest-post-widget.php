
<div class="latest-post-widget-area">
    <?php foreach ( $latest_posts as $post ): ?>
        <div class="latest-post-single-widget">
            <a class="" href="<?php echo get_permalink( $post['ID'] ) ?>" target="_blank">
                <?php _e( $post['post_title'], 'wedevs-lpw' ); ?>
            </a>
        </div>
    <?php endforeach; ?>
</div>
