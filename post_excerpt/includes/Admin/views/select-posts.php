<select name="wedevs_pemsc_post_ids" id="wedevs_pemsc_post_ids" class="postbox" multiple>
    <option value=""> -- Select Posts -- </option>
    <?php foreach ( $this->posts as $post ): ?>
        <option value="<?php _e( $post->ID, 'wedevs-pemsc' ); ?>">
            <?php _e( $post->post_title, 'wedevs-pemsc' ); ?>
        </option>
    <?php endforeach; ?>
</select>